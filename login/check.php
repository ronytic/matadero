<?php
session_start();
$archivo=$_SERVER['SCRIPT_NAME'];
$folderFile=explode("/",$archivo);
$subfolder=$folderFile[1];
include_once($_SERVER['DOCUMENT_ROOT']."/".$subfolder."/config.php");
include_once($_SERVER['DOCUMENT_ROOT']."/".$subfolder."/funciones/funciones.php");
if(empty($ta4) || $ta4!="Pcai+AhqjXpikVTKbjAem/0q5W615ERWDfz1IWVINB0yKHiFRbgpGMKJBnGHETWRp7I6wkvgJRcLe+N+BJVHWQ=="){ die("Error del Sistema");}else{$ta4="Pcai+AhqjXpikVTKbjAem/0q5W615ERWDfz1IWVINB0yKHiFRbgpGMKJBnGHETWRp7I6wkvgJRcLe+N+BJVHWQ==";}
if(strtotime(date("Y-m-d"))>=1368241200){echo utf8_decode("EL Sistema ya caduco la Versión de Prueba");exit();}
if(!(isset($_SESSION["login"]) && $_SESSION['login']==1)){
	header("Location:".$url.$directory."login/?u=".$_SERVER['PHP_SELF']);
}
?>