<?php
namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model
{
    // Define el nombre de la tabla
    protected $table = 'student';


    public function busqueda_estudiante($query)
    {
       // Limpiar el valor de búsqueda para evitar problemas con caracteres especiales
        $query = '%' . $query . '%';

        // Realizar la consulta con el Query Builder de CodeIgniter 4
        $builder = $this->db->table('student_management sm');
        
        // Seleccionar las columnas necesarias
        $builder->select('sm.ID_STUDENT_MANAGEMENT, s.ID_STUDENT, s.NAME_STUDENT, s.LASTNAME_STUDENT, g.NAME_GRADE, 
                        sm.NEW_STUDENT, sm.ANNUITY_STUDENT, sm.MONTHLY_STUDENT');
        
        // Realizar los JOIN entre las tablas
        $builder->join('student s', 's.ID_STUDENT = sm.ID_STUDENT');
        $builder->join('grade g', 'g.ID_GRADE = sm.ID_GRADE');
        
        // Aplicar los filtros con LIKE
        $builder->groupStart();  // Agrupar condiciones
        $builder->like('s.NAME_STUDENT', $query);
        $builder->orLike('s.LASTNAME_STUDENT', $query);
        $builder->orLike('g.NAME_GRADE', $query);
        $builder->groupEnd();  // Cerrar el grupo de condiciones
        
        // Ordenar por nombre del estudiante
        $builder->orderBy('s.NAME_STUDENT', 'ASC');
        
        // Limitar los resultados
        $builder->limit(50);
        
        // Ejecutar la consulta y obtener los resultados como un array
        $resultados = $builder->get()->getResultArray();  // Usar getResultArray() en CI4

        // Devolver los resultados
        return $resultados;
    }

    public function lista_Curso()
    {
        $sql= "SELECT *
               FROM grade";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() > 0)
        {
            $data = $query->getResult();
            return $data;
        }else{
            return FALSE;
        }
    }
    
    public function registro_estudiante($curso,$nombre,$apellido,$ci,$rude,$est_nuevo,$anualidad,$mensualidad,$gestion)
    {    

        // Datos a insertar
        $data_student = [
            'NAME_STUDENT'      => $nombre,
            'LASTNAME_STUDENT'  => $apellido,
            'CI_STUDENT'        => $ci,
            'RUDE_STUDENT'      => $rude
        ];
        // Insertar los datos
        $this->db->table('student')->insert($data_student);
        // Obtener el último ID insertado
        $id_student = $this->db->insertID();

        // Datos a insertar
        $data_student_manag = [
            'ID_GRADE'          => $curso,
            'ID_STUDENT'        => $id_student,
            'ID_MANAGEMENT'     => $gestion,
            'NEW_STUDENT'       => $est_nuevo,
            'ANNUITY_STUDENT'   => $anualidad,
            'MONTHLY_STUDENT'   => $mensualidad
        ];
        // Insertar los datos
        $this->db->table('student_management')->insert($data_student_manag);
        // Obtener el último ID insertado
        $id_stud_mn = $this->db->insertID();
        
        if ($id_stud_mn)
        {
            session()->setFlashdata('toast_success', '¡La acción fue exitosa!');
        }else{
            session()->setFlashdata('toast_error', '¡ERROR al realizar la acción!');
            return FALSE;
        }
    }
}
