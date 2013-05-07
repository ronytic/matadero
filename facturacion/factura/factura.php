<?php
include_once("../../login/check.php");
include_once("../../fpdf/fpdf.php");
if(!empty($_GET)){
	$cod=$_GET['id'];
	$mes=$_GET['mes'];
	$anio=$_GET['anio'];
	include_once("../../class/cliente.php");
	include_once("../../class/direccion.php");
	include_once("../../class/planilla.php");
	$cliente=new cliente;
	$direccion=new direccion;
	$planilla=new planilla;
	$cli=array_shift($cliente->mostrar($cod));
	$dir=array_shift($direccion->mostrar($cli['coddireccion']));
	if($mes==1){
		$m=12;
		$an=$an--;
		$plaanterior=array_shift($planilla->mostrarTodo("mes=$m and anio=$an and codcliente=$cod"));
		if(count($plaanterior)==0){
			$kwbanterior=$cli['kwbinicio'];
		}else{
			$kwbanterior=$plaanterior['valor'];	
		}
		$plaactual=array_shift($planilla->mostrarTodo("mes=$mes and anio=$anio and codcliente=$cod"));
		$kwbactual=$plaactual['valor'];
	}else{
		$m=$mes-1;
		$an=$anio;
		$plaanterior=array_shift($planilla->mostrarTodo("mes=$m and anio=$an and codcliente=$cod"));
		if(count($plaanterior)==0){
			$kwbanterior=$cli['kwbinicio'];
		}else{
			$kwbanterior=$plaanterior['valor'];	
		}
		//
		$plaactual=array_shift($planilla->mostrarTodo("mes=$mes and anio=$anio and codcliente=$cod"));
		$kwbactual=$plaactual['valor'];
	}
	$pdf=new FPDF("P","mm",array(134,170));
	$pdf->SetFont("arial","",12);
	$pdf->AddPage();
	$borde=1;
	$pdf->SetMargins(0,0,0);
	$pdf->SetXY(35,36);
	$pdf->Cell(90,5,ucwords($cli['paterno']." ".$cli['materno']." ".$cli['nombres']),$borde,0,"C");
	$pdf->SetXY(25,41);
	$pdf->Cell(100,5,ucwords($dir['zona']." ".$dir['calle']),$borde,0,"C");
	$pdf->SetXY(5,48);
	$pdf->Cell(65,5,$cli['numerocasa'],$borde,0,"C");
	$pdf->SetXY(85,48);
	$pdf->Cell(40,5,$cli['ci'],$borde,0,"C");
	
	$pdf->SetXY(15,53);
	$pdf->Cell(110,5,mes($mes)." del ".$anio,$borde,0,"C");
	$pdf->SetXY(25,65);
	$pdf->Cell(35,5,$kwbanterior,$borde,0,"C");
	$pdf->SetXY(25,72);
	$pdf->Cell(35,5,$kwbactual,$borde,0,"C");
	$pdf->SetXY(25,80);
	$pdf->Cell(35,5,$plaactual['kwb'],$borde,0,"C");
	
	$pdf->SetXY(95,60);
	$pdf->Cell(30,5,"",$borde,0,"C");
	$pdf->SetXY(95,67);
	$pdf->Cell(30,5,$plaactual['totalcosto'],$borde,0,"C");
	$pdf->SetXY(95,74);
	$pdf->Cell(30,5,"",$borde,0,"C");
	$pdf->SetXY(95,81);
	$pdf->Cell(30,5,"0.50",$borde,0,"C");
	$pdf->SetXY(95,88);
	$pdf->Cell(30,5,"1",$borde,0,"C");
	
	$pdf->SetXY(95,107);
	$pdf->Cell(30,5,$plaactual['totalfactura'],$borde,0,"C");
	$pdf->SetXY(95,114);
	$pdf->Cell(30,5,"3.50",$borde,0,"C");
	$pdf->SetXY(95,121);
	$pdf->Cell(30,5,$plaactual['total'],$borde,0,"C");
	
	$pdf->SetXY(105,128);
	$pdf->Cell(20,5,$plaactual['totalfactura'],$borde,0,"C");
	
	$pdf->SetXY(15,135);
	$pdf->Cell(110,5,num2letras($plaactual['total']),$borde,0,"C");
	$pdf->Output();
}
?>