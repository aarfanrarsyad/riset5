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
    $data = [
        'id' => $user->id,
        'fullname' => $user->fullname,
        'email' => $user->email,
        'nim' => $user->nim,
        'image' => $user->user_image,
    ];

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

# Helper to standardize Pendidikan Terakhir
function standardPendidikanTerakhir($key)
{
    $arr_standar = [
        'Ak. Ilmu Statistik' => 'Akademi Ilmu Statistik',
        'D III Statistika' => 'D-III Statistika',
        'D III STIS' => 'D-III Statistika',
        'D-III STIS' => 'D-III Statistika',
        'D-III AIS' => 'D-III Statistika',
        'D-IV Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV SE' => 'D-IV Statistika Ekonomi',
        'Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'D-IV SK' => 'D-IV Statistika Sosial & Kependudukan',
        'Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'Komputasi Statistik' => 'D-IV Komputasi Statistik',
        'S-1 Adm.Negara' => 'S-1 Administrasi Negara',
        'S-1 Ek. Akuntansi' => 'S-1 Ekonomi Akuntansi',
        'S-1 Ekonomi(Perus)' => 'S-1 Ekonomi Perusahaan',
        'S-1 IKIP (Penddkn)' => 'S-1 IKIP Pendidikan',
        'S-2 Businnes adm.' => 'S-2 Business Administration',
        'S-2 Ekonomi (Manajemen)' => 'S-2 Ekonomi Manajemen',
        'S-2 Engin In Computer Science' => 'S-2 Engineering In Computer Science',
        'S-2 Engin In Indus Engineering' => 'S-2 Engineering In Indus Engineering',
        'S-2 Engin. In Manag.Engin' => 'S-2 Engineering In Manag. Engineering',
        'S-2 Engineering in Mech. Engin' => 'S-2 Engineering in Mech. Engineering',
        'S-2 Lainnya' => 'S-2',
        'S-2 Master' => 'S-2',
        'S-2 Public Healt' => 'S-2 Public Health',
        'S-2 Sains' => 'S-2',
        'S-3 Doktor' => 'S-3',
        'S-3 Of Engenering' => 'S-3 Of Engineering',
    ];
    $standard = $arr_standar[$key];

    if (isset($standard) || $standard != NULL) {
        $value = $standard;
    } else {
        $value = $key;
    }

    return $value;
}

# Helper to standardize Prodi Jurusan
function standardProdiJurusan($key)
{
    $arr_standar = [
        'Ak. Ilmu Statistik' => 'Akademi Ilmu Statistik',
        'Ak.I.Keu.Perbankan' => 'Akademi Ilmu Keuangan Perbankan',
        'Akademi (D III)' => 'Akademi D-III',
        'APP (Ekonomi)' => 'APP Ekonomi',
        'APP (Umum)' => 'APP Umum',
        'D-IV Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV SE' => 'D-IV Statistika Ekonomi',
        'Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'D-IV SK' => 'D-IV Statistika Sosial & Kependudukan',
        'Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'Komputasi Statistik' => 'D-IV Komputasi Statistik',
        'D III Kebidanan' => 'D-III Kebidanan',
        'D III Manajemen Informatika' => 'D-III Manajemen Informatika',
        'D III Statistika' => 'D-III Statistika',
        'D III STIS' => 'D-III Statistika',
        'D-III STIS' => 'D-III Statistika',
        'D-III AIS' => 'D-III Statistika',
        'Diploma I Statistika' => 'D-I Statistika',
        'S-1 Adm.Negara' => 'S-1 Administrasi Negara',
        'S-1 Adm.Niaga' => 'S-1 Administrasi Niaga',
        'S-1 Ek. Akuntansi' => 'S-1 Ekonomi Akuntansi',
        'S-1 Ekonomi(Perus)' => 'S-1 Ekonomi Perusahaan',
        'S-1 IKIP (Penddkn)' => 'S-1 IKIP Pendidikan',
        'S-1 Lainnya' => 'S-1',
        'S-1 Sospol(Adm.Negara' => 'S-1 Sospol Administrasi Negara',
        'S-1 Sospol(Adm.Niaga)' => 'S-1 Sospol Administrasi Niaga',
        'S-2 Businnes adm.' => 'S-2 Business Administration',
        'S-2 Ekonomi (Manajemen)' => 'S-2 Ekonomi Manajemen',
        'S-2 Engin In Computer Science' => 'S-2 Engineering In Computer Science',
        'S-2 Engin In Indus Engineering' => 'S-2 Engineering In Indus Engineering',
        'S-2 Engin. In Manag.Engin' => 'S-2 Engineering In Manag. Engineering',
        'S-2 Engineering in Mech. Engin' => 'S-2 Engineering in Mech. Engineering',
        'S-2 Lainnya' => 'S-2',
        'S-2 Master' => 'S-2',
        'S-2 Public Healt' => 'S-2 Public Health',
        'S-2 Sains' => 'S-2',
        'S-3 Doktor' => 'S-3',
        'S.D.' => 'SD',
        'S.M.A' => 'SMA',
        'S.M.A Pasti' => 'SMA',
        'S.M.A Sosial' => 'SMA IPS',
        'S.M.E.A Tata Buku' => 'SMEA Tata Buku',
        'S.M.E.P' => 'SMEP',
        'S.M.P' => 'SMP',
        'S.T.M' => 'STM',
        'S.T.M Bangunan' => 'STM Bangunan',
        'S.T.M Mesin' => 'STM',
        'S.T.M. Listrik' => 'STM Listrik',
        'SMA A1 (Fisik)' => 'SMA IPA',
        'SMA A2 (Biologi)' => 'SMA IPA',
        'SMA A3 (Sosial)' => 'SMA IPS',
        'SMK Lainnya' => 'SMK',
        'SMU IPA' => 'SMA IPA',
        'SMU IPS' => 'SMA IPS'
    ];
    $standard = $arr_standar[$key];

    if (isset($standard) || $standard != NULL) {
        $value = $standard;
    } else {
        $value = $key;
    }

    return $value;
}

