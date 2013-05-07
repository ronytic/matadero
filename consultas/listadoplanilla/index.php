<?php
include_once("../../login/check.php");
$titulo="Listado de Planillas de Facturación";
$folder="../../";
include_once("../../funciones/funciones.php");
include_once '../../class/direccion.php';
include_once '../../class/categoria.php';
$direccion=new direccion;
$categoria=new categoria;
$dir=todolista($direccion->mostrarTodo(),"coddireccion","calle,zona,ciudad","-");
$cat=todolista($categoria->mostrarTodo(),"codcategoria","nombre,detalle","-");
include_once "../../cabecerahtml.php";
?>

<?php include_once "../../cabecera.php";?>
    	<div class="grid_9 prefix_1">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?> - Criterio de Busqueda</div>
            <form  action="busqueda.php" method="post" target="respuesta">
                <table class="tablabus">
                    <tr>
                    	<td colspan="2"><?php campos("Calle/Zona/Ciudad","coddireccion","select",$dir,1);?></td>
                        <td colspan="2"><?php campos("Meses","mes","select",meses(),"","",date("m"));?></td>
                        <td colspan="2"><?php campos("Año","anio","select",anio(),"","",date("Y"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","");?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
    </div>
    <div class="clear"></div>
    <div class="grid_12">
    	<iframe id="respuesta" name="respuesta" width="100%" height="500">
        </iframe>
    </div>
<?php include_once "../../piepagina.php";?>
