<?php

namespace App\Controllers;

use App\Models\AlumniModel;


class User extends BaseController
{
	public function __construct()
	{
		if (!session()->has('id_user'))
			echo '<script>window.location.replace("' . base_url('login') . '");</script>';

		if (session()->has('role'))
			if (!in_array("2", session('role')))
				echo '<script>window.location.replace("' . base_url() . '");</script>';

		$this->form_validation = \Config\Services::validation();
	}

	public function index() //user detail + form update
	{
	}

	//--------------------------------------------------------------------

	public function searchAndFilter()
	{
		$pager = \Config\Services::pager();
		$model = new \App\Models\AlumniModel;
		if (isset($_GET['min']))
			$minAng = $_GET['min'];
		else
			$minAng = $model->getMinAngkatan()[0]->angkatan;

		if (isset($_GET['max']))
			$maxAng = $_GET['max'];
		else
			$maxAng = $model->getMaxAngkatan()[0]->angkatan;

		if ($minAng > $maxAng) {
			$temp = $minAng;
			$minAng = $maxAng;
			$maxAng = $temp;
		}
		if ($minAng != NULL && $minAng >= $model->getMinAngkatan()[0]->angkatan) {
			$min_angkatan  = $minAng;
		} else {
			$min_angkatan  = $model->getMinAngkatan()[0]->angkatan;
		}
		if ($maxAng != NULL && $maxAng <= $model->getMaxAngkatan()[0]->angkatan) {
			$max_angkatan  = $maxAng;
		} else {
			$max_angkatan  = $model->getMaxAngkatan()[0]->angkatan;
		}

		if (isset($_GET['cari']))
			$cari = $_GET['cari'];
		else
			$cari = "";

		$query = $model->orderBy('nama', $direction = 'ASC')->getAlumniFilter($cari, $min_angkatan, $max_angkatan);
		if (!empty($cari)) {
			$jumlah = "Terdapat " . $query->countAllResults(false) . " alumni dengan kata kunci `<B>$cari</B>` ditemukan.";
		} else {
			$jumlah = "Memuat " . $query->countAllResults(false) . " data alumni.";
		}

		if ($query->countAllResults(false) == 0) {
			$data = [
				'judulHalaman' => 'Pencarian Alumni | Website Riset 5',
				'active' => '',
			];

			return view('websia/kontenWebsia/searchAndFilter/searchKosong', $data);
		} else {
			$data = [
				'judulHalaman' => 'Pencarian Alumni | Website Riset 5',
				'active' => '',
				'cari' => $cari,
				'alumni1' => $query->paginate(5),
				'alumni2' => $model->orderBy('nama', $direction = 'ASC')->getAlumniFilter($cari, $min_angkatan, $max_angkatan)->get()->getResult(),
				'pager' => $model->pager,
				'page'  => isset($_GET['page']) ? (int)$_GET["page"] : 1,
				'jumlah' => $jumlah,
				'min_angkatan' => $model->getMinAngkatan()[0]->angkatan,
				'max_angkatan' => $model->getMaxAngkatan()[0]->angkatan
			];
			return view('websia/kontenWebsia/searchAndFilter/searchAndFilter', $data);
		}
	}

