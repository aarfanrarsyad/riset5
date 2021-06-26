<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{

    protected $table = 'alumni';

    public function getForTags()
    {
        return $this->builder()->select('nama, id_alumni')->get();
    }

    public function getTags($id_alumni)
    {
        return $this->builder()->select('nama, id_alumni')->where('id_alumni', $id_alumni)->get()->getFirstRow('array');
    }


    // Sudah diubah
    public function getAlumniById($id_alumni)
    {
        return $this->builder()->where('id_alumni', $id_alumni)->get()->getFirstRow('array');
    }

    public function getSearch($field, $search)
    {
        return $this->table('alumni')->like($field, $search);
    }

    public function getProv()
    {
        return $this->db->table('provinsi')->get()->getResult();
    }

    public function getKab($idProv)
    {
        return $this->db->table('kabkota')->getWhere(['id_provinsi' => $idProv])->getResult();
    }

    public function getAlumni($id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        return $this->db->query($query);
    }

    public function getAlumniFilter($cari = '', $pro = [], $akt = '', $kerja = '', $limit = 4, $start = 0)
    {
        //query utama
        $query = $this->table('alumni')->select('alumni.id_alumni,nama,foto_profil,nim,MAX(angkatan) AS angkatan,program_studi')
            ->orderBy('alumni.id_alumni')->groupBy('alumni.id_alumni')->limit($limit)
            ->where('angkatan >',0)->whereIn('instansi',['Sekolah Tinggi Ilmu Statistik','Akademi Ilmu Statistik'])
            ->join('pendidikan', 'alumni.id_alumni = pendidikan.id_alumni', 'inner')
            ->join('pendidikan_tinggi', 'pendidikan_tinggi.id_pendidikan = pendidikan.id_pendidikan', 'inner');

        if ($start > 0) $query->offset(intval($start));

        if ($cari != '') {
            $query->groupStart()->like('nama', $cari)
                ->orLike('tempat_lahir', $cari)->orLike('tanggal_lahir', $cari)
                ->orLike('telp_alumni', $cari)->orLike('email', $cari)
                ->orLike('alamat_alumni', $cari)->orLike('perkiraan_pensiun', $cari)
                ->orLike('jabatan_terakhir', $cari)->orLike('ig', $cari)
                ->orLike('fb', $cari)->orLike('twitter', $cari)
                ->orLike('nip', $cari)->orLike('nip_bps', $cari)
                ->groupEnd();
        }

        // logic pecarian prodi
        if (count($pro)<4) {
            $listProdi = [
                'DI' => ['Ak. Ilmu Statistik','D-I Statistika'],
                'DIII' => ['Akademi D-III','D-III Statistika'],
                'KS' => ['D-IV Komputasi Statistik','D-IV Sistem Informasi','D-IV Sains Data'],
                'ST' => ['D-IV Statistika Ekonomi','D-IV Statistika Sosial & Kependudukan']
            ];

            $prodi = ['in' => [], 'notIn' => []];
            foreach (array_keys($listProdi) as $p) {
                if (in_array($p, $pro)) foreach ($listProdi[$p] as $di) array_push($prodi['in'], $di);
                else foreach ($listProdi[$p] as $di) array_push($prodi['notIn'], $di);
            }
            if (count($prodi['in']) > 0) $query->whereIn('program_studi', $prodi['in']);
            if(count($prodi['notIn'])>0) $query->whereNotIn('program_studi', $prodi['notIn']);
        }

        // logic pecarian angkatan
        if ($akt != '') {
            $reg = '1234567890-,';
            $parse = '';
            $max_angkatan = $this->getMaxAngkatan();

            foreach (str_split($akt) as $key) {
                if (in_array($key, str_split($reg))) $parse .= $key;
            }
            $parse = ($parse == '') ? '1-' . $max_angkatan : $parse;
            $akt = [];

            $query->groupStart();
            foreach (explode(',', $parse) as $key) {
                if ($key!= '') {
                    $range = explode('-', $key);
                    $range[0] = (intval($range[0]) >= 1) ? intval($range[0]) :  1;
                    $range[1] = (intval(end($range)) <= $max_angkatan) ? intval(end($range)) :  $max_angkatan;

                    if ($range[0] > $range[1]) {
                        $range[1] = $range[0] + $range[1];
                        $range[0] = $range[1] - $range[0];
                        $range[1] = $range[1] - $range[0];
                    }
                    $query->orWhere("angkatan BETWEEN $range[0] AND $range[1]");
                }
            }
            $query->groupEnd();
        }

        // logic pecarian tempat kerja
        if ($kerja !== '') {
            $query->select('nama_instansi,alamat_instansi')
                ->join('alumni_tempat_kerja', 'alumni.id_alumni = alumni_tempat_kerja.id_alumni', 'inner')
                ->join('tempat_kerja', 'alumni_tempat_kerja.id_tempat_kerja = tempat_kerja.id_tempat_kerja', 'inner')
                ->groupStart()->like('nama_instansi', $kerja)
                ->orLike('alamat_instansi', $kerja)->groupEnd();
        }

        return $query;
    }

    public function getMaxAngkatan()
    {
        return $this->db->table('pendidikan')->selectMax('angkatan')->get()->getRow()->angkatan;
    }

    public function getMinAngkatan()
    {
        return $this->db->table('pendidikan')->selectMin('angkatan')->get()->getRow()->angkatan;
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
        alumni_tempat_kerja.id_tempat_kerja,
        alumni_tempat_kerja.ambigu
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

    public function getNumAlumni()
    {
        $sql = "SELECT COUNT(*) as jumlah_alumni FROM alumni";
        return $this->db->query($sql);
    }

    public function getDetailUserApi($nim = false)
    {
        if ($nim === false) {
            $sql = "SELECT a.id_alumni, a.nama, a.jenis_kelamin, a.status_bekerja, a.jabatan_terakhir, a.aktif_pns, p.instansi AS instansi, p.jenjang AS jenjang, t.program_studi AS prodi,t.nim AS nim, p.angkatan AS angkatan, p.tahun_masuk AS tahun_masuk, p.tahun_lulus AS tahun_lulus FROM alumni a LEFT JOIN pendidikan p ON p.id_alumni = a.id_alumni LEFT JOIN pendidikan_tinggi t ON p.id_pendidikan = t.id_pendidikan";

            $alumni = $this->db->query($sql)->getResultArray();
            $data = [];
            foreach ($alumni as $item) {
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
            $sqlid = "SELECT p.id_alumni as id FROM pendidikan p JOIN pendidikan_tinggi t ON t.id_pendidikan = p.id_pendidikan  WHERE nim =?";
            $id_a = $this->db->query($sqlid, [$nim])->getResult();
            if ($id_a) {
                $id = $id_a[0]->id;
            } else return NULL;

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

    public function getIdTempatKerja($nama)
    {
        $query = "SELECT id_tempat_kerja FROM tempat_kerja WHERE nama_instansi = '$nama'";
        return $this->db->query($query)->getRow()->id_tempat_kerja;
    }

    public function getTempatKerjaById($id)
    {
        $query = "SELECT * FROM tempat_kerja WHERE id_tempat_kerja = $id";
        return $this->db->query($query);
    }

    // untuk binding sso sipadu
    public function bindingSipadu($nim)
    {
        return $this->db->table('pendidikan_tinggi')
            ->select('pendidikan_tinggi.nim AS nim, pendidikan_tinggi.id_pendidikan AS id_pendidikan, pendidikan.id_alumni AS id_alumni')
            ->join('pendidikan', 'pendidikan.id_pendidikan = pendidikan_tinggi.id_pendidikan')
            ->where('nim', $nim)
            ->get()
            ->getFirstRow('array');
    }

    // untuk binding sso bps
    public function bindingBPS($nip)
    {
        return $this->builder()
            ->where('nip_bps', $nip)
            ->get()
            ->getFirstRow('array');
    }
}
