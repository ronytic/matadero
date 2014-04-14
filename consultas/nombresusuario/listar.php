<?php
include_once("../../login/check.php");
$titulo="Consulta de Listado de Usuario Internadores";
$folder="../../";
include_once("../../funciones/funciones.php");
include_once '../../class/institucion.php';
//include_once '../../class/categoria.php';
$institucion=new institucion;
//$categoria=new categoria;
$inst=todolista($institucion->mostrarTodo("","nombreinstitucion"),"codinstitucion","color,nombreinstitucion"," - ");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
    	<div class="grid_9 prefix_1">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?> - Criterio de Busqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombre Usuario","nombreusuario","text","",1);?></td>
						<td><?php campos("Institución","codinstitucion","select",$inst);?></td>
                        <td><?php campos("Marca","marca","text","");?></td>
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
    	<div id="respuesta"></div>
    </div>
<?php include_once "../../piepagina.php";?>
