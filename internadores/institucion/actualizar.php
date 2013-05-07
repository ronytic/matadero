<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="institucion";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);

$valores=array("nombreinstitucion"=>"'$nombreinstitucion'",
			"color"=>"'$color'",
			"observacion"=>"'$observacion'"
			);
${$narchivo}->actualizar($valores,$cod);
$codinsercion=$cod;
$mensaje[]="LA DIRECCION SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>