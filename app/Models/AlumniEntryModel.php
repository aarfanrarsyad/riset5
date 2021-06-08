<?php

namespace App\Models;

use CodeIgniter\Model;
use \Config\Database;

class AlumniEntryModel extends Model
{
    protected $table = 'alumni';
    public $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    // public function getLastAlumniID()
    // {
    //     $builder = $this->db->table('alumni');

    //     $builder->select('id_layanan');
    //     $builder->orderBy('id_layanan', 'DESC');
    //     $builder->limit(1);

    //     $query = $builder->get()->getResultArray();

    //     return $query;
    // }
    public function addAlumni($newData)
    {
        $builder = $this->db->table('alumni');

        $builder->insert($newData);
        //$query = $builder->get()->getResultArray('id_alumni');

        $builder->select('id_alumni');
        $builder->orderBy('id_alumni', 'DESC');
        $builder->limit(1);

        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getAlumni($id = null)
    {
        $builder = $this->db->table('alumni');
        if ($id == null) {
            $builder->select();
            $query = $builder->get()->getResultArray();

            return $query;
        } else {

            $builder->select();
            $builder->where('id_alumni', $id);
            $query = $builder->get()->getResultArray();

            return $query;
        }
    }

    public function addAlumniTempatKerja($newData)
    {
        $builder = $this->db->table('alumni_tempat_kerja');

        $builder->insert($newData);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function addPendidikan($newData)
    {
        $builder = $this->db->table('pendidikan');

        $builder->insert($newData);
        $query = $builder->get()->getResultArray();

        $builder->select('id_pendidikan');
        $builder->orderBy('id_pendidikan', 'DESC');
        $builder->limit(1);

        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function addPendidikanTinggi($newData)
    {
        $builder = $this->db->table('peendidikan_tinggi');

        $builder->insert($newData);
        $query = $builder->get()->getResultArray();

        return $query;
    }
    public function addTempatKerja($newData)
    {
        $builder = $this->db->table('tempat_kerja');

        $builder->insert($newData);
        $query = $builder->get()->getResultArray();

        return $query;
    }
}
