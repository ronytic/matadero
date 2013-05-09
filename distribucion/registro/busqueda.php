<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="recepcion";
	include_once("../../class/".$narchivo.".php");
	include_once("../../class/distribucion.php");
	${$narchivo}=new $narchivo;
	$distribucion=new distribucion;
	extract($_POST);
	$recep=${$narchivo}->mostrarTodo("nombreusuario LIKE '%$nombreusuario%' and marca LIKE '%$marca%' and codinstitucion LIKE '%$codinstitucion%'");
//	$datos=${$narchivo}->mostrarTodoUnion("cliente c,categoria cat,direccion dir","c.*,cat.*,dir.*","c.paterno","c.nombres LIKE '%$nombres%' and c.paterno LIKE '%$paterno%' and c.materno LIKE '%$materno%' and c.ci LIKE '%$ci%' and c.coddireccion LIKE '%$coddireccion%' and c.codcategoria LIKE '%$codcategoria%' and c.codcategoria=cat.codcategoria and dir.coddireccion=c.coddireccion","c.");

 
	$recep=todolista($recep,"codrecepcion","codrecepcion");
	$recep=implode(",",$recep);
	foreach($distribucion->mostrarTodo("codrecepcion IN ($recep) and fechadistribucion LIKE '%$fecharegistro%'") as $dis){$i++;
		$r=array_shift(${$narchivo}->mostrar($dis['codrecepcion']));
		$datos[$i]['coddistribucion']=$dis['coddistribucion'];
		$datos[$i]['nombreusuario']=$r['nombreusuario'];
		$datos[$i]['fechadistribucion']=$dis['fechadistribucion'];
		$datos[$i]['nombreresponsable']=$dis['nombreresponsable'];
		$datos[$i]['destino']=$dis['destino'];
	}
	$titulo=array("nombreusuario"=>"Nombre Usuario","fechadistribucion"=>"Fecha Distribución","nombreresponsable"=>"Nombre Responsable","destino"=>"Destino");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>