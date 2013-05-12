<?php
include_once '../login/check.php';
$folder="../";
$titulo="Modificar Usuario";
$narchivo="usuarios";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
$cod=$_GET['cod'];
$us=array_shift(${$narchivo}->mostrar($cod));
include_once '../funciones/funciones.php';
include_once '../cabecerahtml.php';
?>
<?php include_once '../cabecera.php';?>
    	<div class="prefix_3 grid_4 suffix_3">
			<fieldset>
				<div class="titulo"><?php echo $titulo;?></div>
                <form action="actualizar.php" method="post">
                <?php campos("","cod","hidden",$cod)?>
				<table class="tablareg">
                	<tr>
						<td><?php campos("Usuario","usuario","text",$us['usuario'],1,array("required"=>"required","size"=>30));?></td>
						<td><?php campos("Contraseña","password","text","",0,array("size"=>30));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text",$us['nombre'],0,array("required"=>"required","size"=>30));?></td>
						<td><?php campos("Apellidos","apellidos","text",$us['apellidos'],0,array("required"=>"required","size"=>30));?></td>
					</tr>
                    <tr>
						<td><?php campos("Email","email","text",$us['usuario'],0,array("size"=>30));?></td>
						<td><?php campos("Nivel","nivel","select",array("2"=>"Administrador","3"=>"Secretaria","4"=>"Tecnico Operario","5"=>"Portero-Guardia"),"","",$us['nivel']);?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Observación","observacion","textarea",$us['obs'],"",array("rows"=>5,"cols"=>50,"size"=>30));?></td>
					</tr>
					<tr><td><?php campos("Guardar Usuario","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>

<?php include_once '../piepagina.php';?>