<?php

namespace App\Controllers;

class Api extends BaseController
{
	public function index() //project list + form create
	{
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://pbd.bps.go.id/simpeg_api/pkl_stis_2021",
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => [
				'apiKey'	=> "0smUjhQHo2SMu2MJkcJmgEmEkv4qAfCvTW8PwnQQ724=",
				'kategori'	=> "get_riwayat_pendidikan",
				// 'nipbps'	=> "340058944"
				'nipbps'	=> "340014024"
				// 'nipbps'	=> "123120312"

				// 'nipbps'	=> $user->getNip()
			]
		]);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, TRUE);

		$result = curl_exec($curl);
		curl_close($curl);
		$hasil = json_decode($result);

		// echo $result;
		if (isset($hasil->pesan)) {
			echo "data tidak ditemukan";
		} else {
			$riwayat_pendidikan = array();
			foreach ($hasil as $data)
				array_push($riwayat_pendidikan, $data->Nama_Instansi_Pendidikan);
			if (in_array('Akademi Ilmu Statistik', $riwayat_pendidikan) || in_array('Sekolah Tinggi Ilmu Statistik', $riwayat_pendidikan) || in_array('Politeknin Statistika STIS', $riwayat_pendidikan))
				echo "Alumni";
			else
				echo "Bukan Alumni";
		}
		die();
	}

	//--------------------------------------------------------------------

	public function create() //membuat project baru
	{
	}

	//--------------------------------------------------------------------


	public function update()
	{
	}

	//--------------------------------------------------------------------

}
