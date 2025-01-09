<?php

namespace App\Controllers;

class Transaccion extends BaseController
{
    public function index()
    {
    }
    public function ingreso()
    {
        $data = [   'title'         => 'Página de trnsaccion - ingresos',
            	    'contenido'     => 'transaccion/ingreso'];
        return view('template/dashboard', $data);
    }
    public function egreso()
    {
        $data = [   'title'         => 'Página de trnsaccion - egresos',
            	    'contenido'     => 'transaccion/egreso'];
        return view('template/dashboard', $data);
    }
    public function aporte()
    {
        $data = [   'title'         => 'Página de trnsaccion - aporte',
            	    'contenido'     => 'transaccion/aporte'];
        return view('template/dashboard', $data);
    }
}