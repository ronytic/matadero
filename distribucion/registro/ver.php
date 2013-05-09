<?php
include_once("../../fpdf/fpdf.php");
$narchivo="recepcion";
include_once("../../config.php");
include_once("../../class/".$narchivo.".php");
include_once("../../class/distribucion.php");
include_once("../../class/institucion.php");
//$direccion=new direccion;
$institucion=new institucion;
$distribucion=new distribucion;
${$narchivo}=new $narchivo;
extract($_GET);

$dis=array_shift($distribucion->mostrar($cod));
	
$dato=array_shift(${$narchivo}->mostrar($dis['codrecepcion']));
//$dir=array_shift($direccion->mostrar($dato['coddireccion']));
$inst=array_shift($institucion->mostrar($dato['codinstitucion']));

$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
$pdf->Image("../../imagenes/logo.png",10,10,30,30);
$pdf->SetXY(50,15);
$pdf->Cell(150,10,utf8_decode(utf8_decode($lema)),0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,utf8_decode("Datos de Registro de Distribución"),0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);
mostrarI(array("Nombres Usuario"=>$dato['nombreusuario'],
				"Marca"=>$dato['marca'],
				"Institución"=>$inst['color']." - ".$inst['nombreinstitucion'],
				"Placa"=>$dato['placa'],
				"Cantidad Reses"=>$dato['cantidadreses'],
				"Procedencia"=>$dato['procedencia'],
				"Observaciones"=>"",
			));
$pdf->MultiCell(190,5,utf8_decode($dato['observaciones']));	
$pdf->Ln(5);$pdf->Ln(5);
$pdf->Cell(190,0,"",1,10,"C");
mostrarI(array("Tipo de Vehiculo"=>$dis['tipovehiculo'],
				"Numero Placa"=>$dis['numeroplaca'],
				"Fecha Distribución"=>fecha2Str($dis['fechadistribucion']),
				"Nombre Responsable"=>$dis['nombreresponsable'],
				"Destino"=>$dis['destino'],
				"Expedido"=>$dis['expedido'],
				"Observaciones"=>"",
			));

$pdf->MultiCell(190,5,utf8_decode($dis['observaciones']));	
		
$pdf->Output();
?>