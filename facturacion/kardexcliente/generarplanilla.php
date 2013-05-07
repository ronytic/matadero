<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="planilla";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
include_once("../../class/cliente.php");
$cliente=new cliente;
foreach($cliente->mostrarTodos() as $cli){
	$valores=array("codcliente"=>"'".$cli['codcliente']."'",
				"anio"=>"'$anio'",
				"mes"=>"'$mes'",
				"valor"=>"'0'"
				);
	${$narchivo}->insertar($valores);
}
endif;?>