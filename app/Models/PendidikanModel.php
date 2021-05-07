<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{

    protected $table = 'pendidikan';

    public function getAngkatan($id)
    {
        $query = "SELECT angkatan FROM pendidikan WHERE id_alumni = '$id' AND (instansi = 'Akademi Ilmu Statistik' OR instansi = 'Sekolah Tinggi Ilmu Statistik' OR instansi = 'Politeknik Statistika STIS') ORDER BY angkatan";
        return $this->db->query($query)->getResult();
    }
}
