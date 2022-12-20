<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'login',
        ];
        return view('view_login', $data);
    }

    public function home()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('view_home', $data);
    }
}
