<?php 
include_once '../login/check.php';
if (!empty($_POST)) {
	$folder="../";
	include_once '../class/categoria.php';
	$nombre=$_POST['nombre'];
	$categoria=new categoria;
	$cat=$categoria->mostrarTodo("nombre LIKE '%$nombre%'");
	$titulo=array("nombre"=>"Nombre","detalle"=>"Detalle","gastominimo"=>"Gasto Minimo","precio"=>"Precio");
	listadoTabla($titulo,$cat,1,"modificar.php","eliminar.php","ver.php");
}
?>