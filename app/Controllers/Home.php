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

		// // processing data sipadu
		// if (isset($_REQUEST['code']) && $_REQUEST['code']) {

		// 	$curl_status = curl_init();

		// 	curl_setopt_array($curl_status, [
		// 		CURLOPT_RETURNTRANSFER => 1,
		// 		CURLOPT_URL => 'https://ws.stis.ac.id/oauth/token',
		// 		CURLOPT_POST => 1,

		// 		CURLOPT_POSTFIELDS => [
		// 			'grant_type' => 'authorization_code',
		// 			'client_id' => '14',
		// 			'client_secret' => '3r3grLcMKEEqhq1gHbks1ZzztbFdasLbzpg0YDj0',
		// 			'redirect_uri' => 'http://localhost:8080',
		// 			'code' => $_REQUEST['code']
		// 		]
		// 	]);
		// 	curl_setopt($curl_status, CURLOPT_FRESH_CONNECT, TRUE);
		// 	$result = curl_exec($curl_status);
		// 	curl_close($curl_status);
		// 	$hasil = json_decode($result); //hasil json untuk token
		// 	$token = $hasil->access_token;

		// 	if (!isset($token))
		// 		return redirect()->to('/');

		// 	$authorization = "Authorization: Bearer " . $token;

		// 	$curl_status = curl_init();

		// 	curl_setopt_array($curl_status, [
		// 		CURLOPT_RETURNTRANSFER => 1,
		// 		CURLOPT_URL => 'https://ws.stis.ac.id/api/user',
		// 		CURLOPT_HTTPHEADER => array($authorization)
		// 	]);

		// 	curl_setopt($curl_status, CURLOPT_FRESH_CONNECT, TRUE);

		// 	$result = curl_exec($curl_status);
		// 	curl_close($curl_status);

		// 	// echo ($result);	//cek result sipadu
		// 	// die();

		// 	$hasil = json_decode($result, true);	// hasil akhir sipadu

		// 	if (isset($hasil['profile']['nim'])) {	//apabila alumni login dengan akun sipadu mahasiswa
		// 		$user = $hasil['profile'];

		// 		// binding session dengan database (insert data ke tabel alumni kalau belum terdaftar di tabel alumni) 
		// 		if ($this->modelAlumni->getUserByNIM($user['nim']) == NULL) {
		// 			$bindUser = [
		// 				'angkatan'      	=> $faker->numberBetween(1, 62),
		// 				'nama'				=> $user['nama'],
		// 				'nim'				=> $user['nim'],
		// 				'jenis_kelamin'		=> $faker->randomElement(array('L', 'P')),
		// 				'tempat_lahir'  	=> $faker->city,
		// 				'tanggal_lahir' 	=> $faker->date('Y-m-d', 'now'),
		// 				'telp_alumni'   	=> $faker->phoneNumber,
		// 				'alamat'        	=> $faker->address,
		// 				'status_bekerja'	=> $faker->boolean,
		// 				'perkiraan_pensiun' => $faker->year,
		// 				'jabatan_terakhir'  => $faker->jobTitle,
		// 				'aktif_pns'      	=> $faker->boolean,
		// 			];
		// 			$this->modelAlumni->db->table('alumni')->insert($bindUser);;
		// 		}

		// 		//insert new user sipadu (mahasiswa)
		// 		if ($this->modelAuth->getUserByUsername($hasil['profile']['nim']) == NULL) {
		// 			$now = date("Y-m-d H:i:s");
		// 			$data = [
		// 				'email'				=> $user['nim'] . "@stis.ac.id",
		// 				'username'			=> $user['nim'],
		// 				'nim'				=> $user['nim'],
		// 				'fullname'			=> $user['nama'],
		// 				'password_hash'		=> null,
		// 				'reset_at'			=> null,
		// 				'active'			=> 1,
		// 				'force_pass_reset'	=> 0,
		// 				'created_at'		=> $now,
		// 				'updated_at'		=> $now
		// 			];
		// 			$this->modelAuth->insertUser($data);
		// 		}

		// 		$user = $this->modelAuth->getUserByUsername($hasil['profile']['nim']);
		// 		session()->set([	//set session (informasi identitas) dari tabel users
		// 			'id_user' => $user['id'],
		// 			'nim' => $user['nim'],
		// 			'nama' => $user['fullname']
		// 		]);

		// 		$query = $this->roleModel->getRole(session('id_user'));
		// 		$role = array();

		// 		if ($query != null) {
		// 			foreach ($query as $arr) {
		// 				array_push($role, $arr->group_id);
		// 			}
		// 			session()->set([
		// 				'role' => $role
		// 			]);
		// 		} else {
		// 			$data = [
		// 				'group_id'	=> 2,
		// 				'user_id'	=> session('id_user')
		// 			];
		// 			$this->roleModel->insertRole($data);
		// 			$query = $this->roleModel->getRole(session('id_user'));
		// 			foreach ($query as $arr) {
		// 				array_push($role, $arr->group_id);
		// 			}
		// 			session()->set([
		// 				'role' => $role
		// 			]);
		// 		}

		// 		$ipAddress = Services::request()->getIPAddress();
		// 		$this->recordLoginAttempt(session('nim') . '@stis.ac.id', $ipAddress, session('id_user') ?? null, true);	//insert ke tabel auth_login untuk log login
		// 	} else {	//apabila alumni memakai akun dosen
		// 		/* KATANYA LANGSUNG ALERT AJA */

		// 		// $user = $hasil['profile'];

		// 		// session()->set([
		// 		// 	'username' => $user['username'],
		// 		// 	'nim'	=> "0",
		// 		// 	'nama' => $user['nama'],
		// 		// 	'role' => $user['role']
		// 		// ]);

		// 		// $ipAddress = Services::request()->getIPAddress();
		// 		// $this->recordLoginAttempt(session('username'), $ipAddress, session('nim') ?? null, true);

		// 		// // binding session dengan database
		// 		// if ($this->modelAlumni->getUserByNIM(session('username')) == NULL) {
		// 		// 	$bindUser = [
		// 		// 		'angkatan'      => $faker->numberBetween(1, 62),
		// 		// 		'nama'	=> session('nama'),
		// 		// 		'nim'	=> session('nim'),
		// 		// 		'jenis_kelamin'  => $faker->randomElement(array('L', 'P')),
		// 		// 		'tempat_lahir'   => $faker->city,
		// 		// 		'tanggal_lahir'  => $faker->date('Y-m-d', 'now'),
		// 		// 		'telp_alumni'    => $faker->phoneNumber,
		// 		// 		'alamat'        => $faker->address,
		// 		// 		'status_bekerja' => $faker->boolean,
		// 		// 		'perkiraan_pensiun' => $faker->year,
		// 		// 		'jabatan_terakhir'  => $faker->jobTitle,
		// 		// 		'aktif_pns'      => $faker->boolean,
		// 		// 	];
		// 		// 	$this->modelAlumni->db->table('alumni')->insert($bindUser);
		// 		// }

		// 		// //insert new user sipadu (dosen)
		// 		// if ($this->modelAuth->getUserByUsername($hasil['profile']['nim']) == NULL) {
		// 		// 	$now = date("Y-m-d H:i:s");
		// 		// 	$data = [
		// 		// 		'email'				=> session('username') . "@stis.ac.id",
		// 		// 		'username'			=> session('nim'),
		// 		// 		'nim'				=> session('nim'),
		// 		// 		'fullname'			=> session('nama'),
		// 		// 		'password_hash'		=> null,
		// 		// 		'reset_at'			=> null,
		// 		// 		'active'			=> 1,
		// 		// 		'force_pass_reset'	=> 0,
		// 		// 		'created_at'		=> $now,
		// 		// 		'updated_at'		=> $now
		// 		// 	];
		// 		// 	$this->modelAuth->insertUser($data);
		// 		// }

		// 		// session()->setFlashdata('pesan', 'Silahkan gunakan akun Sipadu Mahasiswa atau akun BPS, atau hubungi admin website');
		// 		echo '<script>alert(\'Silahkan gunakan akun Sipadu Mahasiswa atau akun BPS, atau hubungi admin website\')</script>';
		// 		die();
		// 	}

		// 	setcookie('login', 'yes', time() + 60, $_SERVER['SERVER_NAME']);

		// 	echo '<script>window.close();</script>';

		// 	session()->setFlashdata('pesan', 'Login berhasil. Hai, <b>' . session('username') . '!</b>');
		// 	session()->setFlashdata('warna', 'success');
		// 	die();
		// }

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


					// var_dump($user->toArray());	//cek result sso-bps
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
								$bindUser = [
									'angkatan'      => $faker->numberBetween(1, 62),
									'nama'			=> $user->getName(),
									'nim'			=> $user->getNip(),
									'jenis_kelamin'  => $faker->randomElement(array('L', 'P')),
									'tempat_lahir'   => $faker->city,
									'tanggal_lahir'  => $faker->date('Y-m-d', 'now'),
									'telp_alumni'    => $faker->phoneNumber,
									'alamat'        => $faker->address,
									'status_bekerja' => $faker->boolean,
									'perkiraan_pensiun' => $faker->year,
									'jabatan_terakhir'  => $faker->jobTitle,
									'aktif_pns'      => $faker->boolean,
								];
								$this->modelAlumni->db->table('alumni')->insert($bindUser);
							}

							if ($this->modelAuth->getUserByUsername($user->getUsername()) == NULL) {
								$now = date("Y-m-d H:i:s");
								$data = [
									'email'				=> $user->getEmail(),
									'username'			=> $user->getUsername(),
									'nim'				=> $user->getNip(),
									'fullname'			=> $user->getName(),
									'password_hash'		=> null,
									'reset_at'			=> null,
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
			}
		}

		if (session()->has('id_user')) {
			$data = [
				'judulHalaman' 	=> 'Beranda WEBSIA',
				'login'			=> 'sudah'
			];
		} else {
			$data = [
				'judulHalaman' 	=> 'Beranda WEBSIA',
				'login'			=> 'belum'
			];
		}

		return view('websia/kontenWebsia/halamanUtama/beranda', $data);
		// return view('pages/dashboard', $data);
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

	// public function resetPass()
	// {
	// 	return view('login/resetpass.php');
	// }

	public function searchAndFilter()
	{
		$pager = \Config\Services::pager();
		$model = new \App\Models\AlumniModel;
		$minAng = $this->request->getVar('min');
		$maxAng = $this->request->getVar('max');
		if($minAng > $maxAng){
			$temp = $minAng;
			$minAng = $maxAng;
			$maxAng = $temp;
		}
		if($minAng!=NULL && $minAng>=$model->getMinAngkatan()[0]->angkatan ){
			$min_angkatan  =$minAng;
		} else {
			$min_angkatan  = $model->getMinAngkatan()[0]->angkatan;
		}
		if($maxAng!=NULL && $maxAng<=$model->getMaxAngkatan()[0]->angkatan){
			$max_angkatan  = $maxAng;
		} else {
			$max_angkatan  = $model->getMaxAngkatan()[0]->angkatan;
		}
		$cari = $this->request->getVar('cari');
        $filter = $this->request->getVar('filter');

		if (isset($filter)) {
                $query = $model->orderBy('nama', $direction = 'ASC')->getAlumniFilter($cari,$min_angkatan,$max_angkatan);
                if(!empty($cari)){
                    $jumlah = "Pencarian dengan kata <B>$cari</B> ditemukan " . $query->countAllResults(false) . " Data";
                } else {
                    $jumlah = "Pencarian berhasil";
                }
		} else {
			$query = $model->orderBy('nama', $direction = 'ASC');
			$jumlah = "Pencarian belum dilakukan";
		}

		$data = [
			'judulHalaman' => 'Pencarian Alumni | Website Riset 5',
			'alumni' => $query->paginate(9),
			'pager' => $model->pager,
			'page'  => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
            'jumlah' => $jumlah,
			'min_angkatan' => $model->getMinAngkatan()[0]->angkatan,
			'max_angkatan' => $model->getMaxAngkatan()[0]->angkatan
		];

		echo view('websia/kontenWebsia/searchAndFilter/searchAndFilter', $data);
	
	}

	public function profil()
	{
		// ganti status ='user' atau 'bukan user' sesuai pengakses, user itu untuk melihat profil diri sendiri, sedangkan bukan user untuk melihat profil orang lain
		$data['status'] = 'user';
		$data['judulHalaman'] = 'User Profile';
		return view('websia/kontenWebsia/userProfile/userProfile', $data);
	}

	public function rekomendasi()
	{
		$data['judulHalaman'] = 'Rekomendasi';
		return view('websia/kontenWebsia/userProfile/rekomendasi', $data);
	}

	public function galeriFoto()
	{
		$data['judulHalaman'] = 'Galeri Kenangan Alumni';
		return view('websia/kontenWebsia/galeri/galeriAlumni', $data);
	}

	public function galeriVideo()
	{
		$data['judulHalaman'] = 'Galeri Video Kegiatan Alumni';
		$data['login'] = 'sudah';
		return view('kontenWebsia/galeri/galeriVidAlumni', $data);
	}

	public function galeriWisuda()
	{
		$data['judulHalaman'] = 'Galeri Video Wisuda';
		$data['login'] = 'sudah';
		return view('kontenWebsia/galeri/galeriWisuda', $data);
	}

	public function coba()
	{
		return view('cobaWebsia/map');
	}

	// public function search() //pencarian
	// {
	// 	// nyoba faker,, gakepake di controller ini
	// 	// $faker = \Faker\Factory::create('id_ID');
	// 	// dd($faker->phoneNumber);

	// 	$pager = \Config\Services::pager();
	// 	$model = new \App\Models\AlumniModel;
	// 	$atribut  = $this->request->getVar('atribut');
	// 	$cari = $this->request->getVar('cari');
	// 	$filter = $this->request->getVar('filter');

	// 	if (isset($filter) && !empty($cari)) {
	// 		if ($atribut == "") {
	// 			$query = $model->orderBy('nama', $direction = 'ASC')->getAlumni($cari);
	// 			$jumlah = "Pencarian dengan kata <B>$cari</B> ditemukan " . $query->countAllResults(false) . " Data";
	// 		} else {
	// 			$query = $model->orderBy('nama', $direction = 'ASC')->getSearch($atribut, $cari);
	// 			$jumlah = "Pencarian dengan kata <B>$cari</B> ditemukan " . $query->countAllResults(false) . " Data";
	// 		}
	// 	} else {
	// 		$query = $model->orderBy('nama', $direction = 'ASC');
	// 		$jumlah = "";
	// 	}

	// 	$data = [
	// 		'title' => 'Pencarian Alumni | Website Riset 5',
	// 		'alumni' => $query->paginate(20),
	// 		'pager' => $model->pager,
	// 		'page'  => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
	// 		'jumlah' => $jumlah,
	// 	];

	// 	echo view('pages/search', $data);
	// }

	//--------------------------------------------------------------------

	public function profile()
	{
		if (!session()->has('id_user') && !logged_in())
			return redirect()->to('/');

		$model = new AlumniModel();
		$query = $model->bukaProfile(session('nim'))->getRow();

		$jk = $query->jenis_kelamin;
		$sb = $query->status_bekerja;
		$ap = $query->aktif_pns;

		if ($jk == "L") {
			$jk = "Laki-laki";
		} else {
			$jk = "Perempuan";
		}

		if ($sb == 0) {
			$sb = "Tidak bekerja";
		} else {
			$sb = "Masih bekerja";
		}

		if ($ap == 0) {
			$ap = "Tidak aktif sebagai PNS";
		} else {
			$ap = "Aktif sebagai PNS";
		}

		$data = [
			'title' 		=> 'Profil User | Website Riset 5',
			'angkatan'      => $query->angkatan,
			'nama'  		=> $query->nama,
			'nim'           => $query->nim,
			'jenis_kelamin'  => $jk,
			'tempat_lahir'   => $query->tempat_lahir,
			'tanggal_lahir'  => $query->tanggal_lahir,
			'telp_alumni'    => $query->telp_alumni,
			'alamat'        => $query->alamat,
			'status_bekerja'	=> $sb,
			'perkiraan_pensiun' 	=> $query->perkiraan_pensiun,
			'jabatan_terakhir' 	=> $query->jabatan_terakhir,
			'aktif_pns'		=> $ap,
		];
		return view('pages/userInfo', $data);
	}

	//--------------------------------------------------------------------

	public function update()
	{
		if (!session()->has('id_user'))
			return redirect()->to('/');

		$model = new AlumniModel();
		$query = $model->bukaProfile(session('nim'))->getRow();

		$data = [
			'title' 		=> 'Update Profil User | Website Riset 5',
			'angkatan'      => $query->angkatan,
			'nama'  		=> $query->nama,
			'nim'           => $query->nim,
			'jenis_kelamin'  => $query->jenis_kelamin,
			'tempat_lahir'   => $query->tempat_lahir,
			'tanggal_lahir'  => $query->tanggal_lahir,
			'telp_alumni'    => $query->telp_alumni,
			'alamat'        => $query->alamat,
			'status_bekerja'	=> $query->status_bekerja,
			'perkiraan_pensiun' 	=> $query->perkiraan_pensiun,
			'jabatan_terakhir' 	=> $query->jabatan_terakhir,
			'aktif_pns'		=> $query->aktif_pns,
		];
		return view('pages/update', $data);
	}

	//--------------------------------------------------------------------

	public function updating()
	{
		if (!session()->has('id_user'))
			return redirect()->to('/');

		$this->modelAlumni = new AlumniModel();

		$data = [
			'nama'  		=> $this->request->getVar('nama'),
			'nim'           => session('nim'),
			'angkatan'      => $this->request->getVar('angkatan'),
			'jenis_kelamin'  => $this->request->getVar('jenis_kelamin'),
			'tempat_lahir'   => $this->request->getVar('tempat_lahir'),
			'tanggal_lahir'  => $this->request->getVar('tanggal_lahir'),
			'telp_alumni'    => $this->request->getVar('telp_alumni'),
			'alamat'        => $this->request->getVar('alamat'),
			'status_bekerja' => $this->request->getVar('status_bekerja'),
			'perkiraan_pensiun' => $this->request->getVar('perkiraan_pensiun'),
			'jabatan_terakhir'  => $this->request->getVar('jabatan_terakhir'),
			'aktif_pns'      => $this->request->getVar('aktif_pns'),
		];

		$this->modelAlumni->replace($data);

		$query = $this->modelAlumni->bukaProfile(session('nim'))->getRow();
		$jk = $query->jenis_kelamin;
		$sb = $query->status_bekerja;
		$ap = $query->aktif_pns;

		if ($jk == "L") {
			$jk = "Laki-laki";
		} else {
			$jk = "Perempuan";
		}

		if ($sb == 0) {
			$sb = "Tidak bekerja";
		} else {
			$sb = "Masih bekerja";
		}

		if ($ap == 0) {
			$ap = "Tidak aktif sebagai PNS";
		} else {
			$ap = "Aktif sebagai PNS";
		}
		$require = [
			'title' 		=> 'Update Profil User | Website Riset 5',
			'nama'  		=> $query->nama,
			'nim'           => $query->nim,
			'angkatan'      => $query->angkatan,
			'jenis_kelamin'  => $jk,
			'tempat_lahir'   => $query->tempat_lahir,
			'tanggal_lahir'  => $query->tanggal_lahir,
			'telp_alumni'    => $query->telp_alumni,
			'alamat'        => $query->alamat,
			'status_bekerja'	=> $sb,
			'perkiraan_pensiun' 	=> $query->perkiraan_pensiun,
			'jabatan_terakhir' 	=> $query->jabatan_terakhir,
			'aktif_pns'		=> $ap,
		];

		return view('pages/userInfo', $require);
	}

	//--------------------------------------------------------------------

	public function profileAlumni()
	{
		$model = new AlumniModel();
		$kunci = $this->request->getVar('nim');
		$query = $model->bukaProfile($kunci)->getRow();
		$jk = $query->jenis_kelamin;
		$sb = $query->status_bekerja;
		$ap = $query->aktif_pns;

		if ($jk == 'P') {
			$jk = "Perempuan";
		} else {
			$jk = "Laki-laki";
		}

		if ($sb == 0) {
			$sb = "Tidak bekerja";
		} else {
			$sb = "Masih bekerja";
		}

		if ($ap == 0) {
			$ap = "Tidak aktif sebagai PNS";
		} else {
			$ap = "Aktif sebagai PNS";
		}

		$data = [
			'title' 		=> 'Profil Alumni | Website Riset 5',
			'nama'  		=> $query->nama,
			'nim'           => $query->nim,
			'angkatan'      => $query->angkatan,
			'jenis_kelamin'  => $jk,
			'tempat_lahir'   => $query->tempat_lahir,
			'tanggal_lahir'  => $query->tanggal_lahir,
			'telp_alumni'    => $query->telp_alumni,
			'alamat'        => $query->alamat,
			'status_bekerja'	=> $sb,
			'perkiraan_pensiun' 	=> $query->perkiraan_pensiun,
			'jabatan_terakhir' 	=> $query->jabatan_terakhir,
			'aktif_pns'		=> $ap,
		];
		return view('pages/profileAlumni', $data);
	}

	//--------------------------------------------------------------------


}
