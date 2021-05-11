<?php

namespace App\Controllers;

use App\Models\WebserviceModel;
use CodeIgniter\I18n\Time;


class Webservice extends BaseController
{
	public function __construct()
	{
		if (!session()->has('id_user')) {
			$flash = 'Harap Login Terlebih Dahulu';
			session()->setFlashdata('role', $flash);
			echo '<script>window.location.replace("' . base_url('') . '");</script>';
		}

		if (session()->has('role'))
			if (!in_array("4", session('role'))) {
				$flash = 'Anda tidak terdaftar sebagai developer.';
				session()->setFlashdata('role', $flash);
				echo '<script>window.location.replace("' . base_url('') . '");</script>';
			}

		$this->model = new WebserviceModel();
	}

	public function index()
	{

		//user id didapat dari sessiom
		$uid = session('id_user');

		$data = [
			'login' => 'sudah',
			'judul' => 'Web Service | SIA',
		];

		return view('webservice/kontenWebservice/halamanUtama/utama.php', $data);
	}

	public function dokumentasi()
	{

		$data['judul'] = 'Dokumentasi Web Service | SIA';
		return view('webservice/kontenWebservice/dokumentasi/dokumentasi.php', $data);
	}

	public function proyek()
	{

		//user id dapat dari session
		$uid = session('id_user');


		$data = [
			'login' => 'sudah',
			'judul' => 'Proyek Web Service | SIA',
			'client_app' => $this->model->getApp($uid)->getResultArray(),
		];
		return view('webservice/kontenWebservice/proyek/proyek.php', $data);
	}

	public function buatProyek()
	{

		$data['judul'] = 'Proyek Web Service | SIA';
		$data['scope_app'] = $this->model->getScope()->getResultArray();
		return view('webservice/kontenWebservice/proyek/buatProyek.php', $data);
	}

	public function insertProyek()
	{

		$time = new Time('now');

		//idUser didapat dari session
		$idUser = session('id_user');;
		$data = [
			'token_app' => [
				'token' => null
			],

			'token_scope' => $this->request->getPost('scope'),
			'uid' => $idUser,
			'nama_app' => $this->request->getPost('nama'),
			'deskripsi' => $this->request->getPost('deskripsi'),
			'req_date' => $time->toDateTimeString(),
		];

		$this->model->addApp($data);

		return redirect()->to('/Webservice/proyek');
	}

	public function delete() //delete or cancel  project
	{

		$id = $this->request->getPost('id_app');
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

		$data['judul'] = 'Edit Profil | SIA';
		$data['active'] = 'akunDev';
		return view('webservice/kontenWebservice/profilDeveloper/editAkunWS.php', $data);
	}

	//--------------------------------------------------------------------
	//show detail app via ajax
	public function ajax_edit()
	{
		$id = $this->request->getPost('id');
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
