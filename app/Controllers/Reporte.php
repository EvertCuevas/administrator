<?php

namespace App\Controllers;

use TCPDF;

class Reporte extends BaseController
{
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
