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
    public function getAlumniFilter($cari,$min_angkatan,$max_angkatan)
    {
        $query = $this->table('alumni');
        if(isset($cari) && !empty($cari)){
            // $subquery = $query->like('nama', $cari)
            // ->orLike('nim', $cari)
            // ->orLike('angkatan', $cari)
            // ->orLike('jenis_kelamin', $cari)
            // ->orLike('tempat_lahir', $cari)
            // ->orLike('tanggal_lahir', $cari)
            // ->orLike('jenis_kelamin', $cari)
            // ->orLike('telp_alumni', $cari)
            // ->orLike('alamat', $cari)
            // ->orLike('status_bekerja', $cari)
            // ->orLike('perkiraan_pensiun', $cari)
            // ->orLike('jabatan_terakhir', $cari)
            // ->orLike('aktif_pns', $cari)
            // ->getCompiledSelect();
            $subquery = "(nim LIKE '%$cari%' 
            OR nama LIKE '%$cari%' 
            OR jenis_kelamin LIKE '%$cari%' 
            OR tanggal_lahir LIKE '%$cari%' 
            OR jenis_kelamin LIKE '%$cari%' 
            OR telp_alumni LIKE '%$cari%' 
            OR alamat LIKE '%$cari%' 
            OR status_bekerja LIKE '%$cari%' 
            OR perkiraan_pensiun LIKE '%$cari%' 
            OR jabatan_terakhir LIKE '%$cari%' 
            OR aktif_pns LIKE '%$cari%')";
            if(isset($min_angkatan) && isset($max_angkatan)){
                $where = "Angkatan BETWEEN $min_angkatan AND $max_angkatan";
                $query = $query
                ->where($subquery)
                ->where($where);
            }
        }
        if(isset($min_angkatan) && isset($max_angkatan)){
            $where = "Angkatan BETWEEN $min_angkatan AND $max_angkatan";
            $query = $query
            ->where($where);
        }
        return $query;
    }

    public function getMaxAngkatan(){
        return $this->table('alumni')->selectMax('angkatan')->get()->getResult();
    }

    public function getMinAngkatan(){
        return $this->table('alumni')->selectMin('angkatan')->get()->getResult();
    }
}
