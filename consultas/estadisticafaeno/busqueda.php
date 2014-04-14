<?php
include_once("../../login/check.php");
if(isset($_POST)){
	include_once("../../class/recepcion.php");
	include_once("../../class/faeno.php");
	$recepcion=new recepcion;
	$faeno=new faeno;
	//print_r($_POST);
	extract($_POST);
	
	
	
	$codinstitucion=$codinstitucion!=""?"and codinstitucion='$codinstitucion'":"and codinstitucion LIKE '%'";
	
	
	$recep=$recepcion->mostrarTodo("nombreusuario LIKE '%$nombreusuario%' $codinstitucion","nombreusuario");
	$recep=todolista($recep,"codrecepcion","codrecepcion");
	$recep=implode(",",$recep);
	
	
	$InicioInt=strtotime($fechainternacioninicio);
	$FinInt=strtotime($fechainternacionfinal);
	
	$datos=array();
	
	for($i=$InicioInt;$i<=$FinInt;$i=$i+86400)
	{
		$FechaDia=date("Y-m-d",$i);
		
		$fae=$faeno->mostrarTodo(" codrecepcion IN ($recep) and fecharegistro='$FechaDia'");
		
		//echo "<br>";
		$cantidadfae=count($fae);
		//echo "<br>";
		$datos[$FechaDia]=$cantidadfae;
		//echo $i." - ".$FechaDia;	
	}
	//echo  "<br>";
	//print_r($datos);
	
	?>
    <script type="text/javascript" language="javascript">
	$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grafica',
                type: 'column'
            },
            title: {
                text: 'Estadísticas de Faeno de GANADO'
            },
            subtitle: {
                text: 'Matadero Achachicala'
            },
            xAxis: {
                categories: [
				
				<?php 
				foreach($datos as $k=>$v){
					echo "'$k',";	
				}
				?>
                    
                ],labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Faenos (reses)'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' reses';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: 'Cantidad de Reses Faeneadas',
                data: [
				<?php 
				foreach($datos as $k=>$v){
					echo "$v,";	
				}
				?>
				]
    
            }]
        });
    });
    
});
	</script>
    <?php
}
?>
<div id="grafica"></div>