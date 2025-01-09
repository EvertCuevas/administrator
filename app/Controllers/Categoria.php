<?php

namespace App\Controllers;

class Categoria extends BaseController
{
    public function index()
    {
    }
    public function ingreso()
    {
        $data = [   'title'         => 'Página de categoria - ingresos',
            	    'contenido'     => 'categoria/ingreso'];
        return view('template/dashboard', $data);
    }
    public function egreso()
    {
        $data = [   'title'         => 'Página de categoria - egresos',
            	    'contenido'     => 'categoria/egreso'];
        return view('template/dashboard', $data);
    }
}