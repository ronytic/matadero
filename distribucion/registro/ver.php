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
include_once("../../config.php");
class PDF extends FPDF{
	function Header(){
		global $lema;
		$this->SetFont("arial","B",12);
		$this->Image("../../imagenes/logo.png",10,10,30,30);
		$this->Image("../../imagenes/logo2.jpg",$this->w-40,5,30,40);
		$this->SetXY(40,15);
		$this->Cell(140,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(150,10,utf8_decode("Datos de Registro de Distribución"),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",12);

		/*$this->Cell(95,5,utf8_decode("Observación"),1,0,"C");*/
		$this->Cell(190,0,"",1,10,"C");
		$this->Ln(5);	
	}	
	function Footer(){
		include_once("../../class/usuarios.php");
		$usuarios=new usuarios;
		$usu=$usuarios->mostrarTodo("codusuarios=".$_SESSION['idusuario']);
		$usu=array_shift($usu);
		$this->SetY(-15);
		$this->Cell(195,0,"",1,10,"C");
		$this->SetFont("arial","I",10);
		$this->Cell(140,5,"Reporte Generado: ".date("d-m-Y H:i:s"),0,0,"L");	
		$this->Cell(100,5,"Responsable: ".$usu['usuario'],0,0,"L");		
	}
	
}
$pdf=new PDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();

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