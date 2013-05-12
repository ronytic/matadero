<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Institución";
$narchivo="institucion";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
$cod=$_GET['cod'];
$dat=array_shift(${$narchivo}->mostrar($cod));
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
    	<div class="prefix_4 grid_4 suffix_3">
			<fieldset>
				<div class="titulo"><?php echo $titulo;?></div>
                <form action="actualizar.php" method="post">
                <?php campos("","cod","hidden",$cod)?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre Institución","nombreinstitucion","text",$dat['nombreinstitucion'],1,array("required"=>"required","size"=>30,"class"=>"an"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Color","color","text",$dat['color'],0,array("required"=>"required","size"=>30,"class"=>"an"));?></td>
					</tr>
					<tr>
						<td><?php campos("Observaciones","observacion","textarea",$dat['observacion'],"",array("rows"=>"10","cols"=>30,"class"=>"an"));?></td>
					</tr>
					<tr><td><?php campos("Guardar Institución","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>

<?php include_once '../../piepagina.php';?>