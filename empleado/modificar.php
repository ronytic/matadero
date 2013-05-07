<?php
include_once '../login/check.php';
$folder="../";
$titulo="Modificar Empleado";
$narchivo="empleado";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
$cod=$_GET['cod'];
$dat=array_shift(${$narchivo}->mostrar($cod));
include_once '../funciones/funciones.php';
include_once '../cabecerahtml.php';
?>
<?php include_once '../cabecera.php';?>
<div class="prefix_3 grid_4 suffix_3">
<fieldset>
    <div class="titulo"><?php echo $titulo;?></div>
    <form action="actualizar.php" method="post">
    <?php campos("","cod","hidden",$cod)?>
    <table class="tablareg">
        <tr>
            <td><?php campos("Nombres","nombres","text",$dat['nombres'],1,array("required"=>"required","size"=>30));?></td>
            <td><?php campos("Apellido Paterno","paterno","text",$dat['paterno'],0,array("required"=>"required","size"=>30));?></td>
        </tr>
        <tr>
            <td><?php campos("Apellido Materno","materno","text",$dat['materno'],0,array("required"=>"required","size"=>30));?></td>
            <td><?php campos("C.I.","ci","text",$dat['ci'],0,array("required"=>"required","size"=>30));?></td>
        </tr>
        <tr>
            <td><?php campos("Fecha de Nacimiento","fechanac","date",$dat['fechanac'],0,array("size"=>30,"autocomplete"=>"off"));?></td>
        </tr>
        <tr>
            <td colspan="2"><?php campos("Dirección","direccion","text",$dat['direccion'],0,array("required"=>"required","size"=>69));?></td>
        </tr>
        <tr>
            <td colspan="1"><?php campos("Categoria de Empleado","categoria","select",array("Administrador"=>"Administrador","Encargado"=>"Encargado","Supervisor"=>"Supervisor","Secretaria"=>"Secretaria","Portero"=>"Portero"),0,"",$dat['categoria']);?></td>
            <td><?php campos("Cargo","cargo","text",$dat['cargo'],0,array("size"=>30));?></td>
        </tr>
        <tr>
            <td><?php campos("Fecha de Ingreso","fechaingreso","date",$dat['fechaingreso'],0,array("size"=>30,"autocomplete"=>"off"));?></td>
            <td><?php campos("Sueldo","sueldo","text",$dat['sueldo'],0,array("size"=>30,"autocomplete"=>"off"));?></td>
        </tr>
        <tr>
            <td colspan="2"><?php campos("Observaciónes","observacion","textarea",$dat['observacion'],"",array("rows"=>5,"cols"=>50,"size"=>30));?></td>
        </tr>
        <tr><td><?php campos("Guardar Empleado","guardar","submit");?></td><td></td></tr>
    </table>
    </form>
</fieldset>
</div>

<?php include_once '../piepagina.php';?>