<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="planilla";
	include_once("../../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodos("mes LIKE '%$mes%' and anio LIKE '%$anio%'");
	if(count($datos)==0){
		?>
        <a class="boton" href="generarplanilla.php" id="generar">Generar Mes</a>
        <?php
	}else{
		if($mes=="" || $anio==""){
			$titulo=array("mes"=>"Mes","anio"=>"Año");
			listadoTabla($titulo,$datos,0,"modificar.php","eliminar.php","ver.php");
			
		}else{
			$dat=array(array("mes"=>mes($mes),"anio"=>"$anio"));
			$titulo=array("mes"=>"Mes","anio"=>"Año");
			listadoTabla($titulo,$dat,0,"modificar.php","eliminar.php","ver.php");
		}
	}
}
?>