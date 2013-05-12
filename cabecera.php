</head>
<body>
<div class="container_12" id="cabecera"> 
	<div class="grid_2">
		<img src="<?php echo $folder;?>imagenes/logo.png" width="150" height="150">
	</div>
	<div class="grid_10">
    	<div class="titulo1">
    	SISTEMA DE INFORMACIÓN MATADERO MUNICIPAL - ACHACHICALA
        </div>
        <div class="botones">
        	<span class="pequenol">Nombre:</span> <?php echo $uslogin['nombre'];?> | 
			<span class="pequenol">Usuario:</span> <?php echo $uslogin['usuario'];?> |
			<span class="pequenol">Hora Acceso:</span> <?php echo $_SESSION['horasesion'];?> |
			<a href="<?php echo $folder?>usuarios/cambiarp.php" class="enlace">Cambiar Contraseña</a>
			<a href="<?php echo $folder ?>login/logout.php" class="botonerror">Salir</a>
        </div>
	</div>
	<div class="clear"></div>
</div>
<div class="container_12" id="cuerpo">
<div class="grid_12">
	<ul id="css3menu1" class="topmenu" style="margin:15px 0px 15px 0px;">
	<li class="topfirst"><a href="<?php echo $url.$directory;?>" style="height:15px;line-height:15px;" class="pressed">Inicio</a></li>
    	<?php foreach($menu->mostrarMenu($nivel) as $m){
		?><li class="topmenu"><a href="<?php echo $m['submenu']==0?$m['url']:'#';?>" style="height:15px;line-height:15px;"><span><?php echo $m['nombre']?></span></a><?php
		if($m['submenu']){
			?><ul><?php
			$i=0;
			foreach($submenu->mostrarSubMenu($nivel,$m['codmenu'])	as $sm){$i++;
				if($i==1){
					?><li class="subfirst"><a href="<?php echo $folder;?><?php echo $m['url'];?><?php echo $sm['url'];?>"><?php echo $sm['nombre'];?></a></li><?php	
				}else{
					?><li><a href="<?php echo $folder;?><?php echo $m['url'];?><?php echo $sm['url'];?>"><?php echo $sm['nombre'];?></a></li><?php
				}
				$i++;
			}
			?></ul><?php
		}
		?></li><?php
	}?>
    </ul>
</div>
<div class="clear"></div>