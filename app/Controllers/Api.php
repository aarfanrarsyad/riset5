<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\WebserviceModel;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
	public function index() //project list + form create
	{
		$client = \Config\Services::curlrequest();
		$response = $client->request('POST', 'https://pusdiklat-bps.id/api/berita', [
			'form_params' => [
                'kategori' => '1',
				'token'=>'473KpgTwt9MFxmpAYJ7aF2w5'
				]
			]);
		$berita= json_decode($response->getBody()); 
		if($berita->status=='sukses'){
			foreach ($berita->data as $value) {
			echo '<div><b>Judul: </b>'.$value->judul_berita
			.'<br><b>Penulis: </b>'.$value->penulis
			.'<br><b>Created At: </b>'.$value->created_at
			.'<br>'. $value->image
			.'<br><b>Isi berita: </b>'.$value->konten_berita.'</div>';
			echo '<br>';
			echo '<hr>';
			}
		}
		die();
	}

	//--------------------------------------------------------------------

	public function user() //user:profile
	{
		$cek = 0;
		$init = new AlumniModel();
		$init2 = new WebserviceModel();
		$apiKey = $this->request->getPost('api-key');
		$email = $this->request->getPost('email');

		if ($apiKey == NULL) {
			$respond = [
				'status' => 401,
				'message' => 'Please input an api-key',
				'data' => []
			];

			return $this->respond($respond, 401);
		}

		$scope = $init2->getScopeAppToken($apiKey)->getResult();

		foreach ($scope as $key => $value) {
			$scope[$key]->id_scope;
			if ($scope[$key]->id_scope == '1') {
				$cek = $cek + 1;
			}
		}


		$init2->updateTokenReq($apiKey);

		if ($cek == 1) {
			if (!$email) {
				$respond = [
					'status' => 401,
					'message' => 'Please input an email!',
					'data' => []
				];

				return $this->respond($respond, 401);
			};
			$alumni = $init->getUserApi($email)->getResult();
			$respond = [
				'status' => 200,
				'message' => 'Successful!',
				'data' => $alumni
			];
			return $this->respond($respond, 200);
		} else {
			$respond = [
				'status' => 403,
				'message' => 'Forbidden!',
				'data' => []
			];
			return $this->respond($respond, 403);
		}
	}

	//--------------------------------------------------------------------


	public function alumni() //alumni:profile
	{
		$scp2 = 0;
		$scp3 = 0;
		$init = new AlumniModel();
		$init2 = new WebserviceModel();
		$apiKey = $this->request->getPost('api-key');
		$list = $this->request->getPost('list');
		$nim = $this->request->getPost('nim');

		if ($apiKey == NULL) {
			$respond = [
				'status' => 401,
				'message' => 'Please input an api-key!',
				'data' => []
			];

			return $this->respond($respond, 401);
		}

		$scope = $init2->getScopeAppToken($apiKey)->getResult();

		foreach ($scope as $key => $value) {
			$scope[$key]->id_scope;
			if ($scope[$key]->id_scope == '2') {
				$scp2 = 1;
			};

			if ($scope[$key]->id_scope == '3') {
				$scp3 = 1;
			};
		};

		$init2->updateTokenReq($apiKey);


		if ($list == 1) {
			if ($scp3 == 1) {
				$alumni = $init->getDetailUserApi();

				$respond = [
					'status' => 200,
					'message' => 'Successful!',
					'data' => $alumni
				];
				return $this->respond($respond, 200);
			} else {
				$respond = [
					'status' => 403,
					'message' => 'Forbidden!',
					'data' => []
				];
				return $this->respond($respond, 403);
			}
		} else {

			if ($scp2 == 1) {
				if (!$nim) {
					$respond = [
						'status' => 401,
						'message' => 'Please input an nim!',
						'data' => []
					];

					return $this->respond($respond, 401);
				};
				$alumni = $init->getDetailUserApi($nim);

				$respond = [
					'status' => 200,
					'message' => 'Successful!',
					'data' => $alumni
				];
				return $this->respond($respond, 200);
			} else {
				$respond = [
					'status' => 403,
					'message' => 'Forbidden!',
					'data' => []
				];
				return $this->respond($respond, 403);
			}
		};
	}

	public function jmlalumni(){
		$init = new AlumniModel();

		$alumni = $init->getNumAlumni()->getResult();

				$respond = [
					'status' => 200,
					'message' => 'Successful!',
					'data' => $alumni
				];
				return $this->respond($respond, 200);

	}

	//--------------------------------------------------------------------

}
