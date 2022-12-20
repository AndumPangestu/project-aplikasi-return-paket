<?php

namespace App\Controllers;

use App\Models\TtdModel;
use App\Models\PaketModel;

class Ttd extends BaseController
{
    protected $ttdModel;
    public function __construct()
    {
        $this->ttdModel = new TtdModel();
        $this->paketModel = new PaketModel();
    }
    public function index()
    {

        $ttd = $this->ttdModel->getttd();
        $data = [
            'title' => 'ttd',
            'judul' => 'Daftar Tanda Terima Paket',
            'ttd' => $ttd
        ];
        return view('ttd/view_ttd', $data);
    }

    public function selectpaket()
    {
        $id = $this->request->getVar('cari');
        if ($id == null) {
            $paket = $this->paketModel->getselectedpaket('dikirim', 0);
        } else {
            $paket = $this->paketModel->getselectedpaket('nama_seller', $id);

            if ($paket == null) {
                $paket = $this->paketModel->getselectedpaket('resi', $id);
            }
        }
        $data = [
            'title' => 'ttd',
            'judul' => 'Pilih Paket Yang akan diambil',
            'paket' => $paket
        ];
        return view('ttd/view_select_paket', $data);
    }

    public function create()
    {
        if (!empty($this->request->getVar('paketselected'))) {
            $datapaketselected['paketselected'] = $this->request->getVar('paketselected');
        } else {
            return redirect()->to('/selectpaket');
        }

        $data = [
            'title' => 'ttd',
            'judul' => 'Masukan Data Tanda Terima Paket',
            'paket' => $datapaketselected['paketselected']
        ];
        return view('ttd/view_create_ttd', $data);
    }
    public function save($id = null)
    {

        if ($id != null) {

            $old_image = $this->request->getVar('old_image');
            unlink("fotopenerima/" . $old_image);
        }


        $img = $this->request->getVar('image');
        $folderPath = "fotopenerima/";

        $fetch_imgParts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $fetch_imgParts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($fetch_imgParts[1]);
        $img_name = uniqid() . '.png';

        $file = $folderPath . $img_name;
        file_put_contents($file, $image_base64);

        if (!empty($this->request->getVar('paketselected'))) {
            $datapaketselected['paketselected'] = $this->request->getVar('paketselected');
            foreach ($datapaketselected['paketselected'] as $paket) {
                $data = [
                    'nama_penerima' => $this->request->getVar('nama_penerima'),
                    'nama_user_input' => $this->request->getVar('nama_user_input'),
                    'image_ttd' => $img_name,
                    'id_paket' => $paket,
                    'date_ttd' => $this->request->getVar('date'),
                ];
                if ($id == null) {
                    $this->ttdModel->savettd($data);
                } else {
                    $this->ttdModel->updatettd($id, $data);
                }

                $this->paketModel->updatepaket($paket, ['dikirim' => 1]);
            }
        }
        return redirect()->to('/ttd');
    }
    public function delete($id)
    {
        $ttd = $this->ttdModel->getttd($id);
        $this->paketModel->updatepaket($ttd['id_paket'], ['dikirim' => 0]);
        $this->ttdModel->deletettd($id);
        return redirect()->to('/ttd');
    }
    public function update($id)
    {
        $data = [
            'judul' => 'Edit ttd',
            'title' => 'Form Update Data Tanda Terima Paket',
            'ttd' => $this->ttdModel->getttd($id),
        ];
        return view('ttd/view_update_ttd', $data);
    }
}
