<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar dato de Distribución";
$narchivo="distribucion";
include_once("../../class/".$narchivo.".php");
include_once("../../class/recepcion.php");
${$narchivo}=new $narchivo;
$recepcion=new recepcion;
$cod=$_GET['cod'];
$dis=array_shift(${$narchivo}->mostrar($cod));
$dat=array_shift($recepcion->mostrar($dis['codrecepcion']));
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
    <div class="titulo">Datos del Usuario Internador</div>

    <table class="tablareg">
            <tr>
                <td colspan="2"><?php campos("Nombre Usuario","nombreusuario","text",$dat['nombreusuario'],0,array("required"=>"required","readonly"=>"readonly","size"=>50));?></td>
            </tr>
            <tr>
            	<td><?php campos("Marca","marca","text",$dat['marca'],0,array("required"=>"required","size"=>30,"readonly"=>"readonly"));?></td>
                <td colspan="2"><?php campos("Institución","codinstitucion","select",$inst,0,array("readonly"=>"readonly","disabled"=>"disabled"),$dat['codinstitucion']);?></td>
            </tr>
            <tr>
                <td><?php campos("Cantidad Reses Internados","cantidadreses","number",$dat['cantidadreses'],0,array("required"=>"required","size"=>30,"readonly"=>"readonly"));?></td>
                <td><?php campos("Placa","placa","text",$dat['placa'],0,array("required"=>"required","size"=>30,"readonly"=>"readonly"));?></td>
            </tr>
            <tr>
                <td><?php campos("Procedencia","procedencia","text",$dat['procedencia'],0,array("size"=>30,"readonly"=>"readonly"));?></td>
                <td><?php campos("Fecha Registro de Internación","fecharegistro","date",$dat['fecharegistro'],0,array("size"=>30,"readonly"=>"readonly","readonly"=>"readonly"));?></td>
            </tr>
            <tr>
                <td colspan="2"><?php campos("Observaciones","observaciones","textarea",$dat['observaciones'],"",array("rows"=>5,"cols"=>50,"size"=>30,"readonly"=>"readonly"));?></td>
            </tr>
            
        </table>
    </form>
</fieldset>
<fieldset>
	<div class="titulo">Datos de Distribución</div>
 	<form action="actualizar.php" method="post">
    <?php campos("","codrecepcion","hidden",$cod)?>
   	<table class="tablareg">
    	<tr>
        	<td><?php campos("Tipo de Vehiculo","tipovehiculo","text",$dis["tipovehiculo"],1,array("required"=>"required","size"=>30))?></td>
            <td><?php campos("Nro Placa","numeroplaca","text",$dis["numeroplaca"],0,array("required"=>"required","size"=>30))?></td>
        </tr>
        <tr>
        	<td><?php campos("Fecha Distribución","fechadistribucion","date",$dis["fechadistribucion"],0,array("size"=>30,"max"=>date("Y-m-d")));?></td>
            <td><?php campos("Nombre Responsable","nombreresponsable","text",$dis["nombreresponsable"],0,array("required"=>"required","size"=>30))?></td>
        </tr>
        <tr>
        	<td><?php campos("Destino","destino","text",$dis["destino"],0,array("required"=>"required","size"=>30))?></td>
            <td><?php campos("Expedido en:","expedido","text",$dis["expedido"],0,array("required"=>"required","size"=>30))?></td>
        </tr>
        <tr>
                <td colspan="2"><?php campos("Observaciones","observaciones","textarea",$dis["observaciones"],0,array("rows"=>5,"cols"=>50,"size"=>30));?></td>
        </tr>
		<tr><td><?php campos("Guardar Distribución","guardar","submit");?></td><td></td></tr> 
    </table>
    </form>   
</fieldset>
</div>

<?php include_once '../../piepagina.php';?>