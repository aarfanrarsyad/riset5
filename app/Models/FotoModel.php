<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{

    protected $table = 'foto';

    public function getByName($name)
    {
        return $this->builder()->getWhere(['nama_file' => $name])->getResult();
    }
}
