<?php
include_once("../../login/check.php");
include_once("../../fpdf/fpdf.php");
if(!empty($_GET)){
	$cod=$_GET['id'];
	$mes=$_GET['mes'];
	$anio=$_GET['anio'];
	include_once("../../class/cliente.php");
	include_once("../../class/categoria.php");
	include_once("../../class/direccion.php");
	include_once("../../class/planilla.php");
	$cliente=new cliente;
	$direccion=new direccion;
	$planilla=new planilla;
	$categoria=new categoria;
	$cli=array_shift($cliente->mostrar($cod));
	$dir=array_shift($direccion->mostrar($cli['coddireccion']));
	$cat=array_shift($categoria->mostrar($cli['codcategoria']));
	
	$pdf=new FPDF("L","mm",array(150,100));
	$pdf->SetMargins(1,0,0);
	$pdf->SetAutoPageBreak(true,0);
	$pdf->AddPage();
	$borde=1;
	$pdf->SetFont("arial","B",15);
	$pdf->SetXY(0,2);
	$pdf->Cell(150,5,"Cooperativa de Servicios Electricos \"CHULLUMANI\" Ltda.",0,0,"C");
	$pdf->SetFont("arial","",10);
	$pdf->Ln(6);
	$pdf->Cell(80,5,"Nombre: ".ucwords($cli['paterno']." ".$cli['materno']." ".$cli['nombres']),0,0,"L");
	$pdf->Cell(35,5,utf8_decode("Medidor Nº: ".ucwords($cli['medidor'])),0,0,"L");
	$pdf->Cell(30,5,utf8_decode("Medidor: ".ucwords($cli['tipo'])),0,0,"L");
	$pdf->Ln();
	$pdf->Cell(65,5,utf8_decode("Dirección: ".ucwords($dir['calle']." ".$cli['numerocasa'])),0,0,"L");
	$pdf->Cell(35,5,utf8_decode("Gestión: ".ucwords($anio)),0,0,"L");
	$pdf->Cell(45,5,utf8_decode(ucwords($cat['nombre'])),0,0,"L");
	$pdf->Ln(7);
	$pdf->SetFont("arial","B",11);
	$pdf->Cell(22,5,utf8_decode("MES"),$borde,0,"C");
	$pdf->Cell(15,5,utf8_decode("No Ant"),$borde,0,"C");
	$pdf->Cell(20,5,utf8_decode("No Act"),$borde,0,"C");
	$pdf->Cell(15,5,utf8_decode("K.W.B."),$borde,0,"C");
	$pdf->Cell(20,5,utf8_decode("Comp."),$borde,0,"C");
	$pdf->Cell(20,5,utf8_decode("Total"),$borde,0,"C");
	$pdf->Cell(35,5,utf8_decode("Observaciones"),$borde,0,"C");
	$pdf->Ln();
	$pdf->SetFont("arial","",11);
	for($i=1;$i<=12;$i++){
		$mes=$i;
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
		
		
		
		$pdf->Cell(22,6,utf8_decode(mes($i)),$borde,0,"L");
		$pdf->Cell(15,6,utf8_decode($plaanterior['valor']),$borde,0,"C");
		$pdf->Cell(20,6,utf8_decode($plaactual['valor']),$borde,0,"C");
		$pdf->Cell(15,6,utf8_decode($plaactual['kwb']),$borde,0,"C");
		$pdf->Cell(20,6,utf8_decode($plaactual['comprobanteno']),$borde,0,"C");
		$pdf->Cell(20,6,utf8_decode($plaactual["total"]),$borde,0,"C");
		$pdf->Cell(35,6,utf8_decode($plaactual["observaciones"]),$borde,0,"C");
	
	
		$pdf->Ln(6);
	}
	$pdf->Output();
}
?>