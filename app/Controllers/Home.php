<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    protected $UsuarioModel;
    
    public function __construct()
    {
        $this->UsuarioModel = new UsuarioModel();   
    }

    public function index()
    {         
        // Obtener los datos del formulario
        $user = $this->request->getPost('user');
        $password = $this->request->getPost('password');
        // Obtener información de la DB
        $data_user = $this->UsuarioModel->login($user,$password);
        // Guardar en array los permisos, posteriormente crear datos necesarios para la session
        if($data_user){
            $permisos= $this->UsuarioModel->permiso($data_user->ID_ROL);
            $permisos_array = [];
            foreach ($permisos as $permiso) {
                $permisos_array[] = $permiso->ID_PERMISSION;  // O lo que necesites extraer
            }
            $datos = [
                'logged_in' => TRUE,
                'id'        => $data_user->ID_USER,
                'nombre'    => $data_user->NAME_USER,
                'rol'       => $data_user->ID_ROL,
                'state'     => $data_user->STATE_USER,
                'gestion'   => 2025,
                'permisos'  => $permisos_array

                ];
            $session =session();
            $session->set($datos);
        }
        
        if(session('rol') != ""){

            $data = [
                'title'         => 'Página principal de usuario',
            	'contenido'     => 'inicio/inicio',
                'datos'         => $data_user
                ];
        return view('template/dashboard', $data);
        }else{
            return redirect('Login');
        }
    }
}
