<?php
include_once("../fpdf/fpdf.php");
$narchivo="categoria";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_GET);
$dato=array_shift(${$narchivo}->mostrar($cod));

$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
$pdf->Image("../imagenes/logo.png",10,10,30,30);
$pdf->SetXY(50,15);
$pdf->Cell(150,10,"Cooperativa de Servicios Electricos \"CHULUMANI Ltda.\"",0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,"Datos de Categoria",0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);
mostrarI(array("Nombres"=>$dato['nombre'],
				"Detalle"=>$dato['detalle'],
				"Costo Minimo"=>$dato['gastominimo'],
				"Precio"=>$dato['precio'],
			));

$pdf->Output();
?>