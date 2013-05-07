<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="recepcion";
	include_once("../../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$recep=${$narchivo}->mostrarTodo("nombreusuario LIKE '%$nombreusuario%' and marca LIKE '%$marca%' and codinstitucion LIKE '%$codinstitucion%'");
//	$datos=${$narchivo}->mostrarTodoUnion("cliente c,categoria cat,direccion dir","c.*,cat.*,dir.*","c.paterno","c.nombres LIKE '%$nombres%' and c.paterno LIKE '%$paterno%' and c.materno LIKE '%$materno%' and c.ci LIKE '%$ci%' and c.coddireccion LIKE '%$coddireccion%' and c.codcategoria LIKE '%$codcategoria%' and c.codcategoria=cat.codcategoria and dir.coddireccion=c.coddireccion","c.");
	$titulo=array("nombreusuario"=>"Nombre Usuario","marca"=>"Marca","placa"=>"Placa","cantidadreses"=>"Cantidad Redes");
	listadoTabla($titulo,$recep,1,"modificar.php","eliminar.php","ver.php");
}
?>