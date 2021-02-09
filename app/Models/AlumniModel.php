<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{

    protected $table = 'alumni';

    public function bukaProfile($kunci)
    {
        return $this->table('alumni')->getWhere(['nim' => $kunci]);
    }

    public function getUserByNIM($nim)
    {
        return $this->builder()->where('nim', $nim)->get()->getFirstRow('array');
    }
    public function getSearch($field, $search)
    {
        return $this->table('alumni')->like($field, $search);
    }
    public function getAlumni($search)
    {
        return $this->table('alumni')
            ->like('nama', $search)
            ->orLike('nim', $search)
            ->orLike('angkatan', $search)
            ->orLike('jenis_kelamin', $search)
            ->orLike('tempat_lahir', $search)
            ->orLike('tanggal_lahir', $search)
            ->orLike('jenis_kelamin', $search)
            ->orLike('telp_alumni', $search)
            ->orLike('alamat', $search)
            ->orLike('status_bekerja', $search)
            ->orLike('perkiraan_pensiun', $search)
            ->orLike('jabatan_terakhir', $search)
            ->orLike('aktif_pns', $search);
    }
    public function getAlumniDetail($nim){
        if(empty($nim)){
            return null;
        }
        $data = $this->table('alumni')->getWhere(['nim' => $nim]);
        $data['pendidikan']=$this->getAlumniPendidikan($nim);
        $data['prestasi']=$this->getAlumniPrestasi($nim);
        $data['publikasi']=$this->getAlumniPublikasi($nim);
        return $data;
    }


    public function getAlumniPendidikan($nim){
        // Mendapatkan daftar pendidikan dari alumni
        return $this->table('pendidikan')->getWhere(['nim' => $nim]);
    }

    public function getAlumniPrestasi($nim){
        return $this->table('prestasi')->getWhere(['nim' => $nim]);
    }

    public function getAlumniPublikasi($nim){
        $arrpub = $this->table('alumni_publikasi')->getWhere(['nim' => $nim]);
        $r = [];
        foreach($arrpub as $p){
            $r[] = $p['id_publikasi'];
        }
        return $this->table('alumni_publikasi')->whereIn('id_publikasi',$r);
    }


    
}
