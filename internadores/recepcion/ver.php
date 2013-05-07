<?php
include_once("../../fpdf/fpdf.php");
$narchivo="recepcion";
include_once("../../class/".$narchivo.".php");
//include_once("../../class/direccion.php");
include_once("../../class/institucion.php");
//$direccion=new direccion;
$institucion=new institucion;
${$narchivo}=new $narchivo;
extract($_GET);
$dato=array_shift(${$narchivo}->mostrar($cod));
//$dir=array_shift($direccion->mostrar($dato['coddireccion']));
$inst=array_shift($institucion->mostrar($dato['codinstitucion']));

$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
$pdf->Image("../../imagenes/logo.png",10,10,30,30);
$pdf->SetXY(50,15);
$pdf->Cell(150,10,utf8_decode("Sistema de Gestión de Mataderos \"Matadero Municipal de Achachicala\""),0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,utf8_decode("Datos de Recepción"),0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);
mostrarI(array("Nombres Usuario"=>$dato['nombreusuario'],
				"Marca"=>$dato['marca'],
				"Institución"=>$inst['color']." - ".$inst['nombreinstitucion'],
				"Placa"=>$dato['placa'],
				"Cantidad Reses"=>$dato['cantidadreses'],
				"Procedencia"=>$dato['procedencia'],
				"Observaciones"=>$dato['tipoobservaciones'],
			));

$pdf->Output();
?>