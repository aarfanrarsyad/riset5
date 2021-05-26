<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;


class WebserviceModel extends Model
{
    protected $table = "client_app";

    public function getApp($uid = false)
    {

        if ($uid === false) {
            $builder = $this->db
                ->table('client_app');

            return $builder->get();
        } else {
            $builder = $this->db
                ->table('client_app')
                ->where('Uid', $uid);
            return $builder->get();
        }
    }

    public function addApp($data)
    {

        $builder1 = $this->db->table('token_app');
        $builder2 = $this->db->table('token_scope');

        $builder1->insert($data['token_app']);
        $tokenId = $this->db->insertID();
        if ($data['token_scope'] != null)
            foreach ($data['token_scope'] as $key => $value) {
                $data2 = [
                    'id_token' => $tokenId,
                    'id_scope' => $value
                ];

                $builder2->insert($data2);
            }

        $client = [
            'uid' => $data['uid'],
            'nama_app' => $data['nama_app'],
            'deskripsi' => $data['deskripsi'],
            'req_date' => $data['req_date'],
            'id_token' => $tokenId,
        ];

        $query = $this->db
            ->table('client_app')->insert($client);
    }

    public function editApp($id)
    {
        $builder = $this->db
            ->table('client_app')
            ->where('id', $id);
        return $builder->get();
    }



    public function updateApp($data, $id)
    {


        $query = $this->db
            ->table('client_app')
            ->update($data, ['id' => $id]);

        return $query;
    }

    public function deleteApp($id)
    {
        $query = $this->db
            ->table('client_app')
            ->delete(array('id' => $id));

        return $query;
    }

    //----------------------------------------------
    //Token
    public function getToken($id)
    {
        $builder1 = $this->db->table('token_app');
        $builder1->select('token');
        $builder1->where('id', $id);

        return $builder1->get();
    }

    public function getTokenId($uid)
    {
        $builder1 = $this->db->table('client_app');
        $builder1->select('id_token');
        $builder1->where('id', $uid);

        return $builder1->get();
    }

    public function updateToken($token, $id)
    {
        $builder1 = $this->db->table('token_app');
        $data = [
            'token' => $token,
        ];

        $builder1->update($data, ['id' => $id]);
    }


    public function deleteToken($id)
    {
        $query = $this->db
            ->table('token_app')
            ->delete(array('id' => $id));

        return $query;
    }

    //----------------------------------------------
    //User

    public function getEmail($id)
    {
        $builder1 = $this->db->table('users');
        $builder1->select('email');
        $builder1->where('id', $id);

        return $builder1->get();
    }

    //-----------------------------------------------
    //Scope app

    public function getScope()
    {

        $builder = $this->db
            ->table('scope_app');

        return $builder->get();
    }

    public function getScopeApp($id_token)
    {
        $sql = "SELECT token_scope.id_scope, scope_app.scope, scope_app.scope_dev
                FROM token_scope
                JOIN scope_app ON token_scope.id_scope = scope_app.id AND token_scope.id_token=?;";
        return $this->db->query($sql, [$id_token]);
    }

    public function getScopeAppToken($token)
    {
        $sql = "SELECT token_scope.id_scope
                FROM token_app
                JOIN token_scope ON token_app.id = token_scope.id_token AND token_app.token=?;";
        return $this->db->query($sql, [$token]);
    }

    public function updateTokenReq($token)
    {
        $curr_time = new Time('now');

        $dateTime = $curr_time->toDateTimeString();
        $sql = "UPDATE token_app
        SET count_usage = count_usage+1, last_access = ? 
        WHERE token = ?;";

        return $this->db->query($sql, [$dateTime, $token]);
    }
}
