<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Webservice extends Seeder
{
	public function run()
	{
		$data = [
			[
				'scope'       	  => 'user:profile:read',
				'scope_dev'       => 'Mengakses informasi pribadi dasar pengguna',
			],
			[
				'scope'       	  => 'alumni:profile:read',
				'scope_dev'       => 'Mengakses informasi pribadi dasar alumni atas nama pengguna',
			],
			[
				'scope'       	  => 'alumni:profile:list',
				'scope_dev'       => 'Mengakses list informasi pribadi dasar alumni atas nama pengguna',
			]
		];
		$this->db->table('scope_app')->insertBatch($data);

		$data = [
			[
				'id'       	  => NULL,
				'token'       => 'BFvhXmuJLtEHkGoQCcrUaNM9SPbf7q',
				'count_usage' => 1,
				'last_access' => '2021-03-17 21:56:53',
			]
		];
		$this->db->table('token_app')->insertBatch($data);

		$data = [
			[
				'id'       	  => NULL,
				'uid'       	  => 1,
				'nama_app'       	  => 'Aplikasi Sipadu Mobile',
				'deskripsi'       	  => 'Aplikasi ini membutuhkan request data dari sistem anda.',
				'status'       	  => 'Diterima',
				'req_date' => '2021-03-16 22:45:34',
				'req_acc' => '2021-03-17 21:56:53',
				'uid_admin'       	  => 1,
				'id_token'       	  => 1,
			]
		];
		$this->db->table('client_app')->insertBatch($data);
	}
}
