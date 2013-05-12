<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="faeno";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array(			///"codrecepcion"=>"'$codrecepcion'",
			"ordenderribe"=>"'$ordenderribe'",
			"cantidadreses"=>"'$cantidadreses'",
			"responsable"=>"'$responsable'",
			"matarife"=>"'$matarife'",
			"fecharegistro"=>"'$fecharegistro'",
			"observaciones"=>"'$observaciones'",
			);
${$narchivo}->actualizar($valores,$codfaeno);
$codinsercion=$codfaeno;
$mensaje[]="LOS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
$nuevo=1;
include_once '../../mensajeresultado.php';
endif;?>