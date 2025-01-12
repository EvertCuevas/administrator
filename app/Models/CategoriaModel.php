<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    // Define el nombre de la tabla
    protected $table = 'flow';


    public function lista_Categoria($id_flow)
    {
        $sql= "SELECT *
               FROM category
               WHERE ID_FLOW = '$id_flow'";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() > 0)
        {
            $data = $query->getResult();
            return $data;
        }else{
            return FALSE;
        }
    }

    public function lista_Asiento($id_flow)
    {

        $sql= "SELECT *
               FROM FLOW F, CATEGORY C, SEAT S
               WHERE F.ID_FLOW = C.ID_FLOW AND C.ID_CATEGORY = S.ID_CATEGORY
                    AND F.ID_FLOW = '$id_flow'";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() > 0)
        {
            $data = $query->getResult();
            return $data;
        }else{
            return FALSE;
        }
    }
    
    public function registro_Categoria($id_flow, $name_category)
    {

        // Datos a insertar
        $data = [
            'ID_FLOW'       => $id_flow,
            'NAME_CATEGORY' => $name_category
        ];

        // Insertar los datos
        $this->db->table('category')->insert($data);

        // Obtener el último ID insertado
        $ID_RECEIPT = $this->db->insertID();
        
        if ($ID_RECEIPT)
        {
            session()->setFlashdata('toast_success', '¡La acción fue exitosa!');
        }else{
            session()->setFlashdata('toast_error', '¡ERROR al realizar la acción!');
            return FALSE;
        }
    }

    public function registro_Asiento($id_categoria, $nom_asiento,$cod_asiento)
    {

        // Datos a insertar
        $data = [
            'ID_CATEGORY'   => $id_categoria,
            'NAME_SEAT'     => $nom_asiento,
            'COD_SEAT'     => $cod_asiento
        ];

        // Insertar los datos
        $this->db->table('seat')->insert($data);

        // Obtener el último ID insertado
        $ID_SEAT = $this->db->insertID();
        
        if ($ID_SEAT)
        {
            session()->setFlashdata('toast_success', '¡La acción fue exitosa!');
        }else{
            session()->setFlashdata('toast_error', '¡ERROR al realizar la acción!');
            return FALSE;
        }
    }

    public function lista_Categoria_Asiento($id_categoria)
    {
        $sql= "SELECT *
        FROM seat
        WHERE ID_CATEGORY = '$id_categoria'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }
}