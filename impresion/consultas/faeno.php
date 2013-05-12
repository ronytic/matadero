<?php
ob_end_clean();
include_once("../../fpdf/fpdf.php");
include_once("../../config.php");
class PDF extends FPDF{
	function Header(){
		global $lema;
		$this->SetFont("arial","B",12);
		$this->Image("../../imagenes/logo.png",10,10,30,30);
		$this->SetXY(50,15);
		$this->Cell(150,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(150,10,utf8_decode("Consulta de Faenos"),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",12);
		
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(70,5,utf8_decode("Nombre Usuario"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Cant Reses"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Ord. Derribe"),1,0,"C");
		$this->Cell(95,5,utf8_decode("Observación"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Fecha Faeno"),1,0,"C");
		/*
		$this->Cell(190,0,"",1,10,"C");*/
		$this->Ln(5);	
	}	
	function Footer(){
		$this->SetY(-15);
		$this->Cell(255,0,"",1,10,"C");
		$this->SetFont("arial","I",10);
		$this->Cell(255,5,"Reporte Generado: ".date("d-m-Y H:i:s"),0,0,"C");	
	}
}
extract($_GET);
$pdf=new PDF("L","mm","letter");
include_once("../../class/recepcion.php");
include_once("../../class/faeno.php");
$recepcion=new recepcion;
$faeno=new faeno;
$rec=$recepcion->mostrarTodo("nombreusuario LIKE '%$nombreusuario%'");
$recep=todolista($rec,"codrecepcion","codrecepcion");
$recep=implode(",",$recep);
$pdf->AddPage();
$pdf->SetFont("arial","",12);
$i=0;
foreach($faeno->mostrarTodo("codrecepcion IN($recep) and fecharegistro between '$fechainternacioninicio' and '$fechainternacionfinal'") as $fae){$i++;
	$rec=array_shift($recepcion->mostrar($fae['codrecepcion']));
	$pdf->Cell(10,5,utf8_decode($i),1,0,"R");
	$pdf->Cell(70,5,utf8_decode($rec['nombreusuario']),1,0,"L");
	$pdf->Cell(25,5,utf8_decode($fae['cantidadreses']),1,0,"C");
	$pdf->Cell(25,5,utf8_decode($fae['ordenderribe']),1,0,"C");
	$pdf->Cell(95,5,utf8_decode(recortarTexto($fae['observaciones'],35)),1,0,"L");
	$pdf->Cell(30,5,utf8_decode(date("d-m-Y",strtotime($fae['fecharegistro']))),1,0,"C");
	$pdf->Ln(5);
}
$pdf->Output();
?>