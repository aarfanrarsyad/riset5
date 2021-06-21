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
					'redirectUri'           => 'http://localhost:8080',
					'scope' 				=> 'openid profile-pegawai'
				]);
				session()->remove('oauth2state');

				$url_logout = $provider->getLogoutUrl();
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
						if ($year_now - $kelas['tahun_akademik'] > 1) {
							$alumni = true;
							break;
						} else {
							$alumni = false;
						}
					}
				}

				if ($alumni == true) {
					$user = $hasil['profile'];

					$cek = $this->modelAlumni->getAlumniByEmail($user['nim'] . "@stis.ac.id");

					// binding session dengan database (insert data ke tabel alumni kalau belum terdaftar di tabel alumni) 
					if ($cek == NULL) {
						$data = [
							'nama'               => $user['nama'],
							'jenis_kelamin'      => $faker->randomElement($array = array('Lk', 'Pr')),
							'tempat_lahir'       => $faker->city,
							'tanggal_lahir'      => $faker->date($format = 'Y-m-d', $max = 'now'),
							'telp_alumni'        => $faker->phoneNumber,
							'alamat_alumni'      => $faker->address,
							'kota'      	 	 => $faker->city,
							'provinsi'      	 => $faker->state,
							'negara'      		 => $faker->country,
							'status_bekerja'     => $faker->boolean,
							'perkiraan_pensiun'  => $faker->year,
							'jabatan_terakhir'   => $faker->jobTitle,
							'aktif_pns'          => $faker->boolean,
							'deskripsi'          => $faker->text,
							'email'				 => $user['nim'] . "@stis.ac.id",
							'nip'          	 	 => $faker->creditCardNumber,
							'nip_bps'          	 => $user['nim'],

						];
						if ($data['jenis_kelamin'] == 'Lk0') {
							$data['foto_profil'] = "components/icon/Lk-icon.svg";
						} else {
							$data['foto_profil'] = "components/icon/PR-icon.svg";
						}

						$this->modelAlumni->db->table('alumni')->insert($data);

						$cek = $this->modelAlumni->getAlumniByEmail($user['nim'] . "@stis.ac.id");

						$data = [
							'id_alumni'       => $cek['id_alumni'],
							'id_tempat_kerja' => 1,
						];
						$this->modelAlumni->db->table('alumni_tempat_kerja')->insert($data);
					}

					//insert new user sipadu (mahasiswa)
					if ($this->modelAuth->getUserByUsername($hasil['profile']['nim']) == NULL) {
						// date_default_timezone_set("Asia/Jakarta");
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
			'redirectUri'           => 'http://localhost:8080',
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

				// dd(var_dump($user->toArray()));	//cek result sso-bps
				// die();

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

				if (isset($hasil->pesan)) {
					echo "data tidak ditemukan";
				} else {
					$riwayat_pendidikan = array();
					foreach ($hasil as $data)
						array_push($riwayat_pendidikan, $data->Nama_Instansi_Pendidikan);
					if (in_array('Akademi Ilmu Statistik', $riwayat_pendidikan) || in_array('Sekolah Tinggi Ilmu Statistik', $riwayat_pendidikan) || in_array('Politeknin Statistika STIS', $riwayat_pendidikan)) {

						// binding session dengan database
						if ($this->modelAlumni->getUserByNIM($user->getNip()) == NULL) {

							$data = [
								'nim'                => $user->getNip(),
								'angkatan'           => $faker->numberBetween($min = 1, $max = 62),
								'nama'               => $user->getName(),
								'jenis_kelamin'      => $faker->randomElement($array = array('L', 'P')),
								'tempat_lahir'       => $faker->city,
								'tanggal_lahir'      => $faker->date($format = 'Y-m-d', $max = 'now'),
								'telp_alumni'        => $faker->phoneNumber,
								'email'              => $user->getEmail(),
								'alamat'             => $user->getKabupaten() . ', ' . $user->getProvinsi(),
								'status_bekerja'     => $faker->boolean,
								'perkiraan_pensiun'  => $faker->year,
								'jabatan_terakhir'   => $faker->jobTitle,
								'aktif_pns'          => $faker->boolean,
								'nip'				 => $user->getNipBaru(),
								'nip_bps'            => $user->getNip()
							];
							$this->modelAlumni->db->table('alumni')->insert($data);

							$data = [
								'nim'             => $user->getNip(),
								'id_tempat_kerja' => $faker->numberBetween($min = 1, $max = 100),
							];
							$this->modelAlumni->db->table('alumni_tempat_kerja')->insert($data);

							// $data = [
							// 	'jenjang' => $faker->randomElement($array = array('S1', 'S2', 'S3')),
							// 	'universitas' => $faker->sentence($nbWords = 3, $variableNbWords = true),
							// 	'program_studi' => $faker->sentence($nbWords = 2, $variableNbWords = true),
							// 	'tahun_lulus' => $faker->year,
							// 	'tahun_masuk' => $faker->year,
							// 	'judul_tulisan' => $faker->sentence($nbWords = 5, $variableNbWords = true),
							// 	'nim'             => $user['nim'],
							// ];
							// $this->modelAlumni->db->table('pendidikan')->insert($data);
						}

						if ($this->modelAuth->getUserByUsername($user->getUsername()) == NULL) {
							date_default_timezone_set("Asia/Jakarta");
							$now = date("Y-m-d H:i:s");
							$data = [
								'email'				=> $user->getEmail(),
								'username'			=> $user->getUsername(),
								'nim'				=> $user->getNip(),
								'fullname'			=> $user->getName(),
								'user_image'		=> $user->getUrlFoto(),
								'password_hash'		=> null,
								'reset_at'			=> null,
								'active'			=> 1,
								'force_pass_reset'	=> 0,
								'created_at'		=> $now,
								'updated_at'		=> $now,
							];
							$this->modelAuth->insertUser($data);
						} else {
							date_default_timezone_set("Asia/Jakarta");
							$now = date("Y-m-d H:i:s");
							$email = $user->getEmail();
							$this->modelAuth->isLogin($now, $email);
						}

						$hasil = $this->modelAuth->getUserByUsername($user->getUsername());

						session()->set([	//set session (informasi identitas) dari tabel users
							'id_user' => $hasil['id'],
							'nim' => $hasil['nim'],
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

						session()->setFlashdata('pesan', 'Login berhasil. Hai, <b>' . session('username') . '!</b>');
						session()->setFlashdata('warna', 'success');
						echo '<script>window.close();</script>';

						die();
					} else
						echo "Bukan Alumni";
				}

				// echo "Id : " . $user->getId();
				// echo "Nama : " . $user->getName();
				// echo "Nama Depan: " . $user->getnamaDepan();
				// echo "Nama Belakang: " . $user->getnamaBelakang();
				// echo "E-Mail : " . $user->getEmail();
				// echo "Username : " . $user->getUsername();
				// echo "NIP : " . $user->getNip();
				// echo "NIP Baru : " . $user->getNipBaru();
				// echo "Kode Organisasi : " . $user->getKodeOrganisasi();
				// echo "Kode Provinsi : " . $user->getKodeProvinsi();
				// echo "Kode Kabupaten : " . $user->getKodeKabupaten();
				// echo "Alamat Kantor : " . $user->getAlamatKantor();
				// echo "Provinsi : " . $user->getProvinsi();
				// echo "Kabupaten : " . $user->getKabupaten();
				// echo "Golongan : " . $user->getGolongan();
				// echo "Jabatan : " . $user->getJabatan();
				// echo "Foto : " . $user->getUrlFoto();
				// echo "Eselon : " . $user->getEselon();
			} catch (Exception $e) {
				exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
			}

			// Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
			echo $token->getToken();
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
