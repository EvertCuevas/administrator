<?php

namespace App\Controllers;

class Plataforma extends BaseController
{
    public function index()
    {
        $data = [   'title'         => 'Página de plataforma - Gestión',
            	    'contenido'     => 'plataforma/gestion'];
        return view('template/dashboard', $data);
    }
}
