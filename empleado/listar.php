<?php
include_once("../login/check.php");
$titulo="Listado de Empleados";
$folder="../";
include_once("../funciones/funciones.php");
include_once "../cabecerahtml.php";
?>
<?php include_once "../cabecera.php";?>
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
                    	<td colspan="2"><?php campos("Categoria de Empleado","categoria","select",array("Administrador"=>"Administrador","Encargado"=>"Encargado","Supervisor"=>"Supervisor","Secretaria"=>"Secretaria","Portero"=>"Portero"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","");?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        <div id="respuesta"></div>
    </div>
    
<?php include_once "../piepagina.php";?>
