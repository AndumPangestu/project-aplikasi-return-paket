<?php

namespace App\Models;

use CodeIgniter\Model;

class SellerModel extends Model
{
    protected $table = 'seller';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'telp'];
    public function getSeller($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function updateSeller($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteSeller($id)
    {
        return $this->where('id', $id)->delete();
    }
    public function saveSeller($data)
    {
        return $this->insert($data);
    }
}
