<?php

namespace App\Controllers;

use App\Models\WebserviceModel;
use App\Models\AuthModel;
use App\Models\AlumniModel;
use CodeIgniter\I18n\Time;


class Webservice extends BaseController
{
	public function __construct()
	{
		$this->model = new WebserviceModel();
		$this->form_validation = \Config\Services::validation();
	}

	public function index()
	{
		if (session()->has('role')) {
			$role = array_search('4', session('role'), true);
		} else $role = false;
		if ($role == false) {
			$login = 0;
		} else {
			$login = 1;
		};

		$data = [
			'login' => 'sudah',
			'statusLog' => $login,
			'judul' => 'Web Service | SIA',
		];

		return view('webservice/kontenWebservice/halamanUtama/utama.php', $data);
	}

	public function dokumentasi()
	{
		if (session()->has('role')) {
			$role = array_search('4', session('role'), true);
		} else $role = false;
		if ($role == false) {
			$login = 0;
		} else {
			$login = 1;
		};
		$data = [
			'login' => 'sudah',
			'statusLog' => $login,
			'judul' => 'Dokumentasi Web Service | SIA'
		];
		return view('webservice/kontenWebservice/dokumentasi/dokumentasi.php', $data);
	}

	public function proyek()
	{
		if (session()->has('role')) {
			$role = array_search('4', session('role'), true);
		} else $role = false;
		if ($role == false) {
			$login = 0;
			echo '<script>window.location.replace("' . base_url('login') . '");</script>';
		} else {
			$login = 1;
		};
		//user id dapat dari session
		$uid = session('id_user');

		$data = [
			'login' => 'sudah',
			'statusLog' => $login,
			'judul' => 'Proyek Web Service | SIA',
			'client_app' => $this->model->getApp($uid)->getResultArray(),
		];
		return view('webservice/kontenWebservice/proyek/proyek.php', $data);
	}

	public function buatProyek()
	{
		if (session()->has('role')) {
			$role = array_search('4', session('role'), true);
		} else $role = false;
		if ($role == false) {
			$login = 0;
			echo '<script>window.location.replace("' . base_url('login') . '");</script>';
		} else {
			$login = 1;
		};
		$data['login'] = 'sudah';
		$data['statusLog'] = $login;
		$data['judul'] = 'Proyek Web Service | SIA';
		$data['scope_app'] = $this->model->getScope()->getResultArray();
		return view('webservice/kontenWebservice/proyek/buatProyek.php', $data);
	}

	public function insertProyek()
	{
		if (session()->has('role')) {
			$role = array_search('4', session('role'), true);
		} else $role = false;
		if ($role == false) {
			echo '<script>window.location.replace("' . base_url('login') . '");</script>';
		}

		$time = new Time('now');

		//idUser didapat dari session
		if(isset($_POST['scope'])) 
			$tokScope = $_POST['scope'];
			else $tokScope = null;
		$idUser = session('id_user');;
		$data = [
			'token_app' => [
				'token' => null
			],

			'token_scope' => $tokScope,
			'uid' => $idUser,
			'nama_app' => $_POST['nama'],
			'deskripsi' => $_POST['deskripsi'],
			'req_date' => $time->toDateTimeString(),
		];

		$this->model->addApp($data);

		return redirect()->to('/developer/proyek');
	}

	public function delete() //delete or cancel  project
	{

		$id = $_POST['id_app'];
		$id_token = $this->model->getTokenId($id)->getRow()->id_token;
		$this->model->deleteToken($id_token);
		$this->model->deleteApp($id);
		
		echo json_encode('data sukses dihapus');
	}

	public function profilDeveloper()
	{

		$data['judul'] = 'Profil Web Service | SIA';
		return view('webservice/kontenWebservice/profilDeveloper/profilDeveloper.php', $data);
	}
	// public function editBiodata()
	// {

	// 	$data['judul'] = 'Edit Profil | SIA';
	// 	$data['active'] = 'biodataDev';
	// 	return view('webservice/kontenWebservice/profilDeveloper/editBiodataWS.php', $data);
	// }
	public function editAkun()
	{
		$model = new AlumniModel();
		if (session()->has('role')) {
			$role = array_search('4', session('role'), true);
		} else $role = false;
		if ($role == false) {
			$login = 0;
			echo '<script>window.location.replace("' . base_url('login') . '");</script>';
		} else {
			$login = 1;
		};
		$data['login'] = 'sudah';
		$data['statusLog'] = $login;
		$data['email'] = $model->getAlumni(session('id_user'))->getRow()->email;

		$data['judul'] = 'Edit Profil | SIA';
		$data['active'] = 'akunDev';
		$dt = new AuthModel();

		if ($dt->getUserById(session('id_user'))['password_hash'] == NULL) {
			return redirect()->to(base_url('User/editprofil'));
		} else return view('webservice/kontenWebservice/profilDeveloper/editAkunWS.php', $data);
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
				session()->setFlashdata('edit-bio-fail', 'Konfirmasi Password baru tidak sesuai');
			} else {
				$data = [
					'password_hash' => password_hash(base64_encode(hash('sha384', $newpass, true)), PASSWORD_DEFAULT),
				];
				$model->db->table('users')->set($data)->where('id', session('id_user'))->update();
				session()->setFlashdata('edit-bio-success', 'Kata sandi baru berhasil diperbaharui');
			}
		} else {
			session()->setFlashdata('edit-bio-fail', 'Kata sandi lama tidak sesuai.');
		}
		return redirect()->to(base_url('developer/edit/akun'));
	}

	//--------------------------------------------------------------------
	//show detail app via ajax
	public function ajax_edit()
	{
		if (isset($_POST['id'])) 
			$id = $_POST['id'];
			else return;
		//$id=2;
		$data = $this->model->editApp($id)->getRowArray();
		$token = $this->model->getToken($data['id_token'])->getRow()->token;
		//$email = $this->modelApi->getEmail($data['uid'])->getRow()->email;

		$scope = $this->model->getScopeApp($data['id_token'])->getResultArray();
		$data['token'] = $token;
		$data['scope'] = $scope;
		return json_encode($data);
	}
}
