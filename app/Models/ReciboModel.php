<?php
namespace App\Models;

use CodeIgniter\Model;

class ReciboModel extends Model
{
    // Define el nombre de la tabla
    protected $table = 'receipt';

    public function lista_Recibo($id_flow)
    {
        $sql= "SELECT *
               FROM receipt r, seat s, category c
               WHERE r.ID_SEAT = s.ID_SEAT AND c.ID_CATEGORY = s.ID_CATEGORY
                     AND c.ID_FLOW = '$id_flow'
               ORDER BY ID_RECEIPT DESC  -- Ordena los registros de forma descendente por la fecha de creación
               LIMIT 30 ";

        $query = $this->db->query($sql);
        
        if ($query->getNumRows() > 0)
        {
            $data = $query->getResult();
            return $data;
        }else{
            return FALSE;
        }
    }

    public function numero_Receipt()
    {
        
        $sql= "SELECT max(NUMBER_RECEIPT) as dato
               FROM receipt";
        
        $query = $this->db->query($sql);
        
        if ($query->getNumRows() === 1)
        {
            $data = $query->getRow();
            return $data;
        }else{
            return FALSE;
        }
    }    

    public function registro_Receipt($id_seat,$id_school,$carrier,$ci_carrier,$description,$type_pay,$amount,$number)
    {       
        if($id_school == 3){
            $total_amount = $amount/2;
        }else{
            $total_amount = $amount;
        }
        // Datos a insertar
        $data = [
            'ID_USER'               => session()->get('id'),
            'ID_SEAT'               => $id_seat,
            'ID_SCHOOL'             => $id_school,
            'CARRIER_RECEIPT'       => $carrier,
            'CI_CARRIER_RECEIPT'    => $ci_carrier,
            'DESCRIPTION_RECEIPT'   => $description,
            'TYPE_PAY_RECEIPT'      => $type_pay,
            'DATE_RECEIPT'          => date('Y-m-d H:i:s'),
            'AMOUNT_RECEIPT'        => $amount,
            'TOTAL_AMOUNT_RECEIPT'  => $total_amount,
            'NUMBER_RECEIPT'        => $number
        ];

        // Insertar los datos
        $this->db->table('receipt')->insert($data);
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
}