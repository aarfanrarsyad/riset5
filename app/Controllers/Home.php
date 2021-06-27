<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AlumniModel;
use Config\Services;
use Exception;
use Myth\Auth\Models\LoginModel;
use \JKD\SSO\Client\Provider\Keycloak;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Home extends BaseController
{

	public function index()
	{
		if (session()->has('err_sso')) {
			return redirect()->to(base_url('login'));
		}

		$this->loginModel = new LoginModel();
		$this->modelAuth = new \App\Models\AuthModel();
		$this->modelAlumni = new \App\Models\AlumniModel();
		$this->roleModel = new \App\Models\RoleModel();
		$this->beritaModel = new \App\Models\BeritaModel();
		$faker = \Faker\Factory::create('id_ID');

		// processing login sso bps
		if (isset($_GET['code']) && $_GET['code']) {
			$provider = new Keycloak([
				'authServerUrl'         => 'https://sso.bps.go.id',
				'realm'                 => 'pegawai-bps',
				'clientId'              => '02700-dbalumni-mu1',
				'clientSecret'          => 'e69810d0-f915-49c4-9ed1-cd9edf05436a',
				'redirectUri'           => 'http://localhost:8080',
				'scope' 				=> 'openid profile-pegawai'
			]);

			if (empty($_GET['state']) || ($_GET['state'] !== session('oauth2state'))) {

				session()->remove('oauth2state');
				exit('Invalid state');
			} else {

				$provider = new Keycloak([
					'authServerUrl'         => 'https://sso.bps.go.id',
					'realm'                 => 'pegawai-bps',
					'clientId'              => '02700-dbalumni-mu1',
					'clientSecret'          => 'e69810d0-f915-49c4-9ed1-cd9edf05436a',
					'redirectUri'           => 'http://localhost:8080',
					'scope' 				=> 'openid profile-pegawai'
				]);

				// get token
				try {
					$token = $provider->getAccessToken('authorization_code', [
						'code' => $_GET['code']
					]);
				} catch (Exception $e) {
					exit('Gagal mendapatkan akses token : ' . $e->getMessage());
				}

				try {
					$user = $provider->getResourceOwner($token);
					// dd($user); //cek result sso-bps

					$curl = curl_init();
					curl_setopt_array($curl, [
						CURLOPT_RETURNTRANSFER => 1,
						CURLOPT_URL => "https://pbd.bps.go.id/simpeg_api/pkl_stis_2021",
						CURLOPT_POST => 1,
						CURLOPT_POSTFIELDS => [
							'apiKey'	=> "0smUjhQHo2SMu2MJkcJmgEmEkv4qAfCvTW8PwnQQ724=",
							'kategori'	=> "get_riwayat_pendidikan",
							'nipbps'	=> $user->getNip()
						]
					]);
					curl_setopt($curl, CURLOPT_FRESH_CONNECT, TRUE);

					$result = curl_exec($curl);
					curl_close($curl);
					$hasil = json_decode($result);


					if (session()->has('error')) {
						redirect()->to(base_url('auth/logout'));
					}

					if (isset($hasil->pesan)) {
						exit('SSO sedang dalam perbaikan');
					} else {
						$riwayat_pendidikan = array();
						foreach ($hasil as $data)
							array_push($riwayat_pendidikan, $data->Nama_Instansi_Pendidikan);
						if (in_array('Akademi Ilmu Statistik', $riwayat_pendidikan) || in_array('Sekolah Tinggi Ilmu Statistik', $riwayat_pendidikan) || in_array('Politeknik Statistika STIS', $riwayat_pendidikan)) {

							$cek = $this->modelAlumni->bindingBPS($user->getNip());

							// binding session dengan database
							if ($cek == NULL) {
								session()->set([
									'err_sso' 	=> 'bps_not_listed',
									'logout'	=> $provider->getLogoutUrl()
								]);

								setcookie('login', 'failed', time() + 10, $_SERVER['SERVER_NAME']);
								echo '<script>window.close();</script>';
								die();
								// $data = [
								// 	'nama'               => $user->getName(),
								// 	'jenis_kelamin'      => $faker->randomElement($array = array('Lk', 'Pr')),
								// 	'status_bekerja'     => 1,
								// 	'jabatan_terakhir'   => $user->getJabatan(),
								// 	'aktif_pns'          => 1,
								// 	'email'				 => $user->getEmail(),
								// 	'nip'          	 	 => $user->getNipBaru(),
								// 	'nip_bps'          	 => $user->getNip(),
								// ];

								// if ($data['jenis_kelamin'] == 'Lk') {
								// 	$data['foto_profil'] = "components/icon/Lk-icon.svg";
								// } else {
								// 	$data['foto_profil'] = "components/icon/Pr-icon.svg";
								// }

								// $this->modelAlumni->db->table('alumni')->insert($data);

								// $cek = $this->modelAlumni->getAlumniByNipBPS($user->getNip());
							}

							if ($this->modelAuth->getUserByUsername($user->getUsername()) == NULL) {
								date_default_timezone_set("Asia/Jakarta");
								$now = date("Y-m-d H:i:s");
								$data = [
									'email'				=> $user->getEmail(),
									'username'			=> $user->getUsername(),
									'id_alumni'			=> $cek['id_alumni'],
									'fullname'			=> $user->getName(),
									'user_image'		=> $user->getUrlFoto(),
									'active'			=> 1,
									'force_pass_reset'	=> 0,
									'created_at'		=> $now,
									'updated_at'		=> $now
								];
								$this->modelAuth->insertUser($data);
							}

							$hasil = $this->modelAuth->getUserByUsername($user->getUsername());

							if ($hasil['active'] == 1) {
								session()->set([	//set session (informasi identitas) dari tabel users
									'id_user' => $hasil['id'],
									'id_alumni' => $hasil['id_alumni'],
									'nama' => $hasil['fullname']
								]);

								$query = $this->roleModel->getRole(session('id_user'));
								$role = array();

								if ($query != null) {
									foreach ($query as $arr) {
										array_push($role, $arr->group_id);
									}
									foreach ($query as $arr) {
										$admin_access = $this->roleModel->db->table('groups_access')->where('group_id', $arr->group_id)->get()->getFirstRow('array');
										if ($admin_access != null) {
											if (!in_array("1", $role))
												array_push($role, '1');
										}
									}
									session()->set([
										'role' => $role
									]);
								} else {
									$data = [
										'group_id'	=> 2,
										'user_id'	=> session('id_user')
									];
									$this->roleModel->insertRole($data);
									$query = $this->roleModel->getRole(session('id_user'));
									foreach ($query as $arr) {
										array_push($role, $arr->group_id);
									}
									session()->set([
										'role' => $role
									]);
								}

								$ipAddress = Services::request()->getIPAddress();
								$this->recordLoginAttempt($hasil['email'], $ipAddress, session('id_user') ?? null, true);

								setcookie('login', 'yes', time() + 60, $_SERVER['SERVER_NAME']);
								echo '<script>window.close();</script>';

								$flash = '<strong>Login berhasil!</strong> selamat datang <b>' . session('nama') . '</b>.';
								$alert = "<div id=\"alert\">
										<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
											<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center\" style=\"background-color: #34eb52;\">
												<p class=\"sm:text-base text-sm font-heading font-bold\">" . $flash . "</p>
											</div>
										</div>
									</div>
									<script>
										setTimeout(function() {
											$('#alert').fadeOut();
										}, 1800);
									</script>";
								session()->set([
									'login_notif' => $alert
								]);
								die();
							} else {
								session()->set([
									'err_sso' 	=> 'non-active',
									'logout'	=> $provider->getLogoutUrl()
								]);

								setcookie('login', 'failed', time() + 10, $_SERVER['SERVER_NAME']);
								echo '<script>window.close();</script>';
								die();
							}
						} else {
							session()->set([
								'not_alumni' 	=> true,
								'logout'	=> $provider->getLogoutUrl()
							]);

							setcookie('login', 'failed', time() + 10, $_SERVER['SERVER_NAME']);
							echo '<script>window.close();</script>';
							die();
						}
					}
				} catch (Exception $e) {
					exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
				}
			}
		}

		// Load three news populer
		$hotNews = $this->beritaModel->getNewsForLandingPage()->getResultArray();
		for ($i = 0; $i < count($hotNews); $i++) {
			$hotNews[$i]['tanggal_publish'] = date('d F Y');
			$hotNews[$i]['konten'] = substr(strip_tags($hotNews[$i]['konten']), 0, 215) . ' ..';
		}

		// Load Data jumlah lulusan
		$lulus = [
			'1' => 'Akademi Ilmu Statistik',
			'2' => 'Sekolah Tinggi Ilmu Statistik',
			'3' => 'Politeknik Statistika STIS',
		];

		foreach ($lulus as $row) {
			$model = new \App\Models\AlumniModel();
			$query = "SELECT count(*) AS count FROM `pendidikan` where instansi = '$row'";
			$lulusan[$row] = $model->db->query($query)->getRow()->count;
		}

		// yang sudah memiliki tempat kerja
		$jumlahInput = "SELECT COUNT(*) AS diket FROM `tempat_kerja` AS a RIGHT JOIN `alumni_tempat_kerja` AS b ON a.id_tempat_kerja = b.id_tempat_kerja WHERE a.negara != '' ";
		$diket = $model->db->query($jumlahInput)->getRow()->diket;

		// yang belum memiliki tempat kerja
		$jumlahBelumInput = "SELECT COUNT(*) AS gatau FROM `tempat_kerja` AS a LEFT JOIN `alumni_tempat_kerja` AS b ON a.id_tempat_kerja = b.id_tempat_kerja WHERE b.id_tempat_kerja = 528";
		$gatau = $model->db->query($jumlahBelumInput)->getRow()->gatau;

		// irisan Indonesia dan sudah input
		$jumlahIndonesia = "SELECT COUNT(*) AS indo FROM `tempat_kerja` AS a JOIN `alumni_tempat_kerja` AS b ON a.id_tempat_kerja = b.id_tempat_kerja WHERE a.negara = 'Indonesia'";
		$indo = $model->db->query($jumlahIndonesia)->getRow()->indo;

		$sebaran = [
			'luar'	=> ($diket - $indo),
			'belum'	=> $gatau,
		];

		if (session()->has('id_user')) {
			$data = [
				'judulHalaman' 	=> 'Beranda WEBSIA',
				'active' 		=> 'beranda',
				'login'			=> 'sudah',
				'lulusan'		=> [
					'ais'	=> $lulusan['Akademi Ilmu Statistik'],
					'stis'	=> $lulusan['Sekolah Tinggi Ilmu Statistik'],
					'pstis'	=> $lulusan['Politeknik Statistika STIS']
				],
				'sebaran'	=> [
					'luar'	=> $sebaran['luar'],
					'belum'	=> $sebaran['belum']
				]
			];
		} else {
			$data = [
				'judulHalaman' 	=> 'Beranda WEBSIA',
				'login'			=> 'belum',
				'lulusan'		=> [
					'ais'	=> $lulusan['Akademi Ilmu Statistik'],
					'stis'	=> $lulusan['Sekolah Tinggi Ilmu Statistik'],
					'pstis'	=> $lulusan['Politeknik Statistika STIS']
				],
				'sebaran'	=> [
					'luar'	=> $sebaran['luar'],
					'belum'	=> $sebaran['belum']
				]
			];
		}
		$data['Allnews'] = $hotNews;
		return view('websia/kontenWebsia/halamanUtama/beranda', $data);
	}

	public function recordLoginAttempt(string $email, string $ipAddress = null, int $userID = null, bool $success)
	{
		return $this->loginModel->insert([
			'ip_address' => $ipAddress,
			'email' => $email,
			'user_id' => $userID,
			'date' => date('Y-m-d H:i:s'),
			'success' => (int)$success
		]);
	}

	public function daftar()
	{
		return view('login/daftar.php');
	}

	public function resetpass()
	{
		return view('login/resetpass.php');
	}

	public function lamanResetPass()
	{
		return view('login/lamanResetPass.php');
	}

	public function jumlahPeta()
	{
		$model = new \App\Models\AlumniModel();

		// bentuk array provinsi
		$sebaran['provinsi'] = [
			'Aceh' => 0,
			'Bali' => 0,
			'Banten' => 0,
			'Bengkulu' => 0,
			'D.I.Yogyakarta' => 0,
			'DKI Jakarta' => 0,
			'Gorontalo' => 0,
			'Jambi' => 0,
			'Jawa Barat' => 0,
			'Jawa Tengah' => 0,
			'Jawa Timur' => 0,
			'Kalimantan Barat' => 0,
			'Kalimantan Selatan' => 0,
			'Kalimantan Tengah' => 0,
			'Kalimantan Timur' => 0,
			'Kalimantan Utara' => 0,
			'Kepulauan Bangka Belitung' => 0,
			'Kepulauan Riau' => 0,
			'Lampung' => 0,
			'Maluku' => 0,
			'Maluku Utara' => 0,
			'Nusa Tenggara Barat' => 0,
			'Nusa Tenggara Timur' => 0,
			'Papua' => 0,
			'Papua Barat' => 0,
			'Riau' => 0,
			'Sulawesi Barat' => 0,
			'Sulawesi Selatan' => 0,
			'Sulawesi Tengah' => 0,
			'Sulawesi Tenggara' => 0,
			'Sulawesi Utara' => 0,
			'Sumatera Barat' => 0,
			'Sumatera Selatan' => 0,
			'Sumatera Utara' => 0,
		];

		//query mencari jumlah alumni per provinsi
		$query = "SELECT b.provinsi, COUNT(a.id_tempat_kerja) AS jumlah FROM alumni_tempat_kerja AS a 
		INNER JOIN tempat_kerja AS b ON a.id_tempat_kerja = b.id_tempat_kerja 
		WHERE b.provinsi != '' GROUP BY b.provinsi";
		$provinsi = $model->db->query($query)->getResult();
		foreach ($provinsi as $row) {
			$sebaran['provinsi'][$row->provinsi] = $row->jumlah;
		}

		// bentuk array kabkota
		$sebaran['kabkota'] = [
			"Kabupaten Simeulue" => 0,
			"Kabupaten Aceh Singkil" => 0,
			"Kabupaten Aceh Selatan" => 0,
			"Kabupaten Aceh Tenggara" => 0,
			"Kabupaten Aceh Timur" => 0,
			"Kabupaten Aceh Tengah" => 0,
			"Kabupaten Aceh Barat" => 0,
			"Kabupaten Aceh Besar" => 0,
			"Kabupaten Pidie" => 0,
			"Kabupaten Bireuen" => 0,
			"Kabupaten Aceh Utara" => 0,
			"Kabupaten Aceh Barat Daya" => 0,
			"Kabupaten Gayo Lues" => 0,
			"Kabupaten Aceh Tamiang" => 0,
			"Kabupaten Nagan Raya" => 0,
			"Kabupaten Aceh Jaya" => 0,
			"Kabupaten Bener Meriah" => 0,
			"Kabupaten Pidie Jaya" => 0,
			"Kota Banda Aceh" => 0,
			"Kota Sabang" => 0,
			"Kota Langsa" => 0,
			"Kota Lhokseumawe" => 0,
			"Kota Subulussalam" => 0,
			"Kabupaten Nias" => 0,
			"Kabupaten Mandailing Natal" => 0,
			"Kabupaten Tapanuli Selatan" => 0,
			"Kabupaten Tapanuli Tengah" => 0,
			"Kabupaten Tapanuli Utara" => 0,
			"Kabupaten Toba Samosir" => 0,
			"Kabupaten Labuhan Batu" => 0,
			"Kabupaten Asahan" => 0,
			"Kabupaten Simalungun" => 0,
			"Kabupaten Dairi" => 0,
			"Kabupaten Karo" => 0,
			"Kabupaten Deli Serdang" => 0,
			"Kabupaten Langkat" => 0,
			"Kabupaten Nias Selatan" => 0,
			"Kabupaten Humbang Hasundutan" => 0,
			"Kabupaten Pakpak Bharat" => 0,
			"Kabupaten Samosir" => 0,
			"Kabupaten Serdang Bedagai" => 0,
			"Kabupaten Batu Bara" => 0,
			"Kabupaten Padang Lawas Utara" => 0,
			"Kabupaten Padang Lawas" => 0,
			"Kabupaten Labuhan Batu Selatan" => 0,
			"Kabupaten Labuhan Batu Utara" => 0,
			"Kabupaten Nias Utara" => 0,
			"Kabupaten Nias Barat" => 0,
			"Kota Sibolga" => 0,
			"Kota Tanjung Balai" => 0,
			"Kota Pematang Siantar" => 0,
			"Kota Tebing Tinggi" => 0,
			"Kota Medan" => 0,
			"Kota Binjai" => 0,
			"Kota Padangsidimpuan" => 0,
			"Kota Gunungsitoli" => 0,
			"Kabupaten Kepulauan Mentawai" => 0,
			"Kabupaten Pesisir Selatan" => 0,
			"Kabupaten Solok" => 0,
			"Kabupaten Sijunjung" => 0,
			"Kabupaten Tanah Datar" => 0,
			"Kabupaten Padang Pariaman" => 0,
			"Kabupaten Agam" => 0,
			"Kabupaten Lima Puluh Kota" => 0,
			"Kabupaten Pasaman" => 0,
			"Kabupaten Solok Selatan" => 0,
			"Kabupaten Dharmasraya" => 0,
			"Kabupaten Pasaman Barat" => 0,
			"Kota Padang" => 0,
			"Kota Solok" => 0,
			"Kota Sawah Lunto" => 0,
			"Kota Padang Panjang" => 0,
			"Kota Bukittinggi" => 0,
			"Kota Payakumbuh" => 0,
			"Kota Pariaman" => 0,
			"Kabupaten Kuantan Singingi" => 0,
			"Kabupaten Indragiri Hulu" => 0,
			"Kabupaten Indragiri Hilir" => 0,
			"Kabupaten Pelalawan" => 0,
			"Kabupaten Siak" => 0,
			"Kabupaten Kampar" => 0,
			"Kabupaten Rokan Hulu" => 0,
			"Kabupaten Bengkalis" => 0,
			"Kabupaten Rokan Hilir" => 0,
			"Kabupaten Kepulauan Meranti" => 0,
			"Kota Pekanbaru" => 0,
			"Kota Dumai" => 0,
			"Kabupaten Kerinci" => 0,
			"Kabupaten Merangin" => 0,
			"Kabupaten Sarolangun" => 0,
			"Kabupaten Batang Hari" => 0,
			"Kabupaten Muaro Jambi" => 0,
			"Kabupaten Tanjung Jabung Timur" => 0,
			"Kabupaten Tanjung Jabung Barat" => 0,
			"Kabupaten Tebo" => 0,
			"Kabupaten Bungo" => 0,
			"Kota Jambi" => 0,
			"Kota Sungai Penuh" => 0,
			"Kabupaten Ogan Komering Ulu" => 0,
			"Kabupaten Ogan Komering Ilir" => 0,
			"Kabupaten Muara Enim" => 0,
			"Kabupaten Lahat" => 0,
			"Kabupaten Musi Rawas" => 0,
			"Kabupaten Musi Banyuasin" => 0,
			"Kabupaten Banyu Asin" => 0,
			"Kabupaten Ogan Komering Ulu Selatan" => 0,
			"Kabupaten Ogan Komering Ulu Timur" => 0,
			"Kabupaten Ogan Ilir" => 0,
			"Kabupaten Empat Lawang" => 0,
			"Kabupaten Penukal Abab Lematang Ilir" => 0,
			"Kabupaten Musi Rawas Utara" => 0,
			"Kota Palembang" => 0,
			"Kota Prabumulih" => 0,
			"Kota Pagar Alam" => 0,
			"Kota Lubuklinggau" => 0,
			"Kabupaten Bengkulu Selatan" => 0,
			"Kabupaten Rejang Lebong" => 0,
			"Kabupaten Bengkulu Utara" => 0,
			"Kabupaten Kaur" => 0,
			"Kabupaten Seluma" => 0,
			"Kabupaten Mukomuko" => 0,
			"Kabupaten Lebong" => 0,
			"Kabupaten Kepahiang" => 0,
			"Kabupaten Bengkulu Tengah" => 0,
			"Kota Bengkulu" => 0,
			"Kabupaten Lampung Barat" => 0,
			"Kabupaten Tanggamus" => 0,
			"Kabupaten Lampung Selatan" => 0,
			"Kabupaten Lampung Timur" => 0,
			"Kabupaten Lampung Tengah" => 0,
			"Kabupaten Lampung Utara" => 0,
			"Kabupaten Way Kanan" => 0,
			"Kabupaten Tulangbawang" => 0,
			"Kabupaten Pesawaran" => 0,
			"Kabupaten Pringsewu" => 0,
			"Kabupaten Mesuji" => 0,
			"Kabupaten Tulang Bawang Barat" => 0,
			"Kabupaten Pesisir Barat" => 0,
			"Kota Bandar Lampung" => 0,
			"Kota Metro" => 0,
			"Kabupaten Bangka" => 0,
			"Kabupaten Belitung" => 0,
			"Kabupaten Bangka Barat" => 0,
			"Kabupaten Bangka Tengah" => 0,
			"Kabupaten Bangka Selatan" => 0,
			"Kabupaten Belitung Timur" => 0,
			"Kota Pangkal Pinang" => 0,
			"Kabupaten Karimun" => 0,
			"Kabupaten Bintan" => 0,
			"Kabupaten Natuna" => 0,
			"Kabupaten Lingga" => 0,
			"Kabupaten Kepulauan Anambas" => 0,
			"Kota Batam" => 0,
			"Kota Tanjung Pinang" => 0,
			"Kabupaten Kepulauan Seribu" => 0,
			"Kota Jakarta Selatan" => 0,
			"Kota Jakarta Timur" => 0,
			"Kota Jakarta Pusat" => 0,
			"Kota Jakarta Barat" => 0,
			"Kota Jakarta Utara" => 0,
			"Kabupaten Bogor" => 0,
			"Kabupaten Sukabumi" => 0,
			"Kabupaten Cianjur" => 0,
			"Kabupaten Bandung" => 0,
			"Kabupaten Garut" => 0,
			"Kabupaten Tasikmalaya" => 0,
			"Kabupaten Ciamis" => 0,
			"Kabupaten Kuningan" => 0,
			"Kabupaten Cirebon" => 0,
			"Kabupaten Majalengka" => 0,
			"Kabupaten Sumedang" => 0,
			"Kabupaten Indramayu" => 0,
			"Kabupaten Subang" => 0,
			"Kabupaten Purwakarta" => 0,
			"Kabupaten Karawang" => 0,
			"Kabupaten Bekasi" => 0,
			"Kabupaten Bandung Barat" => 0,
			"Kabupaten Pangandaran" => 0,
			"Kota Bogor" => 0,
			"Kota Sukabumi" => 0,
			"Kota Bandung" => 0,
			"Kota Cirebon" => 0,
			"Kota Bekasi" => 0,
			"Kota Depok" => 0,
			"Kota Cimahi" => 0,
			"Kota Tasikmalaya" => 0,
			"Kota Banjar" => 0,
			"Kabupaten Cilacap" => 0,
			"Kabupaten Banyumas" => 0,
			"Kabupaten Purbalingga" => 0,
			"Kabupaten Banjarnegara" => 0,
			"Kabupaten Kebumen" => 0,
			"Kabupaten Purworejo" => 0,
			"Kabupaten Wonosobo" => 0,
			"Kabupaten Magelang" => 0,
			"Kabupaten Boyolali" => 0,
			"Kabupaten Klaten" => 0,
			"Kabupaten Sukoharjo" => 0,
			"Kabupaten Wonogiri" => 0,
			"Kabupaten Karanganyar" => 0,
			"Kabupaten Sragen" => 0,
			"Kabupaten Grobogan" => 0,
			"Kabupaten Blora" => 0,
			"Kabupaten Rembang" => 0,
			"Kabupaten Pati" => 0,
			"Kabupaten Kudus" => 0,
			"Kabupaten Jepara" => 0,
			"Kabupaten Demak" => 0,
			"Kabupaten Semarang" => 0,
			"Kabupaten Temanggung" => 0,
			"Kabupaten Kendal" => 0,
			"Kabupaten Batang" => 0,
			"Kabupaten Pekalongan" => 0,
			"Kabupaten Pemalang" => 0,
			"Kabupaten Tegal" => 0,
			"Kabupaten Brebes" => 0,
			"Kota Magelang" => 0,
			"Kota Surakarta" => 0,
			"Kota Salatiga" => 0,
			"Kota Semarang" => 0,
			"Kota Pekalongan" => 0,
			"Kota Tegal" => 0,
			"Kabupaten Kulon Progo" => 0,
			"Kabupaten Bantul" => 0,
			"Kabupaten Gunungkidul" => 0,
			"Kabupaten Sleman" => 0,
			"Kota Yogyakarta" => 0,
			"Kabupaten Pacitan" => 0,
			"Kabupaten Ponorogo" => 0,
			"Kabupaten Trenggalek" => 0,
			"Kabupaten Tulungagung" => 0,
			"Kabupaten Blitar" => 0,
			"Kabupaten Kediri" => 0,
			"Kabupaten Malang" => 0,
			"Kabupaten Lumajang" => 0,
			"Kabupaten Jember" => 0,
			"Kabupaten Banyuwangi" => 0,
			"Kabupaten Bondowoso" => 0,
			"Kabupaten Situbondo" => 0,
			"Kabupaten Probolinggo" => 0,
			"Kabupaten Pasuruan" => 0,
			"Kabupaten Sidoarjo" => 0,
			"Kabupaten Mojokerto" => 0,
			"Kabupaten Jombang" => 0,
			"Kabupaten Nganjuk" => 0,
			"Kabupaten Madiun" => 0,
			"Kabupaten Magetan" => 0,
			"Kabupaten Ngawi" => 0,
			"Kabupaten Bojonegoro" => 0,
			"Kota Tuban" => 0,
			"Kabupaten Lamongan" => 0,
			"Kabupaten Gresik" => 0,
			"Kabupaten Bangkalan" => 0,
			"Kabupaten Sampang" => 0,
			"Kabupaten Pamekasan" => 0,
			"Kabupaten Sumenep" => 0,
			"Kota Kediri" => 0,
			"Kota Blitar" => 0,
			"Kota Malang" => 0,
			"Kota Probolinggo" => 0,
			"Kota Pasuruan" => 0,
			"Kota Mojokerto" => 0,
			"Kota Madiun" => 0,
			"Kota Surabaya" => 0,
			"Kota Batu" => 0,
			"Kabupaten Pandeglang" => 0,
			"Kabupaten Lebak" => 0,
			"Kabupaten Tangerang" => 0,
			"Kabupaten Serang" => 0,
			"Kota Tangerang" => 0,
			"Kota Cilegon" => 0,
			"Kota Serang" => 0,
			"Kota Tangerang Selatan" => 0,
			"Kabupaten Jembrana" => 0,
			"Kabupaten Tabanan" => 0,
			"Kabupaten Badung" => 0,
			"Kabupaten Gianyar" => 0,
			"Kabupaten Klungkung" => 0,
			"Kabupaten Bangli" => 0,
			"Kabupaten Karangasem" => 0,
			"Kabupaten Buleleng" => 0,
			"Kota Denpasar" => 0,
			"Kabupaten Lombok Barat" => 0,
			"Kabupaten Lombok Tengah" => 0,
			"Kabupaten Lombok Timur" => 0,
			"Kabupaten Sumbawa" => 0,
			"Kabupaten Dompu" => 0,
			"Kabupaten Bima" => 0,
			"Kabupaten Sumbawa Barat" => 0,
			"Kabupaten Lombok Utara" => 0,
			"Kota Mataram" => 0,
			"Kota Bima" => 0,
			"Kabupaten Sumba Barat" => 0,
			"Kabupaten Sumba Timur" => 0,
			"Kabupaten Kupang" => 0,
			"Kabupaten Timor Tengah Selatan" => 0,
			"Kabupaten Timor Tengah Utara" => 0,
			"Kabupaten Belu" => 0,
			"Kabupaten Alor" => 0,
			"Kabupaten Lembata" => 0,
			"Kabupaten Flores Timur" => 0,
			"Kabupaten Sikka" => 0,
			"Kabupaten Ende" => 0,
			"Kabupaten Ngada" => 0,
			"Kabupaten Manggarai" => 0,
			"Kabupaten Rote Ndao" => 0,
			"Kabupaten Manggarai Barat" => 0,
			"Kabupaten Sumba Tengah" => 0,
			"Kabupaten Sumba Barat Daya" => 0,
			"Kabupaten Nagekeo" => 0,
			"Kabupaten Manggarai Timur" => 0,
			"Kabupaten Sabu Raijua" => 0,
			"Kabupaten Malaka" => 0,
			"Kota Kupang" => 0,
			"Kabupaten Sambas" => 0,
			"Kabupaten Bengkayang" => 0,
			"Kabupaten Landak" => 0,
			"Kabupaten Mempawah" => 0,
			"Kabupaten Sanggau" => 0,
			"Kabupaten Ketapang" => 0,
			"Kabupaten Sintang" => 0,
			"Kabupaten Kapuas Hulu" => 0,
			"Kabupaten Sekadau" => 0,
			"Kabupaten Melawi" => 0,
			"Kabupaten Kayong Utara" => 0,
			"Kabupaten Kubu Raya" => 0,
			"Kota Pontianak" => 0,
			"Kota Singkawang" => 0,
			"Kabupaten Kotawaringin Barat" => 0,
			"Kabupaten Kotawaringin Timur" => 0,
			"Kabupaten Kapuas" => 0,
			"Kabupaten Barito Selatan" => 0,
			"Kabupaten Barito Utara" => 0,
			"Kabupaten Sukamara" => 0,
			"Kabupaten Lamandau" => 0,
			"Kabupaten Seruyan" => 0,
			"Kabupaten Katingan" => 0,
			"Kabupaten Pulang Pisau" => 0,
			"Kabupaten Gunung Mas" => 0,
			"Kabupaten Barito Timur" => 0,
			"Kabupaten Murung Raya" => 0,
			"Kota Palangka Raya" => 0,
			"Kabupaten Tanah Laut" => 0,
			"Kabupaten Kota Baru" => 0,
			"Kabupaten Banjar" => 0,
			"Kabupaten Barito Kuala" => 0,
			"Kabupaten Tapin" => 0,
			"Kabupaten Hulu Sungai Selatan" => 0,
			"Kabupaten Hulu Sungai Tengah" => 0,
			"Kabupaten Hulu Sungai Utara" => 0,
			"Kabupaten Tabalong" => 0,
			"Kabupaten Tanah Bumbu" => 0,
			"Kabupaten Balangan" => 0,
			"Kota Banjarmasin" => 0,
			"Kota Banjar Baru" => 0,
			"Kabupaten Paser" => 0,
			"Kabupaten Kutai Barat" => 0,
			"Kabupaten Kutai Kartanegara" => 0,
			"Kabupaten Kutai Timur" => 0,
			"Kabupaten Berau" => 0,
			"Kabupaten Penajam Paser Utara" => 0,
			"Kabupaten Mahakam Hulu" => 0,
			"Kota Balikpapan" => 0,
			"Kota Samarinda" => 0,
			"Kota Bontang" => 0,
			"Kabupaten Malinau" => 0,
			"Kabupaten Bulungan" => 0,
			"Kabupaten Tana Tidung" => 0,
			"Kabupaten Nunukan" => 0,
			"Kota Tarakan" => 0,
			"Kabupaten Bolaang Mongondow" => 0,
			"Kabupaten Minahasa" => 0,
			"Kabupaten Kepulauan Sangihe" => 0,
			"Kabupaten Kepulauan Talaud" => 0,
			"Kabupaten Minahasa Selatan" => 0,
			"Kabupaten Minahasa Utara" => 0,
			"Kabupaten Bolaang Mongondow Utara" => 0,
			"Kabupaten Siau Tagulandang Biaro" => 0,
			"Kabupaten Minahasa Tenggara" => 0,
			"Kabupaten Bolaang Mongondow Selatan" => 0,
			"Kabupaten Bolaang Mongondow Timur" => 0,
			"Kota Manado" => 0,
			"Kota Bitung" => 0,
			"Kota Tomohon" => 0,
			"Kota Kotamobagu" => 0,
			"Kabupaten Banggai Kepulauan" => 0,
			"Kabupaten Banggai" => 0,
			"Kabupaten Morowali" => 0,
			"Kabupaten Poso" => 0,
			"Kabupaten Donggala" => 0,
			"Kabupaten Toli-Toli" => 0,
			"Kabupaten Buol" => 0,
			"Kabupaten Parigi Moutong" => 0,
			"Kabupaten Tojo Una-Una" => 0,
			"Kabupaten Sigi" => 0,
			"Kabupaten Banggai Laut" => 0,
			"Kabupaten Morowali Utara" => 0,
			"Kota Palu" => 0,
			"Kabupaten Kepulauan Selayar" => 0,
			"Kabupaten Bulukumba" => 0,
			"Kabupaten Bantaeng" => 0,
			"Kabupaten Jeneponto" => 0,
			"Kabupaten Takalar" => 0,
			"Kabupaten Gowa" => 0,
			"Kabupaten Sinjai" => 0,
			"Kabupaten Maros" => 0,
			"Kabupaten Pangkajene Dan Kepulauan" => 0,
			"Kabupaten Barru" => 0,
			"Kabupaten Bone" => 0,
			"Kabupaten Soppeng" => 0,
			"Kabupaten Wajo" => 0,
			"Kabupaten Sidenreng Rappang" => 0,
			"Kabupaten Pinrang" => 0,
			"Kabupaten Enrekang" => 0,
			"Kabupaten Luwu" => 0,
			"Kabupaten Tana Toraja" => 0,
			"Kabupaten Luwu Utara" => 0,
			"Kabupaten Luwu Timur" => 0,
			"Kabupaten Toraja Utara" => 0,
			"Kota Makassar" => 0,
			"Kota Parepare" => 0,
			"Kota Palopo" => 0,
			"Kabupaten Buton" => 0,
			"Kabupaten Muna" => 0,
			"Kabupaten Konawe" => 0,
			"Kabupaten Kolaka" => 0,
			"Kabupaten Konawe Selatan" => 0,
			"Kabupaten Bombana" => 0,
			"Kabupaten Wakatobi" => 0,
			"Kabupaten Kolaka Utara" => 0,
			"Kabupaten Buton Utara" => 0,
			"Kabupaten Konawe Utara" => 0,
			"Kabupaten Kolaka Timur" => 0,
			"Kabupaten Konawe Kepulauan" => 0,
			"Kabupaten Muna Barat" => 0,
			"Kabupaten Buton Tengah" => 0,
			"Kabupaten Buton Selatan" => 0,
			"Kota Kendari" => 0,
			"Kota Baubau" => 0,
			"Kabupaten Boalemo" => 0,
			"Kabupaten Gorontalo" => 0,
			"Kabupaten Pohuwato" => 0,
			"Kabupaten Bone Bolango" => 0,
			"Kabupaten Gorontalo Utara" => 0,
			"Kota Gorontalo" => 0,
			"Kabupaten Majene" => 0,
			"Kabupaten Polewali Mandar" => 0,
			"Kabupaten Mamasa" => 0,
			"Kabupaten Mamuju" => 0,
			"Kabupaten Mamuju Utara" => 0,
			"Kabupaten Mamuju Tengah" => 0,
			"Kabupaten Maluku Tenggara Barat" => 0,
			"Kabupaten Maluku Tenggara" => 0,
			"Kabupaten Maluku Tengah" => 0,
			"Kabupaten Buru" => 0,
			"Kabupaten Kepulauan Aru" => 0,
			"Kabupaten Seram Bagian Barat" => 0,
			"Kabupaten Seram Bagian Timur" => 0,
			"Kabupaten Maluku Barat Daya" => 0,
			"Kabupaten Buru Selatan" => 0,
			"Kota Ambon" => 0,
			"Kota Tual" => 0,
			"Kabupaten Halmahera Barat" => 0,
			"Kabupaten Halmahera Tengah" => 0,
			"Kabupaten Kepulauan Sula" => 0,
			"Kabupaten Halmahera Selatan" => 0,
			"Kabupaten Halmahera Utara" => 0,
			"Kabupaten Halmahera Timur" => 0,
			"Kabupaten Pulau Morotai" => 0,
			"Kabupaten Pulau Taliabu" => 0,
			"Kota Ternate" => 0,
			"Kota Tidore Kepulauan" => 0,
			"Kabupaten Fakfak" => 0,
			"Kabupaten Kaimana" => 0,
			"Kabupaten Teluk Wondama" => 0,
			"Kabupaten Teluk Bintuni" => 0,
			"Kabupaten Manokwari" => 0,
			"Kabupaten Sorong Selatan" => 0,
			"Kabupaten Sorong" => 0,
			"Kabupaten Raja Ampat" => 0,
			"Kabupaten Tambrauw" => 0,
			"Kabupaten Maybrat" => 0,
			"Kabupaten Manokwari Selatan" => 0,
			"Kabupaten Pegunungan Arfak" => 0,
			"Kota Sorong" => 0,
			"Kabupaten Merauke" => 0,
			"Kabupaten Jayawijaya" => 0,
			"Kabupaten Jayapura" => 0,
			"Kabupaten Nabire" => 0,
			"Kabupaten Kepulauan Yapen" => 0,
			"Kabupaten Biak Numfor" => 0,
			"Kabupaten Paniai" => 0,
			"Kabupaten Puncak Jaya" => 0,
			"Kabupaten Mimika" => 0,
			"Kabupaten Boven Digoel" => 0,
			"Kabupaten Mappi" => 0,
			"Kabupaten Asmat" => 0,
			"Kabupaten Yahukimo" => 0,
			"Kabupaten Pegunungan Bintang" => 0,
			"Kabupaten Tolikara" => 0,
			"Kabupaten Sarmi" => 0,
			"Kabupaten Keerom" => 0,
			"Kabupaten Waropen" => 0,
			"Kabupaten Supiori" => 0,
			"Kabupaten Mamberamo Raya" => 0,
			"Kabupaten Nduga" => 0,
			"Kabupaten Lanny Jaya" => 0,
			"Kabupaten Mamberamo Tengah" => 0,
			"Kabupaten Yalimo" => 0,
			"Kabupaten Puncak" => 0,
			"Kabupaten Dogiyai" => 0,
			"Kabupaten Intan Jaya" => 0,
			"Kabupaten Deiyai" => 0,
			"Kota Jayapura" => 0,
		];

		//query mencari jumlah alumni per kabkota
		$query = "SELECT b.kota, COUNT(a.id_tempat_kerja) AS jumlah FROM alumni_tempat_kerja AS a 
		INNER JOIN tempat_kerja AS b ON a.id_tempat_kerja = b.id_tempat_kerja 
		WHERE b.kota != '' GROUP BY b.kota";
		$kabkota = $model->db->query($query)->getResult();
		foreach ($kabkota as $row) {
			$sebaran['kabkota'][$row->kota] = $row->jumlah;
		}

		// return [$jumlahProv, $jumlahKabKota];
		return json_encode(['Provinsi' => $sebaran['provinsi'], 'kabupatenKota' => $sebaran['kabkota']]);
	}
}
