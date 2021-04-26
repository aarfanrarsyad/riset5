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
			session()->setFlashdata('belumLogin', $flash);
			echo '<script>window.location.replace("' . base_url('') . '");</script>';
		}

		if (session()->has('role'))
			if (!in_array("4", session('role'))) {
				$flash = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
				<strong class="font-bold">Tindakan Gagal!</strong>
				<span class="block sm:inline">Anda tidak terdaftar sebagai developer.</span>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
				<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
				</span>
			</div>';
				session()->setFlashdata('flash', $flash);
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

	public function editBiodata()
	{

		$data['judul'] = 'Edit Profil | SIA';
		$data['active'] = 'biodataDev';
		return view('webservice/kontenWebservice/profilDeveloper/editBiodataWS.php', $data);
	}

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
