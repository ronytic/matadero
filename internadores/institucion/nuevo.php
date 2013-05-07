<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Nueva Institución";
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
    	<div class="prefix_4 grid_4 suffix_3">
			<fieldset>
				<div class="titulo"><?php echo $titulo;?></div>
                <form action="guardar.php" method="post">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre Institución","nombreinstitucion","text","",1,array("required"=>"required","size"=>30));?></td>
					</tr>
                    <tr>
						<td><?php campos("Color","color","text","",0,array("required"=>"required","size"=>30));?></td>
					</tr>
					<tr>
						<td><?php campos("Observaciones","observacion","textarea","","",array("rows"=>"10","cols"=>30));?></td>
					</tr>
					<tr><td><?php campos("Guardar Institución","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>

<?php include_once '../../piepagina.php';?>