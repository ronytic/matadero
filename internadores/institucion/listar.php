<?php
include_once("../../login/check.php");
$titulo="Listado de Instituciones";
$folder="../../";
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?> - Criterio de Busqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombe","nombreinstitucion","text","",1,array("size"=>30,"class"=>"an"));?></td>
						<td><?php campos("Color","color","text","",0,array("size"=>30,"class"=>"an"));?></td>
                    </tr>
                    <tr>
                       
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        
        <div id="respuesta"></div>
        </div>
<?php include_once "../../piepagina.php";?>
