<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Nueva Recepción - Internación";
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
//include_once '../../class/direccion.php';
include_once '../../class/institucion.php';
//$direccion=new direccion;
$institucion=new institucion;
//$dir=todolista($direccion->mostrarTodo(),"coddireccion","ciudad,zona,calle","-");
$inst=todolista($institucion->mostrarTodo(),"codinstitucion","color,nombreinstitucion"," - ");
$tamano=array("Grande"=>"Grande","Mediano"=>"Mediano","Pequeño"=>"Pequeño");
?>
<?php include_once '../../cabecera.php';?>
<div class="prefix_3 grid_4 suffix_3">
    <fieldset>
        <div class="titulo"><?php echo $titulo;?></div>
        <form action="guardar.php" method="post">
        <table class="tablareg">
            <tr>
                <td colspan="2"><?php campos("Nombre Usuario","nombreusuario","text","",1,array("required"=>"required","size"=>50,"class"=>"an"));?></td>
                
            </tr>
            <tr>
            	<td><?php campos("Marca","marca","text","",0,array("required"=>"required","size"=>30,"class"=>"an"));?></td>
                <td colspan="2"><?php campos("Institución","codinstitucion","select",$inst);?></td>
            </tr>
            <tr>
            	<td colspan="2"><?php campos("Tamaño de Res","tamano","select",$tamano);?></td>
            </tr>
            <tr>
                <td><?php campos("Cantidad de Reses","cantidadreses","number","1",0,array("required"=>"required","size"=>30,"min"=>1,"class"=>"n"));?>
                </td>
                <td rowspan="2"><?php campos("Placa","placa","text","",0,array("required"=>"required","size"=>30,"class"=>"an"));?></td>
            </tr>
            <tr>
            	<td>
                <div class="rojoC">
                	Por Seguridad la cantidad de reses no podrá modificarse posteriormente, Revíselo con cuidado
                </div>
                </td>
            </tr>
            <tr>
                <td><?php campos("Procedencia","procedencia","text","",0,array("size"=>30,"class"=>"an"));?></td>
                <td><?php campos("Fecha Registro","fecharegistro","date",date("Y-m-d"),0,array("size"=>30,"class"=>"n","required"=>"required"));?></td>
            </tr>
            <tr>
                <td colspan="2"><?php campos("Observaciones","observaciones","textarea","","",array("rows"=>5,"cols"=>50,"size"=>30,"class"=>"an"));?></td>
            </tr>
            <tr><td><?php campos("Guardar Recepción","guardar","submit");?></td><td></td></tr>
        </table>
        </form>
    </fieldset>
</div>

<?php include_once '../../piepagina.php';?>