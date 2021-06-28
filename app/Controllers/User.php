<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\BeritaModel;


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
		helper('text');
		$dbAlumni = new \App\Models\AlumniModel;
		$dbBerita = new \App\Models\BeritaModel;

		$tipe = $this->request->getVar('t');
		if ($this->request->isAJAX()) {
			$cari = $this->request->getPost('cari');
			$prodi = $this->request->getPost('prodi');
			$akt = $this->request->getPost('akt');
			$kerja = $this->request->getPost('kerja');
			$awal = $this->request->getPost('awal');
			$akhir = $this->request->getPost('akhir');
		} else {
			$cari = $this->request->getVar('cari');
			$prodi = $this->request->getVar('prodi');
			$prodi = (is_null($prodi)) ? ["DI", "DIII", "ST", "KS"] : $prodi;
			$akt = $this->request->getVar('akt');
			$kerja = $this->request->getVar('kerja');
			$awal = $this->request->getVar('awal');
			$akhir = $this->request->getVar('akhir');
		}
		// dd($this->request->getVar('start'));

		$tipe = (is_null($tipe)) ? $this->request->getVar('tipe') : $tipe;
		$tipe = (is_null($tipe)) ? 'all' : $tipe;
		$cari = (is_null($cari)) ? '' : $cari;
		$prodi = (is_null($prodi)) ? [] : $prodi;
		$akt = (is_null($akt)) ? '' : $akt;
		$kerja = (is_null($kerja)) ? '' : $kerja;
		// dd([$cari,$pro,$akt,$kerja]);


		if ($tipe == 'all' || $tipe == 'alumni') { //query alumni utama
			if (is_null($this->request->getVar('t'))) {
				$query = $dbAlumni->getAlumniFilter($cari, $prodi, $akt, $kerja);
			} else {
				$limit = (is_null($this->request->getVar('limit'))) ? 10 : $this->request->getVar('limit');
				$start = (is_null($this->request->getVar('start'))) ? 0 : $this->request->getVar('start');
				$query = $dbAlumni->getAlumniFilter($cari, $prodi, $akt, $kerja, $limit, $start);
				// return json_encode($start);
			}

			$compiled['alumni'] = $query->getCompiledSelect(false);
			$jumlah['alumni'] = $query->countAllResults(false);
			$data['alumni'] = $query->get()->getResultArray();

			$jumlah['alumni'] = [
				'text' => (!empty($cari)) ? ($jumlah['alumni'] > 0) ?
					"Terdapat " . $jumlah['alumni'] . " alumni dengan kata kunci `<B>$cari</B>` ditemukan." :
					"Hasil pencarian alumni tidak ditemukan" :
					"Memuat " . $jumlah['alumni'] . " data alumni.",
				'ret' => $jumlah['alumni']
			];
			// dd($data);
		}

		if ($tipe == 'all' || $tipe == 'berita') { #pencarian berita
			$awal = (is_null($awal) || $awal == '') ? '2000' : $awal;
			$akhir = (is_null($akhir) || $akhir == '') ? date('Y') : $akhir;

			if (is_null($this->request->getVar('t'))) {
				$query = $dbBerita->getBeritaFilter($cari, $awal, $akhir);
			} else {
				$limit = (is_null($this->request->getVar('limit'))) ? 10 : $this->request->getVar('limit');
				$start = (is_null($this->request->getVar('start'))) ? 0 : $this->request->getVar('start');
				$query = $dbBerita->getBeritaFilter($cari, $awal, $akhir, $limit, $start);
			}

			$compiled['berita'] = $query->getCompiledSelect(false);
			$jumlah['berita'] = $query->countAllResults(false);
			$data['berita'] = array_map(function ($val) {
				return [
					'id' => $val['id'],
					'tanggal_publish' => date('d-m-Y', strtotime($val['tanggal_publish'])),
					'judul' => $val['judul'],
					'thumbnail' => $val['thumbnail'],
					'konten' => word_limiter($val['konten'], 45)
				];
			}, $query->get()->getResultArray());

			$jumlah['berita'] = [
				'text' => (!empty($cari)) ? ($jumlah['berita'] > 0) ?
					"Terdapat " . $jumlah['berita'] . " berita dengan kata kunci `<B>$cari</B>` ditemukan." :
					"Hasil pencarian berita tidak ditemukan" :
					"Memuat " . $jumlah['berita'] . " berita.",
				'ret' => $jumlah['berita']
			];
		}

		if ($this->request->isAJAX()) { // repond ajax live search
			// $query = $model->getAlumniFilter($cari, $min_angkatan, $max_angkatan);
			return json_encode([
				'data' => $data,
				'jumlah' => $jumlah,
				'search' => $this->request->getVar(),
				'query' => $compiled,
			]);
		}

		$data = [
			'judulHalaman' => 'Pencarian | Website Riset 5',
			'active' => '',
			'cari' => $cari,
			'data' => $data,
			'jumlah' => $jumlah,
			'tahunBerita' => $dbBerita->getYear()
		];
		// return view('websia/kontenWebsia/searchAndFilter/searchKosong', $data);
		switch ($this->request->getVar('t')) {
			case 'alumni':
				return view('websia/kontenWebsia/searchAndFilter/semuaAlumni', $data);
				break;
			case 'berita':
				return view('websia/kontenWebsia/searchAndFilter/semuaBerita', $data);
				break;
			default:
				return view('websia/kontenWebsia/searchAndFilter/searchAndFilter', $data);
				break;
		}
	}

	public function profil()
	{

		$model = new AlumniModel();
		$fotoModel = new \App\Models\FotoModel;
		$galeri_profil = $fotoModel->getForProfil(session()->id_alumni);
		$i = 0;
		foreach ($galeri_profil as $foto) {
			$tag = explode(',', $foto['tag']);
			$j = 0;
			foreach ($tag as $t) {
				$galeri_profil[$i]['tag_name'][$j] = $model->getTags($t);
				$j++;
			}
			$i++;
		}
		// dd($galeri_profil);

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

		if ($model->getIdTempatKerjaByIdAlumni(session('id_alumni')) == NULL) {
			$query4 = $model->getIdAlumniByAngkatan($model->getAngkatanByIdAlumni(session('id_alumni'))->angkatan, session('id_alumni'))->getResult();
		} else {
			$query4 = $model->getIdAlumniByIdTempatKerja($model->getIdTempatKerjaByIdAlumni(session('id_alumni')), session('id_alumni'))->getResult();
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
		$ambigu = $query2->ambigu;

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
			session()->remove('BPS');
		}

		if ($ambigu == 1) {
			session()->set([	//cek ambigu atau bukan
				'ambigu' => 'yes',
			]);
		} else {
			session()->set([	//cek ambigu atau bukan
				'ambigu' => 'no',
			]);
		}

		$kabkota = "";
		$provinsi = "";
		if ($query1->kota != NULL) {
			$kabkota = ", " . $query1->kota;
		}
		if ($query1->provinsi != NULL) {
			$provinsi = ", " . $query1->provinsi;
		}

		$data = [
			'status'			=> $status,
			'judulHalaman' 		=> 'Profil User | Website Riset 5',
			'active' 			=> 'profil',
			'alumni'      		=> $query1,
			'jenis_kelamin'  	=> $jk,
			'status_bekerja'	=> $sb,
			'aktif_pns'			=> $ap,
			'tempat_kerja'		=> $query2,
			'role' 				=> $query3,
			'prestasi'			=> $query5,
			'pendidikan' 		=> $query6,
			'user' 				=> $query7,
			'rekomendasi'     	=> $query4,
			'foto'				=> $galeri_profil,
			'count'				=> count($galeri_profil),
			'kabkota'			=> $kabkota,
			'provinsi'			=> $provinsi,
		];
		return view('websia/kontenWebsia/userProfile/userProfile', $data);
	}

	public function profilAlumni($id)
	{
		$model = new AlumniModel();
		// $kunci = $_GET['id_alumni'];
		// $kunci = get_alumni_by_nim($nim);
		$fotoModel = new \App\Models\FotoModel;
		$galeri_profil = $fotoModel->getForProfil($id);
		$i = 0;
		foreach ($galeri_profil as $foto) {
			$tag = explode(',', $foto['tag']);
			$j = 0;
			foreach ($tag as $t) {
				$galeri_profil[$i]['tag_name'][$j] = $model->getTags($t);
				$j++;
			}
			$i++;
		}
		$kunci = htmlspecialchars($id);
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

		if ($model->getIdTempatKerjaByIdAlumni(session('id_alumni')) == NULL) {
			$query4 = $model->getIdAlumniByAngkatan($model->getAngkatanByIdAlumni(session('id_alumni'))->angkatan, session('id_alumni'))->getResult();
		} else {
			$query4 = $model->getIdAlumniByIdTempatKerja($model->getIdTempatKerjaByIdAlumni(session('id_alumni')), session('id_alumni'))->getResult();
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

		$kabkota = "";
		$provinsi = "";
		if ($query1->kota != NULL) {
			$kabkota = ", " . $query1->kota;
		}
		if ($query1->provinsi != NULL) {
			$provinsi = ", " . $query1->provinsi;
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
			'foto'				=> $galeri_profil,
			'count'				=> count($galeri_profil),
			'kabkota'			=> $kabkota,
			'provinsi'			=> $provinsi,
		];
		return view('websia/kontenWebsia/userProfile/userProfile', $data);
	}

	//belum selesai nich
	public function rekomendasi()
	{
		$pager = \Config\Services::pager();
		$model = new AlumniModel();

		if ($model->getIdTempatKerjaByIdAlumni(session('id_alumni')) == NULL) {
			$query = $model->getRekomendasiAngkatan($model->getAngkatanByIdAlumni(session('id_alumni'))->angkatan, session('id_alumni'));
		} else {
			$query = $model->getRekomendasiTK($model->getIdTempatKerjaByIdAlumni(session('id_alumni')), session('id_alumni'));
		}

		// dd($query->orderBy('nama', $direction = 'asc')->paginate(16));
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
		$daftarProv = $model->getProv();
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
			'daftarProv'    => $daftarProv,
			'activeEditProfil' => 'biodata',
			'active' 		=> 'profil',
			'alumni'      => $query->getRow(),
		];
		return view('websia/kontenWebsia/editProfile/editBiodata.php', $data);
	}
	public function daftarKab()
	{
		$model = new AlumniModel();
		$idProv = (int)$_POST['id'];
		$daftarKab = $model->getKab($idProv);
		echo json_encode($daftarKab);
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
			$avatar->move(ROOTPATH . '../img/components/user/userid_' . session('id_user'));

			if ($foto != 'components/icon/' . $query1->jenis_kelamin . '-icon.svg' && $foto != 'components/avatar.png') {
				$url = ROOTPATH . '../img/' . $foto;
				if (is_file($url))
					unlink($url);
			}

			$image = \Config\Services::image()
				->withFile(ROOTPATH . '../img/components/user/userid_' . session('id_user') . '/' . $avatar->getName())
				->fit(350, 350, 'center')
				->convert(IMAGETYPE_JPEG)
				->save(ROOTPATH . '../img/components/user/userid_' . session('id_user') . '/foto_profil.jpeg', 70);

			unlink(ROOTPATH . '../img/components/user/userid_' . session('id_user') . '/' . $avatar->getName());

			$data = [
				'foto_profil' => 'components/user/userid_' . session('id_user') . '/foto_profil.jpeg'
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

		if ($foto != 'components/icon/' . $query1->jenis_kelamin . '-icon.svg' && $foto != 'components/avatar.png') {
			$url = ROOTPATH . '../img/' . $foto;
			if (is_file($url))
				unlink($url);
		}

		$data = [
			'foto_profil' => 'components/icon/' . $query1->jenis_kelamin . '-icon.svg'
		];


		$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
		session()->setFlashdata('hapus-foto', 'Foto berhasil dihapus');
		return redirect()->to(base_url('User/editProfil'));
	}

	public function updateProfil()
	{

		$model = new AlumniModel();
		$tempat_lahir   	= htmlspecialchars($_POST['tempat_lahir']);
		$tanggal_lahir   	= htmlspecialchars($_POST['tanggal_lahir']);
		$telp_alumni   	= htmlspecialchars($_POST['telp_alumni']);
		$email			= htmlspecialchars($_POST['email']);
		$alamat       	= htmlspecialchars($_POST['alamat']);
		if (isset($_POST['negara'])) {
			$negara       	= htmlspecialchars($_POST['negara']);
		} else {
			$negara = NULL;
		}
		$negara2       	= htmlspecialchars($_POST['negaraLainnya']);
		if (isset($_POST['prov'])) {
			$provinsi 		= htmlspecialchars($_POST['prov']);
		} else {
			$provinsi = NULL;
		}
		$kota			= NULL;
		if ($negara == "Indonesia") {
			if ($provinsi != NULL) {
				$provinsi       = ucwords(htmlspecialchars($_POST['prov']));
				if (isset($_POST['kab'])) {
					$kota       	= ucwords(htmlspecialchars($_POST['kab']));
				}
			} else {
				$provinsi = NULL;
			}
		} else {
			if ($negara2 == "") {
				$negara = NULL;
				$provinsi = NULL;
			} else {
				$negara = htmlspecialchars($negara2);
				$provinsi = NULL;
			}
		}
		$ig				= htmlspecialchars($_POST['ig']);
		$fb				= htmlspecialchars($_POST['fb']);
		$twitter		= htmlspecialchars($_POST['twitter']);
		$linkedin		= htmlspecialchars($_POST['linkedin']);
		$gscholar		= htmlspecialchars($_POST['gscholar']);
		$deskripsi		= htmlspecialchars($_POST['biografi']);
		$cttl = 0;
		$calamat = 0;
		$cpendidikan = 0;
		$cprestasi = 0;

		if (isset($_POST['checkTanggalLahir'])) {
			$cttl = 1;
		}
		if (isset($_POST['checkAlamat'])) {
			$calamat = 1;
		}
		if (isset($_POST['checkPendidikan'])) {
			$cpendidikan = 1;
		}
		if (isset($_POST['checkPrestasi'])) {
			$cprestasi = 1;
		}

		$data = [
			'id_alumni'		=> session('id_alumni'),
			'tempat_lahir'	=> $tempat_lahir,
			'tanggal_lahir'	=> $tanggal_lahir,
			'telp_alumni'    => $telp_alumni,
			'email'			=> $email,
			'alamat_alumni'        => $alamat,
			'kota'			=> $kota,
			'provinsi'		=> $provinsi,
			'negara'		=> $negara,
			'ig'			=> $ig,
			'fb'			=> $fb,
			'twitter'		=> $twitter,
			'linkedin'		=> $linkedin,
			'gscholar'		=> $gscholar,
			'deskripsi'		=> $deskripsi,
			'cttl' => $cttl,
			'calamat' => $calamat,
			'cpendidikan' => $cpendidikan,
			'cprestasi' => $cprestasi
		];

		if ($this->form_validation->run($data, 'editProfil') === FALSE) {
			session()->setFlashdata('edit-bio-fail', 'Biodata gagal Disimpan');
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('error-tempat_lahir', $this->form_validation->getError('tempat_lahir'));
			session()->setFlashdata('error-email', $this->form_validation->getError('email'));
			session()->setFlashdata('error-fb', $this->form_validation->getError('fb'));
			session()->setFlashdata('error-linkedin', $this->form_validation->getError('linkedin'));
			session()->setFlashdata('error-gscholar', $this->form_validation->getError('gscholar'));
			session()->setFlashdata('error-telp_alumni', $this->form_validation->getError('telp_alumni'));
		} else {
			$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
			session()->setFlashdata('edit-bio-success', 'Biodata Berhasil Disimpan');
		}
		return redirect()->to(base_url('User/editProfil'));
	}

	public function editPendidikan()
	{

		$model = new AlumniModel();
		$query = $model->getPendidikanByIdAlumni(session('id_alumni'))->getResult();
		// $tampilan = $model->bukaProfile(session('id_alumni'))->getRow();

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'pendidikan',
			'active' 		=> 'profil',
			'pendidikan'      => $query,
			// 'checked'	=> $tampilan,
		];
		return view('websia/kontenWebsia/editProfile/editPendidikan.php', $data);
	}

	// public function updateTampilanPendidikan()
	// {
	// 	$model = new AlumniModel();

	// 	$cpendidikan = 0;
	// 	if (isset($_POST['checkPendidikan'])) {
	// 		$cpendidikan = 1;
	// 	}

	// 	$data = [
	// 		'cpendidikan' => $cpendidikan,
	// 	];

	// 	$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
	// 	if($cpendidikan == 1){
	// 		session()->setFlashdata('edit-pendidikan-success', 'Tampilan pendidikan diaktifkan');
	// 	} else {
	// 		session()->setFlashdata('edit-pendidikan-success', 'Tampilan pendidikan dinon-aktifkan');
	// 	}
	// 	return redirect()->to(base_url('User/editPendidikan'));
	// }

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
		session()->setFlashdata('delete-pendidikan-success', 'Data pendidikan berhasil dihapus');
		return redirect()->to(base_url('User/editPendidikan'));
	}

	public function editTempatKerja()
	{

		$model = new AlumniModel();
		$query = $model->getTempatKerjaByNIM(session('id_alumni'));
		$listtk = $model->getTempatKerja()->getResult();
		$daftarProv = $model->getProv();
		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'daftarProv' => $daftarProv,
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
			'ambigu'			   => 0,
		];

		$model->db->table('alumni_tempat_kerja')->set($data)->where('id_alumni', session('id_alumni'))->update();
		session()->setFlashdata('edit-tk-success', 'Tempat Kerja berhasil diperbaharui');
		return redirect()->to(base_url('User/editTempatKerja'));
	}

	public function addTempatKerja()
	{
		$model = new AlumniModel();
		$alamat = NULL;
		$telp = NULL;
		$faks = NULL;
		if (isset($_POST['negara'])) {
			$negara       	= htmlspecialchars($_POST['negara']);
		} else {
			$negara = NULL;
		}
		$negara2       	= htmlspecialchars($_POST['negaraLainnya']);
		if (isset($_POST['prov'])) {
			$provinsi 		= htmlspecialchars($_POST['prov']);
		} else {
			$provinsi = NULL;
		}
		$kota			= NULL;
		if ($negara == "Indonesia") {
			if ($provinsi != NULL) {
				$provinsi       = ucwords(htmlspecialchars($_POST['prov']));
				if (isset($_POST['kab'])) {
					$kota       	= ucwords(htmlspecialchars($_POST['kab']));
				}
			} else {
				$provinsi = NULL;
			}
		} else {
			if ($negara2 == "") {
				$negara = NULL;
				$provinsi = NULL;
			} else {
				$negara = htmlspecialchars($negara2);
				$provinsi = NULL;
			}
		}
		if (isset($_POST['alamat_instansi'])) {
			$alamat = htmlspecialchars($_POST['alamat_instansi']);
		}
		if (isset($_POST['telp_instansi'])) {
			$telp = htmlspecialchars($_POST['telp_instansi']);
		}
		if (isset($_POST['faks_instansi'])) {
			$faks = htmlspecialchars($_POST['faks_instansi']);
		}
		$instansi = htmlspecialchars($_POST['nama_instansi']);
		$email = htmlspecialchars($_POST['email_instansi']);


		$data1 = [
			'nama_instansi'      => $instansi,
			'alamat_instansi'  		=> $alamat,
			'kota'			=> $kota,
			'provinsi'		=> $provinsi,
			'negara'		=> $negara,
			'telp_instansi'  => $telp,
			'faks_instansi'   => $faks,
			'email_instansi'  => $email,
		];

		if ($this->form_validation->run($data1, 'editTempatKerja') === FALSE) {
			session()->setFlashdata('add-tk-fail', 'Tempat Kerja gagal ditambahkan');
			session()->setFlashdata('error-nama_instansi', $this->form_validation->getError('nama_instansi'));
			session()->setFlashdata('error-email_instansi', $this->form_validation->getError('email_instansi'));
			session()->setFlashdata('error-telp_instansi', $this->form_validation->getError('telp_instansi'));
			session()->setFlashdata('error-faks_instansi', $this->form_validation->getError('faks_instansi'));
			return redirect()->to(base_url('User/editTempatKerja'));
		} else {
			$data1 = [
				'nama_instansi'      => $instansi,
				'alamat_instansi'  		=> $alamat,
				'kota'			=> $kota,
				'provinsi'		=> $provinsi,
				'negara'		=> $negara,
				'telp_instansi'  => $telp,
				'faks_instansi'   => $faks,
				'email_instansi'  => $email,
			];
			$model->db->table('tempat_kerja')->insert($data1);
			$data2 = [
				'id_tempat_kerja'      => $model->getIdTempatKerja(htmlspecialchars($_POST['nama_instansi'])),
				'ambigu'			   => 0,

			];
			$model->db->table('alumni_tempat_kerja')->set($data2)->where('id_alumni', session('id_alumni'))->update();
			session()->setFlashdata('add-tk-success', 'Tempat Kerja berhasil ditambahkan');
			return redirect()->to(base_url('User/editTempatKerja'));
		}
	}

	public function editPrestasi()
	{

		$model = new AlumniModel();
		$query = $model->getPrestasiByIdAlumni(session('id_alumni'))->getResult();
		// $tampilan = $model->bukaProfile(session('id_alumni'))->getRow();

		// dd($query->getResult());

		$data = [
			'judulHalaman' => 'Edit Profil',
			'login' => 'sudah',
			'activeEditProfil' => 'prestasi',
			'active' 		=> 'profil',
			'prestasi'      => $query,
			// 'checked'	=> $tampilan,
		];

		return view('websia/kontenWebsia/editProfile/editPrestasi.php', $data);
	}

	public function updatePrestasi()
	{

		$model = new AlumniModel();

		$data = [
			'nama_prestasi'     => htmlspecialchars($_POST['nama_prestasi']),
			'tahun_prestasi'		=> htmlspecialchars($_POST['tahun_prestasi']),
			'id_alumni'				=> session('id_alumni'),
		];

		$model->db->table('prestasi')->set($data)->where('id_prestasi', $_POST['id_prestasi'])->update();
		session()->setFlashdata('edit-prestasi-success', 'Prestasi berhasil diperbaharui');
		return redirect()->to(base_url('User/editPrestasi'));
	}

	// public function updateTampilanPrestasi()
	// {
	// 	$model = new AlumniModel();

	// 	$cprestasi = 0;
	// 	if (isset($_POST['checkPrestasi'])) {
	// 		$cprestasi = 1;
	// 	}

	// 	$data = [
	// 		'cprestasi' => $cprestasi,
	// 	];

	// 	$model->db->table('alumni')->set($data)->where('id_alumni', session('id_alumni'))->update();
	// 	if($cprestasi == 1){
	// 		session()->setFlashdata('edit-prestasi-success', 'Tampilan prestasi diaktifkan');
	// 	} else {
	// 		session()->setFlashdata('edit-prestasi-success', 'Tampilan prestasi dinon-aktifkan');
	// 	}
	// 	return redirect()->to(base_url('User/editPrestasi'));
	// }

	public function addPrestasi()
	{

		$model = new AlumniModel();

		$data = [
			'nama_prestasi'     => htmlspecialchars($_POST['nama_prestasi']),
			'tahun_prestasi'		=> htmlspecialchars($_POST['tahun_prestasi']),
			'id_alumni'				=> session('id_alumni'),
		];

		$model->db->table('prestasi')->insert($data);
		session()->setFlashdata('add-prestasi-success', 'Prestasi berhasil ditambahkan');
		return redirect()->to(base_url('User/editPrestasi'));
	}

	public function deletePrestasi()
	{

		$model = new AlumniModel();
		$model->deletePrestasiById($_POST['id_prestasi']);
		session()->setFlashdata('delete-prestasi-success', 'Prestasi berhasil dihapus');
		return redirect()->to(base_url('User/editPrestasi'));
	}

	// TIDAKKK DIPERLUKANNN
	// public function editPublikasi()
	// {

	// 	$model = new AlumniModel();
	// 	$query = $model->getPublikasiByIdAlumni(session('id_alumni'))->getResult();

	// 	$data = [
	// 		'judulHalaman' => 'Edit Profil',
	// 		'login' => 'sudah',
	// 		'activeEditProfil' => 'publikasi',
	// 		'active' 		=> 'profil',
	// 		'publikasi'      => $query,
	// 	];
	// 	return view('websia/kontenWebsia/editProfile/editPublikasi.php', $data);
	// }

	// LOGICNYAA BELUMM MASUKKK````````````````````````````````````````````````````
	// public function updatePublikasi()
	// {
	// 	$model = new AlumniModel();

	// 	$data = [
	// 		'publikasi'		=> htmlspecialchars($_POST['publikasi']),
	// 		'id_alumni'				=> session('id_alumni'),
	// 	];

	// 	$model->db->table('publikasi')->set($data)->where('id_publikasi', $_POST['id_publikasi'])->update();
	// 	session()->setFlashdata('edit-publikasi-success', 'Publikasi berhasil diperbaharui');
	// 	return redirect()->to(base_url('User/editPublikasi'));
	// }

	// DATABASENYAA KURANG MASHOOKKKK BOSQUE
	// public function addPublikasi()
	// {

	// 	$model = new AlumniModel();

	// 	$data = [
	// 		'publikasi'     => htmlspecialchars($_POST['publikasi']),
	// 		'id_alumni'     => session('id_alumni'),
	// 	];

	// 	$model->db->table('publikasi')->insert($data);
	// 	session()->setFlashdata('add-publikasi-success', 'Publikasi berhasil ditambahkan');
	// 	return redirect()->to(base_url('User/editPublikasi'));
	// }

	// kureng nih
	// public function deletePublikasi()
	// {

	// 	$model = new AlumniModel();
	// 	$model->deletePublikasiById($_POST['id_publikasi']);
	// 	session()->setFlashdata('delete-publikasi-success', 'Publikasi berhasil dihapus');
	// 	return redirect()->to(base_url('User/editPublikasi'));
	// }

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

	public function updateAkun()
	{

		$model = new AlumniModel();
		$curpass = $model->getAlumni(session('id_user'))->getRow()->password_hash;
		$inputpass = htmlspecialchars($_POST['passlama']);
		$newpass = htmlspecialchars($_POST['passbaru']);
		$renewpass = htmlspecialchars($_POST['ulangpassbaru']);

		if (password_verify(base64_encode(hash('sha384', $inputpass, true)), $curpass)) {
			$validate = [
				'new_password'	=> $newpass,
				'conf_password' => $renewpass,
			];

			if ($this->form_validation->run($validate, 'editAkun') === FALSE) {
				session()->setFlashdata('edit-pass2-fail', 'Kata sandi baru gagal diperbaharui');
				session()->setFlashdata('error-new_password', $this->form_validation->getError('new_password'));
				session()->setFlashdata('error-conf_password', $this->form_validation->getError('conf_password'));
			} else {
				$data = [
					'password_hash' => password_hash(base64_encode(hash('sha384', $newpass, true)), PASSWORD_DEFAULT),
				];
				$model->db->table('users')->set($data)->where('id', session('id_user'))->update();
				session()->setFlashdata('edit-pass-success', 'Kata sandi baru berhasil diperbaharui');
			}
		} else {
			session()->setFlashdata('edit-pass-fail', 'Kata sandi lama tidak sesuai.');
		}
		return redirect()->to(base_url('User/editAkun'));
	}

	public function galeriFoto()
	{
		$model = new \App\Models\AlumniModel;
		$pendidikan = new \App\Models\PendidikanModel();
		$fotoModel = new \App\Models\FotoModel;

		$album = $fotoModel->getAlbum();
		for ($n = 0; $n < count($album); $n++) {
			if ($album[$n]['album'] == 'Alumni' || $album[$n]['album'] == 'Wisuda' || $album[$n]['album'] == 'Kenangan') {
				unset($album[$n]);
			}
		}
		$out_album = $album;
		$out_album[count($out_album) + 1] = ['album' => 'Alumni'];
		$out_album[count($out_album) + 2] = ['album' => 'Wisuda'];
		$out_album[count($out_album) + 3] = ['album' => 'Kenangan'];

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

		$galeri = $fotoModel->getApprovePhotos();
		$count = $fotoModel->getCountPhotos();

		$i = 0;

		foreach ($galeri['foto'] as $foto) {
			$tag = explode(',', $foto['tag']);
			$j = 0;
			foreach ($tag as $t) {
				$galeri['foto'][$i]['tag_name'][$j] = $model->getTags($t);
				$j++;
			}
			$i++;
		}

		$data = [
			'alumni' 		=> $alumni,
			'galeri'		=> $galeri,
			'count'			=> $count,
			'album'			=> $out_album,
			'judulHalaman'	=> 'Galeri Kenangan Alumni',
			'active' 		=> 'galeri'
		];
		return view('websia/kontenWebsia/galeri/galeriAlumni', $data);
	}

	public function uploadGaleri()
	{
		$validated = $this->validate([
			'file_upload'   => [
				'rules' => 'uploaded[file_upload]|max_size[file_upload,2048]',
				'errors' => [
					'uploaded' => 'Harus memilih satu foto untuk diunggah.',
					'max_size' => 'Foto yang diunggah maksimal berukuran 2 MB.',
				]
			],
			'albumFoto'			=> [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harus memilih salah satu album foto.'
				]
			],
			'deskripsi'			=> [
				'rules' => 'required|max_length[150]',
				'errors' => [
					'required' => 'Deskripsi harus diisi.',
					'max_length' => 'Deskripsi diisi maksimal 150 karakter.'
				]
			],
		]);

		if ($validated == FALSE) {
			$flash = '<strong>Foto gagal diunggah!</strong> format unggah foto tidak sesuai ketentuan.';
			$alert = "<div id=\"alert\">
				<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
					<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert\">
						<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\" alt=\"Warning\">
						<p class=\"sm:text-base text-sm text-danger font-heading\">" . $flash . "</p>
					</div>
				</div>
			</div>
			<script>
				setTimeout(function() {
					$('#alert').fadeOut();
				}, 1500);
			</script>";
			session()->setFlashdata('flash', $alert);
			return redirect()->back()->withInput();
		} else {
			date_default_timezone_set("Asia/Jakarta");
			$model = new \App\Models\FotoModel;

			$foto = $this->request->getFile('file_upload');
			$caption = htmlspecialchars($this->request->getPost('deskripsi'));
			$album = htmlspecialchars($this->request->getPost('albumFoto'));
			$tags = $this->request->getPost('tags');
			$now = date("Y-m-d H:i:s");

			$caption = str_replace(array("\r", "\n"), ' ', $caption);
			$year = date("Y");
			$path = ROOTPATH . '../img/galeri/' . $year;

			//cek apakah sudah terdapat foldernya
			if (!is_dir($path))
				mkdir($path, 0755, true);


			//cek apakah sudah terdapat nama file yang sama, jika sudah maka akan direname
			$file = $path . "/" . $foto->getName();
			$ext = "." . $foto->guessExtension();
			$file = str_replace($ext, "", $file);

			$foto->move($path);
			if (is_file($file  . $ext)) {
				$time = date("Ymdhis");
				$new_name = $file . "-" . $time;
				while (is_file($new_name  . '.jpeg')) {
					$time = date("Ymdhis");
					$new_name = $new_name . "-" . $time;
				}
			}

			$image = \Config\Services::image()
				->withFile($file . $ext)
				->withResource()
				->convert(IMAGETYPE_JPEG)
				->save($new_name  . '.jpeg', 50);
			unlink($file . $ext);

			$file = str_replace(ROOTPATH . '../img/galeri/', "", $new_name);
			$data = [
				'nama_file'		=> $file  . '.jpeg',
				'tag'			=> $tags,
				'caption'		=> $caption,
				'created_at'	=> $now,
				'album' 		=> $album,
				'approval' 		=> 1,
				'id_alumni' 	=> session('id_alumni'),
			];
			$model->db->table('foto')->insert($data);

			$flash = "<script> suksesUnggahFoto(); </script>";
			session()->setFlashdata('flash', $flash);
			return redirect()->back();
		}
	}

	function listAlbumFoto()
	{
		$model = new \App\Models\AlumniModel;
		$pendidikan = new \App\Models\PendidikanModel();
		$fotoModel = new \App\Models\FotoModel;

		$album = $fotoModel->getAlbum();
		for ($n = 0; $n < count($album); $n++) {
			if ($album[$n]['album'] == 'Alumni' || $album[$n]['album'] == 'Wisuda' || $album[$n]['album'] == 'Kenangan') {
				unset($album[$n]);
			}
		}
		$out_album = $album;
		$out_album[count($out_album) + 1] = ['album' => 'Alumni'];
		$out_album[count($out_album) + 2] = ['album' => 'Wisuda'];
		$out_album[count($out_album) + 3] = ['album' => 'Kenangan'];

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

		$data = [
			'alumni' 		=> $alumni,
			'album'			=> $out_album,
			'list'			=> $fotoModel->getOrderAlbum(),
			'judulHalaman'	=> 'Album Galeri Kenangan Alumni',
			'active'		=> 'galeri'
		];

		return view('websia/kontenWebsia/galeri/listAlbumFoto', $data);
	}

	function albumFoto($key)
	{
		$model = new \App\Models\AlumniModel;
		$pendidikan = new \App\Models\PendidikanModel();
		$fotoModel = new \App\Models\FotoModel;

		$album = $fotoModel->getAlbum();
		for ($n = 0; $n < count($album); $n++) {
			if ($album[$n]['album'] == 'Alumni' || $album[$n]['album'] == 'Wisuda' || $album[$n]['album'] == 'Kenangan') {
				unset($album[$n]);
			}
		}
		$out_album = $album;
		$out_album[count($out_album) + 1] = ['album' => 'Alumni'];
		$out_album[count($out_album) + 2] = ['album' => 'Wisuda'];
		$out_album[count($out_album) + 3] = ['album' => 'Kenangan'];

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

		$galeri = $fotoModel->getByAlbum($key);
		$count = $fotoModel->getCountAlbum($key);

		$i = 0;

		foreach ($galeri['foto'] as $foto) {
			$tag = explode(',', $foto['tag']);
			$j = 0;
			foreach ($tag as $t) {
				$galeri['foto'][$i]['tag_name'][$j] = $model->getTags($t);
				$j++;
			}
			$i++;
		}

		$data = [
			'alumni' 		=> $alumni,
			'count'			=> $count,
			'album'			=> $out_album,
			'current_album'	=> $key,
			'galeri'		=> $galeri,
			'judulHalaman'	=> 'Album Galeri Kenangan Alumni',
			'active'		=> 'galeri'
		];

		return view('websia/kontenWebsia/galeri/albumFoto', $data);
	}

	public function galeriVideo()
	{
		$model = new \App\Models\VideoModel;

		// $album = $model->getAlbum();
		$album = $model->getAlbum();
		for ($n = 0; $n < count($album); $n++) {
			if ($album[$n]['album'] == 'Alumni' || $album[$n]['album'] == 'Wisuda' || $album[$n]['album'] == 'Kenangan') {
				unset($album[$n]);
			}
		}
		$out_album = $album;
		$out_album[count($out_album) + 1] = ['album' => 'Alumni'];
		$out_album[count($out_album) + 2] = ['album' => 'Wisuda'];
		$out_album[count($out_album) + 3] = ['album' => 'Kenangan'];

		$data = [
			'video'			=> $model->getApproveVideo(),
			'album'			=> $out_album,
			'judulHalaman'	=> 'Galeri Video Kegiatan Alumni',
			'active' 		=> 'galeri'
		];

		return view('websia/kontenWebsia/galeri/galeriVidAlumni', $data);
	}

	public function uploadVideo()
	{
		$validated = $this->validate([
			'linkVideo'   => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Link/url video harus diisi.'
				]
			],
			'albumVideo'			=> [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harus memilih salah satu album video.'
				]
			],
		]);

		if ($validated == FALSE) {
			$flash = '<strong>Video gagal diunggah!</strong> format unggah video tidak sesuai ketentuan.';
			$alert = "<div id=\"alert\">
				<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
					<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert\">
						<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\" alt=\"Warning\">
						<p class=\"sm:text-base text-sm text-danger font-heading\">" . $flash . "</p>
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
						$flash = 'Link/url video harus merupakan link video youtube (bukan channel).';
						$alert = "<div id=\"alert\">
							<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
								<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert\">
									<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\" alt=\"Warning\">
									<p class=\"sm:text-base text-sm text-danger font-heading\">" . $flash . "</p>
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
					$v_link = explode('/', $video);
					if (strpos($v_link[3], '?')) {
						$v_link = explode('?', $v_link[3]);
						$link = $v_link[0];
					} else {
						$link = $v_link[3];
					}
				}
				date_default_timezone_set("Asia/Jakarta");
				$now = date("Y-m-d");

				$model = new \App\Models\VideoModel();

				if ($model->getVideo($link) == null) {
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
				} else {
					$flash = 'Link video yang anda upload sudah terdaftar.';
					$alert = "<div id=\"alert\">
						<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
							<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert\">
								<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\" alt=\"Warning\">
								<p class=\"sm:text-base text-sm text-danger font-heading\">" . $flash . "</p>
							</div>
						</div>
					</div>
					<script>
						setTimeout(function() {
							$('#alert').fadeOut();
						}, 1500);
					</script>";
					session()->setFlashdata('flash', $alert);
				}
				return redirect()->to(base_url('user/galeriVideo'));
			} else {
				// buat upload yang bukan link youtube
				$flash = 'Link/url video harus merupakan link video youtube.';
				$alert = "<div id=\"alert\">
					<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
						<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert\">
							<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\" alt=\"Warning\">
							<p class=\"sm:text-base text-sm text-danger font-heading\">" . $flash . "</p>
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

			$report = $model->getById($id_foto);
			if (count($report) != 0 && count($report) % 10 == 0) {
				$model->db->table('foto')
					->set('approval', 0)
					->where('id_foto', $id_foto)
					->update();
			}

			$flash = "<script> suksesLaporFoto(); </script>";
			session()->setFlashdata('flash', $flash);
			return redirect()->back();
		} else {
			$flash = 'Anda sudah melakukan report terhadap foto tersebut.';
			$alert = "<div id=\"alert\">
				<div class=\"fixed top-0 bottom-0 right-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-40\">
					<div class=\"duration-700 transition-all p-3 rounded-lg flex items-center bg-redAlert\">
						<img src=\"/img/components/icon/warning.png\" class=\"h-5 mr-2\" style=\"color: #C51800;\" alt=\"Warning\">
						<p class=\"sm:text-base text-sm text-danger font-heading\">" . $flash . "</p>
					</div>
				</div>
			</div>
			<script>
				setTimeout(function() {
					$('#alert').fadeOut();
				}, 1500);
			</script>";
			session()->setFlashdata('flash', $alert);
			return redirect()->back();
		}
	}

	function listAlbumVideo()
	{
		$model = new \App\Models\VideoModel;

		$album = $model->getAlbum();
		for ($n = 0; $n < count($album); $n++) {
			if ($album[$n]['album'] == 'Alumni' || $album[$n]['album'] == 'Wisuda' || $album[$n]['album'] == 'Kenangan') {
				unset($album[$n]);
			}
		}
		$out_album = $album;
		$out_album[count($out_album) + 1] = ['album' => 'Alumni'];
		$out_album[count($out_album) + 2] = ['album' => 'Wisuda'];
		$out_album[count($out_album) + 3] = ['album' => 'Kenangan'];

		$data = [
			'list'			=> $model->getOrderAlbum(),
			'album'			=> $out_album,
			'judulHalaman'	=> 'Album Galeri Video Kenangan Alumni',
			'active' 		=> 'galeri'
		];

		return view('websia/kontenWebsia/galeri/listAlbumVideo', $data);
	}

	function albumVideo($key)
	{
		$model = new \App\Models\VideoModel;

		$album = $model->getAlbum();
		for ($n = 0; $n < count($album); $n++) {
			if ($album[$n]['album'] == 'Alumni' || $album[$n]['album'] == 'Wisuda' || $album[$n]['album'] == 'Kenangan') {
				unset($album[$n]);
			}
		}
		$out_album = $album;
		$out_album[count($out_album) + 1] = ['album' => 'Alumni'];
		$out_album[count($out_album) + 2] = ['album' => 'Wisuda'];
		$out_album[count($out_album) + 3] = ['album' => 'Kenangan'];

		$data = [
			'video'			=> $model->getByAlbum($key),
			'current_album'	=> $key,
			'album'			=> $out_album,
			'judulHalaman'	=> 'Album Galeri Video Kenangan Alumni',
			'active' 		=> 'galeri'
		];

		$data['judulHalaman'] = 'Album Video Galeri Kenangan Alumni';
		$data['active'] = 'galeri';
		return view('websia/kontenWebsia/galeri/albumVideo', $data);
	}

	// public function berita()
	// {
	// 	$init = new BeritaModel();

	// 	$dataset = $init->getAllNews()->getResultArray();

	// 	for ($i = 0; $i < count($dataset); $i++) {
	// 		$visited = $init->getVisitedPage($dataset[$i]['id'])->getRowArray();
	// 		$dataset[$i]['tanggal_publish'] = date('d F Y', strtotime($dataset[$i]['tanggal_publish']));
	// 		if (!$visited || empty($visited)) {
	// 			$dataset[$i]['visited'] = 0;
	// 		} else {
	// 			$dataset[$i]['visited'] = $visited['visited'];
	// 		}
	// 	}

	// 	sortByOrder($dataset, 'visited', false);

	// 	$data['dataset'] = $dataset;
	// 	$data['judulHalaman'] = 'Berita';
	// 	$data['active'] = 'berita';
	// 	$data['login'] = 'sudah';

	// 	return view('websia/kontenWebsia/beritaArtikel/berandaBerita', $data);
	// }

	public function unggahBerita()
	{
		$data['judulHalaman'] = 'Unggah Berita/Artikel';
		// $data['login'] = 'sudah';
		$data['active'] = '';
		return view('websia/kontenWebsia/beritaArtikel/unggahBerita.php', $data);
	}

	protected function getPostComment($id, $all = null)
	{
		$init = new BeritaModel();
		$init_user = model('App\Models\admin_model');

		if ($all) {
			$query_comments = $init->getPostComments($id, false)->getResultArray();
		} else {
			$query_comments = $init->getPostComments($id)->getResultArray();
		}

		$comments_count = $init->countComments($id)->getRowArray();

		for ($i = 0; $i < count($query_comments); $i++) {
			$data = $init_user->getUserById($query_comments[$i]['user_id'])->getRowArray();

			$query_comments[$i]['time'] = time_for_comment($query_comments[$i]['time']);
			if (!$data) {
				$query_comments[$i]['name'] = 'Unknown';
				$query_comments[$i]['image'] = 'default.png';
			} else {
				$query_comments[$i]['name'] = ucwords($data['fullname']);
				$query_comments[$i]['image'] = $data['user_image'];
			}
		}

		sortByOrder($query_comments, 'id');
		return [array_values($query_comments), $comments_count];
	}

	public function viewBerita($id)
	{
		$init = new BeritaModel();
		$data = $init->getNewsById($id)->getRowArray();
		$data['tanggal_publish'] = date('d F Y', strtotime($data['tanggal_publish']));
		$data['comments'] = $this->getPostComment($data['id'])[0];
		$data['count_comments'] = $this->getPostComment($data['id'])[1]['total'];
		$data['visited'] = $init->getVisitedPage($id)->getRowArray()['visited'];

		$berita = $init->getAllNews()->getResultArray();

		for ($i = 0; $i < count($berita); $i++) {
			$visited = $init->getVisitedPage($berita[$i]['id'])->getRowArray();
			$berita[$i]['tanggal_publish'] = date('d F Y', strtotime($berita[$i]['tanggal_publish']));
			if (!$visited || empty($visited)) {
				$berita[$i]['visited'] = 0;
			} else {
				$berita[$i]['visited'] = $visited['visited'];
			}
		}

		$berita_popular = $berita;
		sortByOrder($berita_popular, 'visited', false);

		record_visits($id);
		$data['active'] = '';
		$data['dataset'] =  $data;
		$data['berita'] =  $berita;
		$data['berita_popular'] =  $berita_popular;
		$data['judulHalaman'] = 'Berita';

		return view('websia/kontenWebsia/beritaArtikel/berita.php', $data);
	}
}
