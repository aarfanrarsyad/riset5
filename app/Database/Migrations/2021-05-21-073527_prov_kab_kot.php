<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProvKabKot extends Migration
{
	public function up()
	{
		//================================================================== 
		// tabel provinsi
		$this->forge->addField([
			'id_provinsi' => [
				'type'           => 'INT',
			],
			'nama_provinsi' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);

		//primary key
		$this->forge->addKey('id_provinsi', TRUE);
		//create table
		$this->forge->createTable('provinsi');

		//================================================================== 
		// tabel kabkota
		$this->forge->addField([
			'id_provinsi' => [
				'type'           => 'INT',
			],
			'id_kabkota' => [
				'type'           => 'INT',
			],
			'nama_kabkota' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);

		//primary key
		$this->forge->addKey('id_kabkota', TRUE);
		//foreign key
		$this->forge->addForeignKey('id_provinsi', 'provinsi', 'id_provinsi', 'CASCADE', 'CASCADE');
		//create table
		$this->forge->createTable('kabkota');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//tabel provinsi
		$this->forge->dropTable('provinsi');

		//tabel kabkota
		$this->forge->dropTable('kabkota');
	}
}
