<?php
include_once("../../fpdf/fpdf.php");
$narchivo="recepcion";
include_once("../../config.php");
include_once("../../class/".$narchivo.".php");
include_once("../../class/decomisos.php");
include_once("../../class/institucion.php");
//$direccion=new direccion;
$institucion=new institucion;
$decomisos=new decomisos;
${$narchivo}=new $narchivo;
extract($_GET);

$dec=array_shift($decomisos->mostrar($cod));
	
$dato=array_shift(${$narchivo}->mostrar($dec['codrecepcion']));
//$dir=array_shift($direccion->mostrar($dato['coddireccion']));
$inst=array_shift($institucion->mostrar($dato['codinstitucion']));
include_once("../../config.php");
class PDF extends FPDF{
	function Header(){
		global $lema;
		$this->SetFont("arial","B",12);
		$this->Image("../../imagenes/logo.png",10,10,30,30);
		$this->SetXY(50,15);
		$this->Cell(150,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(150,10,utf8_decode("Datos de Registro de Decomisos"),0,0,"C");
		$this->Ln(20);
		$this->SetFont("arial","B",12);

		/*$this->Cell(95,5,utf8_decode("Observación"),1,0,"C");*/
		$this->Cell(190,0,"",1,10,"C");
		$this->Ln(5);	
	}	
	function Footer(){
		$this->SetY(-15);
		$this->Cell(195,0,"",1,10,"C");
		$this->SetFont("arial","I",10);
		$this->Cell(195,5,"Reporte Generado: ".date("d-m-Y H:i:s"),0,0,"C");	
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
mostrarI(array("Fecha de Decomiso"=>$dec['fechadecomiso'],
				"Doctor"=>$dec['doctor'],
				"Decomisos AnteMorten:"=>""
			));

$pdf->MultiCell(190,5,utf8_decode($dec['decomisosantemortem']));
mostrarI(array("Decomisos PostMorten:"=>""));	
$pdf->MultiCell(190,5,utf8_decode($dec['decomisospostmortem']));	
mostrarI(array("Observaciones:"=>""));	
$pdf->MultiCell(190,5,utf8_decode($dec['observaciones']));	
$pdf->Output();
?>