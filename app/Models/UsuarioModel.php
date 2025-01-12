<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // Define el nombre de la tabla
    protected $table = 'user';


    public function login($user = '0',$password = '0')
    {

        $sql= "SELECT *
               FROM user
               WHERE USER_USER = '$user' and PASSWORD_USER = '$password' and STATE_USER = 1
               ";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() === 1)
        {
            $user = $query->getRow();
            return $user;
        }else{
            return FALSE;
        }
    }

    public function permiso($id_rol = '0')
    {
        $sql= " SELECT p.ID_PERMISSION 
                FROM  rol r, permision_rol pr, permission p 
                WHERE r.ID_ROL = pr.ID_ROL and p.ID_PERMISSION = pr.ID_PERMISSION 
                and r.ID_ROL = '$id_rol'";

        $query = $this->db->query($sql);
        
        return $query->getResult();        
    }


}