	public function profil()
	{

		$model = new AlumniModel();
		$query1 = $model->bukaProfile(session('id_alumni'))->getRow();
		// dd($query1);
		//isi :
		// 'aktif_pns'	
		// 'alamat_alumni'
		// 'deskripsi' 
		// 'fb'
		// 'foto_profil'
		// 'id_alumni'
		// 'ig'
		// 'jabatan_terakhir' 
		// 'jenis_kelamin'
		// 'kota'  
		// 'nama'
		// 'negara'
		// 'nip' 	
		// 'nip_bps'
		// 'angkatan'      
		// 'perkiraan_pensiun'
		// 'provinsi'
		// 'status_bekerja'	
		// 'tanggal_lahir'  
		// 'telp_alumni'    
		// 'tempat_lahir'   
		// 'twitter'
		// 'email'

		$query2 = $model->getTempatKerjaByNIM(session('id_alumni'))->getRow();
		// dd($query2);
		//isi :
		// 'alamat_instansi'
		// 'email_instansi'
		// 'faks_instansi'
		// 'id_alumni'
		// 'id_tempat_kerja'	
		// 'kota'
		// 'nama_instansi'
		// 'negara'
		// 'provinsi'
		// 'telp_instansi'

		$query3 = $model->getRole(session('id_user'))->getResult();
		// dd($query3);
		//isi :
		// array :
		// 'name'

		if ($model->getAngkatanByIdAlumni(session('id_alumni')) == NULL) {
			$query4 = $model->getIdAlumniByIdTempatKerja($model->getIdTempatKerjaByIdAlumni(session('id_alumni')), session('id_alumni'))->getResult();
		} else {
			$query4 = $model->getIdAlumniByAngkatan($model->getAngkatanByIdAlumni(session('id_alumni'))->angkatan, session('id_alumni'))->getResult();
			// dd($query4);
			//isi :
			// array :
			// 'angkatan'
			// 'id_alumni'
		}

		$query5 = $model->getPrestasiByIdAlumni(session('id_alumni'))->getResult();
		// dd($query5);
		//isi :
		// array :
		// 'id_prestasi'
		// 'nama_prestasi'
		// 'tahun_prestasi'
		// 'id_alumni'

		$query6 = $model->getPendidikanByIdAlumni(session('id_alumni'))->getResult();
		// dd($query6);
		//isi :
		// array :
		// 'id_pendidikan'
		// 'jenjang'
		// 'instansi'
		// 'tahun_lulus'
		// 'tahun_masuk'
		// 'angkatan'
		// 'id_alumni'
		// 'program_studi'
		// 'nim'
		// 'judul_tulisan'

		$query7 = $model->getUsersById(session('id_user'))->getRow();
		// dd($query7);
		//isi :
		// 'email'
		// 'fullname'
		// 'id'
		// 'id_alumni'
		// 'username'
		// 'user_image'

		$status = 'user';
		$jk = $query1->jenis_kelamin;
		$sb = $query1->status_bekerja;
		$ap = $query1->aktif_pns;
		//angkatan terakhir yang diambil
		// $angkatan = $model->getAngkatanByIdAlumni(session('id_alumni'));



		if ($jk == "Pr") {
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
			session()->set([	//cek BPS atau bukan
				'BPS' => 'no',
			]);
		} else {
			$ap = "Aktif sebagai PNS";
		}

		$data = [
			'status'		=> $status,
			'judulHalaman' 		=> 'Profil User | Website Riset 5',
			'active' 		=> 'profil',
			'alumni'      => $query1,
			'jenis_kelamin'  => $jk,
			'status_bekerja'	=> $sb,
			'aktif_pns'		=> $ap,
			'tempat_kerja'	=> $query2,
			'role' => $query3,
			'prestasi' => $query5,
			'pendidikan' => $query6,
			'user' => $query7,
			'rekomendasi'          => $query4,
		];
		return view('websia/kontenWebsia/userProfile/userProfile', $data);
	}

	public function profilAlumni()
	{
		$model = new AlumniModel();
		$kunci = $_GET['id_alumni'];
		$query1 = $model->bukaProfile($kunci)->getRow();
		// dd($query1);
		//isi :
		// 'aktif_pns'	
		// 'alamat_alumni'
		// 'deskripsi' 
		// 'fb'
		// 'foto_profil'
		// 'id_alumni'
		// 'ig'
		// 'jabatan_terakhir' 
		// 'jenis_kelamin'
		// 'kota'  
		// 'nama'
		// 'negara'
		// 'nip' 	
		// 'nip_bps'
		// 'angkatan'      
		// 'perkiraan_pensiun'
		// 'provinsi'
		// 'status_bekerja'	
		// 'tanggal_lahir'  
		// 'telp_alumni'    
		// 'tempat_lahir'   
		// 'twitter'
		// 'email'
		// 'checked'

		$query2 = $model->getTempatKerjaByNIM($kunci)->getRow();
		// dd($query2);
		//isi :
		// 'alamat_instansi'
		// 'email_instansi'
		// 'faks_instansi'
		// 'id_alumni'
		// 'id_tempat_kerja'	
		// 'kota'
		// 'nama_instansi'
		// 'negara'
		// 'provinsi'
		// 'telp_instansi'

		$query3 = $model->getRole(session('id_user'))->getResult();
		// dd($query3);
		//isi :
		// array :
		// 'name'

		if ($model->getAngkatanByIdAlumni(session('id_alumni')) == NULL || $model->getAngkatanByIdAlumni(session('id_alumni'))->angkatan == 0) {
			$query4 = $model->getIdAlumniByIdTempatKerja($model->getIdTempatKerjaByIdAlumni(session('id_alumni')), session('id_alumni'))->getResult();
		} else {
			$query4 = $model->getIdAlumniByAngkatan($model->getAngkatanByIdAlumni(session('id_alumni'))->angkatan, session('id_alumni'))->getResult();
			// dd($query4);
			//isi :
			// array :
			// 'angkatan'
			// 'id_alumni'
		}

		$query5 = $model->getPrestasiByIdAlumni($kunci)->getResult();
		// dd($query5);
		//isi :
		// array :
		// 'id_prestasi'
		// 'nama_prestasi'
		// 'tahun_prestasi'
		// 'id_alumni'

		$query6 = $model->getPendidikanByIdAlumni($kunci)->getResult();
		// dd($query6);
		//isi :
		// array :
		// 'id_pendidikan'
		// 'jenjang'
		// 'instansi'
		// 'tahun_lulus'
		// 'tahun_masuk'
		// 'angkatan'
		// 'id_alumni'
		// 'program_studi'
		// 'nim'
		// 'judul_tulisan'

		$query7 = $model->getUsersById(session('id_user'))->getRow();
		// dd($query7);
		//isi :
		// 'email'
		// 'fullname'
		// 'id'
		// 'id_alumni'
		// 'username'
		// 'user_image'

		$status = 'bukan user';
		if ($kunci == session('id_alumni')) {
			$status = 'user';
		}
		$jk = $query1->jenis_kelamin;
		$sb = $query1->status_bekerja;
		$ap = $query1->aktif_pns;
		//angkatan terakhir yang diambil
		// $angkatan = $model->getAngkatanByIdAlumni($kunci);



		if ($jk == "Pr") {
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
			'status'		=> $status,
			'judulHalaman' 		=> 'Profil User | Website Riset 5',
			'active' 		=> 'profil',
			'alumni'      => $query1,
			'jenis_kelamin'  => $jk,
			'status_bekerja'	=> $sb,
			'aktif_pns'		=> $ap,
			'tempat_kerja'	=> $query2,
			'role' => $query3,
			'prestasi' => $query5,
			'pendidikan' => $query6,
			'user' => $query7,
			'rekomendasi'          => $query4,
		];
		return view('websia/kontenWebsia/userProfile/userProfile', $data);
	}

