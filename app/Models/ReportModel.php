<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{

    protected $table = 'report';

    public function getReport($id_alumni, $id_foto)
    {
        return $this->builder()
            ->where('id_alumni', $id_alumni)
            ->where('id_foto', $id_foto)
            ->get()->getResult();
    }
}
