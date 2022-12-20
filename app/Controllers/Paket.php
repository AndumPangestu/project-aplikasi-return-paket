<?php

namespace App\Controllers;

use App\Models\paketModel;
use App\Models\sellerModel;
use App\Models\TtdModel;

class Paket extends BaseController
{
    protected $paketModel;
    public function __construct()
    {
        $this->paketModel = new paketModel();
        $this->sellerModel = new sellerModel();
        $this->ttdModel = new TtdModel();
    }
    public function index()
    {
        $paket = $this->paketModel->getpaket();
        $data = [
            'title' => 'Paket',
            'judul' => 'Daftar Paket Return',
            'paket' => $paket
        ];
        return view('paket/view_paket', $data);
    }

    public function detail($id)
    {
        $ttd = $this->ttdModel->getttdbyidpaket($id);
        if (!empty($ttd)) {
            $temp = $this->paketModel->getpaketjointtd($id);
            $temp = $temp[0];

            $paket['id'] = $temp->id;
            $paket['id_ttd'] = $temp->id_ttd;
            $paket['resi'] = $temp->resi;
            $paket['telp'] = $temp->telp;
            $paket['nama_seller'] = $temp->nama_seller;
            $paket['image_paket'] = $temp->image_paket;
            $paket['date_paket'] = $temp->date_paket;
            $paket['nama_user'] = $temp->nama_user;
            $paket['nama_user_input'] = $temp->nama_user_input;
            $paket['dikirim'] = $temp->dikirim;
            $paket['date_ttd'] = $temp->date_ttd;
            $paket['image_ttd'] = $temp->image_ttd;
            $paket['nama_penerima'] = $temp->nama_penerima;
            $paket['sendsms'] = $temp->sendsms;
        } else {
            $paket = $this->paketModel->getpaket($id);
        }
        $data = [
            'title' => 'Paket',
            'judul' => 'Detail Paket Return',
            'paket' => $paket
        ];
        return view('paket/view_detail_paket', $data);
    }



    public function create()
    {
        $seller = $this->sellerModel->getseller();
        $data = [
            'title' => 'Paket',
            'judul' => 'Tambah Paket Return',
            'seller' => $seller
        ];
        return view('paket/view_create_paket', $data);
    }
    public function save($id = null)
    {
        if ($id != null) {

            $old_image = $this->request->getVar('old_image_paket');
            unlink("fotopaket/" . $old_image);
            $dikirim = $this->request->getVar('dikirim');
        } else {
            $dikirim = 0;
        }


        $img = $this->request->getVar('image');
        $folderPath = "fotopaket/";

        $fetch_imgParts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $fetch_imgParts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($fetch_imgParts[1]);
        $img_name = uniqid() . '.png';

        $file = $folderPath . $img_name;
        file_put_contents($file, $image_base64);



        for ($i = 0; $i < $this->request->getVar('jumlah_resi'); $i++) {

            $resi = 'resi' . $i;

            $data = [
                'resi' => $this->request->getVar($resi),
                'telp' => $this->request->getVar('telp'),
                'nama_seller' => $this->request->getVar('nama_seller'),
                'image_paket' => $img_name,
                'date_paket' => $this->request->getVar('date'),
                'nama_user' => $this->request->getVar('nama_user'),
                'dikirim' => $dikirim,
                'sendsms' => 0
            ];

            $this->paketModel->savepaket($data);
        }


        return redirect()->to('/paket');
    }


    public function selectpaket()
    {
        $id = $this->request->getVar('cari');
        if ($id == null) {
            $paket = $this->paketModel->getPaket();
        } else {
            $paket = $this->paketModel->selectpaket('nama_seller', $id);

            if ($paket == null) {
                $paket = $this->paketModel->selectpaket('resi', $id);
            }
        }
        $data = [
            'title' => 'Paket',
            'judul' => 'Daftar Paket Return',
            'paket' => $paket
        ];
        return view('paket/view_paket', $data);
    }

