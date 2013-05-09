<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="distribucion";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array(			///"codrecepcion"=>"'$codrecepcion'",
			"tipovehiculo"=>"'$tipovehiculo'",
			"numeroplaca"=>"'$numeroplaca'",
			"fechadistribucion"=>"'$fechadistribucion'",
			"nombreresponsable"=>"'$nombreresponsable'",
			"destino"=>"'$destino'",
			"expedido"=>"'$expedido'",
			"observaciones"=>"'$observaciones'",
			);
${$narchivo}->actualizar($valores,$codrecepcion);
$codinsercion=$codrecepcion;
$mensaje[]="LOS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
$nuevo=1;
include_once '../../mensajeresultado.php';
endif;?>