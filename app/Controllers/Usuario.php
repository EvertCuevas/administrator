<?php

namespace App\Controllers;

class Usuario extends BaseController
{
	public function administrador()
    {
        $data = [   'title'         => 'Página de usuarios - administrador',
            	    'contenido'     => 'usuario/administrador'];
        return view('template/dashboard', $data);
    }
    public function estudiante()
    {
        $data = [   'title'         => 'Página de usuarios - estudiante',
            	    'contenido'     => 'usuario/estudiante'];
        return view('template/dashboard', $data);
    }
}
