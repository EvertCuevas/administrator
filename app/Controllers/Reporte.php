<?php

namespace App\Controllers;
use App\Models\ReciboModel;
use TCPDF;

class Reporte extends BaseController
{
	protected $ReciboModel;

    public function __construct()
    { 
        $this->ReciboModel = new ReciboModel();   
    }
	public function general()
    {
        $data = [   'title'         => 'Página de reporte - General',
            	    'contenido'     => 'reporte/general'];
        return view('template/dashboard', $data);
    }

    public function mensual()
    {
        $data = [   'title'         => 'Página de reporte - Mensual',
            	    'contenido'     => 'reporte/mensual'];
        return view('template/dashboard', $data);
    }

    public function mensualidad()
    {
        $data = [   'title'         => 'Página de trnsaccion - Mensualidad',
            	    'contenido'     => 'reporte/mensualidad'];
        return view('template/dashboard', $data);
    }
	
	public function reporte_recibo($number_recibo, $tipo)
    {
		
		// Datos para cuerpo del recibo
		$datos_Receipt 			= $this->ReciboModel->datos_Receipt($number_recibo);
		// Datos del beneficiario del recibo
		$datos_benef_Receipt	= $this->ReciboModel->datos_benef_Receipt($number_recibo);
		// Datos del estudiante (condicional)
		$datos_estud_Receipt 	= $this->ReciboModel->datos_estud_Receipt($number_recibo);
		
		if($datos_estud_Receipt){
			$data_estudiante = '<tr>
									<td colspan="4"><strong>ESTUDIANTE:</strong> '. $datos_estud_Receipt->NAME_STUDENT .'</td>
									<td colspan="2"><strong>CURSO:</strong> '. $datos_estud_Receipt->NAME_GRADE .'<br>.</td>
								</tr>';
		}else{
			$data_estudiante = '';
		}
		
		// confiiguraciones para la institucion
		switch ($datos_benef_Receipt->ID_SCHOOL) {
			case 1:
				$logo 	= 'logoma.jpg';
				$nombre = 'U.E. MARIA AUXILIADORA';
				break;
			case 2:
				$logo 	= 'logomm.jpg';
				$nombre = 'U.E. MARIA MAZARELLO';
				break;
			default:
			$logo 	= 'logomamm.jpg';
			$nombre = 'U.E. MARIA AUXILIADORA <br> U.E. MARIA MAZARELLO';
		}

		switch ($tipo) {
			case 1:
				$nivel 	= 'INGRESO';
				break;
			case 2:
				$nivel 	= 'EGRESO';
				break;
			default:
			$nivel 	= '';
		}
		// Datos del Usuario Administrador
		$datos_resp_Receipt 	= $this->ReciboModel->datos_resp_Receipt($datos_benef_Receipt->ID_USER);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(216, 279), true, 'utf-8', false);
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetFont('helvetica', 'L', 9);
		// add a page
		$pdf->AddPage();

		// create some HTML content
		$html = '<table style="border: red 5px solid;">
					<tr>

				        <td style="text-align: center;"><img src="'. base_url() .'assets/dist/img/'. $logo .'" height="80"></td>
				        <td colspan="3">.<br><strong>'. $nombre .'</strong> <br>Calle San Francisco de Sales <br>Telf.: 4739526 <br>Cochabamba - Bolivia <br>
				        </td>
				        <td colspan="2" style="text-align:center;">.<br><strong>RECIBO DE '. $nivel .' <br>Nro. '. $datos_benef_Receipt->NUMBER_RECEIPT .' </strong><br>Fecha: '. $datos_benef_Receipt->DATE_RECEIPT .'</td>
				    </tr>
				    <tr>
				        <td colspan="4"><strong>SEÑOR(ES):</strong> '. $datos_benef_Receipt->CARRIER_RECEIPT .'</td>
				        <td colspan="2"><strong>CI:</strong> '. $datos_benef_Receipt->CI_CARRIER_RECEIPT .'<br>.</td>
				    </tr>'. $data_estudiante .'
			</table>
			<table style="border: red 5px solid;">
					<tr style="text-align: center;">
				        <td style="border: red 5px solid;">CODIGO</td>
				        <td style="border: red 5px solid;" colspan="3">CONCEPTO</td>
				        <td style="border: red 5px solid;">IMPORTE</td>
				        <td style="border: red 5px solid;">TOTAL</td>
				    </tr>
				    <tr>				       
						<td style="height: 120px;" colspan="6">
							<table>';
						if ($datos_Receipt) {
							$monto = 0;
				            foreach ($datos_Receipt as $detalle_recibo){ 

				            	$html.= '<tr>
										    <td style="text-align: center;">'. $detalle_recibo->ID_SEAT .'</td>
										    <td colspan="3">'. $detalle_recibo->DESCRIPTION_RECEIPT .'</td>
										    <td style="text-align: center;">'. $detalle_recibo->AMOUNT_RECEIPT .'</td>
										    <td style="text-align: center;">'. $detalle_recibo->AMOUNT_RECEIPT .'</td>
										  </tr>';
							    $monto = $monto + $detalle_recibo->AMOUNT_RECEIPT;
				        	} 
				        }

						$html.= '</table>
						</td>
					</tr>
				    <tr>
				        <td style="border: red 5px solid; text-align: rigth;" colspan="5">Total a Cancelar: ...</td>
				        <td style="border: red 5px solid; text-align: center;"><strong>'. $monto .'</strong></td>
				    </tr>
					<tr>
				        <td style="border: red 5px solid; height: 50px;" colspan="2"></td>
				        <td style="border: red 5px solid; height: 50px;" colspan="2"></td>
				        <td style="border: red 5px solid; height: 50px;" colspan="2"></td>
				    </tr>
					<tr>
				        <td style="border: red 5px solid; text-align: center;" colspan="2">'. $datos_resp_Receipt->NAME_USER .' <br> <strong>'. $datos_resp_Receipt->CI_USER .'</strong></td>
				        <td style="border: red 5px solid; text-align: center;" colspan="2"><strong>Autorización:</strong></td>
				        <td style="border: red 5px solid; text-align: center;" colspan="2">'. $datos_benef_Receipt->CARRIER_RECEIPT .' <br> <strong>'. $datos_benef_Receipt->CI_CARRIER_RECEIPT .'</strong></td>
				    </tr>
			</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');


		$htmlp = $html;

		// output the HTML content
		$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '140', $html, $border = '', $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = false);

		$pdf->SetFillColor(255,255,0);

		// reset pointer to the last page
		$pdf->lastPage();

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Print a table

		//Close and output PDF document
		$pdf->Output('Recibo.pdf', 'I');
        exit();
		//============================================================+
		// END OF FILE
		//============================================================+
    }
}
