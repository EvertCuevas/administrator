<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [   'title'         => 'Página de inicio de session'];
        return view('inicio/login', $data);
    }
}
