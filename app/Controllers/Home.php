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
		$this->modelAuth = new \App\Models\AuthModel();
		$this->modelAlumni = new \App\Models\AlumniModel();
		$this->loginModel = new LoginModel();
		$this->roleModel = new \App\Models\RoleModel();
		$faker = \Faker\Factory::create('id_ID');

		// processing login sso bps
		if (session('oauth2state') != NULL) {
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

						// dd(var_dump($user->toArray()));	//cek result sso-bps

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
							if (in_array('Akademi Ilmu Statistik', $riwayat_pendidikan) || in_array('Sekolah Tinggi Ilmu Statistik', $riwayat_pendidikan) || in_array('Politeknik Statistika STIS', $riwayat_pendidikan)) {

								$cek = $this->modelAlumni->getAlumniByNipBPS($user->getNip());

								// binding session dengan database
								if ($cek == NULL) {

									$data = [
										'nama'               => $user->getName(),
										'jenis_kelamin'      => $faker->randomElement($array = array('Lk', 'Pr')),
										'tempat_lahir'       => $faker->city,
										'tanggal_lahir'      => $faker->date($format = 'Y-m-d', $max = 'now'),
										'telp_alumni'        => $faker->phoneNumber,
										'alamat_alumni'      => $user->getKabupaten() . ', ' . $user->getProvinsi(),
										'kota'      	 	 => $user->getKabupaten(),
										'provinsi'      	 => $user->getProvinsi(),
										'negara'      		 => "Indonesia",
										'status_bekerja'     => $faker->boolean,
										'perkiraan_pensiun'  => $faker->year,
										'jabatan_terakhir'   => $user->getJabatan(),
										'aktif_pns'          => $faker->boolean,
										'deskripsi'          => $faker->text,
										'email'				 => $user->getEmail(),
										'nip'          	 	 => $user->getNipBaru(),
										'nip_bps'          	 => $user->getNip(),
									];
									if ($data['jenis_kelamin'] == 'Lk')
										$data['foto_profil'] = 'Lk/default.svg';
									else
										$data['foto_profil'] = 'Pr/default.svg';

									$this->modelAlumni->db->table('alumni')->insert($data);

									$cek = $this->modelAlumni->getAlumniByNipBPS($user->getNip());

									// $data = [
									// 	'nama_instansi' 	=> $faker->company,
									// 	'kota'      	 	=> $faker->city,
									// 	'provinsi'      	=> $faker->state,
									// 	'negara'      		=> $faker->country,
									// 	'alamat_instansi' 	=> $faker->address,
									// 	'telp_instansi' 	=> $faker->phoneNumber,
									// 	'faks_instansi' 	=> $faker->phoneNumber,
									// 	'email_instansi' 	=> $faker->companyEmail,
									// ];
									// $this->modelAlumni->db->table('tempat_kerja')->insert($data);

									$data = [
										'id_alumni'       => $cek['id_alumni'],
										'id_tempat_kerja' => 1,
									];
									$this->modelAlumni->db->table('alumni_tempat_kerja')->insert($data);
								}

								// $cek = $this->modelAlumni->getAlumniByEmail($user->getEmail());

								if ($this->modelAuth->getUserByUsername($user->getUsername()) == NULL) {
									date_default_timezone_set("Asia/Bangkok");
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
								$flash = '<strong>Login gagal!</strong> silahkan gunakan akun alumni AIS/STIS/Polstat STIS.';
								$alert = "<div id=\"alert\">
									<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
										<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center\" style=\"background-color: #FF7474;\">
											<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\">
											<p class=\"sm:text-base text-sm font-heading font-bold\">" . $flash . "</p>
										</div>
									</div>
								</div>
								<script>
									setTimeout(function() {
										$('#alert').fadeOut();
									}, 1500);
								</script>";
								session()->set([
									'login_notif' => $alert
								]);
							}
						}
					} catch (Exception $e) {
						exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
					}
				}
			}
		}

		// processing data sipadu
		else {
			if (isset($_REQUEST['code']) && $_REQUEST['code']) {

				$curl_status = curl_init();

				curl_setopt_array($curl_status, [
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => 'https://ws.stis.ac.id/oauth/token',
					CURLOPT_POST => 1,

					CURLOPT_POSTFIELDS => [
						'grant_type' => 'authorization_code',
						'client_id' => '14',
						'client_secret' => '3r3grLcMKEEqhq1gHbks1ZzztbFdasLbzpg0YDj0',
						'redirect_uri' => 'http://localhost:8080',
						'code' => $_REQUEST['code']
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
							'foto_profil'      	 => "default.svg"
						];
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
						date_default_timezone_set("Asia/Bangkok");
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

					die();
				} else {	//apabila alumni memakai akun dosen
					/* KATANYA LANGSUNG ALERT AJA */
					// session()->setFlashdata('pesan', 'Silahkan gunakan akun Sipadu Mahasiswa atau akun BPS, atau hubungi admin website');
					$flash = '<strong>Login gagal!</strong> silahkan gunakan akun Sipadu Mahasiswa atau akun BPS, atau hubungi admin website.';
					$alert = "<div id=\"alert\">
									<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
										<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center\" style=\"background-color: #FF7474;\">
											<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\">
											<p class=\"sm:text-base text-sm font-heading font-bold\">" . $flash . "</p>
										</div>
									</div>
								</div>
								<script>
									setTimeout(function() {
										$('#alert').fadeOut();
									}, 1500);
								</script>";
					session()->set([
						'login_notif' => $alert
					]);

					die();
				}
			}
		}

		if (session()->has('id_user')) {
			$data = [
				'judulHalaman' 	=> 'Beranda WEBSIA',
				'active' 		=> 'beranda',
				'login'			=> 'sudah'
			];
		} else {
			$data = [
				'judulHalaman' 	=> 'Beranda WEBSIA',
				'login'			=> 'belum'
			];
		}

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

	public function coba()
	{
		return view('cobaWebsia/map');
	}
}
