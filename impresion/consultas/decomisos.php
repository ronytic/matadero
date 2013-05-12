<?php
ob_end_clean();
include_once("../../fpdf/fpdf.php");
include_once("../../config.php");
extract($_GET);
class PDF extends FPDF{
	function Header(){
		global $lema;
		$this->SetFont("arial","B",12);
		$this->Image("../../imagenes/logo.png",10,10,30,30);
		$this->SetXY(50,15);
		$this->Cell(150,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(150,10,utf8_decode("Consulta de Decomisos"),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",12);
		
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(70,5,utf8_decode("Nombre Usuario"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Fec. Decomiso"),1,0,"C");
		$this->Cell(75,5,utf8_decode("Decomiso Antemortem"),1,0,"C");
		$this->Cell(75,5,utf8_decode("Decomiso Postmortem"),1,0,"C");
		/*$this->Cell(95,5,utf8_decode("Observación"),1,0,"C");
		
		
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
$pdf=new PDF("L","mm","letter");
include_once("../../class/recepcion.php");
include_once("../../class/decomisos.php");
$recepcion=new recepcion;
$decomisos=new decomisos;
$rec=$recepcion->mostrarTodo("nombreusuario LIKE '%$nombreusuario%'");
$recep=todolista($rec,"codrecepcion","codrecepcion");
$recep=implode(",",$recep);
$pdf->AddPage();
$pdf->SetFont("arial","",10);
$i=0;
foreach($decomisos->mostrarTodo("codrecepcion IN($recep) and fechadecomiso between '$fechainternacioninicio' and '$fechainternacionfinal'") as $dec){$i++;
	$rec=array_shift($recepcion->mostrar($dec['codrecepcion']));
	$pdf->Cell(10,5,utf8_decode($i),1,0,"R");
	$pdf->Cell(70,5,utf8_decode($rec['nombreusuario']),1,0,"L");
	$pdf->Cell(30,5,utf8_decode(date("d-m-Y",strtotime($dec['fechadecomiso']))),1,0,"C");

	$pdf->Cell(75,5,utf8_decode(recortarTexto($dec['decomisosantemortem'],30)),1,0,"L");
	$pdf->Cell(75,5,utf8_decode(recortarTexto($dec['decomisospostmortem'],30)),1,0,"L");
	
	$pdf->Ln(5);
}
$pdf->Output();
?>