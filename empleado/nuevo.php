<?php
include_once '../login/check.php';
$folder="../";
$titulo="Nuevo Empleado";
include_once '../funciones/funciones.php';
include_once '../cabecerahtml.php';
include_once '../class/direccion.php';
include_once '../class/categoria.php';
$direccion=new direccion;
$categoria=new categoria;
$dir=todolista($direccion->mostrarTodo(),"coddireccion","ciudad,zona,calle","-");
$cat=todolista($categoria->mostrarTodo(),"codcategoria","nombre,detalle","-");
?>
<?php include_once '../cabecera.php';?>
<div class="prefix_3 grid_4 suffix_3">
    <fieldset>
        <div class="titulo"><?php echo $titulo;?></div>
        <form action="guardar.php" method="post">
        <table class="tablareg">
            <tr>
                <td><?php campos("Nombres","nombres","text","",1,array("required"=>"required","size"=>30));?></td>
                <td><?php campos("Apellido Paterno","paterno","text","",0,array("required"=>"required","size"=>30));?></td>
            </tr>
            <tr>
                <td><?php campos("Apellido Materno","materno","text","",0,array("required"=>"required","size"=>30));?></td>
                <td><?php campos("C.I.","ci","text","",0,array("required"=>"required","size"=>30));?></td>
            </tr>
            <tr>
                <td><?php campos("Fecha de Nacimiento","fechanac","date","",0,array("size"=>30,"autocomplete"=>"off"));?></td>
            </tr>
            <tr>
                <td colspan="2"><?php campos("Dirección","direccion","text","",0,array("required"=>"required","size"=>69));?></td>
            </tr>
            <tr>
                <td colspan="1"><?php campos("Categoria de Empleado","categoria","select",array("Administrador"=>"Administrador","Encargado"=>"Encargado","Supervisor"=>"Supervisor","Secretaria"=>"Secretaria","Portero"=>"Portero"));?></td>
                <td><?php campos("Cargo","cargo","text","",0,array("size"=>30));?></td>
            </tr>
            <tr>
            	<td><?php campos("Fecha de Ingreso","fechaingreso","date","",0,array("size"=>30,"autocomplete"=>"off"));?></td>
                <td><?php campos("Sueldo","sueldo","text","",0,array("size"=>30,"autocomplete"=>"off"));?></td>
            </tr>
            <tr>
                <td colspan="2"><?php campos("Observaciónes","observacion","textarea","","",array("rows"=>5,"cols"=>50,"size"=>30));?></td>
            </tr>
            <tr><td><?php campos("Guardar Empleado","guardar","submit");?></td><td></td></tr>
        </table>
        </form>
    </fieldset>
</div>

<?php include_once '../piepagina.php';?>