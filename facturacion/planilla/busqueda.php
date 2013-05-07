<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="planilla";
	include_once("../../class/".$narchivo.".php");
	include_once("../../class/cliente.php");
	include_once("../../class/direccion.php");
	${$narchivo}=new $narchivo;
	$cliente=new cliente;
	$direccion=new direccion;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodoUnion("cliente c,planilla pla","c.*,pla.*","c.paterno ASC,c.materno ASC,c.nombres","c.coddireccion='$coddireccion' and c.codcliente=pla.codcliente and pla.mes='$mes' and pla.anio='$anio'","c.");
	$dir=array_shift($direccion->mostrar($datos[0]['coddireccion']));
	if(count($datos)==0){
		echo " NO SE ENCONTRARON DATOS EN LA PLANILLA, GENERE LA PLANILLA DE ACUERDO AL MES ELEGIDO";
		exit();
	}
	?>
    <div class="titulo"><?php echo $dir['ciudad']." - ".$dir['zona']." - ".$dir['calle']?></div>
    <table class="tablalistado">
	<thead>
		<tr class="cabecera">
			<td>Nº</td>
            <td>Nombre</td>
            <td>Valor en KWB</td>
            <td>Kwb</td>
            <td>Total Factura</td>
            <td>Comp. No</td>
            <td>Obs</td>
        </tr>
    </thead>
    <?php
	foreach($datos as $d){$i++;
		
	?>
    	<tr class="contenido">
    		<td class="der"><?php echo $i;?></td>
            <td><?php echo ucfirst($d['paterno']);?> <?php echo ucfirst($d['materno']);?> <?php echo ucwords($d['nombres']);?></td>
            <td>
            	<input type="text" name="valor[<?php echo $d['codplanilla']?>]" value="<?php echo $d['valor']?>" class="der valores" size="10" rel="<?php echo $d['codplanilla']?>"/>
            </td>
            <td>
                <input type="text" name="kwb[<?php echo $d['codplanilla']?>]" value="<?php echo $d['kwb']?>" class="der" size="5" readonly="readonly" disabled="disabled"/>
            </td>
            <td>
                <input type="text" name="totalfactura[<?php echo $d['codplanilla']?>]" value="<?php echo $d['totalfactura']?>" class="der" size="6" readonly="readonly" disabled="disabled"/>
            </td>
            <td>
                <input type="text" name="comprobanteno[<?php echo $d['codplanilla']?>]" value="<?php echo $d['comprobanteno']?>" class="der" size="5"/>
            </td>
            
            <td>
                <input type="text" name="obs[<?php echo $d['codplanilla']?>]" value="<?php echo $d['observaciones']?>" class="der valorplanilla"/>
            </td>
            <td>
            	<a href="#" class="botoninfo guardar" rel="<?php echo $d['codplanilla']?>">Guardar</a>
            </td>
    	</tr>
    <?php
	}
	?>
    </table>
	<?php
}
?>