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
${$narchivo}->insertar($valores);
$codinsercion=${$narchivo}->last_id();
$mensaje[]="LA CATEGORIA SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>