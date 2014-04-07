<?php
include_once("../../fpdf/fpdf.php");
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

$fa=array_shift($faeno->mostrar($cod));
	
$dato=array_shift(${$narchivo}->mostrar($fa['codrecepcion']));
//$dir=array_shift($direccion->mostrar($dato['coddireccion']));
$inst=array_shift($institucion->mostrar($dato['codinstitucion']));
include_once("../../config.php");
class PDF extends fpdf{
	function Header(){
		global $lema;
		$this->SetFont("arial","B",12);
		$this->Image("../../imagenes/logo.png",10,10,30,30);
		$this->Image("../../imagenes/logo2.jpg",$this->w-40,5,30,40);
		$this->SetXY(40,15);
		$this->Cell(140,10,utf8_decode(utf8_decode($lema)),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(150,10,utf8_decode("Datos de Registro de Faeno"),0,0,"C");
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
mostrarI(array("Orden de Derribe"=>$fa['ordenderribe'],
				"Cantidad de Reses"=>$fa['cantidadreses'],
				"Responsable"=>$fa['responsable'],
				"Matarife"=>$fa['matarife'],
				"Fecha de Faeno"=>$fa['fecharegistro'],
				"Observaciones"=>""
			));

$pdf->MultiCell(190,5,utf8_decode($fa['observaciones']));	
		
$pdf->Output();
?>