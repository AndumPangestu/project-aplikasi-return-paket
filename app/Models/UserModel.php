<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password', 'role'];
    public function getuser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getkaryawan()
    {

        return $this->where(['role' => 0])->findAll();
    }

    public function updateuser($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteuser($id)
    {
        return $this->where('id', $id)->delete();
    }
    public function saveuser($data)
    {
        return $this->insert($data);
    }
}
