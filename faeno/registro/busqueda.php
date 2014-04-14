<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="recepcion";
	include_once("../../class/".$narchivo.".php");
	include_once("../../class/faeno.php");
	${$narchivo}=new $narchivo;
	$faeno=new faeno;
	extract($_POST);
	if($codigo!=""){
		$codigo=str_replace("Faeno","",$codigo);
		$codigo="codfaeno=$codigo  and";
	}else{
		$codigo="";
	}
	//echo $codigo;
	$recep=${$narchivo}->mostrarTodo("nombreusuario LIKE '%$nombreusuario%' and marca LIKE '%$marca%' and codinstitucion LIKE '%$codinstitucion%'","nombreusuario");
//	$datos=${$narchivo}->mostrarTodoUnion("cliente c,categoria cat,direccion dir","c.*,cat.*,dir.*","c.paterno","c.nombres LIKE '%$nombres%' and c.paterno LIKE '%$paterno%' and c.materno LIKE '%$materno%' and c.ci LIKE '%$ci%' and c.coddireccion LIKE '%$coddireccion%' and c.codcategoria LIKE '%$codcategoria%' and c.codcategoria=cat.codcategoria and dir.coddireccion=c.coddireccion","c.");

 
	$recep=todolista($recep,"codrecepcion","codrecepcion");
	$recep=implode(",",$recep);
	foreach($faeno->mostrarTodo("  $codigo  codrecepcion IN ($recep) and fecharegistro LIKE '%$fecharegistro%'") as $fa){$i++;
		$r=array_shift(${$narchivo}->mostrar($fa['codrecepcion']));
		$datos[$i]['codfaeno']=$fa['codfaeno'];
		$datos[$i]['nombreusuario']=$r['nombreusuario'];
		$datos[$i]['ordenderribe']=$fa['ordenderribe'];
		$datos[$i]['cantidadreses']=$fa['cantidadreses'];
		$datos[$i]['cantidadresesxfaenear']=$fa['cantidadresesxfaenear'];
		$datos[$i]['fecharegistro']=$fa['fecharegistro'];
	}
	$titulo=array("nombreusuario"=>"Nombre Usuario","ordenderribe"=>"Orden Derribe","cantidadreses"=>"Cantidad Reses","fecharegistro"=>"Fecha de Faeno");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php",array("Ver Código de Barra"=>"codigo.php"),"","_blank");
}
?>