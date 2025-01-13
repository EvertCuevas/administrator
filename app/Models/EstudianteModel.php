<?php
namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model
{
    // Define el nombre de la tabla
    protected $table = 'student';


    public function busqueda_estudiante($query)
    {
        $sql= "SELECT sm.ID_STUDENT_MANAGEMENT, s.ID_STUDENT, s.NAME_STUDENT, g.NAME_GRADE, 
                        sm.NEW_STUDENT, sm.ANNUITY_STUDENT, sm.MONTHLY_STUDENT 
                FROM grade g, student s, student_management sm
                WHERE s.ID_STUDENT = sm.ID_STUDENT AND g.ID_GRADE = sm.ID_GRADE AND
                        s.NAME_STUDENT LIKE '$query' 
                        OR g.NAME_GRADE LIKE '$query'
                ORDER BY s.NAME_STUDENT ASC
                LIMIT 100";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() > 0)
        {
            $data = $query->getResult();
            return $data;
        }else{
            return FALSE;
        }
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
