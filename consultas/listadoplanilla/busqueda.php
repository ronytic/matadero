<?php 
include_once '../../login/check.php';
if (true) {
	$folder="../../";
	include_once("../../fpdf/fpdf.php");
	$narchivo="cliente";
	include_once("../../class/".$narchivo.".php");
	include_once("../../class/direccion.php");
${$narchivo}=new $narchivo;
$direccion=new direccion;

extract($_POST);
$dir=array_shift($direccion->mostrar($coddireccion));

$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
$pdf->Image("../../imagenes/logo.png",10,10,30,30);
$pdf->SetXY(50,15);
$pdf->Cell(150,10,"Cooperativa de Servicios Electricos \"CHULUMANI Ltda.\"",0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,"Planilla de Lectura - ".mes($mes)." - ".$anio,0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(10);
$pdf->SetFont("arial","B",12);
$pdf->Cell(160,5,utf8_decode("Dirección: ".$dir['ciudad']." - ".$dir['zona']." - ".$dir['calle']),0,0,"L");
$pdf->Ln(10);
$pdf->Cell(80,5,"Cliente",1,0,"C");
$pdf->Cell(40,5,mes($mes)." - ".$anio,1,0,"C");
$pdf->Ln(5);
foreach($cliente->mostrarTodo("coddireccion=$coddireccion") as $cli){
	$pdf->SetFont("arial","",12);
	$pdf->Cell(80,5,ucwords($cli['paterno']." ".$cli['materno']." ".$cli['nombres']),1,0,"L");
	$pdf->Cell(40,5,"",1,0,"C");
	$pdf->Ln(5);
}

$pdf->Output();
	
}
?>