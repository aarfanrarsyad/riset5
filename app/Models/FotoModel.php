<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{

    protected $table = 'foto';

    public function getApprovePhotos()
    {
        // return $this->builder()->where('approval', 1)->limit(9)->get();
        return $this->builder()->where('approval', 1)->get()->getResultArray();
    }

    public function getByName($name)
    {
        return $this->builder()->getWhere(['nama_file' => $name])->getResult();
    }
}
