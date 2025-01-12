<?php

namespace App\Controllers;

use TCPDF;

class Reporte extends BaseController
{
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
	
	public function reporte_recibo($id_recibo)
    {
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

				        <td style="text-align: center;"><img src="'. base_url('assets') .'/img/'. $id_recibo .'" height="80"></td>

				        <td colspan="3">.<br><strong>'. $id_recibo .'</strong> <br>Calle San Francisco de Sales <br>Telf.: 4739526 <br>Cochabamba - Bolivia <br>
				        </td>
				        <td colspan="2" style="text-align:center;">.<br><strong>RECIBO DE INGRESO <br>Nro. '. $id_recibo .' </strong><br>Fecha: '. $id_recibo .'</td>
				    </tr>
				    <tr>
				        <td colspan="4"><strong>SEÑOR(ES):</strong>'. $id_recibo .'</td>
				        <td colspan="2"><strong>CI:</strong>'. $id_recibo .'<br>.</td>
				    </tr>
			</table>
			<table style="border: red 5px solid;">
					<tr style="text-align: center;">
				        <td style="border: red 5px solid;">CODIGO</td>
				        <td style="border: red 5px solid;" colspan="3">CONCEPTO</td>
				        <td style="border: red 5px solid;">IMPORTE</td>
				        <td style="border: red 5px solid;">TOTAL</td>
				    </tr>
				    <tr>				       
						<td style="text-align: center; height: 120px;">'. $id_recibo .'</td>
						<td colspan="3" style="height: 120px;">'. $id_recibo .'</td>
						<td style="text-align: center; height: 120px;">'. $id_recibo .'</td>
						<td style="text-align: center; height: 120px;">'. $id_recibo .'</td>
					</tr>
				    <tr>
				        <td style="border: red 5px solid; text-align: rigth;" colspan="5">Total a Cancelar: ...</td>
				        <td style="border: red 5px solid; text-align: center;"><strong>'. $id_recibo .'</strong></td>
				    </tr>
					<tr>
				        <td style="border: red 5px solid; height: 50px;" colspan="2"></td>
				        <td style="border: red 5px solid; height: 50px;" colspan="2"></td>
				        <td style="border: red 5px solid; height: 50px;" colspan="2"></td>
				    </tr>
					<tr>
				        <td style="border: red 5px solid; text-align: center;" colspan="2"><strong>Responsable:</strong></td>
				        <td style="border: red 5px solid; text-align: center;" colspan="2"><strong>Autorización:</strong></td>
				        <td style="border: red 5px solid; text-align: center;" colspan="2"><strong>Señor</strong></td>
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

    public function demoPDF()
    {
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetFont('helvetica', 'L', 11);
		// add a page
		$pdf->AddPage();

		// create some HTML content
		$html = 'dfgdfg';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');


		$htmlp = $html;

		// output the HTML content
		$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '150', $html, $border = '', $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = false);

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
