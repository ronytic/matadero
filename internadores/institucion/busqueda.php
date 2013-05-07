<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="institucion";
	include_once("../../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodo("nombreinstitucion LIKE '%$nombreinstitucion%' and color LIKE '%$color%'");
	$titulo=array("nombreinstitucion"=>"Nombre Institucion","color"=>"Color","observacion"=>"Observación");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>