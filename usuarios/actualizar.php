<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="usuarios";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
if(empty($password)){
$valores=array("usuario"=>"'$usuario'",
			
			"nombre"=>"'$nombres'",
			"apellidos"=>"'$apellidos'",
			"email"=>"'$email'",
			"nivel"=>"'$nivel'",
			"obs"=>"'$observacion'"
			);
}else{
	$valores=array("usuario"=>"'$usuario'",
			"password"=>"MD5('$password')",				
			"nombre"=>"'$nombres'",
			"apellidos"=>"'$apellidos'",
			"email"=>"'$email'",
			"nivel"=>"'$nivel'",
			"obs"=>"'$observacion'"
			);
}
${$narchivo}->actualizar($valores,$cod);
$codinsercion=$cod;
$mensaje[]="EL USUARIO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>