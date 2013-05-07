<?php
include_once $folder.'cabecerahtml.php';
if($archivonuevo=="" && empty($archivonuevo)){
	$archivonuevo="nuevo.php";
}
if($archivovolver=="" && empty($archivovolver)){
	$archivovolver="modificar.php";
}
if($archivolistar=="" && empty($archivolistar)){
	$archivolistar="listar.php";
}

?>
<?php include_once $folder.'cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
                <?php
                foreach($mensaje as $m){
					?>
                    <div class="titulo"><?php echo $m?></div>
                    <?php
						
				}
				?>
                <hr />
                <?php if($nuevo==0){?>
                <a href="<?php echo $archivonuevo;?>" class="botonerror" >Nuevo Registro</a>
                <?php }?>
                <?php if($volver==0){?>
                <a href="<?php echo $archivovolver;?>?cod=<?php echo $codinsercion;?>" class="botoninfo" >Modificar Registro Insertado</a>
                <?php }?>
                <?php if($listar==0){?>
                <a href="<?php echo $archivolistar;?>" class="botonalerta">Listar Registros</a>
                <?php }?>
         	</fieldset>
        </div>
        <div class="clear"></div>
    </div>
</div> 
<?php include_once($folder."piepagina.php")?>