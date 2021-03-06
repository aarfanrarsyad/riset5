<?php

use Config\Services;

# Helper untuk mengubah format date
function format_date($date)
{
    $array_date = explode(' ', $date);
    $time = $array_date[1];
    $date = explode('-', $array_date[0]);

    return $date[2] . '-' . $date[1] . '-' . $date[0] . ' ' .  $time;
}

# Helper untuk mengubah format date
function get_date($hour = true)
{
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d H:i:s');
    if (!$hour) $date = date('Y-m-d');
    return $date;
}

function date_formats($date, $is_time = null)
{
    if (!isset($date)) return;
    $days = [
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    ];

    $months = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];
    $component_date = explode(' ', $date);
    $date = explode('-', $component_date[0]);
    $time = $component_date[1];

    $tgl_indo = $date[2] . ' ' . $months[(int)$date[1] - 1] . ' ' . $date[0];

    $num = date('N', strtotime($component_date[1]));
    if ($is_time !== null) {
        return $days[$num - 1] . ', ' . $tgl_indo . ' ' . $time;
    } else {
        return $days[$num - 1] . ', ' . $tgl_indo;
    }
}


function date_short($arr)
{
    function _date_sort($a, $b)
    {
        return strtotime($a) - strtotime($b);
    }
    usort($arr, "_date_sort");
    return $arr;
}


function in_array_help($keyword, $array, $validation = false)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($validation !== false) {
            if ($array[$i] === $keyword) {
                return $i;
            }
        } else {
            if ($array[$i] == $keyword) {
                return $i;
            }
        }
    }
    return false;
}

# Helper search array tanpa return
function search_array_2($array, $keyword, $search)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i][$keyword] == $search) {
            return $i;
        }
    }
    return false;
}

# Helper search array dengan return
function search_array_return($array, $keyword, $search, $return)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i][$keyword] == $search) {
            return $array[$i][$return];
        }
    }
    return false;
}

# Helper to convert array to string
function array_to_string($array = [], $dim, $keyword = null)
{
    $str = '';
    if ($dim === 1) {
        for ($i = 0; $i < count($array); $i++) {
            if ($i === count($array) - 1) {
                $str = $str . $array[$i] . '.';
            } else {
                $str = $str . $array[$i] . ', ';
            }
        }
        return $str;
    } else if ($dim === 2) {
        if (is_null($keyword)) {
            return false;
        }
        for ($i = 0; $i < count($array); $i++) {
            if ($i === count($array) - 1) {
                $str = $str . $array[$i][$keyword] . '.';
            } else {
                $str = $str . $array[$i][$keyword] . ', ';
            }
        }
        return $str;
    } else {
        return false;
    }
}

# Helper to get data user
function userdata()
{
    $authenticate = Services::authentication();
    $init = model('App\Models\admin_model');

    if (!$authenticate->check()) {
        return false;
    }

    $user = $authenticate->user();

    $default = ["Lk-icon.svg", "Pr-icon.svg"];

    $data = [
        'id' => $user->id,
        'fullname' => $user->fullname,
        'email' => $user->email,
        'nim' => $user->nim,
        'image' => $user->user_image,
    ];

    if ($user->id_alumni) {
        $alumni = $init->getAlumniById($user->id_alumni)->getRowArray();

        $alumni['foto_profil'] = substr($alumni['foto_profil'], 16, strlen($alumni['foto_profil']));
        $check_img = in_array($alumni['foto_profil'], $default);
        $tmp =  $check_img !== FALSE ? "/img/components/icon/" . $alumni['foto_profil'] :  "/img/components/user/" . $alumni['foto_profil'];
        $data['image'] = $tmp;
    }

    return $data;
}

# Helper to get role user
function role_user()
{
    $authenticate = Services::authentication();
    $init = model('App\Models\admin_model');

    if (!$authenticate->check()) {
        if (!session()->has('id_user')) return [];
        $user_id = session()->get('id_user');
    } else {
        $user_id = $authenticate->id();
    }

    $groups = $init->getUserGroupsByUserId($user_id)->getResultArray();
    $data = [];
    foreach ($groups as $group) {
        if (search_array_2($data, 'group_id', $group['group_id']) === false) {
            $data[] = $group;
        }
    }
    return $data;
}

