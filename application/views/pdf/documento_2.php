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
$obj_pdf->Cell(60, 0, 'Nº '.$r['id_documento'], 0, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'FECHA: '.date("d/m/Y", strtotime($r['fecha'])), 0, 1, 'R', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);
$obj_pdf->Cell(0, 0, 'Reporte de Servicio de Ambulancia', 0, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->Cell(0, 0, 'Clase de Aviso: '.$r['aviso'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Solicitado por: '.$r['solicitado'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Recibido por: '.$r['recibido'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Ordenado por: '.$r['ordenado'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(90, 0, 'Hora de salida: '.date("H:i A", strtotime($r['hora_salida'])).' H.L.V.', 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Llegada al sitio: '.date("H:i A", strtotime($r['hora_servicio_llegada'])).' H.L.V.', 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(90, 0, 'Salida del sitio: '.date("H:i A", strtotime($r['hora_servicio_salida'])).' H.L.V.', 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Hora de llegada: '.date("H:i A", strtotime($r['hora_llegada'])).' H.L.V.', 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Duración del servicio: '.date("H:i", strtotime($r['duracion'])), 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);
$obj_pdf->Cell(0, 0, 'U/AMB '.$r['uamb'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'C/P: '.$r['uamb_cp'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'A/M: '.$r['uamb_am'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Desde: '.$r['uamb_desde'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Hasta: '.$r['uamb_hasta'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(90, 0, 'Recibido Por: '.$r['uamb_recibido'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Registro MPPS Nº: '.$r['uamb_mpps'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Estado: '.$r['estado'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Municipio: '.$r['municipio'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Parroquia: '.$r['parroquia'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Ln(5);
$obj_pdf->SetFont('helvetica', 'B', 9);
$obj_pdf->Cell(0, 0, 'Datos del Paciente', 1, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->Cell(0, 0, 'Apellidos: '.$r['paciente_apellidos'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Nombres: '.$r['paciente_nombres'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, 'C.I.: '.$r['paciente_identidad'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, 'Edad: '.$r['paciente_edad'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Teléfono: '.$r['paciente_telefono'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Residenciado en: '.$r['paciente_residencia'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Tipo de Traslado: '.$r['paciente_tipo_traslado'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'S/V', 1, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(45, 0, 'P.P.M: '.$r['paciente_sv_ppm'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(45, 0, 'R.P.M: '.$r['paciente_sv_rpm'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(45, 0, 'TEMP: '.$r['paciente_sv_temp'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'P/A: '.$r['paciente_sv_pa'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Dx: '.$r['paciente_dx'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Ocasionado por: '.$r['paciente_ocasionado'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Acompañado por', 1, 1, 'C', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Apellidos: '.$r['paciente_ac_apellidos'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Nombres: '.$r['paciente_ac_nombres'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, 'C.I.: '.$r['paciente_ac_identidad'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, 'Edad: '.$r['paciente_ac_edad'], 1, 0, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Teléfono: '.$r['paciente_ac_telefono'], 1, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Nexo: '.$r['paciente_nexo'], 1, 1, 'L', 0, '', 0,  0, '', 0);


if($organismos):
    $obj_pdf->Ln(5);
    $obj_pdf->SetFont('helvetica', 'B', 10);
    $obj_pdf->Cell(0, 0, 'Organismos Actuantes en el Servicio', 1, 1, 'C', 0, '', 0,  0, '', 0);
    $obj_pdf->SetFont('helvetica', '', 9);
    foreach ($organismos as $o):
        $obj_pdf->Cell(0, 0, 'Unidad: '.$o['unidad'], 1, 1, 'L', 0, '', 0,  0, '', 0);
        $obj_pdf->Cell(0, 0, 'Dependencia: '.$o['dependencia'], 1, 1, 'L', 0, '', 0,  0, '', 0);
        $obj_pdf->Cell(0, 0, 'C/P: '.$o['cp'], 1, 1, 'L', 0, '', 0,  0, '', 0);
        $obj_pdf->Cell(0, 0, 'A/M: '.$o['am'], 1, 1, 'L', 0, '', 0,  0, '', 0);
    endforeach;
endif;

$obj_pdf->Ln(5);
$obj_pdf->SetFillColor(255, 255, 255);
// Multicell test
$obj_pdf->MultiCell(0, 0, 'Observaciones: '.$r['observaciones'], 1, 'L', 1, 1, '', '', true);

$obj_pdf->Ln(5);
$obj_pdf->Cell(0, 0, 'Comandante del Servicio: '.$r['comandante_servicio'], 0, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Jefe de Sección: '.$r['jefe_seccion'], 0, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Jefe de Operaciones: '.$r['jefe_operaciones'], 0, 1, 'L', 0, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'Comandancia: '.$r['comandancia'], 0, 1, 'L', 0, '', 0,  0, '', 0);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.*/
$obj_pdf->Output('DOCUMENTO-N'.$r['id_documento'].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


?>