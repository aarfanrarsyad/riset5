<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{

    protected $table = 'foto';

    public function getApprovePhotos()
    {
        // return $this->builder()->where('approval', 1)->limit(9)->get();
        $this->builder()
            ->select('foto.id_foto AS id_foto, foto.nama_file AS nama_file, foto.caption AS caption, foto.album AS album, foto.created_at AS created_at, foto.approval AS approval, alumni.nama AS nama')
            ->join('alumni', 'alumni.id_alumni = foto.id_alumni', 'left')
            ->where('approval', 1)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id_foto', 'DESC');
        return [
            'foto'  => $this->paginate(16, 'foto'),
            'pager'     => $this->pager->links('foto', 'galeri_pager')
        ];
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
