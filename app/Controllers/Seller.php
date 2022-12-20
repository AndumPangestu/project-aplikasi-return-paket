<?php

namespace App\Controllers;

use App\Models\sellerModel;

class Seller extends BaseController
{
    protected $sellerModel;
    public function __construct()
    {
        $this->sellerModel = new sellerModel();
    }
    public function index()
    {
        $seller = $this->sellerModel->getseller();
        $data = [
            'title' => 'Seller',
            'judul' => 'Daftar Seller',
            'seller' => $seller
        ];
        return view('seller/view_seller', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Seller',
            'judul' => 'Tambah Seller'
        ];
        return view('seller/view_create_seller', $data);
    }
    public function save($id = null)
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
        ];
        if ($id == null) {
            $this->sellerModel->saveseller($data);
        } else {
            $this->sellerModel->updateseller($id, $data);
        }
        return redirect()->to('/seller');
    }
    public function delete($id)
    {
        $this->sellerModel->deleteseller($id);
        return redirect()->to('/seller');
    }
    public function update($id)
    {
        $data = [
            'judul' => 'Form Update Data',
            'title' => 'Seller',
            'seller' => $this->sellerModel->getseller($id),
        ];
        return view('seller/view_update_seller', $data);
    }
}
