<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use Exception;
use Myth\Auth\Models\LoginModel;
use \JKD\SSO\Client\Provider\Keycloak;

class Auth extends BaseController
{

	public function __construct()
	{
		$this->loginModel = new LoginModel();
		$this->modelAuth = new \App\Models\AuthModel();
		$this->modelAlumni = new \App\Models\AlumniModel();
		$this->roleModel = new \App\Models\RoleModel();
	}

	public function index() //login
	{
	}

	//--------------------------------------------------------------------

	public function reg() //registrasi
	{
	}

	//--------------------------------------------------------------------


	public function forgot() //lupa pasword
	{
	}

	//--------------------------------------------------------------------


	public function aktivasi() //aktivasi akun dari registrasi
	{
	}

	//--------------------------------------------------------------------

	public function logout()
	{
		// logout sipadu dan manual
		if (session()->has('id_user')) {

			session()->remove(['id_user', 'id_alumni', 'nama', 'role']);
			session()->setFlashdata('pesan', 'Logout berhasil!');
			session()->setFlashdata('warna', 'success');

			//logout bps
			if (session('oauth2state')) {
				$provider = new Keycloak([
					'authServerUrl'         => 'https://sso.bps.go.id',
					'realm'                 => 'pegawai-bps',
					'clientId'              => '02700-dbalumni-mu1',
					'clientSecret'          => 'e69810d0-f915-49c4-9ed1-cd9edf05436a',
					'redirectUri'           => 'https://alumni.stis.ac.id/',
					'scope' 				=> 'openid profile-pegawai'
				]);
				session()->remove('oauth2state');

				$url_logout = $provider->getLogoutUrl();
				// dd($url_logout);
				return redirect()->to($url_logout);
			}
		}
		return redirect()->to('/logout');
	}

	//--------------------------------------------------------------------

	public function sipadu()	//masuk()
	{
		if (session()->has('id_user'))
			return redirect()->back();

		$query = http_build_query([
			'client_id' => "14",
			'redirect_uri' => 'https://alumni.stis.ac.id/validate_sipadu',
			'response_type' => 'code', //gak usah diubah
			'scope' => 'user:profile:read'
		]);

		return redirect()->to('https://ws.stis.ac.id/oauth/authorize?' . $query);
	}

