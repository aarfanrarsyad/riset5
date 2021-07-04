<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{

    protected $table = 'video';

    public function getApproveVideo()
    {
        $this->builder()
            ->select('*')
            ->where('approval', 1)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id_video', 'DESC');
        return [
            'video'  => $this->paginate(6, 'video'),
            'pager'     => $this->pager->links('video', 'galeri_pager')
        ];
    }

    public function getVideo($link)
    {
        return $this->builder()->where('link', $link)->get()->getFirstRow('array');
    }

    public function getAlbum()
    {
        return $this->builder()->select('album')->distinct('album')->notLike('album', 'Alumni')->NotLike('album', 'Wisuda')->notLike('album', 'Kenangan')->get()->getResultArray();
    }

    public function getOrderAlbum()
    {
        $this->builder()->select('album, max(link) AS link, approval, max(id_video) AS id_video')->groupBy('album')->where('approval', 1);
        return $this->builder()->get()->getResultArray();
    }

    public function getByAlbum($key)
    {
        $this->builder()
            ->select('*')
            ->where('approval', 1)
            ->where('album', $key)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id_video', 'DESC');

        return [
            'video'  => $this->paginate(6, 'video'),
            'pager'     => $this->pager->links('video', 'galeri_pager')
        ];
    }
}
