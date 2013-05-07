<?php 
include_once '../login/check.php';
if (!empty($_POST)) {
	$folder="../";
	$narchivo="empleado";
	include_once("../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodo("nombres LIKE '%$nombres%' and paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and ci LIKE '%$ci%' and categoria LIKE '%$categoria%'");
	$titulo=array("nombres"=>"Nombres","paterno"=>"Paterno","materno"=>"Materno","ci"=>"C.I.","direccion"=>"Direccion","categoria"=>"Categoria");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>