<?php
include_once("../../login/check.php");
if(isset($_POST)){
	extract($_POST);
	$url="../../impresion/consultas/internacion.php?fechainternacioninicio=$fechainternacioninicio&fechainternacionfinal=$fechainternacionfinal&nombreusuario=$nombreusuario";
	?>
    <iframe src="<?php echo $url?>" width="100%" height="800"></iframe>
    <?php	
}
?>