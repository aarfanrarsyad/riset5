<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
	public function up()
	{
		/*
         * berita	
         */
		$this->forge->addField([
			'id'                => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'tanggal_publish'   => [
				'type' => 'datetime',
			],
			'judul'             => [
				'type' => 'varchar',
				'constraint' => 255,
			],
			'thumbnail'         => [
				'type' => 'varchar',
				'constraint' => 255,
			],
			'konten'            => [
				'type' => 'text',
			],
			'akses'             => [
				'type' => 'enum',
				'constraint'  => ['public', 'private', 'other', 'Review'],
				'default' => 'Review',
			],
			'user_id'           => [
				'type' => 'int',
				'constraint' => 11,
			],
			'groups_id'         => [
				'type' => 'varchar',
				'constraint' => 255,
				'null' => true,
			],
			'author'            => [
				'type' => 'varchar',
				'constraint' => 255,
			],
			'aktif'             => [
				'type' => 'char',
				'constraint' => 1,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('berita', true);

		/*
         * Komentar Berita	
         */
		$this->forge->addField([
			'id' => [
				'type'      => 'int',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'berita_id' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true
			],
			'time' => [
				'type' => 'datetime'
			],
			'user_id' => [
				'type' => 'int',
				'constraint' => 11
			],
			'komentar' => [
				'type' => 'text'
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('berita_id', 'berita', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('komentar_berita', true);

		/*
         * news_visited	
         */
		$this->forge->addField([
			'id' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'news_id' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true
			],
			'ip' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'date' => [
				'type' => 'datetime'
			],
			'hits' => [
				'type' => 'int',
				'constraint' => 11
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('news_id', 'berita', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('news_visited', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('berita');
		$this->forge->dropTable('komentar_berita');
		$this->forge->dropTable('news_visited');
	}
}
