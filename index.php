<?php
include_once("login/check.php");
$titulo="Inicio";
$_SESSION['idmenu']=0;
$_SESSION['subm']=0;
?>
<?php include_once("cabecerahtml.php"); ?>
<?php include_once("cabecera.php");?>
  <div class="grid_7">
  <fieldset >
  	<img src="imagenes/vacas.jpg" />
  		
  </fieldset>
  </div>
  <div class="grid_5">
  	<fieldset class="justificar">
    	<div class="titulo">Misión</div>
       	Generar una conciencia de “cultura ciudadana” que concilie las necesidades y urgencias de los individuos con las demandas de las colectividades, para elevar la calidad de vida de los habitantes de la ciudad de La Paz.
    </fieldset>
    <fieldset class="justificar">
    	<div class="titulo">Visión</div>
        Promover valores ciudadanos que articulen la conciencia intercultural armónica y la pertenencia paceña a través de programas de cultura ciudadana con responsabilidad y control.
    </fieldset>
  </div>
<?php include_once("piepagina.php");?>