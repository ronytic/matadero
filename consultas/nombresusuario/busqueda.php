<?php
include_once("../../login/check.php");
if(isset($_POST)){
	extract($_POST);
	$url="../../impresion/consultas/usuarios.php?nombreusuario=$nombreusuario&codinstitucion=$codinstitucion&marca=$marca";
	?>
    <iframe src="<?php echo $url?>" width="100%" height="800"></iframe>
    <?php	
}
?>