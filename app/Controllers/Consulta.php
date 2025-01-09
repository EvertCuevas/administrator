<?php

namespace App\Controllers;

class Consulta extends BaseController
{
	public function aporte()
    {
        $data = [   'title'         => 'Página de consulta - Aporte',
            	    'contenido'     => 'consulta/aporte'];
        return view('template/dashboard', $data);
    }
    public function recibo()
    {
        $data = [   'title'         => 'Página de consulta - Recibo',
            	    'contenido'     => 'consulta/recibo'];
        return view('template/dashboard', $data);
    }
}