    public function updatedata($id)
    {

        $old_image = $this->request->getVar('old_image_paket');

        $img = $this->request->getVar('image_paket');
        $img_name = null;
        $dikirim = $this->request->getVar('dikirim');

        if ($old_image == $img) {

            $img_name = $old_image;
        } else {

            unlink("fotopaket/" . $old_image);
            $folderPath = "fotopaket/";

            $fetch_imgParts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $fetch_imgParts[0]);
            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($fetch_imgParts[1]);
            $img_name = uniqid() . '.png';

            $file = $folderPath . $img_name;
            file_put_contents($file, $image_base64);
        }

        $data = [
            'resi' => $this->request->getVar('resi'),
            'telp' => $this->request->getVar('telp'),
            'nama_seller' => $this->request->getVar('nama_seller'),
            'image_paket' => $img_name,
            'nama_user' => $this->request->getVar('nama_user'),
            'dikirim' => $dikirim,
        ];
        $this->paketModel->updatepaket($id, $data);




        if ($dikirim == 1) {


            $old_image = $this->request->getVar('old_image_ttd');


            $img = $this->request->getVar('image_ttd');
            $img_name = null;

            if ($old_image == $img) {

                $img_name = $old_image;
            } else {

                unlink("fotopenerima/" . $old_image);


                $folderPath = "fotopenerima/";

                $fetch_imgParts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $fetch_imgParts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($fetch_imgParts[1]);
                $img_name = uniqid() . '.png';

                $file = $folderPath . $img_name;
                file_put_contents($file, $image_base64);
            }

            $data = [
                'nama_penerima' => $this->request->getVar('nama_penerima'),
                'nama_user_input' => $this->request->getVar('nama_user_input'),
                'image_ttd' => $img_name,
            ];

            $this->ttdModel->updatettdbyid($id, $data);
        }



        return redirect()->to('/paket');
    }

    public function delete($id = null)
    {
        $this->ttdModel->deletettdbyidpaket($id);
        $this->paketModel->deletepaket($id);
        return redirect()->to('/paket');
    }
    public function update($id)
    {

        $ttd = $this->ttdModel->getttdbyidpaket($id);
        if (!empty($ttd)) {
            $temp = $this->paketModel->getpaketjointtd($id);
            $temp = $temp[0];

            $paket['id'] = $temp->id;
            $paket['id_ttd'] = $temp->id_ttd;
            $paket['resi'] = $temp->resi;
            $paket['telp'] = $temp->telp;
            $paket['nama_seller'] = $temp->nama_seller;
            $paket['image_paket'] = $temp->image_paket;
            $paket['date_paket'] = $temp->date_paket;
            $paket['nama_user'] = $temp->nama_user;
            $paket['nama_user_input'] = $temp->nama_user_input;
            $paket['dikirim'] = $temp->dikirim;
            $paket['date_ttd'] = $temp->date_ttd;
            $paket['image_ttd'] = $temp->image_ttd;
            $paket['nama_penerima'] = $temp->nama_penerima;
            $paket['sendsms'] = $temp->sendsms;
        } else {
            $paket = $this->paketModel->getpaket($id);
        }
        $data = [

            'title' => 'Paket',
            'judul' => 'Edit Paket Return',
            'paket' => $paket,
        ];
        return view('paket/view_update_paket', $data);
    }


    public function sms($id)
    {
        $data = [
            'judul' => 'Form Kirim Pesan SMS',
            'title' => 'paket',
            'paket' => $this->paketModel->getpaket($id),
        ];
        return view('paket/view_sendsms', $data);
    }



    public function sendsms($id)
    {
        $paket = $this->paketModel->getpaket($id);

        $to = $paket['telp'];
        $msg = $this->request->getVar('pesan');;

        //init SMS gateway, look at android SMS gateway
        $idmesin = "your ID Mesin";
        $pin = "your PIN";


        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        if ($output == 'success') {

            $this->paketModel->updatepaket($id, ['sendsms' => ($paket['sendsms'] + 1)]);
        }

        $path = '/paket/detail/' . $paket['id'];
        return redirect()->to($path);
    }
}
