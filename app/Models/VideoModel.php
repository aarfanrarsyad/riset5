<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{

    protected $table = 'video';

    public function getApproveVideo()
    {
        // return $this->builder()->where('approval', 1)->limit(9)->get();
        return $this->builder()->where('approval', 1)->get();
    }

    public function getVideo($link)
    {
        return $this->builder()->where('link', $link)->get()->getFirstRow('array');
    }

    public function getAlbum()
    {
        return $this->builder()->select('album')->distinct('album')->get()->getResultArray();
    }
}
