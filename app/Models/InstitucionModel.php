<?php
namespace App\Models;

use CodeIgniter\Model;

class InstitucionModel extends Model
{
    // Define el nombre de la tabla
    protected $table = 'school';


    public function lista_School()
    {
        $sql= "SELECT *
               FROM school";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() > 0)
        {
            $data = $query->getResult();
            return $data;
        }else{
            return FALSE;
        }
    }
}