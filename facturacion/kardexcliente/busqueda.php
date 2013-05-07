<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="cliente";
	include_once("../../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodoUnion("cliente c,categoria cat,direccion dir","c.*,cat.*,dir.*","c.paterno","c.nombres LIKE '%$nombre%' and c.paterno LIKE '%$paterno%' and c.materno LIKE '%$materno%' and c.ci LIKE '%$ci%' and c.coddireccion LIKE '%$coddireccion%' and c.codcategoria LIKE '%$codcategoria%' and c.codcategoria=cat.codcategoria and dir.coddireccion=c.coddireccion","c.");
	$titulo=array("paterno"=>"Paterno","materno"=>"Materno","nombres"=>"Nombres","ci"=>"C.I.","calle"=>"Direccion","nombre"=>"Categoria");
	listadoTabla($titulo,$datos,1,"","","",array("Ver Factura"=>"kardex.php"),array("anio"=>$anio),"_self");
}
?>