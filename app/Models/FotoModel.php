<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{

    protected $table = 'foto';

    public function getApprovePhotos()
    {
        // return $this->builder()->where('approval', 1)->limit(9)->get();
        return $this->builder()->where('approval', 1)->orderBy('created_at', 'DESC')->orderBy('id_foto', 'DESC')->get()->getResultArray();
    }

    public function getByName($name)
    {
        return $this->builder()->getWhere(['nama_file' => $name])->getResult();
    }

    public function getById($id)
    {
        return $this->builder()->where('id_foto', $id)->get()->getFirstRow('array');
    }

    public function getAlbum()
    {
        return $this->builder()->select('album')->distinct('album')->get()->getResultArray();
    }
}
