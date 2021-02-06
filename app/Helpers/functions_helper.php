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
function get_date()
{
    date_default_timezone_set('Asia/Jakarta');
    $date =  date('Y-m-d H:i:s');
    return $date;
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
