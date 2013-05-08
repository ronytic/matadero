<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Recepción - Internación";
$narchivo="recepcion";
include_once("../../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
$cod=$_GET['cod'];
$dat=array_shift(${$narchivo}->mostrar($cod));
include_once '../../funciones/funciones.php';
//include_once '../../class/direccion.php';
include_once '../../class/institucion.php';
//$direccion=new direccion;
$institucion=new institucion;
//$dir=todolista($direccion->mostrarTodo(),"coddireccion","ciudad,zona,calle","-");
$inst=todolista($institucion->mostrarTodo(),"codinstitucion","color,nombreinstitucion"," - ");


include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="prefix_3 grid_4 suffix_3">
<fieldset>
    <div class="titulo"><?php echo $titulo;?></div>
    <form action="actualizar.php" method="post">
    <?php campos("","cod","hidden",$cod)?>
    <table class="tablareg">
            <tr>
                <td colspan="2"><?php campos("Nombre Usuario","nombreusuario","text",$dat['nombreusuario'],1,array("required"=>"required","size"=>50));?></td>
            </tr>
            <tr>
            	<td><?php campos("Marca","marca","text",$dat['marca'],0,array("required"=>"required","size"=>30));?></td>
                <td colspan="2"><?php campos("Institución","codinstitucion","select",$inst,0,"",$dat['codinstitucion']);?></td>
            </tr>
            <tr>
                <td><?php campos("Cantidad Reses","cantidadreses","number",$dat['cantidadreses'],0,array("required"=>"required","size"=>30,"min"=>0));?></td>
                <td><?php campos("Placa","placa","text",$dat['placa'],0,array("required"=>"required","size"=>30));?></td>
            </tr>
            <tr>
                <td><?php campos("Procedencia","procedencia","text",$dat['procedencia'],0,array("size"=>30));?></td>
                <td><?php campos("Fecha Registro","fecharegistro","date",$dat['fecharegistro'],0,array("size"=>30));?></td>
            </tr>
            <tr>
                <td colspan="2"><?php campos("Observaciones","observaciones","textarea",$dat['observaciones'],"",array("rows"=>5,"cols"=>50,"size"=>30));?></td>
            </tr>
            <tr><td><?php campos("Guardar Recepción","guardar","submit");?></td><td></td></tr>
        </table>
    </form>
</fieldset>
</div>

<?php include_once '../../piepagina.php';?>