<?php 
include_once 'class/menu.php';
include_once 'class/submenu.php';
$menu=new menu;
$submenu=new submenu;
?>
<div  class="grid_12" >
<br>
	<div id="pettabs" class="indentmenu">
        <ul>
			<li><a href="<?php echo $folder; ?>index.php" class="selected"><img src="<?php echo $folder; ?>imagenes/ico/home2.png" width="40" height="40" align="middle" />INICIO</a></li>
		<?php 
			$i=1;
			foreach ($menu->mostrarMenu($codusuario) as $m) {$i++;
				?>
				<li><a href="#" rel="tab<?php echo $i;?>"><img src="<?php echo $folder; ?>imagenes/ico/<?php echo $m['imagen'] ?>" width="40" height="40" align="middle" /><?php echo $m['nombre'] ?></a></li>
				<?php
			}
		?>
		</ul>
	</div>
	<div class="tabcontentstyle">
			<div id="tab1" class="tabcontent" align="center">
           Bienvenido a SIGOCYMP <br />
"Sistemas de Obras Civiles y Maquinaria Pesada."<br />
            </div>
            
        	<?php 
			$i=1;
			foreach ($menu->mostrarMenu($codusuario) as $m) {$i++;
				?>
				<div id="tab<?php echo $i; ?>" class="tabcontent">
            	<ul>
                  <?php foreach ($submenu->mostrarSubMenu($codusuario,$m['idmenu']) as $sb): ?>
                  	<li><a href="<?php echo $folder?><?php echo $m['url'] ?><?php echo $sb['url'] ?>" class="botonsubmenu"><?php echo $sb['nombre'] ?></a></li>	
                  <?php endforeach ?>
                </ul>
            </div>
				<?php
			}
			?>
   
	</div>
	<script type="text/javascript">
        var mypets=new ddtabcontent("pettabs")
        mypets.setpersist(true)
        mypets.setselectedClassTarget("link")
        mypets.init(false)   
	</script>		
</div>
<div class="clear"></div>
<div class="grid_12">
	<div class="usuariocuerpo">
		<span class="pequenol">Nombre:</span> <?php echo $us['nombre'];?> | 
		<span class="pequenol">Usuario:</span> <?php echo $us['usuario'];?> |
		<span class="pequenol">Hora Acceso:</span> <?php echo $_SESSION['horasesion'];?> |
		<a href="<?php echo $folder?>usuarios/cambiarp.php?id=<?php echo $_SESSION['idusuario']?>" class="enlace">Cambiar Contraseña</a>
		<a href="<?php echo $folder ?>login/logout.php" class="botonerror">Salir</a>
	</div>
</div>
<div class="clear"></div>