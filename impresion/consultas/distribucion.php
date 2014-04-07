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
		$this->Image("../../imagenes/logo2.jpg",$this->w-40,5,30,40);
		$this->SetXY(50,15);
		$this->Cell(150,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(150,10,utf8_decode("Consulta de Distribución "),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",12);
		
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(70,5,utf8_decode("Nombre Usuario"),1,0,"C");
		$this->SetFont("arial","B",10);
		$this->Cell(30,5,utf8_decode("Fec. Distribucion"),1,0,"C");
		
		$this->Cell(25,5,utf8_decode("NumeroPlaca"),1,0,"C");
		$this->Cell(45,5,utf8_decode("Nombre Responsable"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Destino"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Expedido"),1,0,"C");
		/*$this->Cell(95,5,utf8_decode("Observación"),1,0,"C");
		$this->Cell(190,0,"",1,10,"C");*/
		$this->Ln(5);	
	}	
	function Footer(){
				include_once("../../class/usuarios.php");
		$usuarios=new usuarios;
		$usu=$usuarios->mostrarTodo("codusuarios=".$_SESSION['idusuario']);
		$usu=array_shift($usu);
		$this->SetY(-15);
		$this->Cell(255,0,"",1,10,"C");
		$this->SetFont("arial","I",10);
		$this->Cell(155,5,"Reporte Generado: ".date("d-m-Y H:i:s"),0,0,"L");	
		$this->Cell(100,5,"Responsable: ".$usu['usuario'],0,0,"L");	
	}
	
}
$pdf=new PDF("L","mm","letter");
include_once("../../class/recepcion.php");
include_once("../../class/distribucion.php");
$recepcion=new recepcion;
$distribucion=new distribucion;
$rec=$recepcion->mostrarTodo("nombreusuario LIKE '%$nombreusuario%'");
$recep=todolista($rec,"codrecepcion","codrecepcion");
$recep=implode(",",$recep);
$pdf->AddPage();
$pdf->SetFont("arial","",10);
$i=0;
foreach($distribucion->mostrarTodo("codrecepcion IN($recep) and fechadistribucion between '$fechainternacioninicio' and '$fechainternacionfinal'") as $dis){$i++;
	$rec=array_shift($recepcion->mostrar($dis['codrecepcion']));
	$pdf->Cell(10,5,utf8_decode($i),1,0,"R");
	$pdf->Cell(70,5,utf8_decode($rec['nombreusuario']),1,0,"L");
	$pdf->Cell(30,5,utf8_decode(date("d-m-Y",strtotime($dis['fechadistribucion']))),1,0,"C");
	$pdf->Cell(25,5,utf8_decode(recortarTexto($dis['numeroplaca'],10)),1,0,"L");
	$pdf->Cell(45,5,utf8_decode(recortarTexto($dis['nombreresponsable'],22)),1,0,"L");
	$pdf->Cell(40,5,utf8_decode(recortarTexto($dis['destino'],20)),1,0,"L");
	$pdf->Cell(40,5,utf8_decode(recortarTexto($dis['expedido'],20)),1,0,"L");
	
	$pdf->Ln(5);
}
$pdf->Output();
?>