<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $validation = \Config\Services::validation();

        return view('welcome_message');
    }
}
