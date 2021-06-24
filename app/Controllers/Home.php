<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AlumniModel;
use Config\Services;
use Exception;
use Myth\Auth\Models\LoginModel;
use \JKD\SSO\Client\Provider\Keycloak;

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

	public function petaProv($namaProv)
	{
		$model = new \App\Models\AlumniModel();
		$jumlah = "SELECT count(*) as prov FROM `tempat_kerja` as a RIGHT JOIN `alumni_tempat_kerja` as b 
		on a.id_tempat_kerja = b.id_tempat_kerja where a.provinsi = '$namaProv'";
		$jumlahProv = $model->db->query($jumlah)->getRow()->prov;
		return $jumlahProv;
	}

	public function petaKabKota($namaKabKota)
	{
		$model = new \App\Models\AlumniModel();
		$jumlah = "SELECT count(*) as kabkota FROM `tempat_kerja` as a RIGHT JOIN `alumni_tempat_kerja` as b on a.id_tempat_kerja = b.id_tempat_kerja where a.kota = '$namaKabKota'";
		$jumlahKabKota = $model->db->query($jumlah)->getRow()->kabkota;
		return $jumlahKabKota;
	}
}