	public function validate_sipadu()	//masuk()
	{
		if (isset($_GET['code']) && $_GET['code']) {
			$faker = \Faker\Factory::create('id_ID');

			$curl_status = curl_init();

			curl_setopt_array($curl_status, [
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'https://ws.stis.ac.id/oauth/token',
				CURLOPT_POST => 1,

				CURLOPT_POSTFIELDS => [
					'grant_type' => 'authorization_code',
					'client_id' => '14',
					'client_secret' => '3r3grLcMKEEqhq1gHbks1ZzztbFdasLbzpg0YDj0',
					'redirect_uri' => 'https://alumni.stis.ac.id/validate_sipadu',
					'code' => $_GET['code']
				]
			]);
			curl_setopt($curl_status, CURLOPT_FRESH_CONNECT, TRUE);
			$result = curl_exec($curl_status);
			curl_close($curl_status);
			$hasil = json_decode($result); //hasil json untuk token
			$token = $hasil->access_token;

			if (!isset($token))
				return redirect()->to('/');

			$authorization = "Authorization: Bearer " . $token;

			$curl_status = curl_init();

			curl_setopt_array($curl_status, [
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'https://ws.stis.ac.id/api/user',
				CURLOPT_HTTPHEADER => array($authorization)
			]);

			curl_setopt($curl_status, CURLOPT_FRESH_CONNECT, TRUE);

			$result = curl_exec($curl_status);
			curl_close($curl_status);

			// echo ($result);	//cek result sipadu
			// die();

			$hasil = json_decode($result, true);	// hasil akhir sipadu

			if (isset($hasil['profile']['nim'])) {	//apabila alumni login dengan akun sipadu mahasiswa
				date_default_timezone_set("Asia/Jakarta");
				$year_now = date("Y");

				$alumni = false;

				foreach ($hasil['profile']['kelas'] as $kelas) {
					if (strpos($kelas['kode_kelas'], '3D3') !== false || strpos($kelas['kode_kelas'], '4SI') !== false || strpos($kelas['kode_kelas'], '4SD') !== false || strpos($kelas['kode_kelas'], '4SE') !== false || strpos($kelas['kode_kelas'], '4SK') !== false || strpos($kelas['kode_kelas'], '4KS') !== false || strpos($kelas['kode_kelas'], '4ST') !== false) {
						if ($year_now - $kelas['tahun_akademik'] >= 1) {
							$tahun_lulus = $kelas['tahun_akademik'] + 1;
							if (strpos($kelas['kode_kelas'], '3D3')) {
								$jenjang = 'D-III';
								$angkatan = $tahun_lulus - 1961;
								$prodi = 'D-III Statistika';
							} else {
								$jenjang = 'D-IV';
								$angkatan = $tahun_lulus - 1962;
								if (strpos($kelas['kode_kelas'], '4SK')) {
									$prodi = 'D-IV Statistika Sosial & Kependudukan';
								} elseif (strpos($kelas['kode_kelas'], '4SE')) {
									$prodi = 'D-IV Statistika Ekonomi';
								} elseif (strpos($kelas['kode_kelas'], '4SI')) {
									$prodi = 'D-IV Sistem Informasi Statistik';
								} elseif (strpos($kelas['kode_kelas'], '4SD')) {
									$prodi = 'D-IV Sains Data';
								} elseif (strpos($kelas['kode_kelas'], '4ST')) {
									$prodi = 'D-IV Statistika';
								} else {
									$prodi = 'D-IV Komputasi Statistik';
								}
							}
							$alumni = true;
							break;
						} else {
							$alumni = false;
						}
					}
				}

				if ($alumni == true) {
					$user = $hasil['profile'];

					$cek = $this->modelAlumni->bindingSipadu($user['nim']);

					// binding session dengan database (insert data ke tabel alumni kalau belum terdaftar di tabel alumni) 
					if ($cek == NULL) {
						$data = [
							'nama'               => ucwords(strtolower($user['nama'])),
							'status_bekerja'     => 1,
							'aktif_pns'          => 1,
							'email'				 => $user['nim'] . "@stis.ac.id",
						];

						if ($user['jenis_kelamin'] == 'Laki-laki') {
							$data['jenis_kelamin'] = 'Lk';
						} else {
							$data['jenis_kelamin'] = 'Pr';
						}

						if ($data['jenis_kelamin'] == 'Lk') {
							$data['foto_profil'] = "components/icon/Lk-icon.svg";
						} else {
							$data['foto_profil'] = "components/icon/Pr-icon.svg";
						}
						$this->modelAlumni->db->table('alumni')->insert($data);

						$sipadu = $this->modelAlumni->getAlumniByEmail($user['nim'] . "@stis.ac.id");
						$data = [
							'jenjang'       => $jenjang,
							'instansi'      => 'Politeknik Statistika STIS',
							'tahun_lulus'   => $tahun_lulus,
							'tahun_masuk'	=> '0000',
							'angkatan'      => $angkatan,
							'id_alumni'     => $sipadu['id_alumni']
						];
						$this->modelAlumni->db->table('pendidikan')->insert($data);

						$sipadu = $this->modelAlumni->getPendidikanTinggiAlumni($sipadu['id_alumni']);
						$data = [
							'id_pendidikan'     => $sipadu['id_pendidikan'],
							'program_studi'     => $prodi,
							'nim'               => $user['nim'],
						];
						$this->modelAlumni->db->table('pendidikan_tinggi')->insert($data);

						$cek = $this->modelAlumni->bindingSipadu($user['nim']);
						$data = [
							'id_alumni'      	=> $cek['id_alumni'],
							'id_tempat_kerja'  	=> 528,
							'ambigu'			=> 1,
						];
						$this->modelAlumni->db->table('alumni_tempat_kerja')->insert($data);
					}

					//insert new user sipadu (mahasiswa)
					if ($this->modelAuth->getUserByUsername($hasil['profile']['nim']) == NULL) {
						date_default_timezone_set("Asia/Jakarta");
						$now = date("Y-m-d H:i:s");

						$data = [
							'email'				=> $user['nim'] . "@stis.ac.id",
							'username'			=> $user['nim'],
							'id_alumni'			=> $cek['id_alumni'],
							'fullname'			=> $user['nama'],
							'user_image'		=> "default.svg",
							'active'			=> 1,
							'force_pass_reset'	=> 0,
							'created_at'		=> $now,
							'updated_at'		=> $now
						];
						$this->modelAuth->insertUser($data);
					}

					$user = $this->modelAuth->getUserByUsername($hasil['profile']['nim']);

					if ($user['active'] == 1) {
						session()->set([	//set session (informasi identitas) dari tabel users
							'id_user' => $user['id'],
							'id_alumni' => $user['id_alumni'],
							'nama' => $user['fullname']
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
						$this->recordLoginAttempt(session('nim') . '@stis.ac.id', $ipAddress, session('id_user') ?? null, true);	//insert ke tabel auth_login untuk log login
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

						// 		die();
					} else {
						session()->set([
							'err_sso' 	=> 'non-active',
						]);

						setcookie('login', 'failed', time() + 10, $_SERVER['SERVER_NAME']);
						echo '<script>window.close();</script>';
						die();
					}
				} else {
					session()->set([
						'not_alumni' 	=> true,
					]);

					setcookie('login', 'failed', time() + 10, $_SERVER['SERVER_NAME']);
					echo '<script>window.close();</script>';
					die();
				}
			} else {	//apabila alumni memakai akun dosen
				/* KATANYA LANGSUNG ALERT AJA */
				session()->set([
					'error' 	=> 'sipadu_dosen',
				]);

				setcookie('login', 'failed', time() + 10, $_SERVER['SERVER_NAME']);
				echo '<script>window.close();</script>';
				die();
			}
		}
	}

	public function bps()	//masuk()
	{
		$this->modelAuth = new \App\Models\AuthModel();
		$this->modelAlumni = new \App\Models\AlumniModel();
		$this->roleModel = new \App\Models\RoleModel();
		$faker = \Faker\Factory::create('id_ID');

		$provider = new Keycloak([
			'authServerUrl'         => 'https://sso.bps.go.id',
			'realm'                 => 'pegawai-bps',
			'clientId'              => '02700-dbalumni-mu1',
			'clientSecret'          => 'e69810d0-f915-49c4-9ed1-cd9edf05436a',
			'redirectUri'           => 'https://alumni.stis.ac.id/validate-bps',
			'scope' 				=> 'openid profile-pegawai'
		]);

		if (!isset($_GET['code'])) {

			// Untuk mendapatkan authorization code
			$authUrl = $provider->getAuthorizationUrl();
			session()->set(['oauth2state' => $provider->getState()]);
			// $_SESSION['oauth2state'] = $provider->getState();
			header('Location: ' . $authUrl);
			exit;

			// Mengecek state yang disimpan saat ini untuk memitigasi serangan CSRF
		} elseif (empty($_GET['state']) || ($_GET['state'] !== session('oauth2state'))) {

			session()->remove('oauth2state');
			exit('Invalid state');
		} else {
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
}
