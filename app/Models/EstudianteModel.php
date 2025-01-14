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

    public function busqueda_estudiante_demo($query)
    {
        // Usamos el método like() de CodeIgniter para la búsqueda
        $builder = $this->db->table('student s');
        $builder->select('sm.ID_STUDENT_MANAGEMENT, s.ID_STUDENT, s.NAME_STUDENT, g.NAME_GRADE, 
                          sm.NEW_STUDENT, sm.ANNUITY_STUDENT, sm.MONTHLY_STUDENT');
        $builder->join('student_management sm', 's.ID_STUDENT = sm.ID_STUDENT', 'inner');
        $builder->join('grade g', 'g.ID_GRADE = sm.ID_GRADE', 'inner');
        
        // Usamos like para buscar coincidencias
        $builder->groupStart()
                ->like('s.NAME_STUDENT', $query)
                ->orLike('g.NAME_GRADE', $query)
                ->groupEnd();
        
        // Limitar los resultados a 100
        $builder->limit(100);
        
        // Ejecutar la consulta
        $query = $builder->get();

        // Verificar si la consulta devuelve resultados
        if ($query->getNumRows() > 0) {
            return $query->getResult(); // Devolver los resultados
        } else {
            return FALSE; // No hay resultados
        }
    }
}
