<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\WebserviceModel;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
	public function index() //project list + form create
	{
		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
	}

	//--------------------------------------------------------------------

	public function user() //user:profile
	{
		$cek = 0;
		$init = new AlumniModel();
		$init2 = new WebserviceModel();
		//$apiKey = $_POST['api-key'];
		//$email = $_POST['email'];

		if (!isset($_POST['api-key'])) {
			$respond = [
				'status' => 401,
				'message' => 'Please input an api-key',
				'data' => []
			];

			return $this->respond($respond, 401);
		} else $apiKey = $_POST['api-key'];

		$scope = $init2->getScopeAppToken($apiKey)->getResult();

		foreach ($scope as $key => $value) {
			$scope[$key]->id_scope;
			if ($scope[$key]->id_scope == '1') {
				$cek = $cek + 1;
			}
		}


		$init2->updateTokenReq($apiKey);

		if ($cek == 1) {
			if (!isset($_POST['email'])) {
				$respond = [
					'status' => 401,
					'message' => 'Please input an email!',
					'data' => []
				];

				return $this->respond($respond, 401);
			} else $email = $_POST['email'];
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
		//$apiKey = $_POST['api-key'];
		//$list = $_POST['list'];
		//$nim = $_POST['nim'];

		if (!isset($_POST['api-key'])) {
			$respond = [
				'status' => 401,
				'message' => 'Please input an api-key!',
				'data' => []
			];

			return $this->respond($respond, 401);
		} else $apiKey = $_POST['api-key'];

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

		if(isset($_POST['list'])){
			$list = $_POST['list'];
		} else $list = 0;


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
				if (!isset($_POST['nim'])) {
					$respond = [
						'status' => 401,
						'message' => 'Please input an nim!',
						'data' => []
					];

					return $this->respond($respond, 401);
				} else $nim = $_POST['nim'];
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
