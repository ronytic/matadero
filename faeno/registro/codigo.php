<?php
include_once("../../fpdf/code128.php");
$narchivo="recepcion";
include_once("../../config.php");
include_once("../../class/".$narchivo.".php");
include_once("../../class/faeno.php");
include_once("../../class/institucion.php");
//$direccion=new direccion;
$institucion=new institucion;
$faeno=new faeno;
${$narchivo}=new $narchivo;
extract($_GET);

$fa=array_shift($faeno->mostrar($id));

$dato=array_shift(${$narchivo}->mostrar($fa['codrecepcion']));
//$dir=array_shift($direccion->mostrar($dato['coddireccion']));
$inst=array_shift($institucion->mostrar($dato['codinstitucion']));
include_once("../../config.php");
class PDF extends PDF_Code128{
	function Header(){
		global $lema;
		$this->SetFont("arial","B",10);
		//$this->Image("../../imagenes/logo.png",3,3,30,30);
		$this->Image("../../imagenes/logo2.jpg",$this->w-40,0,30,40);
		$this->SetXY(40,3);
		$this->Cell(140,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		//$this->Cell(150,10,utf8_decode("Datos de Registro de Faeno"),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",12);

		/*$this->Cell(95,5,utf8_decode("Observación"),1,0,"C");*/
		//$this->Cell(190,0,"",1,10,"C");
		$this->Ln(5);	
	}	
	function Footer(){
		include_once("../../class/usuarios.php");
		$usuarios=new usuarios;
		$usu=$usuarios->mostrarTodo("codusuarios=".$_SESSION['idusuario']);
		$usu=array_shift($usu);
		$this->SetY(-8);
		//$this->Cell(195,0,"",1,10,"C");
		$this->SetFont("arial","I",8);
		$this->Cell(120,5,"Reporte Generado: ".date("d-m-Y H:i:s"),0,0,"L");	
		$this->Cell(100,5,"Responsable: ".$usu['usuario'],0,0,"L");	
	}
	
}
$pdf=new PDF("L","mm",array(210.6,40));
$pdf->SetAutoPageBreak(1,0);
$pdf->SetFont("arial","B",10);
$pdf->AddPage();
$pdf->Code128(8,10,"Faeno".$fa['codfaeno'],50,20);

$pdf->SetFont("arial","B",10);
$pdf->SetXY(60,15);			
$pdf->Cell(40,0,"Lugar y Fecha:",0,0,"L");
$pdf->SetFont("arial","",10);
$pdf->Cell(50,0,"La Paz, ".date("d-m-Y",strtotime($fa['fecha'])),0,10,"L");

$pdf->SetXY(60,21);			
$pdf->SetFont("arial","B",10);
$pdf->Cell(20,0,"Nombre:",0,0,"L");
$pdf->SetFont("arial","",10);
$pdf->Cell(45,0,$dato['nombreusuario'],0,0,"L");
$pdf->SetFont("arial","B",10);
$pdf->Cell(15,0,"Marca:",0,0,"L");
$pdf->SetFont("arial","",10);
$pdf->Cell(40,0,$dato['marca'],0,0,"L");
$pdf->SetXY(60,27);	
$pdf->SetFont("arial","B",10);
$pdf->Cell(20,0,"Sindicato:",0,0,"L");
$pdf->SetFont("arial","",10);
$pdf->Cell(45,0,$inst['nombreinstitucion'],0,0,"L");
$pdf->SetFont("arial","B",10);
$pdf->Cell(15,0,"Color:",0,0,"L");
$pdf->SetFont("arial","",10);
$pdf->Cell(40,0,$inst['color'],0,0,"L");
		

		
$pdf->Output();
?>