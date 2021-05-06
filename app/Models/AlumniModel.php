<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{

    protected $table = 'alumni';

    // Sudah diubah
    public function getAlumniById($id_alumni)
    {
        return $this->builder()->where('id_alumni', $id_alumni)->get()->getFirstRow('array');
    }

    public function getSearch($field, $search)
    {
        return $this->table('alumni')->like($field, $search);
    }

    public function getAlumni($id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        return $this->db->query($query);
    }

    public function getAlumniFilter($cari, $min_angkatan, $max_angkatan)
    {
        if (strpos($cari, "'") !== false) {
            $cari = str_replace("'", "\'", $cari);
        }
        if (strpos($cari, '"') !== false) {
            $cari = str_replace('"', '\"', $cari);
        }
        $query = $this->table('alumni');
        if (isset($cari) && !empty($cari)) {
            $subquery = "(nim LIKE \"%$cari%\" 
            OR nama LIKE \"%$cari%\"
            OR jenis_kelamin LIKE \"%$cari%\"
            OR tempat_lahir LIKE \"%$cari%\"  
            OR tanggal_lahir LIKE \"%$cari%\"
            OR jenis_kelamin LIKE \"%$cari%\" 
            OR telp_alumni LIKE \"%$cari%\" 
            OR email LIKE \"%$cari%\" 
            OR alamat LIKE \"%$cari%\" 
            OR status_bekerja LIKE \"%$cari%\" 
            OR perkiraan_pensiun LIKE \"%$cari%\" 
            OR jabatan_terakhir LIKE \"%$cari%\"
            OR ig LIKE \"%$cari%\"
            OR fb LIKE \"%$cari%\" 
            OR twitter LIKE \"%$cari%\" 
            OR nip LIKE \"%$cari%\"
            OR nip_bps LIKE \"%$cari%\" 
            OR aktif_pns LIKE \"%$cari%\")";
            if (isset($min_angkatan) && isset($max_angkatan)) {
                $where = "Angkatan BETWEEN $min_angkatan AND $max_angkatan";
                $query = $query
                    ->where($subquery)
                    ->where($where);
            }
        }
        if (isset($min_angkatan) && isset($max_angkatan)) {
            $where = "Angkatan BETWEEN $min_angkatan AND $max_angkatan";
            $query = $query
                ->where($where);
        }
        return $query;
    }

    public function getMaxAngkatan()
    {
        return $this->table('alumni')->selectMax('angkatan')->get()->getResult();
    }

    public function getMinAngkatan()
    {
        return $this->table('alumni')->selectMin('angkatan')->get()->getResult();
    }

    public function getRole($user_id)
    {
        $query = "select name from auth_groups_users JOIN auth_groups ON group_id=id Where auth_groups_users.user_id = $user_id";
        return $this->db->query($query);
    }

    // sudah diubah <Mochi>
    public function bukaProfile($kunci)
    {
        return $this->table('alumni')->getWhere(['id_alumni' => $kunci]);
    }

    // Sudah diubah <Mochi>
    public function getTempatKerjaByNIM($id_alumni)
    {
        $query = "select tempat_kerja.id_tempat_kerja, 
        tempat_kerja.nama_instansi,
        tempat_kerja.kota,
        tempat_kerja.provinsi,
        tempat_kerja.negara,
        tempat_kerja.alamat_instansi,
        tempat_kerja.telp_instansi,
        tempat_kerja.faks_instansi,
        tempat_kerja.email_instansi,
        alumni_tempat_kerja.id_alumni, 
        alumni_tempat_kerja.id_tempat_kerja 
        FROM tempat_kerja, alumni_tempat_kerja 
        WHERE 
        tempat_kerja.id_tempat_kerja = alumni_tempat_kerja.id_tempat_kerja 
        AND alumni_tempat_kerja.id_alumni = '$id_alumni'";
        return $this->db->query($query);
    }

    // Sudah diubah <Mochi>
    public function getPendidikanByIdAlumni($id_alumni)
    {
        $query = "SELECT * FROM pendidikan JOIN pendidikan_tinggi ON pendidikan.id_pendidikan=pendidikan_tinggi.id_pendidikan WHERE pendidikan.id_alumni = $id_alumni";
        return $this->db->query($query);
    }

    // Sudah diubah <Mochi>
    public function getPrestasiByIdAlumni($id_alumni)
    {
        $query = "SELECT * FROM prestasi WHERE id_alumni = $id_alumni";
        return $this->db->query($query);
    }

    // sudah diubah <Mochi>
    public function getUsersById($id)
    {
        $query = "SELECT id,email,username,id_alumni,fullname,user_image FROM users WHERE id = $id";
        return $this->db->query($query);
    }

    // Sudah diubah <Mochi>
    public function getAngkatanByIdAlumni($id_alumni)
    {
        $query = "SELECT * FROM pendidikan WHERE id_alumni = $id_alumni ORDER BY 'angkatan' DESC";
        return $this->db->query($query)->getRow();
    }

    // Sudah diubah <Mochi>
    public function getIdAlumniByAngkatan($angkatan, $id_alumni)
    {
        $query = "SELECT * FROM alumni JOIN pendidikan 
        ON alumni.id_alumni = pendidikan.id_alumni
        WHERE pendidikan.angkatan = $angkatan
        AND NOT alumni.id_alumni=$id_alumni
                    ORDER BY RAND() LIMIT 4";
        return $this->db->query($query);
    }

    // Sudah diubah <Mochi>
    public function getEmailByIdAlumni($id_alumni)
    {
        $query = "SELECT * FROM email WHERE id_alumni = $id_alumni";
        return $this->db->query($query)->getRow()->email_alumni;
    }

    // Sudah diubah <Mochi>
    public function getIdTempatKerjaByIdAlumni($id_alumni)
    {
        $query = "SELECT id_tempat_kerja FROM alumni_tempat_kerja WHERE id_alumni = $id_alumni";
        return $this->db->query($query)->getRow()->id_tempat_kerja;
    }

    // Sudah diubah <Mochi>
    public function getIdAlumniByIdTempatKerja($id_tempat_kerja, $id_alumni)
    {
        $query = "SELECT * FROM alumni JOIN alumni_tempat_kerja 
        ON alumni_tempat_kerja.id_alumni=alumni.id_alumni 
        JOIN tempat_kerja ON tempat_kerja.id_tempat_kerja=alumni_tempat_kerja.id_tempat_kerja
        WHERE alumni_tempat_kerja.id_tempat_kerja = $id_tempat_kerja 
        AND NOT alumni.id_alumni=$id_alumni
                    ORDER BY RAND() LIMIT 4";
        return $this->db->query($query);
    }

    // Sudah diubah <Mochi>
    public function getRekomendasiTK($id_tempat_kerja, $id_alumni)
    {
        return $this->table('alumni')->join('alumni_tempat_kerja', 'alumni.id_alumni = alumni_tempat_kerja.id_alumni')
            ->join('tempat_kerja', 'tempat_kerja.id_tempat_kerja = alumni_tempat_kerja.id_tempat_kerja')
            ->where('alumni_tempat_kerja.id_tempat_kerja', $id_tempat_kerja)
            ->where('alumni.id_alumni !=', $id_alumni);
    }

    // Sudah diubah <Mochi>
    public function getRekomendasiAngkatan($angkatan, $id_alumni)
    {
        return $this->table('alumni')->join('pendidikan', 'pendidikan.id_alumni = alumni.id_alumni')
            ->where('pendidikan.angkatan', $angkatan)
            ->where(' alumni.id_alumni !=', $id_alumni);
    }

    public function getTempatKerja()
    {
        $query = "SELECT * FROM tempat_kerja";
        return $this->db->query($query);
    }

    // public function getIdPublikasi()
    // {
    //     $query = "SELECT id_publikasi FROM publikasi";
    //     return $this->db->query($query);
    // }


    // gakepake
    // public function getCountPendidikanByNIM($nim)
    // {
    //     $query = "SELECT COUNT(*) FROM pendidikan WHERE nim = $nim";
    //     return $this->db->query($query);
    // }



    // gakepake
    // public function getCountPrestasiByNIM($nim)
    // {
    //     $query = "SELECT COUNT(*) FROM prestasi WHERE nim = $nim";
    //     return $this->db->query($query);
    // }

    // public function getPublikasiByIdAlumni($id_alumni)
    // {
    //     $query = "SELECT * FROM publikasi WHERE id_alumni = $id_alumni";
    //     return $this->db->query($query);
    // }

    // gakepake
    // public function getCountPublikasiByNIM($nim)
    // {
    //     $query = "SELECT COUNT(*) FROM alumni_publikasi JOIN publikasi ON alumni_publikasi.id_publikasi=publikasi.id_publikasi WHERE alumni_publikasi.nim = $nim";
    //     return $this->db->query($query);
    // }


    // gakepake
    // public function getUsersByNIM($nim)
    // {
    //     $query = "SELECT * FROM users WHERE nim = $nim";
    //     return $this->db->query($query);
    // }



    // FOR API REQUEST
    public function getUserApi($email = false)
    {
        if ($email === false) {
            $sql = "SELECT email , fullname ,username  FROM users";

            return $this->db->query($sql);
        } else {
            $sql = "SELECT email, fullname , username FROM users WHERE email =?";

            return $this->db->query($sql, [$email]);
        }
    }

    public function getDetailUserApi($nim = false)
    {
        if ($nim === false) {
            $sql = "SELECT a.id_alumni, a.nama, a.jenis_kelamin, a.status_bekerja, a.jabatan_terakhir, a.aktif_pns, p.instansi AS instansi, p.jenjang AS jenjang, t.program_studi AS prodi,t.nim AS nim, p.angkatan AS angkatan, p.tahun_masuk AS tahun_masuk, p.tahun_lulus AS tahun_lulus FROM alumni a LEFT JOIN pendidikan p ON p.id_alumni = a.id_alumni LEFT JOIN pendidikan_tinggi t ON p.id_pendidikan = t.id_pendidikan";

            $alumni = $this->db->query($sql)->getResultArray();
            $data =[];
            foreach($alumni as $item)
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
            return $data;
        } else {
            $id = $this->db->table('pendidikan')->join('pendidikan_tinggi', 'pendidikan_tinggi.id_pendidikan = pendidikan.id_pendidikan')
                ->getWhere(['nim'=>$nim])->getRow()->id_alumni;
            $sql = "SELECT nama, jenis_kelamin, status_bekerja, jabatan_terakhir, aktif_pns FROM alumni WHERE id_alumni =?";
            $data = $this->db->query($sql, [$id])->getResult();
            $sql2 = "SELECT p.instansi AS instansi, p.jenjang AS jenjang, t.program_studi AS prodi,t.nim AS nim, p.angkatan AS angkatan, p.tahun_masuk AS tahun_masuk, p.tahun_lulus AS tahun_lulus FROM pendidikan p JOIN pendidikan_tinggi t ON p.id_pendidikan = t.id_pendidikan AND id_alumni=?";
            $data2 = $this->db->query($sql2, [$id])->getResult();
            $datum['alumni'] = $data;
            $datum['pendidikan_tinggi'] = $data2;
            return $datum;
        }
    }

    public function deletePrestasiById($id)
    {
        $query = "DELETE FROM prestasi WHERE id_prestasi= $id";
        return $this->db->query($query);
    }

    public function deletePendidikanById($id)
    {
        $query = "DELETE FROM pendidikan WHERE id_pendidikan= $id";
        return $this->db->query($query);
    }

    // kureng nih DBnya keknya ada yang kurang
    // public function deletePublikasi($id)
    // {
    //     $query = "DELETE FROM publikasi WHERE id_publikasi= $id";
    //     return $this->db->query($query);
    // }

    public function getIdTempatKerja($nama)
    {
        $query = "SELECT id_tempat_kerja FROM tempat_kerja WHERE nama_instansi = '$nama'";
        return $this->db->query($query)->getRow()->id_tempat_kerja;
    }

    public function searchAlumni($keyword)
    {
        return $this->table('alumni')->like('nama', $keyword);
    }
}
