<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{

    protected $table = 'auth_groups_users';

    public function getRole($kunci)
    {
        return $this->table('auth_groups_users')->getWhere(['user_id' => $kunci])->getResult();
    }

    public function insertRole($data)
    {
        $this->builder()->insert($data);
    }
}
