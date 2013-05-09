<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="decomisos";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array(			///"codrecepcion"=>"'$codrecepcion'",
			"fechadecomiso"=>"'$fechadecomiso'",
			"decomisosantemortem"=>"'$decomisosantemortem'",
			"decomisospostmortem"=>"'$decomisospostmortem'",
			"observaciones"=>"'$observaciones'",
			);
${$narchivo}->actualizar($valores,$coddecomisos);
$codinsercion=$coddecomisos;
$mensaje[]="LOS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
$nuevo=1;
include_once '../../mensajeresultado.php';
endif;?>