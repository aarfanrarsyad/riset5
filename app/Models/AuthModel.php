<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';

    public function getAll()
    {
        return $this->db->table('auth')->get()->getResultArray();
    }

    public function jumlahUser()
    {
        return $this->db->table('auth')->select('*')->countAllResults();
    }

    public function insertUser($data)
    {
        $this->builder()->insert($data);
    }

    public function getUserByNama($nama)
    {
        return $this->builder()->where('nama', $nama)->get()->getFirstRow('array');
    }

    public function getUserByUsername($username)
    {
        return $this->builder()->where('username', $username)->get()->getFirstRow('array');
    }

    public function getUserByIdAlumni($id)
    {
        return $this->builder()->where('id_alumni', $id)->get()->getFirstRow('array');
    }

    public function getUserById($id)
    {
        return $this->builder()->where('id', $id)->get()->getFirstRow('array');
    }

    public function isLogin($time, $email)
    {
        return $this->builder()->set('login', $time)->where('email', $email)->update();
    }

    public function isLogout($email)
    {
        return $this->builder()->set('login', NULL)->where('email', $email)->update();
    }
}
