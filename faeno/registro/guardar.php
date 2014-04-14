<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="faeno";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;

include_once("../../class/recepcion.php");
$recepcion=new recepcion;
extract($_POST);
$cantidadnueva=$cantidadresesanterior-$cantidadreses;
//echo $cantidadnueva;
$recepcion->actualizar(array("cantidadresesxfaenear"=>$cantidadnueva),$codrecepcion);
$valores=array(			"codrecepcion"=>"'$codrecepcion'",
			"ordenderribe"=>"'$ordenderribe'",
			"cantidadreses"=>"'$cantidadreses'",
			"responsable"=>"'$responsable'",
			"matarife"=>"'$matarife'",
			"fecharegistro"=>"'$fecharegistro'",
			"observaciones"=>"'$observaciones'",
			);
${$narchivo}->insertar($valores);
$codinsercion=${$narchivo}->last_id();
$mensaje[]="LOS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$nuevo=1;
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>