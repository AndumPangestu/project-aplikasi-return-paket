<?php

namespace App\Models;

use CodeIgniter\Model;

class TtdModel extends Model
{
    protected $table = 'ttd';
    protected $primaryKey = 'id_ttd';
    protected $allowedFields = ['id_ttd', 'image_ttd', 'nama_penerima', 'nama_user_input', 'id_paket', 'date_ttd'];

    public function getttd($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_ttd' => $id])->first();
    }

    public function getttdbyidpaket($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_paket' => $id])->first();
    }
    public function updatettd($id, $data)
    {
        return $this->update($id, $data);
    }
    public function updatettdbyid($id, $data)
    {
        return $this->where('id_paket', $id)
            ->set($data)
            ->update();
    }
    public function deletettd($id)
    {
        return $this->where('id_ttd', $id)->delete();
    }

    public function deletettdbyidpaket($id)
    {
        return $this->where('id_paket', $id)->delete();
    }

    public function savettd($data)
    {
        return $this->insert($data);
    }
}
