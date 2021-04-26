<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Alumni extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');

		$data = [
			'id_alumni'       	 => "1",
			'nama'               => "Dummy_dummy",
			'jenis_kelamin'      => $faker->randomElement($array = array('Lk', 'Pr')),
			'tempat_lahir'       => $faker->city,
			'tanggal_lahir'      => $faker->date($format = 'Y-m-d', $max = 'now'),
			'telp_alumni'        => $faker->phoneNumber,
			'alamat_alumni'      => $faker->address,
			'kota'      	 	 => $faker->city,
			'provinsi'      	 => $faker->state,
			'negara'      		 => $faker->country,
			'status_bekerja'     => $faker->boolean,
			'perkiraan_pensiun'  => $faker->year,
			'jabatan_terakhir'   => $faker->jobTitle,
			'aktif_pns'          => $faker->boolean,
			'deskripsi'          => $faker->text,
			'email'				 => $faker->email,
			'ig'          		 => "dummy_igza__",
			'fb'          		 => "Dummy",
			'twitter'          	 => "Dummy__",
			'nip'          	 	 => "198109262004122002",
			'nip_bps'          	 => "301820912",
			'foto_profil'      	 => "default.svg"
		];
		$this->db->table('alumni')->insert($data);

		$data = [
			'nama_instansi' 	=> "BPS Dummy",
			'kota'      	 	=> $faker->city,
			'provinsi'      	=> $faker->state,
			'negara'      		=> $faker->country,
			'alamat_instansi' 	=> $faker->address,
			'telp_instansi' 	=> $faker->phoneNumber,
			'faks_instansi' 	=> $faker->phoneNumber,
			'email_instansi' 	=> $faker->freeEmail,
		];
		$this->db->table('tempat_kerja')->insert($data);

		$data = [
			'id_alumni'       => "1",
			'id_tempat_kerja' => 1,
		];
		$this->db->table('alumni_tempat_kerja')->insert($data);
	}
}
