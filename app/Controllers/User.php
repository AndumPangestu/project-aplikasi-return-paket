<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $user = $this->userModel->getkaryawan();
        $data = [
            'title' => 'karyawan',
            'judul' => 'Daftar Karyawan',
            'user' => $user
        ];
        return view('user/view_karyawan', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'karyawan',
            'judul' => 'Tambah karyawan'
        ];
        return view('user/view_create_karyawan', $data);
    }
    public function save($id = null)
    {
        helper(['form']);



        $rules = [
            'username'      => 'required|min_length[2]|max_length[150]|is_unique[user.username]',
            'password'      => 'required|min_length[3]|max_length[150]',
            'confirmpassword' => 'matches[password]'
        ];


        if ($this->validate($rules)) {

            $data = [
                'username'     => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getVar('role')

            ];

            $this->userModel->saveuser($data);

            return redirect()->to('/karyawan');
        } else {
            $data = [
                'title' => 'karyawan',
                'judul' => 'Tambah Akun Karyawan',
                'validation' => $this->validator
            ];

            echo view('user/view_create_karyawan', $data);
        }
    }


    public function updateuser($id = null)
    {
        helper(['form']);

        if ($this->request->getVar('updatepassword') == 0) {

            $rules = [
                'username'      => 'required|min_length[2]|max_length[150]',
            ];

            $data = [
                'username'     => $this->request->getVar('username'),
                'role' => $this->request->getVar('role')

            ];
        } else {

            $rules = [
                'username'      => 'required|min_length[2]|max_length[150]',
                'password'      => 'required|min_length[3]|max_length[150]',
                'confirmpassword' => 'matches[password]'
            ];

            $data = [
                'username'     => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getVar('role')

            ];
        }

        if ($this->validate($rules)) {



            $this->userModel->updateuser($id, $data);
            $user = new UserModel();
            $data = $user->where('id', $id)->first();
            $ses_data = [
                'id' => $data['id'],
                'username' => $data['username'],
                'role' => $data['role'],
                'login' => TRUE
            ];
            $session = session();

            $session->set($ses_data);

            $path = '/user/profile/' . session()->get('id');

            return redirect()->to($path);
        } else {
            $data = [
                'title' => 'karyawan',
                'judul' => 'Tambah Akun Karyawan',
                'validation' => $this->validator
            ];

            echo view('user/view_create_karyawan', $data);
        }
    }


    public function delete($id)
    {
        $this->userModel->deleteuser($id);
        return redirect()->to('/user');
    }
    public function update($id)
    {
        $data = [
            'judul' => 'Edit Profile User',
            'title' => 'Form Update Data user',
            'user' => $this->userModel->getuser($id),
        ];
        return view('user/view_update_user', $data);
    }

    public function profile($id)
    {
        $data = [
            'judul' => 'Profile user',
            'title' => 'Profile User',
            'user' => $this->userModel->getuser($id),
        ];
        return view('user/view_profile_user', $data);
    }

    public function login()
    {
        $session = session();
        $user = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $user->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'login' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'username tidak ditemukan.');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/masuk');
    }
}