# Helper to get permission Access
function hasAccessPermission($access)
{
    if (empty($access))  return;

    $uri = service('uri');
    $init = model('App\Models\admin_model');

    $groups = role_user();
    $uri_segment = ucwords(str_replace("-", " ", trim($uri->getSegment(2))));

    $resource = $init->getResourceByURI($uri_segment)->getRowArray();

    if (empty($resource)) {
        return [false, '404'];
    } else {

        $access_resources = [];
        for ($i = 0; $i < count($groups); $i++) {
            $access_resources = array_merge($access_resources, $init->groups_access($groups[$i]['group_id'], $resource['submenu_id'])->getResultArray());
        }

        for ($i = 0; $i < count($access); $i++) {
            if (search_array_2($access_resources, 'crud_id', $access[$i]) === false) {
                return [false, '403'];
            }
        }
        return true;
    }
    return true;
}

# Helper to push activity log
function activity_log($access, $scope, $desc, $status)
{
    $init = model('App\Models\admin_model');
    $date =  get_date();

    $authenticate = Services::authentication();

    if (!$authenticate->check()) {
        return false;
    }

    $email = $authenticate->user()->email;

    if (empty(role_user())) {
        return false;
    }

    $groups = role_user();

    $name_group = '';

    for ($i = 0; $i < count($groups); $i++) {
        if ($i === count($groups) - 1) {
            $name_group = $name_group . $groups[$i]['name'];
        } else {
            $name_group = $name_group . $groups[$i]['name'] . ',';
        }
    }

    $insert_activity =  $init->insert_activity([$date, $email, $name_group, $access, $scope, $desc, $status]);
    if ($insert_activity) {
        return true;
    } else {
        return false;
    }
}

# Helper to generate strong password
function generate_strong_password($length = 9, $add_dashes = false, $available_sets = 'luds')
{

    $sets = [];
    if (strpos($available_sets, 'l') !== false)
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if (strpos($available_sets, 'u') !== false)
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if (strpos($available_sets, 'd') !== false)
        $sets[] = '23456789';
    if (strpos($available_sets, 's') !== false)
        $sets[] = '!@#$%&*?';

    $all = '';
    $password = '';
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }

    $all = str_split($all);
    for ($i = 0; $i < $length - count($sets); $i++)
        $password .= $all[array_rand($all)];

    $password = str_shuffle($password);

    if (!$add_dashes)
        return $password;

    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while (strlen($password) > $dash_len) {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}

function show_errors($errors)
{
    if (empty($errors)) return;

    $errors = array_values($errors);
    $html = '<div class="alert alert-light alert-dismissible fade show text-sm" role="alert"><strong>Something went Wrong!</strong><br><ul>';

    for ($i = 0; $i < count($errors); $i++) {
        $html .= '<li>' . $errors[$i] . '</li>';
    }
    return $html .= '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

function time_for_comment($time)
{
    if (is_null($time)) return;
    $current = explode(' ', get_date(true));
    $current_date = explode('-', $current[0]);
    $current_time = explode(':', $current[1]);

    $comment = explode(' ', $time);
    $comment_date = explode('-', $comment[0]);
    $comment_time = explode(':', $comment[1]);

    if ($current_date[2] == $comment_date[2]) {
        if ($current_time[0] == $comment_time[0]) {
            if ($current_time[1] == $comment_time[1]) {
                $second = (int)$current_time[2] - (int)$comment_time[2];
                if ($second === 0) {
                    return '<span>Baru saja</span>';
                } else {
                    return '<span>' . $second . ' detik yang lalu</span>';
                }
            } else {
                $minute = (int)$current_time[1] - (int)$comment_time[1];
                return '<span title="Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB">' . abs($minute) . ' menit yang lalu</span>';
            }
        } else {
            $hour = (int)$current_time[0] - (int)$comment_time[0];
            return '<span title="Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB">' . abs($hour) . ' jam yang lalu</span>';
        }
    } else if ($current_date[1] == $comment_date[1]) {
        if ($current_date[2] > $comment_date[2]) {
            $days = (int)$current_date[2] - (int)$comment_date[2];
            return '<span title="Tanggal ' . $comment_date[2] . '-' . $comment_date[1] . '-' . $comment_date[0] . ' Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB' . '">' . $days . ' hari yang lalu</span>';
        } else {
            return $comment_date[2] . '-' . $comment_date[1] . '-' . $comment_date[0] . ' Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB';
        }
    } else if ($current_date[0] == $comment_date[0]) {
        if ($current_date[1] > $comment_date[1]) {
            $month = (int)$current_date[1] - (int)$comment_date[1];
            return '<span title="Tanggal ' . $comment_date[2] . '-' . $comment_date[1] . '-' . $comment_date[0] . ' Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB' . '">' . $month . ' bulan yang lalu</span>';
        } else {
            return $comment_date[2] . '-' . $comment_date[1] . '-' . $comment_date[0] . ' Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB';
        }
    } else {
        if ($current_date[0] > $comment_date[0]) {
            $year = (int)$current_date[0] - (int)$comment_date[0];
            return '<span title="' . $comment_date[2] . '-' . $comment_date[1] . '-' . $comment_date[0] . ' Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB' . '">' . $year . ' tahun yang lalu</span>';
        } else {
            return $comment_date[2] . '-' . $comment_date[1] . '-' . $comment_date[0] . ' Pukul ' . $comment_time[0] . '.' . $comment_time[1] . ' WIB';
        }
    }
}

function sortByOrder(&$array, $key, $asc = true)
{
    $sorter = array();
    $ret = array();

    if (!$asc) {
        $return = array();
        foreach ($array as $ky => $row) {
            $return[$ky] = $row[$key];
        }
        array_multisort($return, SORT_DESC, $array);
    } else {
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii] = $va[$key];
        }
        asort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii] = $array[$ii];
        }
        $array = $ret;
    }
}

