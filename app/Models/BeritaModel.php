<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class BeritaModel extends Model
{

    public function getAllNews()
    {
        return $this->db->query("SELECT * FROM berita ORDER BY id DESC");
    }

    public function getNewsPop()
    {
        $curdate = get_date(true);
        $query = "SELECT berita.*, COUNT(news_visited.id) AS visited, SUM(news_visited.hits) AS hits FROM berita JOIN news_visited ON berita.id = news_visited.news_id WHERE (berita.aktif = 1 AND berita.akses != 'review'  AND tanggal_publish <= '$curdate' ) GROUP BY berita.id ORDER BY visited DESC";
        return $this->db->query($query);
    }

    public function getHotNews()
    {
        $curdate = get_date(true);
        $query = "SELECT * FROM berita WHERE (aktif = 1 AND akses != 'review'  AND tanggal_publish <= '$curdate') ORDER BY tanggal_publish DESC LIMIT 20";
        return $this->db->query($query);
    }

    public function getNewsForLandingPage()
    {
        $curdate = get_date(true);
        $query = "SELECT * FROM berita WHERE (aktif = 1 AND akses = 'public' AND tanggal_publish <= '$curdate') ORDER BY tanggal_publish DESC LIMIT 4";
        return $this->db->query($query);
    }

    public function getNewsById($id)
    {
        if (!isset($id) || empty($id))  redirect('auth/server-error', 'refresh');
        return $this->db->query("SELECT * FROM berita WHERE id=$id");
    }

    public function getNewsByUserId($id)
    {
        if (!isset($id) || empty($id))  redirect('auth/server-error', 'refresh');
        return $this->db->query("SELECT * FROM berita WHERE user_id=$id");
    }

    public function getLastRecordNews()
    {
        return $this->db->query("SELECT id FROM berita ORDER BY id DESC LIMIT 1");
    }

    public function insertNews($data)
    {
        if (!isset($data) || empty($data))  redirect('auth/server-error', 'refresh');

        $date = $data['date'];
        $header = $data['header'];
        $content = $data['content'];
        $access = $data['access'];
        $thumbnail = $data['thumbnail'];
        $author = $data['author'];

        $user_id = userdata()['id'];
        $groups_id = is_null($data['groups_id']) ? "NULL" : "'" . $data['groups_id'] . "'";

        $authorize =  Services::authorization();
        $active = '0';
        if ($authorize->inGroup('Administrator', userdata()['id'])) {
            $active = '1';
        } else {
            $access = 'private';
        }

        $query = "INSERT INTO berita VALUES('','$date','$header','$thumbnail','$content','$access',$user_id,$groups_id,'$author',$active)";
        if ($this->db->query($query)) {
            $insert_id = $this->insertID();
            $curr_folder = ROOTPATH . '/public/berita/';

            if (!rename($curr_folder . session()->get('folder_name'), $curr_folder . "berita_" . $insert_id)) return false;
            $content = str_replace(session()->get('folder_name'), "berita_" . $insert_id, $content);
            $query = "UPDATE berita SET konten = '$content' WHERE id = $insert_id";
            if ($this->db->query($query)) {
                session()->remove('folder_name');
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function insertUserNews($data)
    {
        if (!isset($data) || empty($data))  redirect('auth/server-error', 'refresh');

        $date = $data['date'];
        $header = $data['header'];
        $content = $data['content'];
        $access = $data['access'];
        $thumbnail = $data['thumbnail'];
        $author = $data['author'];

        $user_id = userdata()['id'];

        $query = "INSERT INTO berita VALUES('','$date','$header','$thumbnail','$content','$access',$user_id,NULL,'$author','0')";
        if ($this->db->query($query)) {
            $insert_id = $this->insertID();
            $curr_folder = ROOTPATH . '/public/berita/';

            if (!rename($curr_folder . session()->get('folder_name'), $curr_folder . "berita_" . $insert_id)) {
                $dirname = ROOTPATH . session()->get('folder_name');
                array_map('unlink', glob("$dirname/*.*"));
                rmdir($dirname);
                return false;
            }
            $content = str_replace(session()->get('folder_name'), "berita_" . $insert_id, $content);
            $query = "UPDATE berita SET konten = '$content' WHERE id = $insert_id";

            if ($this->db->query($query)) {
                return true;
            } else {
                $dirname = ROOTPATH . '/public/berita/berita_' . $insert_id;
                array_map('unlink', glob("$dirname/*.*"));
                rmdir($dirname);
                return false;
            }
        } else {

            $dirname = ROOTPATH . session()->get('folder_name');
            array_map('unlink', glob("$dirname/*.*"));
            rmdir($dirname);
            return false;
        }
    }

    public function updateNews($data)
    {
        if (!isset($data) || empty($data))  redirect('auth/server-error', 'refresh');

        $id = $data['id'];
        $date = $data['date'];
        $header = $data['header'];
        $content = $data['content'];
        $access = $data['access'];
        $author = $data['author'];

        $last_data = $this->getNewsById($id)->getRowArray();
        $user_id = is_null($data['user_id']) ? "NULL" : "'" . $data['user_id'] . "'";
        $groups_id = is_null($data['groups_id']) ? "NULL" : "'" . $data['groups_id'] . "'";
        $thumbnail = is_null($data['thumbnail']) ? "" : ",thumbnail = '" . $data['thumbnail'] . "'";

        $query = "UPDATE berita SET  tanggal_publish = '$date', judul = '$header', konten = '$content', akses = '$access', user_id =  $user_id, groups_id = $groups_id, author='$author' $thumbnail WHERE id = $id ";
        if ($this->db->query($query)) {
            if ($data['thumbnail']) {
                $dir_thumb = $last_data['thumbnail'];
                $dirname = ROOTPATH . '/public/berita/berita_' . $id;
                array_map('unlink', glob("$dirname/$dir_thumb"));
            }
            return true;
        } else {
            return false;
        }
    }

    public function deleteNews($id) #SOLVED
    {
        if (!isset($id) || empty($id))  redirect('auth/server-error', 'refresh');
        if ($this->db->query("DELETE FROM berita WHERE id = $id")) {
            $dirname = ROOTPATH . '/public/berita/berita_' . $id;
            array_map('unlink', glob("$dirname/*.*"));
            rmdir($dirname);
            return true;
        } else {
            return false;
        }
    }

    public function countComments($id) #SOLVED
    {
        $query = "SELECT COUNT(id) AS total FROM komentar_berita WHERE berita_id = $id";

        return $this->db->query($query);
    }

    public function getPostComments($id, $limit  = true)
    {
        if ($limit) {
            $query = "SELECT * FROM komentar_berita WHERE berita_id = $id ORDER BY id DESC LIMIT 6";
        } else {
            $query = "SELECT * FROM komentar_berita WHERE berita_id = $id ORDER BY id ASC";
        }
        return $this->db->query($query);
    }

    public function postComments($data)
    {
        if (!isset($data) || empty($data)) redirect('auth/server-error', 'refresh');
        $news_id = $data[0];
        $user_id = $data[1];
        $comment = $data[2];
        $date = get_date(true);

        $query = "INSERT INTO komentar_berita VALUES ('',$news_id,'$date',$user_id,'$comment')";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteComment($id)
    {
        if (!isset($id) || empty($id))  redirect('auth/server-error', 'refresh');

        if ($this->db->query("DELETE FROM komentar_berita WHERE id = $id")) {
            return true;
        } else {
            return false;
        }
    }

    public function check_ip_visit($id, $ip, $date)
    {
        $query = "SELECT * FROM news_visited WHERE news_id = $id AND ip='$ip' AND date(date) ='$date'";
        return $this->db->query($query);
    }

    public function regist_ip_visits($id, $ip, $date)
    {
        $query = "INSERT INTO news_visited VALUES('',$id,'$ip','$date',1)";

        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function push_ip_visits($id, $ip, $date)
    {
        $query = "UPDATE news_visited SET news_id = $id, ip='$ip',date='$date', hits=hits+1 WHERE news_id = $id AND ip='$ip' AND date(date) ='$date'";

        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getVisitedPage($id)
    {
        $query = "SELECT COUNT(id) AS visited, SUM(hits) AS hits FROM news_visited WHERE news_id = $id";
        return $this->db->query($query);
    }

    public function getAllIPVisits()
    {
        $query = "SELECT id,ip,date,hits FROM news_visited ";
        return $this->db->query($query);
    }

    public function getIPVisits($id)
    {
        $query = "SELECT id,ip,date,hits FROM news_visited WHERE news_id = $id";
        return $this->db->query($query);
    }

    public function changeAccessNews($id, $val, $groups = null)
    {
        if (!$groups) {
            $query = "UPDATE berita SET akses = '$val',groups_id=NULL WHERE id = $id";
        } else {
            $groups = preg_replace("/[\s\/.]/", "", array_to_string($groups, 1));
            $query = "UPDATE berita SET akses = '$val',groups_id='$groups' WHERE id = $id";
        }

        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function activate_news($id)
    {
        $status = $this->getNewsById($id)->getRowArray();
        if (!$status || empty($status)) return false;

        $last_data = $this->getNewsById($id)->getRowArray();
        if (!$last_data) return false;

        $active = 1;
        if ($last_data['aktif'] == 1) {
            $active = 0;
        }

        $query = "UPDATE berita SET aktif = '$active' WHERE id = $id";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getBeritaFilter($cari = null, $awal = null, $akhir= null, $limit = 5, $start = 0){
        //  2010-05-28 13:58:08
        $query = $this->db->table('berita')->where('akses','public')->limit($limit);
        if ($start>0) $query->offset(intval($start));
        if (!is_null($cari) && $cari != '') $query->groupStart()->orLike(['judul' => $cari,'thumbnail' => $cari,'konten' => $cari])->groupEnd();
        if (!is_null($akhir) && $akhir != '') $query->where("tanggal_publish BETWEEN '$awal-01-01 00:00:01' AND '$akhir-12-30 23:59:59'");    
        return $query;
    }

    public function getYear(){
        return $this->db->table('berita')->select('MIN(tanggal_publish) as awal, MAX(tanggal_publish) as akhir')->get()->getRow();
    }
}
