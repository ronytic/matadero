<?php
include_once 'class/usuarios.php';
include_once("class/menu.php");
include_once("class/submenu.php");
$menu=new menu;
$submenu=new submenu;
$nivel=$_SESSION['nivel'];
$codusuario=$_SESSION['idusuario'];
if(!isset($usuarios)){
	$usuarios=new usuarios;
}
$uslogin=array_shift($usuarios->mostrar($codusuario));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php php_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php php_start();?>" />
<title><?php echo $titulo;?> | Sistema de Gestión de Mataderos</title>
<link href="<?php echo $folder;?>css/960/960.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $folder;?>css/estilo.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $folder;?>css/style.css" type="text/css" rel="stylesheet" media="screen">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $folder; ?>imagenes/favicon.ico" />
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/busquedas/busquedas.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.alphanumeric.pack.js"></script>
<script language="javascript">
$(document).on("ready",inicio);
function inicio(){
	$('.an').alphanumeric({'allow':' '});	
	$('.n').numeric();
}
</script>
