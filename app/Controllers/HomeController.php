<?php

namespace App\Controllers;
helper('url');

class HomeController extends BaseController
{

    public function index()
    {
        $data = array(
            'title' => 'Home Page',
        );
        return view('home', $data);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
