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
                // Recibir el término de búsqueda
                $searchQuery = $this->request->getVar('query');
                if (empty($searchQuery)) {
                    return $this->response->setJSON(['error' => 'El término de búsqueda no puede estar vacío.']);
                }

                $results = $this->EstudianteModel->busqueda_estudiante($searchQuery);

                // Crear el HTML para las filas de la tabla
                $tableRows = '';

                if ($results) {
                    foreach ($results as $student) {
                        $tableRows .= '<tr>';
                        $tableRows .= '<td>' . $student['NAME_STUDENT'] . '</td>';
                        $tableRows .= '<td>' . $student['NAME_GRADE'] . '</td>';
                        $tableRows .= '<td>' . $student['NEW_STUDENT'] . '</td>';
                        $tableRows .= '<td>' . $student['ANNUITY_STUDENT'] . '</td>';
                        $tableRows .= '<td>' . $student['MONTHLY_STUDENT'] . '</td>';
                        $tableRows .= '<td style="text-align:center;"><a href="' . base_url('pago_aporte/' . $student['ID_STUDENT_MANAGEMENT']) . '" target="_blank"><button class="btn btn-warning">CANCELAR APORTES</button></a></td>';
                        $tableRows .= '</tr>';
                    }

                    // Devolver el HTML generado en formato JSON
                    return $this->response->setJSON(['rows' => $tableRows]);
                } else {
                    // Si no hay resultados
                    $tableRows .= '<tr>';
                    $tableRows .= '<td>No Existe</td>';
                    $tableRows .= '<td>No Existe</td>';
                    $tableRows .= '<td>No Existe</td>';
                    $tableRows .= '<td>No Existe</td>';
                    $tableRows .= '<td>No Existe</td>';
                    $tableRows .= '<td>No Existe</td>';
                    $tableRows .= '</tr>';

                    return $this->response->setJSON(['rows' => $tableRows]);
                }
            } else {
                return redirect('Home');
            }
        } else {
            return redirect('Home');
        }
    }

}