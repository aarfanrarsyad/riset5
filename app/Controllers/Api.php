<?php
namespace App\Controllers;
use App\Models\AlumniModel;
use App\Models\WebserviceModel;
use CodeIgniter\RESTful\ResourceController;
class Api extends ResourceController
{
	public function index() //project list + form create
	{
		$init = new AlumniModel();
		
		$da=$init->getDetailUserApi();
		$data = [];
foreach($da as $item)
{
  $data[$item['id_alumni']]['nama'] = $item['nama'];
  $data[$item['id_alumni']]['jenis_kelamin'] = $item['jenis_kelamin'];
  $data[$item['id_alumni']]['status_bekerja'] = $item['status_bekerja'];
  $data[$item['id_alumni']]['jabatan_terakhir'] = $item['jabatan_terakhir'];
  $data[$item['id_alumni']]['aktif_pns'] = $item['aktif_pns'];
  $data[$item['id_alumni']]['pendidikan_tinggi'][] = [
      "instansi" => $item['instansi'],
	  "jenjang" => $item['jenjang'],
	  "prodi" => $item['prodi'],
	  "nim" => $item['nim'],
	  "angkatan" => $item['angkatan'],
	  "tahun_masuk" => $item['tahun_masuk'],
	  "tahun_lulus" => $item['tahun_lulus'] 
  ];
 };
 dd($data);
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

		if ($apiKey==NULL) {
			$respond = [
				'status' => 401,
				'message'=> 'Please input an api-key',
				'data' => []
			];

			return $this->respond($respond,401);
		}

		$scope = $init2->getScopeAppToken($apiKey)->getResult();

		foreach ($scope as $key => $value) {
			 $scope[$key]->id_scope;
			 if ($scope[$key]->id_scope=='1') {
				 $cek = $cek+1;
			 }
		}


		$init2->updateTokenReq($apiKey);

		if($cek == 1){
			if(!$email){
				$respond = [
					'status' => 401,
					'message'=> 'Please input an email!',
					'data' => []
				];
	
				return $this->respond($respond,401);
			};
			$alumni = $init->getUserApi($email)->getResult();
			$respond = [
				'status' => 200,
				'message'=> 'Successful!',
				'data' => $alumni
			];
			return $this->respond($respond, 200);
		} else {
			$respond = [
				'status' => 403,
				'message'=> 'Forbidden!',
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

		if ($apiKey==NULL) {
			$respond = [
				'status' => 401,
				'message'=> 'Please input an api-key!',
				'data' => []
			];

			return $this->respond($respond,401);
		}

		$scope = $init2->getScopeAppToken($apiKey)->getResult();

		foreach ($scope as $key => $value) {
			 $scope[$key]->id_scope;
			 if ($scope[$key]->id_scope=='2') {
				 $scp2 = 1;
			 };

			 if ($scope[$key]->id_scope=='3') {
				$scp3 = 1;
			};
		};

		$init2->updateTokenReq($apiKey);


		if ($list==1) {
			if ($scp3 == 1) {
				$alumni = $init->getDetailUserApi();

				$respond = [
					'status' => 200,
					'message'=> 'Successful!',
					'data' => $alumni
				];
				return $this->respond($respond, 200);
				
			} else {
				$respond = [
					'status' => 403,
					'message'=> 'Forbidden!',
					'data' => []
				];
				return $this->respond($respond, 403);
			}
		} else {

			if ($scp2 == 1) {
				if(!$nim){
					$respond = [
						'status' => 401,
						'message'=> 'Please input an nim!',
						'data' => []
					];
		
					return $this->respond($respond,401);
				};
				$alumni = $init->getDetailUserApi($nim);
	
				$respond = [
					'status' => 200,
					'message'=> 'Successful!',
					'data' => $alumni
				];
				return $this->respond($respond, 200);
			} else {
				$respond = [
					'status' => 403,
					'message'=> 'Forbidden!',
					'data' => []
				];
				return $this->respond($respond, 403);
			}
		};

	} 

	//--------------------------------------------------------------------

}
