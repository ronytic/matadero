<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="decomisos";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array(			"codrecepcion"=>"'$codrecepcion'",
			"fechadecomiso"=>"'$fechadecomiso'",
			"doctor"=>"'$doctor'",
			"decomisosantemortem"=>"'$decomisosantemortem'",
			"decomisospostmortem"=>"'$decomisospostmortem'",
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