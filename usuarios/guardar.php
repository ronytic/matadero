<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="usuarios";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("usuario"=>"'$usuario'",
			"password"=>"MD5('$password')",
			"nombre"=>"'$nombres'",
			"apellidos"=>"'$apellidos'",
			"email"=>"'$email'",
			"nivel"=>"'$nivel'",
			"obs"=>"'$observacion'",
			"act"=>"'1'"
			);
${$narchivo}->insertar($valores);
$codinsercion=${$narchivo}->last_id();
$mensaje[]="EL USUARIO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>