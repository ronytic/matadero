<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="categoria";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("nombre"=>"'$nombre'",
			"gastominimo"=>"'$gastominimo'",
			"detalle"=>"'$detalle'",
			"precio"=>"'$precio'"
			);
${$narchivo}->actualizar($valores,$cod);
$codinsercion=$cod;
$mensaje[]="LA CATEGORIA SE ACTUALIZO CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>