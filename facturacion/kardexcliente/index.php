<?php
include_once("../../login/check.php");
$titulo="Kardex de Clientes";
$folder="../../";
include_once("../../funciones/funciones.php");
include_once '../../class/direccion.php';
include_once '../../class/categoria.php';
$direccion=new direccion;
$categoria=new categoria;
$dir=todolista($direccion->mostrarTodo(),"coddireccion","ciudad,zona,calle","-");
$cat=todolista($categoria->mostrarTodo(),"codcategoria","nombre,detalle","-");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
    	<div class="grid_9 prefix_1">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?> - Criterio de Busqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombres","nombre","text","",1);?></td>
						<td><?php campos("Apellido Paterno","paterno","text","");?></td>
                        <td><?php campos("Apellido Materno","materno","text","");?></td>
                        <td><?php campos("C.I","ci","text","");?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Calle","coddireccion","select",$dir);?></td>
                        <td colspan="2"><?php campos("Categoria","codcategoria","select",$cat);?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Año","anio","select",anio(),0,"",date("Y"));?></td>
                        <td><?php campos("Buscar","enviar","submit","");?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        <div id="respuesta"></div>
    </div>
    
<?php include_once "../../piepagina.php";?>
