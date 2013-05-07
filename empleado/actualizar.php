<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="empleado";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("nombres"=>"'$nombres'",
			"paterno"=>"'$paterno'",
			"materno"=>"'$materno'",
			"ci"=>"'$ci'",
			"fechanac"=>"'$fechanac'",
			"direccion"=>"'$direccion'",
			"categoria"=>"'$categoria'",
			"cargo"=>"'$cargo'",
			"fechaingreso"=>"'$fechaingreso'",
			"sueldo"=>"'$sueldo'",
			"observacion"=>"'$observacion'"
			);
${$narchivo}->actualizar($valores,$cod);
$codinsercion=$cod;
$mensaje[]="EL EMPLEADO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>