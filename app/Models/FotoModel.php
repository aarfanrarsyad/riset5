<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{

    protected $table = 'foto';

    public function getApprovePhotos()
    {
        $this->builder()
            ->select('foto.id_foto AS id_foto, foto.tag AS tag, foto.nama_file AS nama_file, foto.caption AS caption, foto.album AS album, foto.created_at AS created_at, foto.approval AS approval, foto.id_alumni as id_alumni, alumni.nama AS nama')
            ->join('alumni', 'alumni.id_alumni = foto.id_alumni', 'left')
            ->where('approval', 1)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id_foto', 'DESC');
        return [
            'foto'  => $this->paginate(16, 'foto'),
            'pager'     => $this->pager->links('foto', 'galeri_pager')
        ];
    }

    public function getCountPhotos()
    {
        return $this->builder()->where('approval', 1)->countAllResults();
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
        return $this->builder()->select('album')->distinct('album')->notLike('album', 'Alumni')->NotLike('album', 'Wisuda')->notLike('album', 'Kenangan')->get()->getResultArray();
    }

    public function getOrderAlbum()
    {
        $this->builder()->select('album, max(nama_file) AS nama_file, approval, max(id_foto) AS id_foto')->groupBy('album')->where('approval', 1);
        return $this->builder()->get()->getResultArray();
    }

    public function getByAlbum($key)
    {
        $this->builder()
            ->select('foto.id_foto AS id_foto, foto.tag AS tag, foto.nama_file AS nama_file, foto.caption AS caption, foto.album AS album, foto.created_at AS created_at, foto.approval AS approval,foto.id_alumni as id_alumni, alumni.nama AS nama')
            ->join('alumni', 'alumni.id_alumni = foto.id_alumni', 'left')
            ->where('approval', 1)
            ->where('album', $key)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id_foto', 'DESC');
        return [
            'foto'  => $this->paginate(16, 'foto'),
            'pager'     => $this->pager->links('foto', 'galeri_pager')
        ];
    }

    public function getCountAlbum($key)
    {
        return $this->builder()->where('approval', 1)->where('album', $key)->countAllResults();
    }

    public function getForProfil($id)
    {
        $this->builder()
            ->select('foto.id_foto AS id_foto, foto.tag AS tag, foto.nama_file AS nama_file, foto.caption AS caption, foto.album AS album, foto.created_at AS created_at, foto.approval AS approval, foto.id_alumni as id_alumni, alumni.nama AS nama')
            ->join('alumni', 'alumni.id_alumni = foto.id_alumni', 'left')
            ->like('tag', $id . ",%")
            ->orLike('tag', "%," . $id . ",%")
            ->orLike('tag', "%," . $id)
            ->orWhere('foto.id_alumni', $id)
            ->where('approval', 1)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id_foto', 'DESC');
        return $this->builder()->get()->getResultArray();
    }
}
