<?php
include_once("../../login/check.php");
if(!empty($_GET)){
	$cod=$_GET['id'];
	$mes=$_GET['mes'];
	$anio=$_GET['anio'];
	include_once("../../class/cliente.php");
	include_once("../../class/direccion.php");
	include_once("../../class/planilla.php");
	$cliente=new cliente;
	$direccion=new direccion;
	$planilla=new planilla;
	$cli=array_shift($cliente->mostrar($cod));
	$dir=array_shift($direccion->mostrar($cli['coddireccion']));
	$pla=array_shift($planilla->mostrarTodo("mes=$mes and anio=$anio and codcliente=$cod"));
	$titulo="Pago de Factura";
	$folder="../../";
	include_once("../../cabecerahtml.php");
	include_once("../../cabecera.php");
}
?>
<div class=" prefix_3 grid_6 suffix_3">
	<fieldset>
    	<div class="titulo">Pagar Factura</div>
        <form action="guardar.php" method="post">
        <?php campos("","cod","hidden",$pla['codplanilla'])?>
        <table class="tablareg">
        <tr><td><?php campos("Nombre Cliente","cliente","text",ucwords($cli['paterno']." ".$cli['materno']." ".$cli['nombres']),0,array("size"=>30,"readonly"=>"readonly"));?></td></tr>
        <tr><td><?php campos("Cantidad Kwb","kwb","text",ucwords($pla['kwb']),0,array("size"=>30,"readonly"=>"readonly"));?></td></tr>
        <tr><td><?php campos("Mes","cliente","text",ucwords(mes($pla['mes'])),0,array("size"=>30,"readonly"=>"readonly"));?></td></tr>
        <tr><td><?php campos("Año","cliente","text",ucwords($pla['anio']),0,array("size"=>30,"readonly"=>"readonly"));?></td></tr>
        <tr><td><?php campos("Costo","cliente","text",ucwords($pla['total']),0,array("size"=>30,"readonly"=>"readonly"));?></td></tr>
        <tr><td><?php campos("Estado de pago","estado","select",array("0"=>"Pendiente","1"=>"Cancelado"),0,"",$pla['pagado']);?></td></tr>
        <tr><td><?php campos("Guardar","","submit");?></td></tr>
        </table>
        </form>
    </fieldset>

</div>
<?php include_once("../../piepagina.php");?>