	//belum selesai nich
	public function rekomendasi()
	{
		$model = new AlumniModel();

		$query = $model->getAlumniByAngkatan($model->bukaProfile(session('nim'))->getRow()->angkatan);
		// dd($query->orderBy('nama', $direction = 'asc')->get()->getResult());

		$data = [
			'judulHalaman'  => 'Rekomendasi',
			'active' 		=> 'rekomendasi',
			'jumlah'        => $query->countAllResults(false),
			'alumni'          => $query->orderBy('nama', $direction = 'asc')->paginate(16),
			'pager'		=> $query->orderBy('nama', $direction = 'asc')->pager
		];

		return view('websia/kontenWebsia/userProfile/rekomendasi', $data);
	}

	public function editProfil()
	{
		$model = new AlumniModel();
		$query = $model->bukaProfile(session('id_alumni'));

		$sqlcek = "SELECT password_hash from users where id = " . session('id_user');
		$cekLM = $model->query($sqlcek);

		if ($cekLM->getRow()->password_hash != NULL) {
			session()->set([	//cek login manual atau bukan
				'manual' => 'yes',
			]);
		}

		// dd($query->getRow());

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'biodata',
			'active' 		=> 'profil',
			'alumni'      => $query->getRow(),
		];
		return view('websia/kontenWebsia/editProfile/editBiodata.php', $data);
	}

	public function updateFotoProfil()
	{

		$model = new AlumniModel();
		$query1 = $model->bukaProfile(session('id_alumni'))->getRow();
		$foto = $query1->foto_profil;

		$validated = $this->validate([
			'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/png]|max_size[file_upload,2048]'
		]);

		if ($validated == FALSE) {
			session()->setFlashdata('edit-foto-fail', 'Format atau ukuran file tidak sesuai.');
			// Kembali ke function index supaya membawa data uploads dan validasi
			return redirect()->to(base_url('User/editProfil'));
		} else {
			$avatar = $this->request->getFile('file_upload');
			$avatar->move(ROOTPATH . '/public/img/user/userid_' . session('id_user'));

			if ($foto != 'default.svg') {
				$url = ROOTPATH . '/public/img/' . $foto;
				if (is_file($url))
					unlink($url);
			}

			$image = \Config\Services::image()
				->withFile(ROOTPATH . '/public/img/user/userid_' . session('id_user') . '/' . $avatar->getName())
				->fit(350, 350, 'center')
				->convert(IMAGETYPE_JPEG)
				->save(ROOTPATH . '/public/img/user/userid_' . session('id_user') . '/foto_profil.jpeg', 70);

			unlink(ROOTPATH . '/public/img/user/userid_' . session('id_user') . '/' . $avatar->getName());

			$data = [
				'foto_profil' => 'user/userid_' . session('id_user') . '/foto_profil.jpeg'
			];

			$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
			session()->setFlashdata('edit-foto-success', 'Foto Profil Berhasil Diubah');
			return redirect()->to(base_url('User/editProfil'));
		}
	}

	public function hapusFotoProfil()
	{
		$model = new AlumniModel();
		$query1 = $model->bukaProfile(session('id_alumni'))->getRow();
		$foto = $query1->foto_profil;

		if ($foto != 'default.svg') {
			$url = ROOTPATH . '/public/img/' . $foto;
			if (is_file($url))
				unlink($url);
		}

		$data = [
			'foto_profil' => 'default.svg'
		];


		$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
		session()->setFlashdata('hapus-foto', 'Foto berhasil dihapus');
		return redirect()->to(base_url('User/editProfil'));
	}

	public function updateProfil()
	{

		$model = new AlumniModel();
		$telp_alumni   	= htmlspecialchars($_POST['telp_alumni']);
		$email			= htmlspecialchars($_POST['email']);
		$alamat       	= htmlspecialchars($_POST['alamat']);
		$negara       	= htmlspecialchars($_POST['negara']);
		$provinsi       	= htmlspecialchars($_POST['provinsi']);
		$kota       	= htmlspecialchars($_POST['kabkota']);
		$ig				= htmlspecialchars($_POST['ig']);
		$fb				= htmlspecialchars($_POST['fb']);
		$twitter		= htmlspecialchars($_POST['twitter']);
		$deskripsi		= htmlspecialchars($_POST['biografi']);
		$cttl = 0;
		$cemail = 0;
		$calamat = 0;
		$cjab = 0;
		$cig = 0;
		$ctw = 0;
		$cfb = 0;

		if (isset($_POST['checkTanggalLahir'])) {
			$cttl = 1;
		}
		if (isset($_POST['checkEmail'])) {
			$cemail = 1;
		}
		if (isset($_POST['checkAlamat'])) {
			$calamat = 1;
		}
		if (isset($_POST['checkJabatan'])) {
			$cjab = 1;
		}
		if (isset($_POST['checkInstagram'])) {
			$cig = 1;
		}
		if (isset($_POST['checkTwitter'])) {
			$ctw = 1;
		}
		if (isset($_POST['checkFacebook'])) {
			$cfb = 1;
		}

		$data = [
			'id_alumni'		=> session('id_alumni'),
			'telp_alumni'    => $telp_alumni,
			'email'			=> $email,
			'alamat_alumni'        => $alamat,
			'kota'			=> $kota,
			'provinsi'		=> $provinsi,
			'negara'		=> $negara,
			'ig'			=> $ig,
			'fb'			=> $fb,
			'twitter'		=> $twitter,
			'deskripsi'		=> $deskripsi,
			'cttl' => $cttl,
			'cemail' => $cemail,
			'calamat' => $calamat,
			'cjabatan_terakhir' => $cjab,
			'cig' => $cig,
			'ctwitter' => $ctw,
			'cfb' => $cfb,
		];

		// dd($this->form_validation->run($data, 'editProfil'));

		if ($this->form_validation->run($data, 'editProfil') === FALSE) {
			// dd($this->form_validation->getError('email'));
			session()->setFlashdata('edit-bio-fail', 'Biodata gagal Disimpan');
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('error-email', $this->form_validation->getError('email'));
			session()->setFlashdata('error-telp_alumni', $this->form_validation->getError('telp_alumni'));
			// dd(session('errors'));
			return redirect()->to(base_url('User/editProfil'));
		} else {
			$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
			session()->setFlashdata('edit-bio-success', 'Biodata Berhasil Disimpan');
			return redirect()->to(base_url('User/editProfil'));
		}
	}

	public function editPendidikan()
	{

		$model = new AlumniModel();
		$query = $model->getPendidikanByIdAlumni(session('id_alumni'))->getResult();
		$tampilan = $model->bukaProfile(session('id_alumni'))->getRow();

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'pendidikan',
			'active' 		=> 'profil',
			'pendidikan'      => $query,
			'checked'	=> $tampilan,
		];
		return view('websia/kontenWebsia/editProfile/editPendidikan.php', $data);
	}

	public function updateTampilanPendidikan()
	{
		$model = new AlumniModel();

		$cpendidikan = 0;
		if (isset($_POST['checkPendidikan'])) {
			$cpendidikan = 1;
		}

		$data = [
			'cpendidikan' => $cpendidikan,
		];

		$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();

		return redirect()->to(base_url('User/editPendidikan'));
	}

	public function addPendidikan()
	{

		$model = new AlumniModel();

		$data = [
			'jenjang'    => htmlspecialchars($_POST['jenjang']),
			'instansi'	 => htmlspecialchars($_POST['instansi']),
			'tahun_lulus'  => htmlspecialchars($_POST['tahun_lulus']),
			'tahun_masuk'  => htmlspecialchars($_POST['tahun_masuk']),
			'angkatan'		=> htmlspecialchars($_POST['angkatan']),
			'id_alumni'	=> session('id_alumni'),
		];

		$data2 = [
			'program_studi'     => htmlspecialchars($_POST['program_studi']),
			'nim'				=> htmlspecialchars($_POST['nim']),
			'judul_tulisan'		=> htmlspecialchars($_POST['judul_tulisan']),
		];

		if ($this->form_validation->run($data2, 'editPendidikan') === FALSE) {
			session()->setFlashdata('add-pendidikan-fail', 'Pendidikan gagal ditambahkan');
			session()->setFlashdata('error-nim', $this->form_validation->getError('nim'));
			return redirect()->to(base_url('User/editPendidikan'));
		} else {
			$model->db->table('pendidikan')->insert($data);

			$query = "SELECT id_pendidikan FROM pendidikan WHERE id_alumni = " . session('id_alumni') . " ORDER BY id_pendidikan DESC";
			$id_pendidikan = $model->query($query)->getRow()->id_pendidikan;
			$data2 = [
				'id_pendidikan'		=> $id_pendidikan,
				'program_studi'     => htmlspecialchars($_POST['program_studi']),
				'nim'				=> htmlspecialchars($_POST['nim']),
				'judul_tulisan'		=> htmlspecialchars($_POST['judul_tulisan']),
			];
			$model->db->table('pendidikan_tinggi')->insert($data2);
			session()->setFlashdata('add-pendidikan-success', 'Pendidikan berhasil ditambahkan');
			return redirect()->to(base_url('User/editPendidikan'));
		}
	}

	public function updatePendidikan()
	{

		$model = new AlumniModel();

		$data = [
			'jenjang'    => htmlspecialchars($_POST['jenjang']),
			'instansi'	 => htmlspecialchars($_POST['instansi']),
			'tahun_lulus'  => htmlspecialchars($_POST['tahun_lulus']),
			'tahun_masuk'  => htmlspecialchars($_POST['tahun_masuk']),
			'angkatan'		=> htmlspecialchars($_POST['angkatan']),
			'id_alumni'	=> session('id_alumni'),
		];

		$data2 = [
			'program_studi'     => htmlspecialchars($_POST['program_studi']),
			'nim'				=> htmlspecialchars($_POST['nim']),
			'judul_tulisan'		=> htmlspecialchars($_POST['judul_tulisan']),
		];

		if ($this->form_validation->run($data2, 'editPendidikan') === FALSE) {
			session()->setFlashdata('edit-pendidikan-fail', 'Pendidikan gagal diperbaharui');
			session()->setFlashdata('error-nim', $this->form_validation->getError('nim'));
			return redirect()->to(base_url('User/editPendidikan'));
		} else {
			$model->db->table('pendidikan')->set($data)->where('id_pendidikan', $_POST['id_pendidikan'])->update();
			$model->db->table('pendidikan_tinggi')->set($data2)->where('id_pendidikan', $_POST['id_pendidikan'])->update();
			session()->setFlashdata('edit-pendidikan-success', 'Pendidikan berhasil diperbaharui');
			return redirect()->to(base_url('User/editPendidikan'));
		}
	}

	public function deletePendidikan()
	{

		$model = new AlumniModel();
		$model->deletePendidikanById($_POST['id_pendidikan']);

		return redirect()->to(base_url('User/editPendidikan'));
	}

	public function editTempatKerja()
	{

		$model = new AlumniModel();
		$query = $model->getTempatKerjaByNIM(session('nim'));
		$listtk = $model->getTempatKerja()->getResult();
		// dd($listtk);
		// dd($query->getRow());
		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'tempatKerja',
			'active' 		=> 'profil',
			'tempat_kerja'      => $query->getRow(),
			'list'		=> $listtk,
		];
		return view('websia/kontenWebsia/editProfile/editTempatKerja.php', $data);
	}

	public function updateTempatKerja()
	{

		$model = new AlumniModel();

		$data = [
			'id_tempat_kerja'      => $_POST['id_tempat_kerja'],
		];

		$model->db->table('alumni_tempat_kerja')->set($data)->where('nim', session('nim'))->update();

		return redirect()->to(base_url('User/editTempatKerja'));
	}

	public function addTempatKerja()
	{
		$model = new AlumniModel();

		$data1 = [
			'nama_instansi'      => htmlspecialchars($_POST['nama_instansi']),
			'alamat_instansi'  		=> htmlspecialchars($_POST['alamat_instansi']),
			'telp_instansi'  => htmlspecialchars($_POST['telp_instansi']),
			'faks_instansi'   => htmlspecialchars($_POST['faks_instansi']),
			'email_instansi'  => htmlspecialchars($_POST['email_instansi']),
		];

		$model->db->table('tempat_kerja')->insert($data1);


		$data2 = [
			'id_tempat_kerja'      => $model->getIdTempatKerja(htmlspecialchars($_POST['nama_instansi'])),
		];

		$model->db->table('alumni_tempat_kerja')->set($data2)->where('nim', session('nim'))->update();

		return redirect()->to(base_url('User/editTempatKerja'));
	}

	public function editPrestasi()
	{

		$model = new AlumniModel();
		$query = $model->getPrestasiByNIM(session('id_alumni'));
		$sql = "SELECT * FROM akses where id_alumni = " . session('id_alumni');
		$tampilan = $model->query($sql);

		// dd($query->getResult());

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'prestasi',
			'active' 		=> 'profil',
			'prestasi'      => $query->getResult(),
			'checked'	=> $tampilan->getRow(),
		];

		return view('websia/kontenWebsia/editProfile/editPrestasi.php', $data);
	}

	public function updatePrestasi()
	{

		$model = new AlumniModel();

		$data = [
			'nama_prestasi'     => htmlspecialchars($_POST['nama_prestasi']),
			'tahun_prestasi'		=> htmlspecialchars($_POST['tahun_prestasi']),
			'nim'				=> session('nim'),
		];

		$model->db->table('prestasi')->set($data)->where('id_prestasi', $_POST['id_prestasi'])->update();

		return redirect()->to(base_url('User/editPrestasi'));
	}

	public function updateTampilanPrestasi()
	{
		$model = new AlumniModel();

		$cprestasi = 0;
		if (isset($_POST['checkPrestasi'])) {
			$cprestasi = 1;
		}

		$data = [
			'prestasi' => $cprestasi,
		];

		$model->db->table('tampilan')->set($data)->where('nim', session('nim'))->update();

		return redirect()->to(base_url('User/editPrestasi'));
	}

	public function addPrestasi()
	{

		$model = new AlumniModel();

		$data = [
			'nama_prestasi'     => htmlspecialchars($_POST['nama_prestasi']),
			'tahun_prestasi'		=> htmlspecialchars($_POST['tahun_prestasi']),
			'nim'				=> session('nim'),
		];

		$model->db->table('prestasi')->insert($data);

		return redirect()->to(base_url('User/editPrestasi'));
	}

	public function deletePrestasi()
	{

		$model = new AlumniModel();
		$model->deletePrestasiById($_POST['id_prestasi']);

		return redirect()->to(base_url('User/editPrestasi'));
	}

	public function editPublikasi()
	{

		$model = new AlumniModel();
		$query = $model->getPublikasiByNIM(session('nim'));

		// dd($query->getResult());

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'publikasi',
			'active' 		=> 'profil',
			'publikasi'      => $query->getResult(),
		];

		return view('websia/kontenWebsia/editProfile/editPublikasi.php', $data);
	}

	// LOGICNYAA BELUMM MASUKKK````````````````````````````````````````````````````
	// public function updatePublikasi()
	// {}

	// DATABASENYAA KURANG MASHOOKKKK BOSQUE
	public function addPublikasi()
	{

		$model = new AlumniModel();

		$data = [
			'judul'     => htmlspecialchars($_POST['judul']),
			'topik'     => htmlspecialchars($_POST['topik']),
			'deskripsi'     => htmlspecialchars($_POST['deskripsi']),
			'publisher'     => htmlspecialchars($_POST['publisher']),
			'tanggal_disahkan'     => htmlspecialchars($_POST['tanggal_disahkan']),
			'author'     => htmlspecialchars($_POST['author']),
		];

		$model->db->table('publikasi')->insert($data);

		return redirect()->to(base_url('User/editPublikasi'));
	}

	public function editAkun()
	{

		$model = new AlumniModel();
		$query = $model->getUsersById(session('id_user'));
		// dd($query->getRow());

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'akun',
			'active' 		=> 'profil',
			'user'      => $query->getRow(),
		];

		return view('websia/kontenWebsia/editProfile/editAkun.php', $data);
	}

	// BELOM KELAR FUNGSINYA ``````````````````````````````````````````````````````````````````````
	public function updateAkun()
	{

		$model = new AlumniModel();
		$curpass = $model->getUser(session('id_user'))->getRow()->password_hash;
		$inputpass = $_POST['passlama'];
		// dd($curpass);
		// dd($inputpass);
		dd(password_verify($inputpass, $curpass));
		// dd($model->getUser(session('id_user'))->getRow());
		// dd($pass,$passlama);

		// bingung validasinya
		if (password_verify($inputpass, $curpass)) {
			if ($_POST['passbaru'] == $_POST['ulangpassbaru']) {
				$data = [
					'password_hash' => password_hash($_POST['passbaru'], PASSWORD_DEFAULT),
				];

				$model->db->table('users')->set($data)->where('id', session('id_user'))->update();
				return redirect()->to(base_url('User/editAkun'));
			} else {
				echo "password baru tidak cocok";
			}
		} else {
			echo "Password lama salah";
		}
	}

	public function unggahBerita()
	{
		$data['judulHalaman'] = 'Unggah Berita/Artikel';
		// $data['login'] = 'sudah';
		$data['active'] = '';
		return view('websia/kontenWebsia/beritaArtikel/unggahBerita', $data);
	}

	public function galeriFoto()
	{
		$model = new \App\Models\AlumniModel;
		$pendidikan = new \App\Models\PendidikanModel();
		$fotoModel = new \App\Models\FotoModel;

		$alumni = $model->getForTags()->getResult();
		foreach ($alumni as $dt) {
			$alumni_angktn = array();
			$angkatan = $pendidikan->getAngkatan($dt->id_alumni);
			if ($angkatan != null) {
				foreach ($angkatan as $aktn) {
					array_push($alumni_angktn, $aktn->angkatan);
				}
				$dt->angkatan = $alumni_angktn[0];
			} else {
				$dt->angkatan = 0;
			}
		}

		$galeri = $fotoModel->findAll();
		$i = 0;
		foreach ($galeri as $foto) {
			$pub = $model->getAlumniById($foto['id_alumni']);
			$galeri[$i]['publish'] = $pub['nama'];
			$i++;
		}

		$data = [
			'alumni' 		=> $alumni,
			'galeri'		=> $galeri,
			'judulHalaman'	=> 'Galeri Kenangan Alumni',
			'active' 		=> 'galeri'
		];
		// dd($data);
		return view('websia/kontenWebsia/galeri/galeriAlumni', $data);
	}

	public function uploadGaleri()
	{
		$validated = $this->validate([
			'file_upload'   => [
				'rules' => 'uploaded[file_upload]',
			],
			'albumFoto'			=> [
				'rules' => 'required',
				'errors' => [
					'required' => 'album harus dipilih'
				]
			],
			'deskripsi'			=> [
				'rules' => 'required|max_length[2200]',
				'errors' => [
					'required' => 'deskripsi harus diisi',
					'max_length' => 'maksimal 2200 karakter'
				]
			],
		]);

		if ($validated == FALSE) {
			$flash = '<strong>Upload gagal!</strong> format upload tidak sesuai ketentuan.';
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
			session()->setFlashdata('flash', $alert);
			return redirect()->to(base_url('User/galeriFoto'))->withInput();
		} else {
			date_default_timezone_set("Asia/Bangkok");
			$model = new \App\Models\FotoModel;

			$foto = $this->request->getFile('file_upload');
			$caption = $this->request->getPost('deskripsi');
			$album = $this->request->getPost('albumFoto');
			$tags = $this->request->getPost('tags');
			$now = date("Y-m-d H:i:s");

			$year = date("Y");
			$path = ROOTPATH . '/public/img/galeri/' . $year;

			//cek apakah sudah terdapat foldernya
			if (!is_dir($path))
				mkdir($path, 0700, true);

			//cek apakah sudah terdapat nama file yang sama, jika sudah maka akan direname
			$file = $path . "/" . $foto->getName();
			$ext = "." . $foto->guessExtension();
			$file = str_replace($ext, "", $file);
			if (is_file($file . $ext)) {
				$new_name = $file;
				while (is_file($new_name . $ext)) {
					$time = date("Ymdhis");
					$new_name = $new_name . "-" . $time;
				}
				rename($file . $ext, $new_name . $ext);
			}

			$foto->move($path);

			if (!isset($new_name)) {
				$file = str_replace(ROOTPATH . '/public/img/galeri/', "", $file);
				$data = [
					'nama_file'		=> $file . $ext,
					'caption'		=> $caption,
					'created_at'	=> $now,
					'album' 		=> $album,
					'approval' 		=> 1,
					'id_alumni' 	=> session('id_alumni'),
				];
				$model->db->table('foto')->insert($data);
			} else {
				$new_name = str_replace(ROOTPATH . '/public/img/galeri/', "", $new_name);
				$data = [
					'nama_file'		=> $new_name . $ext,
					'album' 		=> $album,
					'caption'		=> $caption,
					'created_at'	=> $now,
					'album' 		=> $album,
					'approval' 		=> 1,
					'id_alumni' 	=> session('id_alumni'),
				];
				$model->db->table('foto')->insert($data);
			}

			$foto = $model->getByName($data['nama_file']);

			$data = [
				'id_foto'	=> $foto[0]->id_foto,
				'tag'		=> $tags
			];
			$model->db->table('tag_foto')->insert($data);
			$flash = "<script> suksesUnggahFoto(); </script>";
			session()->setFlashdata('flash', $flash);
			return redirect()->to(base_url('user/galeriFoto'));
		}
	}

	function listAlbumFoto()
	{
		$data['judulHalaman'] = 'Album Galeri Kenangan Alumni';
		$data['active'] = 'galeri';
		return view('websia/kontenWebsia/galeri/listAlbumFoto', $data);
	}

	function albumFoto()
	{
		$data['judulHalaman'] = 'Album Galeri Kenangan Alumni';
		$data['active'] = 'galeri';
		return view('websia/kontenWebsia/galeri/albumFoto', $data);
	}

	public function galeriVideo()
	{
		$videoModel = new \App\Models\VideoModel;

		$data = [
			'video'			=> $videoModel->findAll(),
			'judulHalaman'	=> 'Galeri Video Kegiatan Alumni',
			'active' 		=> 'galeri'
		];
		// dd($data);
		return view('websia/kontenWebsia/galeri/galeriVidAlumni', $data);
	}

	public function uploadVideo()
	{
		$validated = $this->validate([
			'linkVideo'   => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link video harus diisi'
				]
			],
			'albumVideo'			=> [
				'rules' => 'required',
				'errors' => [
					'required' => 'album harus dipilih'
				]
			],
		]);

		if ($validated == FALSE) {
			$flash = '<strong>Upload gagal!</strong> format upload tidak sesuai ketentuan.';
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
			session()->setFlashdata('flash', $alert);
			return redirect()->to(base_url('User/galeriVideo'))->withInput();
		} else {
			$video = $this->request->getPost('linkVideo');
			$album = $this->request->getPost('albumVideo');

			if (strpos($video, 'youtu.be/') || strpos($video, 'youtube.com/')) {
				if (strpos($video, '?v=')) {
					$v_link = explode('v=', $video);
					if (strpos($v_link[1], '&')) {
						$v_link = explode('&', $v_link[1]);
						$link = $v_link[0];
					} else {
						$link = $v_link[1];
					}
				} else {
					if (strpos($video, '/channel/')) {
						echo $video . "<br>";
						echo "bukan yutub";
						die();
					}
					$v_link = explode('/', $video);
					if (strpos($v_link[3], '?')) {
						$v_link = explode('?', $v_link[3]);
						$link = $v_link[0];
					} else {
						$link = $v_link[3];
					}
				}
				date_default_timezone_set("Asia/Bangkok");
				$now = date("Y-m-d");

				$model = new \App\Models\AlumniModel();

				$data = [
					'link'			=> $link,
					'album'			=> $album,
					'created_at'	=> $now,
					'approval' 		=> 0,
					'id_alumni' 	=> session('id_alumni'),
				];
				$model->db->table('video')->insert($data);
				$flash = "<script> suksesUnggahVideo(); </script>";
				session()->setFlashdata('flash', $flash);

				return redirect()->to(base_url('user/galeriVideo'));
			} else {
				// buat upload yang bukan link youtube
				$flash = 'Link yang anda upload bukan link youtube.';
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
				session()->setFlashdata('flash', $alert);
				return redirect()->to(base_url('user/galeriVideo'));
			}
		}
	}

	public function reportGaleri()
	{
		$model = new \App\Models\ReportModel;
		$alasan = $this->request->getPost('inputLaporan');
		$id_foto = $this->request->getPost('foto');

		if ($model->getReport(session('id_alumni'), $id_foto) == NULL) {
			$data = [
				'alasan'		=> $alasan,
				'id_alumni'		=> session('id_alumni'),
				'id_foto'		=> $id_foto,
			];

			$model->db->table('report')->insert($data);

			$flash = "<script> suksesLaporFoto(); </script>";
			session()->setFlashdata('flash', $flash);
			return redirect()->to(base_url('user/galeriFoto'));
		} else {
			$flash = 'Anda sudah melakukan report terhadap foto tersebut.';
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
			session()->setFlashdata('flash', $alert);
			return redirect()->to(base_url('user/galeriFoto'));
		}
	}

	function listAlbumVideo()
	{
		$data['judulHalaman'] = 'Album Galeri Video Kenangan Alumni';
		$data['active'] = 'galeri';
		return view('websia/kontenWebsia/galeri/listAlbumVideo', $data);
	}

	function albumVideo()
	{
		$data['judulHalaman'] = 'Album Video Galeri Kenangan Alumni';
		$data['active'] = 'galeri';
		return view('websia/kontenWebsia/galeri/albumVideo', $data);
	}

	public function galeriWisuda()
	{
		$data['judulHalaman'] = 'Galeri Video Wisuda';
		$data['active'] = 'galeri';
		$data['login'] = 'sudah';

		return view('websia/kontenWebsia/galeri/galeriWisuda', $data);
	}

	public function berita()
	{
		$data['judulHalaman'] = 'Berita';
		$data['active'] = 'berita';
		$data['login'] = 'sudah';

		return view('websia/kontenWebsia/beritaArtikel/berandaBerita', $data);
	}

	public function judulBerita()
	{
		$data['judulHalaman'] = 'Berita';
		$data['active'] = 'berita';
		$data['login'] = 'sudah';

		return view('websia/kontenWebsia/beritaArtikel/berita', $data);
	}
}
