<?php

$NC = new NumberToLetterConverter();

tcpdf();  
// create new PDF document
class MYPDF extends TCPDF {

    //Page header
    public function Header() {              
    }

    // Page footer
    public function Footer() { 

    }
}

$obj_pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetAuthor('Ing. Luis Cordero');
$obj_pdf->SetTitle('INFORME');
$obj_pdf->SetSubject('DIRECCION REGIONAL DE SALUD');
$obj_pdf->SetKeywords('DIRECCION REGIONAL DE SALUD');

// set default header data
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$obj_pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$obj_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode
$obj_pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
// Add a page
// This method has several options, check the source code documentation for more information.
$obj_pdf->AddPage();

$obj_pdf->Image(base_url().'assets/dashboard/images/logo_unellez.gif', '15', '15', 20, 20, '', '', 'T', false, 100, '', false, false, 0, false, false, false);
$obj_pdf->Image(base_url().'assets/dashboard/images/logo.jpg', '175', '15', 20, 20, '', '', 'T', false, 100, '', false, false, 0, false, false, false);

$obj_pdf->Ln(1);
$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(0, 0, 'UNIVERSIDAD NACIONAL EXPERIMENTAL DE LOS LLANOS OCCIDENTALES', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, '“EZEQUIEL ZAMORA”', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'UNELLEZ-BARINAS', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'CUERPO DE BOMBEROS Y BOMBERAS UNIVERSITARIOS', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, '“MAYOR (B) (†) EVERARDO LEÓN TORRES”', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Fundado El 16 de mayo de 1979.', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(0, 0, 'DEPARTAMENTO DE OPERACIONES.', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);
$obj_pdf->Cell(0, 0, 'FECHA: '.date("d/m/Y"), 0, 1, 'R', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);
$obj_pdf->Cell(0, 0, 'ESTADISTICA', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);

$obj_pdf->SetFont('helvetica', '', 9);

// years inventarios
if(!empty($e_years)){
    foreach ($e_years as $y) 
    {
        $obj_pdf->SetFont('helvetica', 'B', 10);
        $obj_pdf->Cell(0, 0, 'AÑO '.$y['tyear'], 1, 1, 'C', 0, '', 0,  0, '', 0);
        
        // month inventario 
		
        $e_months = $this->Pdf_model->e_months($y['tyear']);
        if(!empty($e_months)){
		    foreach ($e_months as $m) 
		    {
		        $obj_pdf->SetFont('helvetica', 'B', 10);
		        $obj_pdf->Cell(0, 0, $this->Pdf_model->mes($m['tmonth']), 1, 1, 'L', 0, '', 0,  0, '', 0);
		        $obj_pdf->SetFont('helvetica', 'B', 10);
		        $obj_pdf->Cell(150, 0, 'DEPARTAMENTOS DE OPERACIONES', 1, 0, 'L', 0, '', 0,  0, '', 0);
				$obj_pdf->Cell(0, 0, 'CANIDAD', 1, 1, 'L', 0, '', 0,  0, '', 0);
		       
		       	$obj_pdf->SetFont('helvetica', '', 9);
		        $rows = $this->Pdf_model->e_years_months($y['tyear'],$m['tmonth']);
		        if(!empty($rows)){
				    foreach ($rows as $r) 
				    {
				        $obj_pdf->Cell(150, 0, $this->Pdf_model->tipo_documento($r['tipo_documento']), 1, 0, 'L', 0, '', 0,  0, '', 0);
				        $obj_pdf->Cell(0, 0, $r['cantidad'], 1, 1, 'L', 0, '', 0,  0, '', 0);
				    }
				}
		    }
		}
    }
}


// Close and output PDF document

// This method has several options, check the source code documentation for more information.*/
$obj_pdf->Output('ESTADISTICAS.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


?>