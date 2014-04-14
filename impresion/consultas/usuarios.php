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
		$this->Cell(150,10,utf8_decode("Consulta de Listado de Usuarios"),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",10);
		
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(50,5,utf8_decode("Nombre de Usuario"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Marca"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Institución"),1,0,"C");
		$this->Cell(20,5,utf8_decode("Tamaño"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Cant Reses Int"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Procedencia"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Fecha Recep"),1,0,"C");
		/*
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
$recepcion=new recepcion;

include_once("../../class/institucion.php");
$institucion=new institucion;
$pdf->AddPage();
$pdf->SetFont("arial","",10);
$i=0;
foreach($recepcion->mostrarTodo("nombreusuario LIKE '%$nombreusuario%' and marca LIKE '%$marca%' and codinstitucion LIKE '%$codinstitucion%' and fecharegistro LIKE '%$fecharegistro%'","nombreusuario") as $rec){$i++;
	$inst=$institucion->mostrarTodo("codinstitucion=".$rec['codinstitucion']);
	$inst=array_shift($inst);
	$pdf->Cell(10,5,utf8_decode($i),1,0,"R");
	$pdf->Cell(50,5,utf8_decode($rec['nombreusuario']),1,0,"L");
	$pdf->Cell(25,5,utf8_decode($rec['marca']),1,0,"L");
	$pdf->Cell(25,5,utf8_decode($inst['nombreinstitucion']),1,0,"L");
	$pdf->Cell(20,5,utf8_decode($rec['tamano']),1,0,"");
	$pdf->Cell(25,5,utf8_decode($rec['cantidadreses']),1,0,"C");
	$pdf->Cell(40,5,utf8_decode($rec['procedencia']),1,0,"L");
	$pdf->Cell(30,5,utf8_decode(date("d-m-Y",strtotime($rec['fecharegistro']))),1,0,"C");
	$pdf->Ln(5);
}
$pdf->Output();
?>