function record_visits($id_news)
{
    $init    = model('App\Models\BeritaModel');
    $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
    $tanggal = get_date(false); // Mendapatkan tanggal sekarang]]['

    // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
    $ip_visit = $init->check_ip_visit($id_news, $ip, $tanggal)->getResultArray();
    if (count($ip_visit) == 0) {
        $init->regist_ip_visits($id_news, $ip, $tanggal);
    } else {
        $init->push_ip_visits($id_news, $ip, $tanggal);
    }
}

function is_connected()
{
    $connected = @fsockopen("www.google.com", 80);
    //website, port  (try 80 or 443)
    if ($connected) {
        $is_conn = true; //action when connected
        fclose($connected);
    } else {
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}

function getRGBColor($num)
{
    $hash = md5('color' . $num); // modify 'color' to get a different palette
    return array(
        hexdec(substr($hash, 0, 2)), // r
        hexdec(substr($hash, 2, 2)), // g
        hexdec(substr($hash, 4, 2))
    ); //b
}

function get_alumni_by_nim($nim = null, $select = 'id_alumni')
{
    $db = \Config\Database::connect();
    $id = $db->table('pendidikan')->join('pendidikan_tinggi', 'pendidikan_tinggi.id_pendidikan = pendidikan.id_pendidikan')
        ->getWhere(['nim' => $nim])->getRow()->id_alumni;

    if (!is_null($nim)) {
        $return = $db->table('alumni')->select($select)->getWhere(['id_alumni' => $id]);
    } else {
        $return = $db->table('alumni')->select($select)->get();
    }

    if (count(explode(',', $select)) == 1 && $select !== '*') {
        return $return->getRowArray()[$select];
    } else {
        return $return->getRow();
    }
}

function get_nim_by_id_alumni($id = null, $select = 'nim')
{
    $db = \Config\Database::connect();
    if (!is_null($id)) {
        $query = "SELECT $select FROM pendidikan_tinggi AS A JOIN pendidikan AS B
        ON A.id_pendidikan=B.id_pendidikan JOIN alumni AS C 
        ON B.id_alumni = C.id_alumni WHERE C.id_alumni = $id ORDER BY A.nim DESC";
        $result = $db->query($query)->getRow()->nim;
    } else {
        $query = "SELECT $select FROM pendidikan_tinggi AS A JOIN pendidikan AS B
        ON A.id_pendidikan=B.id_pendidikan JOIN alumni AS C 
        ON B.id_alumni = C.id_alumni WHERE C.id_alumni = 1 ORDER BY A.nim DESC";
        $result = $db->query($query)->getRow()->nim;
    }
    return $result;
}


function get_by_id($id = null, $select = '*', $table = 'pendidikan', $array = false)
{
    $db = \Config\Database::connect();

    switch ($table) {
        case 'pendidikan':
            $return = $db->table('pendidikan')->select($select)->where('angkatan >', 0)
                ->join('pendidikan_tinggi', 'pendidikan_tinggi.id_pendidikan = pendidikan.id_pendidikan');
            break;
        case 'tempat_kerja':
            $return = $db->table('tempat_kerja')->select($select)
                ->join('alumni_tempat_kerja', 'tempat_kerja.id_tempat_kerja = alumni_tempat_kerja.id_tempat_kerja');
            break;
        default:
            $return = $db->table($table)->select($select);
            break;
    }

    $GLOBALS['select'] = $select;
    if (count(explode(',', $select)) == 1 && $select !== '*') {
        $return = array_map(function ($val) {
            return $val[$GLOBALS['select']];
        }, $return->getWhere(['id_alumni' => $id])->getResultArray());
    } else {
        $return = $return->getWhere(['id_alumni' => $id])->getResultArray();
    }
    $return = (!$array && isset($return[0])) ? $return[0] : $return;

    return $return;
}
