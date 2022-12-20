<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'resi', 'telp', 'nama_seller', 'image_paket', 'date_paket', 'nama_user', 'dikirim', 'sendsms'];
    public function getPaket($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getselectedpaket($column, $value)
    {
        return $this->where([$column => $value, 'dikirim' => 0])->findAll();;
    }

    public function selectpaket($column, $value)
    {
        return $this->where([$column => $value])->findAll();;
    }

    public function updatePaket($id, $data)
    {
        return $this->update($id, $data);
    }


    public function deletePaket($id)
    {
        return $this->where('id', $id)->delete();
    }
    public function savePaket($data)
    {
        return $this->insert($data);
    }

    public function getpaketjointtd($id)
    {
        $query =  $this->db->table('paket')
            ->join('ttd', 'paket.id = ttd.id_paket')
            ->where('paket.id', $id)
            ->get();

        return $query->getResult();;
    }
}
