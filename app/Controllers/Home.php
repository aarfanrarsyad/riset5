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
			$query = "SELECT count(*) AS count FROM `pendidikan` where instansi = '$row' and angkatan != 0";
			$lulusan[$row] = $model->db->query($query)->getRow()->count;
		}

		// Load Jumlah Alumni bekerja dan tidak
		// $jumlahSemua = "SELECT count(*) as semua FROM `alumni` as a LEFT JOIN `alumni_tempat_kerja` as b on a.id_alumni = b.id_alumni";
		// $semua = $model->db->query($jumlahSemua)->getRow()->semua;
		// yang sudah memiliki tempat kerja
		$jumlahInput = "SELECT count(*) as diket FROM `alumni` as a RIGHT JOIN `alumni_tempat_kerja` as b on a.id_alumni = b.id_alumni";
		$diket = $model->db->query($jumlahInput)->getRow()->diket;
		// yang belum memiliki tempat kerja
		$jumlahBelumInput = "SELECT count(*) as gatau FROM `alumni` as a LEFT JOIN `alumni_tempat_kerja` as b on a.id_alumni = b.id_alumni WHERE b.id_alumni IS NULL";
		$gatau = $model->db->query($jumlahBelumInput)->getRow()->gatau;
		// irisan Indonesia dan sudah input
		$jumlahIndonesia = "SELECT count(*) as indo FROM `tempat_kerja` as a JOIN `alumni_tempat_kerja` as b on a.id_tempat_kerja = b.id_tempat_kerja WHERE a.negara = 'Indonesia'";
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

		$provinsi = [
			"1" => "Aceh",
			"2" => "Sumatera Utara",
			"3" => "Sumatera Barat",
			"4" => "Riau",
			"5" => "Jambi",
			"6" => "Sumatera Selatan",
			"7" => "Bengkulu",
			"8" => "Lampung",
			"9" => "Kepulauan Bangka Belitung",
			"10" => "Kepulauan Riau",
			"11" => "Dki Jakarta",
			"12" => "Jawa Barat",
			"13" => "Jawa Tengah",
			"14" => "Di Yogyakarta",
			"15" => "Jawa Timur",
			"16" => "Banten",
			"17" => "Bali",
			"18" => "Nusa Tenggara Barat",
			"19" => "Nusa Tenggara Timur",
			"20" => "Kalimantan Barat",
			"21" => "Kalimantan Tengah",
			"22" => "Kalimantan Selatan",
			"23" => "Kalimantan Timur",
			"24" => "Kalimantan Utara",
			"25" => "Sulawesi Utara",
			"26" => "Sulawesi Tengah",
			"27" => "Sulawesi Selatan",
			"28" => "Sulawesi Tenggara",
			"29" => "Gorontalo",
			"30" => "Sulawesi Barat",
			"31" => "Maluku",
			"32" => "Maluku Utara",
			"33" => "Papua Barat",
			"34" => "Papua",
		];

		foreach ($provinsi as $row) {
			$jumlah = "SELECT count(*) as prov FROM `tempat_kerja` as a RIGHT JOIN `alumni_tempat_kerja` as b 
			on a.id_tempat_kerja = b.id_tempat_kerja where a.provinsi = '$row'";
			$jumlahProv[$row]  = $model->db->query($jumlah)->getRow()->prov;
		}

		$kabkota = [
			"1" => "Kabupaten Simeulue",
			"2" => "Kabupaten Aceh Singkil",
			"3" => "Kabupaten Aceh Selatan",
			"4" => "Kabupaten Aceh Tenggara",
			"5" => "Kabupaten Aceh Timur",
			"6" => "Kabupaten Aceh Tengah",
			"7" => "Kabupaten Aceh Barat",
			"8" => "Kabupaten Aceh Besar",
			"9" => "Kabupaten Pidie",
			"10" => "Kabupaten Bireuen",
			"11" => "Kabupaten Aceh Utara",
			"12" => "Kabupaten Aceh Barat Daya",
			"13" => "Kabupaten Gayo Lues",
			"14" => "Kabupaten Aceh Tamiang",
			"15" => "Kabupaten Nagan Raya",
			"16" => "Kabupaten Aceh Jaya",
			"17" => "Kabupaten Bener Meriah",
			"18" => "Kabupaten Pidie Jaya",
			"19" => "Kota Banda Aceh",
			"20" => "Kota Sabang",
			"21" => "Kota Langsa",
			"22" => "Kota Lhokseumawe",
			"23" => "Kota Subulussalam",
			"24" => "Kabupaten Nias",
			"25" => "Kabupaten Mandailing Natal",
			"26" => "Kabupaten Tapanuli Selatan",
			"27" => "Kabupaten Tapanuli Tengah",
			"28" => "Kabupaten Tapanuli Utara",
			"29" => "Kabupaten Toba Samosir",
			"30" => "Kabupaten Labuhan Batu",
			"31" => "Kabupaten Asahan",
			"32" => "Kabupaten Simalungun",
			"33" => "Kabupaten Dairi",
			"34" => "Kabupaten Karo",
			"35" => "Kabupaten Deli Serdang",
			"36" => "Kabupaten Langkat",
			"37" => "Kabupaten Nias Selatan",
			"38" => "Kabupaten Humbang Hasundutan",
			"39" => "Kabupaten Pakpak Bharat",
			"40" => "Kabupaten Samosir",
			"41" => "Kabupaten Serdang Bedagai",
			"42" => "Kabupaten Batu Bara",
			"43" => "Kabupaten Padang Lawas Utara",
			"44" => "Kabupaten Padang Lawas",
			"45" => "Kabupaten Labuhan Batu Selatan",
			"46" => "Kabupaten Labuhan Batu Utara",
			"47" => "Kabupaten Nias Utara",
			"48" => "Kabupaten Nias Barat",
			"49" => "Kota Sibolga",
			"50" => "Kota Tanjung Balai",
			"51" => "Kota Pematang Siantar",
			"52" => "Kota Tebing Tinggi",
			"53" => "Kota Medan",
			"54" => "Kota Binjai",
			"55" => "Kota Padangsidimpuan",
			"56" => "Kota Gunungsitoli",
			"57" => "Kabupaten Kepulauan Mentawai",
			"58" => "Kabupaten Pesisir Selatan",
			"59" => "Kabupaten Solok",
			"60" => "Kabupaten Sijunjung",
			"61" => "Kabupaten Tanah Datar",
			"62" => "Kabupaten Padang Pariaman",
			"63" => "Kabupaten Agam",
			"64" => "Kabupaten Lima Puluh Kota",
			"65" => "Kabupaten Pasaman",
			"66" => "Kabupaten Solok Selatan",
			"67" => "Kabupaten Dharmasraya",
			"68" => "Kabupaten Pasaman Barat",
			"69" => "Kota Padang",
			"70" => "Kota Solok",
			"71" => "Kota Sawah Lunto",
			"72" => "Kota Padang Panjang",
			"73" => "Kota Bukittinggi",
			"74" => "Kota Payakumbuh",
			"75" => "Kota Pariaman",
			"76" => "Kabupaten Kuantan Singingi",
			"77" => "Kabupaten Indragiri Hulu",
			"78" => "Kabupaten Indragiri Hilir",
			"79" => "Kabupaten Pelalawan",
			"80" => "Kabupaten Siak",
			"81" => "Kabupaten Kampar",
			"82" => "Kabupaten Rokan Hulu",
			"83" => "Kabupaten Bengkalis",
			"84" => "Kabupaten Rokan Hilir",
			"85" => "Kabupaten Kepulauan Meranti",
			"86" => "Kota Pekanbaru",
			"87" => "Kota Dumai",
			"88" => "Kabupaten Kerinci",
			"89" => "Kabupaten Merangin",
			"90" => "Kabupaten Sarolangun",
			"91" => "Kabupaten Batang Hari",
			"92" => "Kabupaten Muaro Jambi",
			"93" => "Kabupaten Tanjung Jabung Timur",
			"94" => "Kabupaten Tanjung Jabung Barat",
			"95" => "Kabupaten Tebo",
			"96" => "Kabupaten Bungo",
			"97" => "Kota Jambi",
			"98" => "Kota Sungai Penuh",
			"99" => "Kabupaten Ogan Komering Ulu",
			"100" => "Kabupaten Ogan Komering Ilir",
			"101" => "Kabupaten Muara Enim",
			"102" => "Kabupaten Lahat",
			"103" => "Kabupaten Musi Rawas",
			"104" => "Kabupaten Musi Banyuasin",
			"105" => "Kabupaten Banyu Asin",
			"106" => "Kabupaten Ogan Komering Ulu Selatan",
			"107" => "Kabupaten Ogan Komering Ulu Timur",
			"108" => "Kabupaten Ogan Ilir",
			"109" => "Kabupaten Empat Lawang",
			"110" => "Kabupaten Penukal Abab Lematang Ilir",
			"111" => "Kabupaten Musi Rawas Utara",
			"112" => "Kota Palembang",
			"113" => "Kota Prabumulih",
			"114" => "Kota Pagar Alam",
			"115" => "Kota Lubuklinggau",
			"116" => "Kabupaten Bengkulu Selatan",
			"117" => "Kabupaten Rejang Lebong",
			"118" => "Kabupaten Bengkulu Utara",
			"119" => "Kabupaten Kaur",
			"120" => "Kabupaten Seluma",
			"121" => "Kabupaten Mukomuko",
			"122" => "Kabupaten Lebong",
			"123" => "Kabupaten Kepahiang",
			"124" => "Kabupaten Bengkulu Tengah",
			"125" => "Kota Bengkulu",
			"126" => "Kabupaten Lampung Barat",
			"127" => "Kabupaten Tanggamus",
			"128" => "Kabupaten Lampung Selatan",
			"129" => "Kabupaten Lampung Timur",
			"130" => "Kabupaten Lampung Tengah",
			"131" => "Kabupaten Lampung Utara",
			"132" => "Kabupaten Way Kanan",
			"133" => "Kabupaten Tulangbawang",
			"134" => "Kabupaten Pesawaran",
			"135" => "Kabupaten Pringsewu",
			"136" => "Kabupaten Mesuji",
			"137" => "Kabupaten Tulang Bawang Barat",
			"138" => "Kabupaten Pesisir Barat",
			"139" => "Kota Bandar Lampung",
			"140" => "Kota Metro",
			"141" => "Kabupaten Bangka",
			"142" => "Kabupaten Belitung",
			"143" => "Kabupaten Bangka Barat",
			"144" => "Kabupaten Bangka Tengah",
			"145" => "Kabupaten Bangka Selatan",
			"146" => "Kabupaten Belitung Timur",
			"147" => "Kota Pangkal Pinang",
			"148" => "Kabupaten Karimun",
			"149" => "Kabupaten Bintan",
			"150" => "Kabupaten Natuna",
			"151" => "Kabupaten Lingga",
			"152" => "Kabupaten Kepulauan Anambas",
			"153" => "Kota Batam",
			"154" => "Kota Tanjung Pinang",
			"155" => "Kabupaten Kepulauan Seribu",
			"156" => "Kota Jakarta Selatan",
			"157" => "Kota Jakarta Timur",
			"158" => "Kota Jakarta Pusat",
			"159" => "Kota Jakarta Barat",
			"160" => "Kota Jakarta Utara",
			"161" => "Kabupaten Bogor",
			"162" => "Kabupaten Sukabumi",
			"163" => "Kabupaten Cianjur",
			"164" => "Kabupaten Bandung",
			"165" => "Kabupaten Garut",
			"166" => "Kabupaten Tasikmalaya",
			"167" => "Kabupaten Ciamis",
			"168" => "Kabupaten Kuningan",
			"169" => "Kabupaten Cirebon",
			"170" => "Kabupaten Majalengka",
			"171" => "Kabupaten Sumedang",
			"172" => "Kabupaten Indramayu",
			"173" => "Kabupaten Subang",
			"174" => "Kabupaten Purwakarta",
			"175" => "Kabupaten Karawang",
			"176" => "Kabupaten Bekasi",
			"177" => "Kabupaten Bandung Barat",
			"178" => "Kabupaten Pangandaran",
			"179" => "Kota Bogor",
			"180" => "Kota Sukabumi",
			"181" => "Kota Bandung",
			"182" => "Kota Cirebon",
			"183" => "Kota Bekasi",
			"184" => "Kota Depok",
			"185" => "Kota Cimahi",
			"186" => "Kota Tasikmalaya",
			"187" => "Kota Banjar",
			"188" => "Kabupaten Cilacap",
			"189" => "Kabupaten Banyumas",
			"190" => "Kabupaten Purbalingga",
			"191" => "Kabupaten Banjarnegara",
			"192" => "Kabupaten Kebumen",
			"193" => "Kabupaten Purworejo",
			"194" => "Kabupaten Wonosobo",
			"195" => "Kabupaten Magelang",
			"196" => "Kabupaten Boyolali",
			"197" => "Kabupaten Klaten",
			"198" => "Kabupaten Sukoharjo",
			"199" => "Kabupaten Wonogiri",
			"200" => "Kabupaten Karanganyar",
			"201" => "Kabupaten Sragen",
			"202" => "Kabupaten Grobogan",
			"203" => "Kabupaten Blora",
			"204" => "Kabupaten Rembang",
			"205" => "Kabupaten Pati",
			"206" => "Kabupaten Kudus",
			"207" => "Kabupaten Jepara",
			"208" => "Kabupaten Demak",
			"209" => "Kabupaten Semarang",
			"210" => "Kabupaten Temanggung",
			"211" => "Kabupaten Kendal",
			"212" => "Kabupaten Batang",
			"213" => "Kabupaten Pekalongan",
			"214" => "Kabupaten Pemalang",
			"215" => "Kabupaten Tegal",
			"216" => "Kabupaten Brebes",
			"217" => "Kota Magelang",
			"218" => "Kota Surakarta",
			"219" => "Kota Salatiga",
			"220" => "Kota Semarang",
			"221" => "Kota Pekalongan",
			"222" => "Kota Tegal",
			"223" => "Kabupaten Kulon Progo",
			"224" => "Kabupaten Bantul",
			"225" => "Kabupaten Gunungkidul",
			"226" => "Kabupaten Sleman",
			"227" => "Kota Yogyakarta",
			"228" => "Kabupaten Pacitan",
			"229" => "Kabupaten Ponorogo",
			"230" => "Kabupaten Trenggalek",
			"231" => "Kabupaten Tulungagung",
			"232" => "Kabupaten Blitar",
			"233" => "Kabupaten Kediri",
			"234" => "Kabupaten Malang",
			"235" => "Kabupaten Lumajang",
			"236" => "Kabupaten Jember",
			"237" => "Kabupaten Banyuwangi",
			"238" => "Kabupaten Bondowoso",
			"239" => "Kabupaten Situbondo",
			"240" => "Kabupaten Probolinggo",
			"241" => "Kabupaten Pasuruan",
			"242" => "Kabupaten Sidoarjo",
			"243" => "Kabupaten Mojokerto",
			"244" => "Kabupaten Jombang",
			"245" => "Kabupaten Nganjuk",
			"246" => "Kabupaten Madiun",
			"247" => "Kabupaten Magetan",
			"248" => "Kabupaten Ngawi",
			"249" => "Kabupaten Bojonegoro",
			"250" => "Kota Tuban",
			"251" => "Kabupaten Lamongan",
			"252" => "Kabupaten Gresik",
			"253" => "Kabupaten Bangkalan",
			"254" => "Kabupaten Sampang",
			"255" => "Kabupaten Pamekasan",
			"256" => "Kabupaten Sumenep",
			"257" => "Kota Kediri",
			"258" => "Kota Blitar",
			"259" => "Kota Malang",
			"260" => "Kota Probolinggo",
			"261" => "Kota Pasuruan",
			"262" => "Kota Mojokerto",
			"263" => "Kota Madiun",
			"264" => "Kota Surabaya",
			"265" => "Kota Batu",
			"266" => "Kabupaten Pandeglang",
			"267" => "Kabupaten Lebak",
			"268" => "Kabupaten Tangerang",
			"269" => "Kabupaten Serang",
			"270" => "Kota Tangerang",
			"271" => "Kota Cilegon",
			"272" => "Kota Serang",
			"273" => "Kota Tangerang Selatan",
			"274" => "Kabupaten Jembrana",
			"275" => "Kabupaten Tabanan",
			"276" => "Kabupaten Badung",
			"277" => "Kabupaten Gianyar",
			"278" => "Kabupaten Klungkung",
			"279" => "Kabupaten Bangli",
			"280" => "Kabupaten Karangasem",
			"281" => "Kabupaten Buleleng",
			"282" => "Kota Denpasar",
			"283" => "Kabupaten Lombok Barat",
			"284" => "Kabupaten Lombok Tengah",
			"285" => "Kabupaten Lombok Timur",
			"286" => "Kabupaten Sumbawa",
			"287" => "Kabupaten Dompu",
			"288" => "Kabupaten Bima",
			"289" => "Kabupaten Sumbawa Barat",
			"290" => "Kabupaten Lombok Utara",
			"291" => "Kota Mataram",
			"292" => "Kota Bima",
			"293" => "Kabupaten Sumba Barat",
			"294" => "Kabupaten Sumba Timur",
			"295" => "Kabupaten Kupang",
			"296" => "Kabupaten Timor Tengah Selatan",
			"297" => "Kabupaten Timor Tengah Utara",
			"298" => "Kabupaten Belu",
			"299" => "Kabupaten Alor",
			"300" => "Kabupaten Lembata",
			"301" => "Kabupaten Flores Timur",
			"302" => "Kabupaten Sikka",
			"303" => "Kabupaten Ende",
			"304" => "Kabupaten Ngada",
			"305" => "Kabupaten Manggarai",
			"306" => "Kabupaten Rote Ndao",
			"307" => "Kabupaten Manggarai Barat",
			"308" => "Kabupaten Sumba Tengah",
			"309" => "Kabupaten Sumba Barat Daya",
			"310" => "Kabupaten Nagekeo",
			"311" => "Kabupaten Manggarai Timur",
			"312" => "Kabupaten Sabu Raijua",
			"313" => "Kabupaten Malaka",
			"314" => "Kota Kupang",
			"315" => "Kabupaten Sambas",
			"316" => "Kabupaten Bengkayang",
			"317" => "Kabupaten Landak",
			"318" => "Kabupaten Mempawah",
			"319" => "Kabupaten Sanggau",
			"320" => "Kabupaten Ketapang",
			"321" => "Kabupaten Sintang",
			"322" => "Kabupaten Kapuas Hulu",
			"323" => "Kabupaten Sekadau",
			"324" => "Kabupaten Melawi",
			"325" => "Kabupaten Kayong Utara",
			"326" => "Kabupaten Kubu Raya",
			"327" => "Kota Pontianak",
			"328" => "Kota Singkawang",
			"329" => "Kabupaten Kotawaringin Barat",
			"330" => "Kabupaten Kotawaringin Timur",
			"331" => "Kabupaten Kapuas",
			"332" => "Kabupaten Barito Selatan",
			"333" => "Kabupaten Barito Utara",
			"334" => "Kabupaten Sukamara",
			"335" => "Kabupaten Lamandau",
			"336" => "Kabupaten Seruyan",
			"337" => "Kabupaten Katingan",
			"338" => "Kabupaten Pulang Pisau",
			"339" => "Kabupaten Gunung Mas",
			"340" => "Kabupaten Barito Timur",
			"341" => "Kabupaten Murung Raya",
			"342" => "Kota Palangka Raya",
			"343" => "Kabupaten Tanah Laut",
			"344" => "Kabupaten Kota Baru",
			"345" => "Kabupaten Banjar",
			"346" => "Kabupaten Barito Kuala",
			"347" => "Kabupaten Tapin",
			"348" => "Kabupaten Hulu Sungai Selatan",
			"349" => "Kabupaten Hulu Sungai Tengah",
			"350" => "Kabupaten Hulu Sungai Utara",
			"351" => "Kabupaten Tabalong",
			"352" => "Kabupaten Tanah Bumbu",
			"353" => "Kabupaten Balangan",
			"354" => "Kota Banjarmasin",
			"355" => "Kota Banjar Baru",
			"356" => "Kabupaten Paser",
			"357" => "Kabupaten Kutai Barat",
			"358" => "Kabupaten Kutai Kartanegara",
			"359" => "Kabupaten Kutai Timur",
			"360" => "Kabupaten Berau",
			"361" => "Kabupaten Penajam Paser Utara",
			"362" => "Kabupaten Mahakam Hulu",
			"363" => "Kota Balikpapan",
			"364" => "Kota Samarinda",
			"365" => "Kota Bontang",
			"366" => "Kabupaten Malinau",
			"367" => "Kabupaten Bulungan",
			"368" => "Kabupaten Tana Tidung",
			"369" => "Kabupaten Nunukan",
			"370" => "Kota Tarakan",
			"371" => "Kabupaten Bolaang Mongondow",
			"372" => "Kabupaten Minahasa",
			"373" => "Kabupaten Kepulauan Sangihe",
			"374" => "Kabupaten Kepulauan Talaud",
			"375" => "Kabupaten Minahasa Selatan",
			"376" => "Kabupaten Minahasa Utara",
			"377" => "Kabupaten Bolaang Mongondow Utara",
			"378" => "Kabupaten Siau Tagulandang Biaro",
			"379" => "Kabupaten Minahasa Tenggara",
			"380" => "Kabupaten Bolaang Mongondow Selatan",
			"381" => "Kabupaten Bolaang Mongondow Timur",
			"382" => "Kota Manado",
			"383" => "Kota Bitung",
			"384" => "Kota Tomohon",
			"385" => "Kota Kotamobagu",
			"386" => "Kabupaten Banggai Kepulauan",
			"387" => "Kabupaten Banggai",
			"388" => "Kabupaten Morowali",
			"389" => "Kabupaten Poso",
			"390" => "Kabupaten Donggala",
			"391" => "Kabupaten Toli-toli",
			"392" => "Kabupaten Buol",
			"393" => "Kabupaten Parigi Moutong",
			"394" => "Kabupaten Tojo Una-una",
			"395" => "Kabupaten Sigi",
			"396" => "Kabupaten Banggai Laut",
			"397" => "Kabupaten Morowali Utara",
			"398" => "Kota Palu",
			"399" => "Kabupaten Kepulauan Selayar",
			"400" => "Kabupaten Bulukumba",
			"401" => "Kabupaten Bantaeng",
			"402" => "Kabupaten Jeneponto",
			"403" => "Kabupaten Takalar",
			"404" => "Kabupaten Gowa",
			"405" => "Kabupaten Sinjai",
			"406" => "Kabupaten Maros",
			"407" => "Kabupaten Pangkajene Dan Kepulauan",
			"408" => "Kabupaten Barru",
			"409" => "Kabupaten Bone",
			"410" => "Kabupaten Soppeng",
			"411" => "Kabupaten Wajo",
			"412" => "Kabupaten Sidenreng Rappang",
			"413" => "Kabupaten Pinrang",
			"414" => "Kabupaten Enrekang",
			"415" => "Kabupaten Luwu",
			"416" => "Kabupaten Tana Toraja",
			"417" => "Kabupaten Luwu Utara",
			"418" => "Kabupaten Luwu Timur",
			"419" => "Kabupaten Toraja Utara",
			"420" => "Kota Makassar",
			"421" => "Kota Parepare",
			"422" => "Kota Palopo",
			"423" => "Kabupaten Buton",
			"424" => "Kabupaten Muna",
			"425" => "Kabupaten Konawe",
			"426" => "Kabupaten Kolaka",
			"427" => "Kabupaten Konawe Selatan",
			"428" => "Kabupaten Bombana",
			"429" => "Kabupaten Wakatobi",
			"430" => "Kabupaten Kolaka Utara",
			"431" => "Kabupaten Buton Utara",
			"432" => "Kabupaten Konawe Utara",
			"433" => "Kabupaten Kolaka Timur",
			"434" => "Kabupaten Konawe Kepulauan",
			"435" => "Kabupaten Muna Barat",
			"436" => "Kabupaten Buton Tengah",
			"437" => "Kabupaten Buton Selatan",
			"438" => "Kota Kendari",
			"439" => "Kota Baubau",
			"440" => "Kabupaten Boalemo",
			"441" => "Kabupaten Gorontalo",
			"442" => "Kabupaten Pohuwato",
			"443" => "Kabupaten Bone Bolango",
			"444" => "Kabupaten Gorontalo Utara",
			"445" => "Kota Gorontalo",
			"446" => "Kabupaten Majene",
			"447" => "Kabupaten Polewali Mandar",
			"448" => "Kabupaten Mamasa",
			"449" => "Kabupaten Mamuju",
			"450" => "Kabupaten Mamuju Utara",
			"451" => "Kabupaten Mamuju Tengah",
			"452" => "Kabupaten Maluku Tenggara Barat",
			"453" => "Kabupaten Maluku Tenggara",
			"454" => "Kabupaten Maluku Tengah",
			"455" => "Kabupaten Buru",
			"456" => "Kabupaten Kepulauan Aru",
			"457" => "Kabupaten Seram Bagian Barat",
			"458" => "Kabupaten Seram Bagian Timur",
			"459" => "Kabupaten Maluku Barat Daya",
			"460" => "Kabupaten Buru Selatan",
			"461" => "Kota Ambon",
			"462" => "Kota Tual",
			"463" => "Kabupaten Halmahera Barat",
			"464" => "Kabupaten Halmahera Tengah",
			"465" => "Kabupaten Kepulauan Sula",
			"466" => "Kabupaten Halmahera Selatan",
			"467" => "Kabupaten Halmahera Utara",
			"468" => "Kabupaten Halmahera Timur",
			"469" => "Kabupaten Pulau Morotai",
			"470" => "Kabupaten Pulau Taliabu",
			"471" => "Kota Ternate",
			"472" => "Kota Tidore Kepulauan",
			"473" => "Kabupaten Fakfak",
			"474" => "Kabupaten Kaimana",
			"475" => "Kabupaten Teluk Wondama",
			"476" => "Kabupaten Teluk Bintuni",
			"477" => "Kabupaten Manokwari",
			"478" => "Kabupaten Sorong Selatan",
			"479" => "Kabupaten Sorong",
			"480" => "Kabupaten Raja Ampat",
			"481" => "Kabupaten Tambrauw",
			"482" => "Kabupaten Maybrat",
			"483" => "Kabupaten Manokwari Selatan",
			"484" => "Kabupaten Pegunungan Arfak",
			"485" => "Kota Sorong",
			"486" => "Kabupaten Merauke",
			"487" => "Kabupaten Jayawijaya",
			"488" => "Kabupaten Jayapura",
			"489" => "Kabupaten Nabire",
			"490" => "Kabupaten Kepulauan Yapen",
			"491" => "Kabupaten Biak Numfor",
			"492" => "Kabupaten Paniai",
			"493" => "Kabupaten Puncak Jaya",
			"494" => "Kabupaten Mimika",
			"495" => "Kabupaten Boven Digoel",
			"496" => "Kabupaten Mappi",
			"497" => "Kabupaten Asmat",
			"498" => "Kabupaten Yahukimo",
			"499" => "Kabupaten Pegunungan Bintang",
			"500" => "Kabupaten Tolikara",
			"501" => "Kabupaten Sarmi",
			"502" => "Kabupaten Keerom",
			"503" => "Kabupaten Waropen",
			"504" => "Kabupaten Supiori",
			"505" => "Kabupaten Mamberamo Raya",
			"506" => "Kabupaten Nduga",
			"507" => "Kabupaten Lanny Jaya",
			"508" => "Kabupaten Mamberamo Tengah",
			"509" => "Kabupaten Yalimo",
			"510" => "Kabupaten Puncak",
			"511" => "Kabupaten Dogiyai",
			"512" => "Kabupaten Intan Jaya",
			"513" => "Kabupaten Deiyai",
			"514" => "Kota Jayapura",
		];

		foreach ($kabkota as $row) {
			$jumlah = "SELECT count(*) as kabkota FROM `tempat_kerja` as a RIGHT JOIN `alumni_tempat_kerja` as b on a.id_tempat_kerja = b.id_tempat_kerja where a.kota = '$row'";
			$jumlahKabKota[$row] = $model->db->query($jumlah)->getRow()->kabkota;
		}
		// return [$jumlahProv, $jumlahKabKota];
		return json_encode(['Provinsi' => $jumlahProv, 'kabupatenKota' => $jumlahKabKota]);
	}
}
