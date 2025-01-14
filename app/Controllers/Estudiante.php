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

}