<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="recepcion";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("nombreusuario"=>"'$nombreusuario'",
			"marca"=>"'$marca'",
			"codinstitucion"=>"'$codinstitucion'",
			"cantidadreses"=>"'$cantidadreses'",
			"placa"=>"'$placa'",
			"procedencia"=>"'$procedencia'",
			"fecharegistro"=>"'$fecharegistro'",
			"observaciones"=>"'$observaciones'",
			);
${$narchivo}->actualizar($valores,$cod);
$codinsercion=$cod;
$mensaje[]="LOS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>