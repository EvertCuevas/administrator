<?php
namespace App\Controllers;

use App\Models\EstudianteModel;

class Estudiante extends BaseController
{
    protected $EstudianteModel;

    public function __construct()
    {
        $this->EstudianteModel = new EstudianteModel();   
    }

    public function index()
    {
    }

    public function lista_busqueda()
    {
        $array = session()->get('permisos');
        if ($array) {
            if (in_array(4, $array)) {

                try {
                    $query = $this->request->getGet('q');
                    $resultados = $this->EstudianteModel->busqueda_estudiante($query);
                    echo json_encode($resultados);
                    } catch (\Exception $e) {
                        // Manejo de errores, puedes imprimir o registrar el mensaje de error
                        echo 'Error: ' . $e->getMessage();
                    }



            } else {
                return redirect('Home');
            }
        } else {
            return redirect('Home');
        }
    }

    public function registro_estudiante()
    {
        $array = session()->get('permisos');
        if($array){
            if(in_array(4, $array)){

                $curso          = $this->request->getPost('curso');
                $nombre         = $this->request->getPost('nombre');
                $apellido       = $this->request->getPost('apellido');
                $ci             = $this->request->getPost('ci');
                $rude           = $this->request->getPost('rude');
                $est_nuevo      = $this->request->getPost('est_nuevo');
                $anualidad      = $this->request->getPost('anualidad');
                $mensualidad    = $this->request->getPost('mensualidad');
                $gestion        = $this->request->getPost('gestion');

                $this->EstudianteModel->registro_estudiante($curso,$nombre,$apellido,$ci,$rude,$est_nuevo,$anualidad,$mensualidad,$gestion);
                
                return redirect('tran-aporte');
                }
        }else{  
            return redirect('Home');
        } 
    }

}