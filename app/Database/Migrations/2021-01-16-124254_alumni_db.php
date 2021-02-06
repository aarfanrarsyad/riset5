<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlumniDB extends Migration
{
    public function up()
    {
        //==================================================================
        // tabel alumni
        $this->forge->addField([
            'angkatan' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '80',
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '1',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'telp_alumni' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'status_bekerja' => [
                'type' => 'BOOLEAN',
            ],
            'perkiraan_pensiun' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'jabatan_terakhir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'aktif_pns' => [
                'type' => 'BOOLEAN',
            ],
        ]);

        //primary key
        $this->forge->addKey('nim', TRUE);
        //create table
        $this->forge->createTable('alumni');

        //==================================================================
        // tabel tempat_kerja
        $this->forge->addField([
            'id_tempat_kerja' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_instansi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat_instansi' => [
                'type' => 'TEXT',
            ],
            'telp_instansi' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
            ],
            'faks_instansi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email_instansi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);

        //primary key
        $this->forge->addKey('id_tempat_kerja', TRUE);
        //create table
        $this->forge->createTable('tempat_kerja');

        //==================================================================
        // tabel alumni_tempat_kerja
        $this->forge->addField([
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'id_tempat_kerja' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);

        //primary key
        $this->forge->addKey('nim', TRUE);
        $this->forge->addKey('id_tempat_kerja', TRUE);
        //foreign key
        $this->forge->addForeignKey('nim', 'alumni', 'nim', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tempat_kerja', 'tempat_kerja', 'id_tempat_kerja', 'CASCADE', 'CASCADE');
        // create table
        $this->forge->createTable('alumni_tempat_kerja');

        //==================================================================    
        // tabel prestasi
        $this->forge->addField([
            'id_prestasi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'tahun_prestasi' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
        ]);

        //primary key
        $this->forge->addKey('id_prestasi', TRUE);
        //foreign key
        $this->forge->addForeignKey('nim', 'alumni', 'nim', 'CASCADE', 'CASCADE');
        // create table
        $this->forge->createTable('prestasi');

        //==================================================================  
        // tabel publikasi
        $this->forge->addField([
            'id_publikasi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'topik' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'publisher' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
            ],
            'tanggal_disahkan' => [
                'type' => 'DATE',
            ],
        ]);

        //primary key
        $this->forge->addKey('id_publikasi', TRUE);
        //create table
        $this->forge->createTable('publikasi');

        //================================================================== 
        // tabel alumni_publikasi
        $this->forge->addField([
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'id_publikasi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);

        //primary key
        $this->forge->addKey('nim', TRUE);
        $this->forge->addKey('id_publikasi', TRUE);
        //foreign key
        $this->forge->addForeignKey('nim', 'alumni', 'nim', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_publikasi', 'publikasi', 'id_publikasi', 'CASCADE', 'CASCADE');
        //create table
        $this->forge->createTable('alumni_publikasi');

        //================================================================== 
        // tabel author
        $this->forge->addField([
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_publikasi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);

        //primary key
        $this->forge->addKey('author', TRUE);
        $this->forge->addKey('id_publikasi', TRUE);
        //foreign key
        $this->forge->addForeignKey('id_publikasi', 'publikasi', 'id_publikasi', 'CASCADE', 'CASCADE');
        //create table
        $this->forge->createTable('author');

        //================================================================== 
        // tabel pendidikan
        $this->forge->addField([
            'id_pendidikan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenjang' => [
                'type' => 'VARCHAR',
                'constraint' => '2',
            ],
            'universitas' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
            ],
            'tahun_masuk' => [
                'type' => 'YEAR',
            ],
            'judul_tulisan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
        ]);

        //primary key
        $this->forge->addKey('id_pendidikan', TRUE);
        //foreign key
        $this->forge->addForeignKey('nim', 'alumni', 'nim', 'CASCADE', 'CASCADE');
        //create table
        $this->forge->createTable('pendidikan');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        //tabel alumni
        $this->forge->dropTable('alumni');

        //tabel tempat_kerja
        $this->forge->dropTable('tempat_kerja');

        //tabel alumni_tempat_kerja
        $this->forge->dropTable('alumni_tempat_kerja');

        //tabel prestasi
        $this->forge->dropTable('prestasi');

        //tabel publikasi
        $this->forge->dropTable('publikasi');

        //tabel alumni_publikasi
        $this->forge->dropTable('alumni_publikasi');

        //tabel author
        $this->forge->dropTable('author');

        //tabel pendidikan
        $this->forge->dropTable('pendidikan');
    }
}
