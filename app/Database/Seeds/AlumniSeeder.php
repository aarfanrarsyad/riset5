<?php

namespace App\Database\Seeds;

class AlumniSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $faker = \Faker\Factory::create('id_ID');

                //================================================================== 
                //alumni Seeder
                $data = [
                        'angkatan'           => $faker->numberBetween($min = 1, $max = 62),
                        'nama'               => "Dummy_dummy",
                        'nim'                => "221810160",
                        'jenis_kelamin'      => $faker->randomElement($array = array('L', 'P')),
                        'tempat_lahir'       => $faker->city,
                        'tanggal_lahir'      => $faker->date($format = 'Y-m-d', $max = 'now'),
                        'telp_alumni'        => $faker->phoneNumber,
                        'alamat'             => $faker->address,
                        'status_bekerja'     => $faker->boolean,
                        'perkiraan_pensiun'  => $faker->year,
                        'jabatan_terakhir'   => $faker->jobTitle,
                        'aktif_pns'          => $faker->boolean
                ];
                $this->db->table('alumni')->insert($data);

                for ($i = 0; $i < 100; $i++) {
                        $data = [
                                'angkatan'      => $faker->numberBetween($min = 1, $max = 62),
                                'nama'          => $faker->name,
                                'nim'           => $faker->unique()->randomNumber($nbDigits = 9, $strict = false),
                                'jenis_kelamin'  => $faker->randomElement($array = array('L', 'P')),
                                'tempat_lahir'   => $faker->city,
                                'tanggal_lahir'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                                'telp_alumni'    => $faker->phoneNumber,
                                'alamat'        => $faker->address,
                                'status_bekerja' => $faker->boolean,
                                'perkiraan_pensiun' => $faker->year,
                                'jabatan_terakhir'  => $faker->jobTitle,
                                'aktif_pns'      => $faker->boolean
                        ];
                        $this->db->table('alumni')->insert($data);
                }

                //================================================================== 
                //tempat_kerja Seeder
                $data = [
                        'nama_instansi' => "BPS Dummy",
                        'alamat_instansi' => $faker->address,
                        'telp_instansi' => $faker->phoneNumber,
                        'faks_instansi' => $faker->phoneNumber,
                        'email_instansi' => $faker->freeEmail,
                ];
                $this->db->table('tempat_kerja')->insert($data);

                for ($i = 0; $i < 100; $i++) {
                        $data = [
                                'nama_instansi' => $faker->company,
                                'alamat_instansi' => $faker->address,
                                'telp_instansi' => $faker->phoneNumber,
                                'faks_instansi' => $faker->phoneNumber,
                                'email_instansi' => $faker->freeEmail,
                        ];
                        $this->db->table('tempat_kerja')->insert($data);
                }
                //================================================================== 
                //alumni_tempat_kerja Seeder
                $data = [
                        'nim'             => "221810160",
                        'id_tempat_kerja' => 1,
                ];
                $this->db->table('alumni_tempat_kerja')->insert($data);

                for ($i = 0; $i < 100; $i++) {
                        $data = [
                                'nim'             => $this->db->query("SELECT nim FROM alumni WHERE nim NOT IN(SELECT nim from alumni_tempat_kerja) ORDER BY rand() limit 1")->getResult()[0]->nim,
                                'id_tempat_kerja' => $this->db->query("SELECT id_tempat_kerja FROM tempat_kerja WHERE id_tempat_kerja NOT IN(SELECT id_tempat_kerja from alumni_tempat_kerja) ORDER BY rand() limit 1")->getResult()[0]->id_tempat_kerja,
                        ];
                        $this->db->table('alumni_tempat_kerja')->insert($data);
                }
                //================================================================== 
                //prestasi Seeder
                $data = [
                        'nama_prestasi'  => "Juara 1 Dummy",
                        'tahun_prestasi' => $faker->year,
                        'nim'            => "221810160",
                ];
                $this->db->table('prestasi')->insert($data);

                for ($i = 0; $i < 100; $i++) {
                        $data = [
                                'nama_prestasi'  => $faker->word,
                                'tahun_prestasi' => $faker->year,
                                'nim'             => $this->db->query("SELECT nim FROM alumni ORDER BY rand() limit 1")->getResult()[0]->nim,
                        ];
                        $this->db->table('prestasi')->insert($data);
                }
                //================================================================== 
                //publikasi Seeder
                $data = [
                        'topik' => "Random",
                        'judul' => "Publikasi ngadi ngadi",
                        'deskripsi' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                        'publisher' => $faker->word,
                        'tanggal_disahkan' => $faker->date($format = 'Y-m-d', $max = 'now'),
                ];
                $this->db->table('publikasi')->insert($data);

                for ($i = 0; $i < 100; $i++) {
                        $data = [
                                'topik' => $faker->word,
                                'judul' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                                'deskripsi' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                                'publisher' => $faker->word,
                                'tanggal_disahkan' => $faker->date($format = 'Y-m-d', $max = 'now'),
                        ];
                        $this->db->table('publikasi')->insert($data);
                }
                //================================================================== 
                //alumni_publikasi Seeder
                $data = [
                        'nim'             => "221810160",
                        'id_publikasi'    => 1,
                ];
                $this->db->table('alumni_publikasi')->insert($data);

                for ($i = 0; $i < 99; $i++) {
                        $data = [
                                'nim'            => $this->db->query("SELECT nim FROM alumni WHERE nim NOT IN(SELECT nim from alumni_publikasi) ORDER BY rand() limit 1")->getResult()[0]->nim,
                                'id_publikasi'    => $this->db->query("SELECT id_publikasi FROM publikasi WHERE id_publikasi NOT IN(SELECT id_publikasi from alumni_publikasi) ORDER BY rand() limit 1")->getResult()[0]->id_publikasi,
                        ];
                        $this->db->table('alumni_publikasi')->insert($data);
                }
                //================================================================== 
                //author Seeder
                $data = [
                        'author'          => "Hamba Allah",
                        'id_publikasi'    => 1,
                ];
                $this->db->table('author')->insert($data);

                for ($i = 0; $i < 99; $i++) {
                        $data = [
                                'author'          => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
                                'id_publikasi'    => $this->db->query("SELECT id_publikasi FROM publikasi WHERE id_publikasi NOT IN(SELECT id_publikasi from alumni_publikasi) ORDER BY rand() limit 1")->getResult()[0]->id_publikasi,
                        ];
                        $this->db->table('author')->insert($data);
                }
                //================================================================== 
                //pendidikan Seeder
                $data = [
                        'jenjang' => "S2",
                        'universitas' => "Harvard University",
                        'program_studi' => "Computer Science",
                        'tahun_lulus' => $faker->year,
                        'tahun_masuk' => $faker->year,
                        'judul_tulisan' => "Ini adalah Judul Tulisan",
                        'nim' => "221810160",
                ];
                $this->db->table('pendidikan')->insert($data);

                for ($i = 0; $i < 100; $i++) {
                        $data = [
                                'jenjang' => $faker->randomElement($array = array('S1', 'S2', 'S3')),
                                'universitas' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                                'program_studi' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                                'tahun_lulus' => $faker->year,
                                'tahun_masuk' => $faker->year,
                                'judul_tulisan' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                                'nim'             => $this->db->query("SELECT nim FROM alumni ORDER BY rand() limit 1")->getResult()[0]->nim,
                        ];
                        $this->db->table('pendidikan')->insert($data);
                }
                //================================================================== 

        }
}
