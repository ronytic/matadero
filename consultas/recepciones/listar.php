<?php
include_once("../../login/check.php");
$titulo="Consulta de Recepciones de GANADO";
$folder="../../";
include_once("../../funciones/funciones.php");
include_once '../../class/institucion.php';
include_once '../../class/recepcion.php';
//include_once '../../class/categoria.php';
$institucion=new institucion;
$recepcion=new recepcion;
$i=0;
$datos=array();
foreach($recepcion->mostrarTodo() as $recep){$i++;
	$ins=array_shift($institucion->mostrar($recep['codinstitucion']));
	$datos[$i]['codrecepcion']=$recep['codrecepcion'];
	$datos[$i]['nombreusuario']=$recep['nombreusuario'];
}
//$categoria=new categoria;
$rec=todolista($datos,"codrecepcion","codrecepcion,nombreusuario"," - ");
//$cat=todolista($categoria->mostrarTodo(),"codcategoria","nombre,detalle","-");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
    	<div class="grid_9 prefix_1">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?> - Criterio de Busqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombre Usuario","nombreusuario","select",$rec,1);?></td>
                        <td><?php campos("Fecha Internación Inicio","fechainternacioninicio","date",date("Y-m-d"));?></td>
                        <td><?php campos("Fecha Internación Final","fechainternacionfinal","date",date("Y-m-d"));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","");?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        <div id="respuesta"></div>
    </div>
    
<?php include_once "../../piepagina.php";?>
