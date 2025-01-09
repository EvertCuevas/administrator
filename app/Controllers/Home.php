<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [   'title'         => 'Página principal de usuario',
            	    'contenido'     => 'inicio/inicio'];
        return view('template/dashboard', $data);
    }
}