# Helper to standardize No Hp
function standardNoHp($key)
{
    $provider = array('811', '812', '813', '852', '853', '821', '822', '851', '823', '814', '815', '816', '855', '856', '857', '858', '817', '818', '819', '859', '877', '878', '831', '832', '833', '838', '828', '881', '882', '884', '886', '885', '883', '887', '888', '889', '895', '896', '897', '899', '898');
    $ss = 0;
    // remove strip
    $number = str_replace('-', '', $key);
    $number = str_replace(' ', '', $key);
    // standarkan 62
    $country_code = '62';
    if (substr($number, 0, strlen($country_code)) == $country_code) {
        $number = substr($number, strlen($country_code));
        $number = "0" . $number;
    }
    // Loop to check provider
    foreach ($provider as $p) {
        if (substr($number, 1, 3) === $p) {
            $ss = $ss + 1;
        } else {
            $ss = $ss + 0;
        }
    }
    if ($ss == 1) {
        $value = $number;
    } elseif ($ss == 0) {
        $value = "";
    }
    return $value;
}

# Helper to standardize No Telepon
function standardNoTelepon($key)
{
    $area3 = ['627', '629', '641', '642', '643', '644', '645', '646', '650', '651', '652', '653', '654', '655', '656', '657', '658', '659', '621', '622', '623', '624', '626', '628', '630', '631', '632', '633', '634', '636', '639', '751', '752', '753', '754', '755', '756', '757', '760', '761', '762', '763', '764', '765', '766', '767', '768', '769', '770', '771', '772', '773', '776', '777', '778', '779', '741', '742', '743', '744', '745', '746', '747', '748', '702', '711', '712', '713', '714', '730', '731', '733', '734', '735', '715', '716', '717', '718', '719', '732', '736', '737', '738', '739', '721', '723', '724', '725', '726', '727', '728', '729', '252', '253', '254', '257', '231', '232', '233', '234', '251', '260', '261', '262', '263', '264', '265', '266', '267', '271', '272', '273', '274', '275', '276', '280', '281', '282', '283', '284', '285', '286', '287', '289', '291', '292', '293', '294', '295', '296', '297', '298', '299', '356', '321', '322', '323', '324', '325', '327', '328', '331', '332', '333', '334', '335', '338', '341', '342', '343', '351', '352', '353', '354', '355', '357', '358', '361', '362', '363', '365', '366', '368', '370', '371', '372', '373', '374', '376', '380', '381', '382', '383', '384', '385', '386', '387', '388', '389', '561', '562', '563', '564', '565', '567', '568', '534', '513', '522', '525', '526', '528', '531', '532', '536', '537', '538', '539', '511', '512', '517', '518', '527', '542', '545', '548', '549', '554', '551', '552', '553', '556', '430', '431', '432', '434', '438', '435', '443', '445', '450', '451', '452', '453', '454', '457', '458', '461', '462', '463', '464', '465', '455', '426', '428', '410', '411', '413', '414', '417', '418', '419', '420', '421', '423', '427', '472', '473', '474', '475', '481', '484', '485', '401', '402', '403', '404', '405', '408', '910', '911', '913', '914', '915', '916', '917', '918', '921', '922', '924', '927', '929', '931', '901', '902', '951', '952', '955', '956', '957', '966', '967', '969', '971', '975', '980', '981', '983', '984', '985', '986'];
    $area2 = ['61', '21', '22', '24', '31'];
    $s2 = 0;
    $s3 = 0;
    // remove strip, space, kurung
    $number = str_replace('-', '', $key);
    $number = str_replace(' ', '', $number);
    $number = str_replace('(', '', $number);
    $number = str_replace(')', '', $number);
    foreach ($area3 as $a3) {
        if (substr($number, 1, 3) === $a3) {
            $s3 = $s3 + 1;
        } else {
            $s3 = $s3 + 0;
        }
    }
    if ($s3 == 1) {
        $area = substr($number, 0, 4);
        $number = substr($number, 4);
        $value = $area . "-" . $number;
    } elseif ($s3 == 0) {
        foreach ($area2 as $a2) {
            if (substr($number, 1, 2) === $a2) {
                $s2 = $s2 + 1;
            } else {
                $s2 = $s2 + 0;
            }
        }
        if ($s2 == 1) {
            $area = substr($number, 0, 3);
            $number = substr($number, 3);
            $value = $area . "-" . $number;
        } elseif ($s2 == 0) {
            $value = "";
        }
    }
    return $value;
}

# Helper to standardize Instansi Pendidikan
function standardInstansiPendidikan($key)
{
    $key = str_replace('(', '', $key);
    $key = str_replace(')', '', $key);
    $ak = 'Ak.';
    $univ = 'Univ.';
    $stia = "STIA-";
    $stia1 = "STIA -";
    if (substr($key, 0, strlen($ak)) == $ak) {
        $key = substr($key, strlen($ak));
        $key = "Akademi" . $key;
    } else if (substr($key, 0, strlen($univ)) == $univ) {
        $key = substr($key, strlen($univ));
        $key = "Universitas" . $key;
    } else if (substr($key, 0, strlen($stia)) == $stia) {
        $key = substr($key, strlen($stia));
        $key = "STIA " . $key;
    } else if (substr($key, 0, strlen($stia1)) == $stia1) {
        $key = substr($key, strlen($stia1));
        $key = "STIA" . $key;
    }
    return $key;
}
