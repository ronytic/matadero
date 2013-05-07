<?php 
include_once '../login/check.php';
if (!empty($_POST)) {
	$folder="../";
	$narchivo="usuarios";
	include_once("../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodo("nombre LIKE '%$nombre%' and apellidos LIKE '%$apellidos%' and act=1");
	$titulo=array("usuario"=>"Usuario","nombre"=>"Nombre","apellidos"=>"Apellidos","email"=>"Email");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>