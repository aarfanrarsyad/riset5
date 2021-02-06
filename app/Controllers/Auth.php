<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use Exception;
use Myth\Auth\Models\LoginModel;
use \JKD\SSO\Client\Provider\Keycloak;

class Auth extends BaseController
{

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
			session()->remove(['id_user', 'nim', 'nama', 'role']);
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
			'redirect_uri' => 'http://localhost:8080',
			'response_type' => 'code', //gak usah diubah
			'scope' => 'user:profile:read'
		]);

		return redirect()->to('https://ws.stis.ac.id/oauth/authorize?' . $query);
	}

	public function validate_sipadu()	//masuk()
	{
		$this->modelAuth = new \App\Models\AuthModel();
		$this->modelAlumni = new \App\Models\AlumniModel();
		$faker = \Faker\Factory::create('id_ID');

		// // processing data sipadu
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
				// binding session dengan database (insert data ke tabel alumni kalau belum terdaftar di tabel alumni) 
				if ($this->modelAlumni->getUserByNIM($user['nim']) == NULL) {
					$bindUser = [
						'angkatan'      	=> $faker->numberBetween(1, 62),
						'nama'				=> $user['nama'],
						'nim'				=> $user['nim'],
						'jenis_kelamin'		=> $faker->randomElement(array('L', 'P')),
						'tempat_lahir'  	=> $faker->city,
						'tanggal_lahir' 	=> $faker->date('Y-m-d', 'now'),
						'telp_alumni'   	=> $faker->phoneNumber,
						'alamat'        	=> $faker->address,
						'status_bekerja'	=> $faker->boolean,
						'perkiraan_pensiun' => $faker->year,
						'jabatan_terakhir'  => $faker->jobTitle,
						'aktif_pns'      	=> $faker->boolean,
					];
					$this->modelAlumni->db->table('alumni')->insert($bindUser);;
				}

				//insert new user sipadu (mahasiswa)
				if ($this->modelAuth->getUserByUsername($hasil['profile']['nim']) == NULL) {
					$now = date("Y-m-d H:i:s");
					$data = [
						'email'				=> $user['nim'] . "@stis.ac.id",
						'username'			=> $user['nim'],
						'nim'				=> $user['nim'],
						'fullname'			=> $user['nama'],
						'password_hash'		=> null,
						'reset_at'			=> null,
						'active'			=> 1,
						'force_pass_reset'	=> 0,
						'created_at'		=> $now,
						'updated_at'		=> $now
					];

					$this->modelAuth->insertUser($data);
				}

				$user = $this->modelAuth->getUserByUsername($hasil['profile']['nim']);
				session()->set([
					'id_user' => $user['id'],
					'nim' => $user['nim'],
					'nama' => $user['fullname'],
				]);

				$ipAddress = Services::request()->getIPAddress();
				$this->recordLoginAttempt(session('nim') . '@stis.ac.id', $ipAddress, session('id_user') ?? null, true);	//insert ke tabel auth_login untuk log login
			} else {	//apabila alumni memakai akun dosen
				echo '<script>alert(\'Silahkan gunakan akun Sipadu Mahasiswa atau akun BPS, atau hubungi admin website\')</script>';
				die();
			}

			setcookie('login', 'yes', time() + 60, $_SERVER['SERVER_NAME']);

			echo '<script>window.close();</script>';

			session()->setFlashdata('pesan', 'Login berhasil. Hai, <b>' . session('username') . '!</b>');
			session()->setFlashdata('warna', 'success');
			die();
		}
	}

	public function bps()	//masuk()
	{
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

			try {
				$token = $provider->getAccessToken('authorization_code', [
					'code' => $_GET['code']
				]);
			} catch (Exception $e) {
				exit('Gagal mendapatkan akses token : ' . $e->getMessage());
			}

			// Opsional: Setelah mendapatkan token, anda dapat melihat data profil pengguna
			try {

				$user = $provider->getResourceOwner($token);
				echo "Nama : " . $user->getName();
				echo "E-Mail : " . $user->getEmail();
				echo "Username : " . $user->getUsername();
				echo "NIP : " . $user->getNip();
				echo "NIP Baru : " . $user->getNipBaru();
				echo "Kode Organisasi : " . $user->getKodeOrganisasi();
				echo "Kode Provinsi : " . $user->getKodeProvinsi();
				echo "Kode Kabupaten : " . $user->getKodeKabupaten();
				echo "Alamat Kantor : " . $user->getAlamatKantor();
				echo "Provinsi : " . $user->getProvinsi();
				echo "Kabupaten : " . $user->getKabupaten();
				echo "Golongan : " . $user->getGolongan();
				echo "Jabatan : " . $user->getJabatan();
				echo "Foto : " . $user->getUrlFoto();
				echo "Eselon : " . $user->getEselon();
			} catch (Exception $e) {
				exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
			}

			// Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
			echo $token->getToken();
		}


		// if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

		// 	unset($_SESSION['oauth2state']);
		// 	exit('Invalid state');
		// } else {

		// 	try {
		// 		$token = $provider->getAccessToken('authorization_code', [
		// 			'code' => $_GET['code']
		// 		]);
		// 	} catch (Exception $e) {
		// 		exit('Gagal mendapatkan akses token : ' . $e->getMessage());
		// 	}

		// 	// proses login
		// 	try {
		// 		$this->modelAuth = new \App\Models\AuthModel();

		// 		$user = $provider->getResourceOwner($token);
		// 		if ($this->modelAuth->getUserByNIP($user->getNIP()) == NULL) {
		// 			$data = [
		// 				'nama' 	=> $user->getName(),
		// 				'nip' 	=> $user->getNip(),
		// 				'email'	=> $user->getEmail(),
		// 			];

		// 			$this->modelAuth->insertUser($data);

		// 			$info = $this->modelAuth->getUserByNIP($user->getNIP());

		// 			session()->set([
		// 				'id_user' 	=> $info['id'],
		// 				'nama' 		=> $info['nama'],
		// 				'nip' 		=> $info['nip'],
		// 				'email' 	=> $info['email'],
		// 			]);
		// 		} elseif ($this->modelAuth->getUserByEmail($user->getEmail()) == NULL) {
		// 			$data = [
		// 				'nama' 	=> $user->getName(),
		// 				'nip' 	=> $user->getNip(),
		// 				'email'	=> $user->getEmail(),
		// 			];

		// 			$this->modelAuth->insertUser($data);

		// 			$info = $this->modelAuth->getUserByNIP($user->getNIP());

		// 			session()->set([
		// 				'id_user' 	=> $info['id'],
		// 				'nama' 		=> $info['nama'],
		// 				'nip' 		=> $info['nip'],
		// 				'email' 	=> $info['email'],
		// 			]);
		// 		}

		// 		setcookie('login', 'yes', time() + 60, $_SERVER['SERVER_NAME']);

		// 		echo '<script>window.close();</script>';

		// 		session()->setFlashdata('pesan', 'Login berhasil. Hai, <b>' . session('nama') . '!</b>');
		// 		session()->setFlashdata('warna', 'success');
		// 		die();
		// 		// $data = [
		// 		// 	'title' => 'Profile | Riset 5 Website Alumni',
		// 		// 	'nama' => $user->getName(),
		// 		// 	'email' => $user->getEmail(),
		// 		// 	'username' => $user->getUsername(),
		// 		// 	'nip' => $user->getNip(),
		// 		// 	'nipBaru' => $user->getNipBaru(),
		// 		// 	'kodeOrganisasi' => $user->getKodeOrganisasi(),
		// 		// 	'kodeProvinsi' => $user->getKodeProvinsi(),
		// 		// 	'kodeKabupaten' => $user->getKodeKabupaten(),
		// 		// 	'alamatKantor' => $user->getAlamatKantor(),
		// 		// 	'provinsi' => $user->getProvinsi(),
		// 		// 	'kabupaten' => $user->getKabupaten(),
		// 		// 	'golongan' => $user->getGolongan(),
		// 		// 	'jabatan' => $user->getJabatan(),
		// 		// 	'foto' => $user->getUrlFoto(),
		// 		// 	'eselon' => $user->getEselon(),
		// 		// ];

		// 		// return view('pages/UserInfo', $data);
		// 	} catch (Exception $e) {
		// 		exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
		// 	}

		// 	// Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
		// 	echo $token->getToken();
		// }

		// $provider = new Keycloak([
		// 	'authServerUrl'         => 'https://sso.bps.go.id',
		// 	'realm'                 => 'pegawai-bps',
		// 	'clientId'              => '02700-dbalumni-mu1',
		// 	'clientSecret'          => 'e69810d0-f915-49c4-9ed1-cd9edf05436a',
		// 	'redirectUri'           => 'http://localhost:8080',
		// 	'scope' 				=> 'openid profile-pegawai'
		// ]);

		// if (!isset($_GET['code'])) {

		// 	// Untuk mendapatkan authorization code
		// 	$authUrl = $provider->getAuthorizationUrl();
		// 	session()->set(['oauth2state' => $provider->getState()]);
		// 	// $_SESSION['oauth2state'] = $provider->getState();
		// 	header('Location: ' . $authUrl);
		// 	exit;

		// 	// Mengecek state yang disimpan saat ini untuk memitigasi serangan CSRF
		// } elseif (empty($_GET['state']) || ($_GET['state'] !== session('oauth2state'))) {

		// 	session()->remove('oauth2state');
		// 	exit('Invalid state');
		// } else {

		// 	$provider = new Keycloak([
		// 		'authServerUrl'         => 'https://sso.bps.go.id',
		// 		'realm'                 => 'pegawai-bps',
		// 		'clientId'              => '02700-dbalumni-mu1',
		// 		'clientSecret'          => 'e69810d0-f915-49c4-9ed1-cd9edf05436a',
		// 		'redirectUri'           => 'http://localhost:8080',
		// 		'scope' 				=> 'openid profile-pegawai'
		// 	]);

		// 	// get token
		// 	try {
		// 		$token = $provider->getAccessToken('authorization_code', [
		// 			'code' => $_GET['code']
		// 		]);
		// 	} catch (Exception $e) {
		// 		exit('Gagal mendapatkan akses token : ' . $e->getMessage());
		// 	}

		// 	try {
		// 		$user = $provider->getResourceOwner($token);

		// 		// var_dump($user->toArray());	//cek result sso-bps
		// 		// die();

		// 		$data = array(
		// 			"username" => $user->getNip(),
		// 			"nama" => $user->getName()
		// 		);
		// 		$this->modelAuth->insertUser($data);

		// 		$hasil = $this->modelAuth->getUserByUsername($user->getNip());

		// 		session()->set([
		// 			'id_user' => $hasil['id'],
		// 			'username' => $hasil['username'],
		// 			'nama' => $hasil['nama'],
		// 			'role' => $hasil['role']
		// 		]);

		// 		$ipAddress = Services::request()->getIPAddress();
		// 		$this->recordLoginAttempt(session('username'), $ipAddress, session('id_user') ?? null, true);

		// 		$faker = \Faker\Factory::create('id_ID');

		// 		// binding session dengan database
		// 		if ($this->modelAlumni->getUserByNIM(session('username')) == NULL) {
		// 			$bindUser = [
		// 				'angkatan'      => $faker->numberBetween(1, 62),
		// 				'nama'			=> session('nama'),
		// 				'nim'			=> session('username'),
		// 				'jenis_kelamin'  => $faker->randomElement(array('L', 'P')),
		// 				'tempat_lahir'   => $faker->city,
		// 				'tanggal_lahir'  => $faker->date('Y-m-d', 'now'),
		// 				'telp_alumni'    => $faker->phoneNumber,
		// 				'alamat'        => $faker->address,
		// 				'status_bekerja' => $faker->boolean,
		// 				'perkiraan_pensiun' => $faker->year,
		// 				'jabatan_terakhir'  => $faker->jobTitle,
		// 				'aktif_pns'      => $faker->boolean,
		// 			];
		// 			$this->modelAlumni->db->table('alumni')->insert($bindUser);;
		// 		}

		// 		setcookie('login', 'yes', time() + 60, $_SERVER['SERVER_NAME']);

		// 		echo '<script>window.close();</script>';

		// 		session()->setFlashdata('pesan', 'Login berhasil. Hai, <b>' . session('username') . '!</b>');
		// 		session()->setFlashdata('warna', 'success');
		// 		die();

		// 		// echo "Id : " . $user->getId();
		// 		// echo "Nama : " . $user->getName();
		// 		// echo "Nama Depan: " . $user->getnamaDepan();
		// 		// echo "Nama Belakang: " . $user->getnamaBelakang();
		// 		// echo "E-Mail : " . $user->getEmail();
		// 		// echo "Username : " . $user->getUsername();
		// 		// echo "NIP : " . $user->getNip();
		// 		// echo "NIP Baru : " . $user->getNipBaru();
		// 		// echo "Kode Organisasi : " . $user->getKodeOrganisasi();
		// 		// echo "Kode Provinsi : " . $user->getKodeProvinsi();
		// 		// echo "Kode Kabupaten : " . $user->getKodeKabupaten();
		// 		// echo "Alamat Kantor : " . $user->getAlamatKantor();
		// 		// echo "Provinsi : " . $user->getProvinsi();
		// 		// echo "Kabupaten : " . $user->getKabupaten();
		// 		// echo "Golongan : " . $user->getGolongan();
		// 		// echo "Jabatan : " . $user->getJabatan();
		// 		// echo "Foto : " . $user->getUrlFoto();
		// 		// echo "Eselon : " . $user->getEselon();
		// 	} catch (Exception $e) {
		// 		exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
		// 	}

		// 	// Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
		// 	// echo $token->getToken();
		// }
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
