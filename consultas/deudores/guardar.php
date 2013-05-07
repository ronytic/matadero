<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="planilla";
include_once("../../class/".$narchivo.".php");
include_once("../../class/cliente.php");
include_once("../../class/categoria.php");
${$narchivo}=new $narchivo;
$cliente=new cliente;
$categoria=new categoria;
extract($_POST);
$valorformulario=0.5;
$luminarias=1;
$alumbradopublico=3.5;
if($valor==""){$valor=0;}
$pla=array_shift(${$narchivo}->mostrar($cod));
$pmes=$pla['mes'];
$panio=$pla['anio'];
$pcodcliente=$pla['codcliente'];
	$dcliente=array_shift($cliente->mostrarTodo("CodCliente=$pcodcliente"));
	$codcategoria=$dcliente['codcategoria'];
	$cat=array_shift($categoria->mostrar($codcategoria));
if($pmes-1==0){
	$pmes=12;
	$panio--;
}else{
	$pmes--;	
}
$datoanterior=${$narchivo}->mostrarTodo("mes=$pmes and anio=$panio and codcliente=$pcodcliente");
	
if(count($datoanterior)==1){
	$danterior=array_shift($datoanterior);
	$kwb=$valor-$danterior['kwb'];
}else{
	$kwb=$valor-$dcliente['kwbinicio'];
}

if($kwb<30 || $codcategoria==1){
	$gastominimo=$cat['gastominimo'];
	$totalcosto=$gastominimo;
	$totalfactura=$totalcosto+$valorformulario+$luminarias;
	$totalfactura=str_replace(",",".",$totalfactura);
}else{
	$preciomulti=round(($kwb-30)*$cat['precio'],2);
	$totalf=$preciomulti+$cat['gastominimo'];
	$porcentajefactura=round($totalf*0.13,2);
	$totalcosto=$totalf+$porcentajefactura;
	$totalfactura=$totalcosto+$valorformulario+$luminarias;
	$totalfactura=str_replace(",",".",$totalfactura);
}

$totalcosto=str_replace(",",".",$totalcosto);

$total=number_format($totalfactura+$alumbradopublico,2);
$valores=array("valor"=>"'$valor'",
				"kwb"=>"'$kwb'",
				"total"=>"'$total'",
				"totalcosto"=>"$totalcosto",
				"totalfactura"=>"$totalfactura",
				"comprobanteno"=>"'$comprobanteno'",
				"observaciones"=>"'$observaciones'"
				);
${$narchivo}->actualizar($valores,$cod);
$valoresdevueltos=array("valor"=>"$valor",
				"kwb"=>"$kwb",
				"total"=>"$total",
				"totalfactura"=>"$totalfactura",
				"comprobanteno"=>"$comprobanteno",
				"observaciones"=>"$observaciones",
				"cod"=>$cod
				);
echo json_encode($valoresdevueltos);
endif;
?>