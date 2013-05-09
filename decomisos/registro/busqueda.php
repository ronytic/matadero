<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="recepcion";
	include_once("../../class/".$narchivo.".php");
	include_once("../../class/decomisos.php");
	${$narchivo}=new $narchivo;
	$decomisos=new decomisos;
	extract($_POST);
	$recep=${$narchivo}->mostrarTodo("nombreusuario LIKE '%$nombreusuario%' and marca LIKE '%$marca%' and codinstitucion LIKE '%$codinstitucion%'");
//	$datos=${$narchivo}->mostrarTodoUnion("cliente c,categoria cat,direccion dir","c.*,cat.*,dir.*","c.paterno","c.nombres LIKE '%$nombres%' and c.paterno LIKE '%$paterno%' and c.materno LIKE '%$materno%' and c.ci LIKE '%$ci%' and c.coddireccion LIKE '%$coddireccion%' and c.codcategoria LIKE '%$codcategoria%' and c.codcategoria=cat.codcategoria and dir.coddireccion=c.coddireccion","c.");

 
	$recep=todolista($recep,"codrecepcion","codrecepcion");
	$recep=implode(",",$recep);
	foreach($decomisos->mostrarTodo("codrecepcion IN ($recep) and fechadecomiso LIKE '%$fecharegistro%'") as $dec){$i++;
		$r=array_shift(${$narchivo}->mostrar($dec['codrecepcion']));
		$datos[$i]['codfaeno']=$dec['coddecomisos'];
		$datos[$i]['nombreusuario']=$r['nombreusuario'];
		$datos[$i]['decomisosantemortem']=$dec['decomisosantemortem'];
		$datos[$i]['decomisospostmortem']=$dec['decomisospostmortem'];
		$datos[$i]['fechadecomiso']=$dec['fechadecomiso'];
	}
	$titulo=array("nombreusuario"=>"Nombre Usuario","decomisosantemortem"=>"Decomisos AnteMortem","decomisospostmortem"=>"Decomisos PostMortem","fechadecomiso"=>"Fecha Decomisos");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>