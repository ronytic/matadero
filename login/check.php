<?php
session_start();
$archivo=$_SERVER['SCRIPT_NAME'];
$folderFile=explode("/",$archivo);
$subfolder=$folderFile[1];
include_once($_SERVER['DOCUMENT_ROOT']."/".$subfolder."/config.php");
if(empty($ta4)){ die("Error del Sistema");}else{$ta4="Pcai+AhqjXpikVTKbjAem/0q5W615ERWDfz1IWVINB0yKHiFRbgpGMKJBnGHETWRp7I6wkvgJRcLe+N+BJVHWQ==";}
if(!(isset($_SESSION["login"]) && $_SESSION['login']==1)){
	header("Location:".$url.$directory."login/?u=".$_SERVER['PHP_SELF']);
}
?>