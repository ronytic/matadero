<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="planilla";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("pagado"=>"$estado");
${$narchivo}->actualizar($valores,$cod);
$codinsercion=$cod;
$mensaje[]="EL PAGO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
$nuevo="1";
$volver="1";
include_once '../../mensajeresultado.php';
endif;?>