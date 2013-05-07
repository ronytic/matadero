$(document).ready(function(e) {
    $("#respuesta").on("click","#generar",function(e){
		var dir=$(this).attr("href");
		var mes=$("#mes").val();
		var anio=$("#anio").val();
		if(mes=="" || anio==""){
			alert("TIENE QUE SELECCIONAR UN MES Y UN AÑO");
		}{
			$.post(dir,{"mes":mes,"anio":anio},function(data){$("#busqueda").submit();});
			e.preventDefault();
			e.stopPropagation();
		}
		return false;
	});
	/*$("#respuesta  input['text']").mousedown(function(e) {
	   	$(this).select();  
    }).mouseup(function(e) {
       	e.preventDefault();
    });*/
	$("#respuesta").on("keypress",".valores",function(e){
		if(e.keyCode==13){
			var cod=$(this).attr("rel");
			var valor=$("input[name='valor["+cod+"]']").val();
			var comprobanteno=$("input[name='comprobanteno["+cod+"]']").val();
			var obs=$("input[name='obs["+cod+"]']").val();
			$.post("guardar.php",{"cod":cod,"valor":valor,"comprobanteno":comprobanteno,"observaciones":obs},datos,"json");
			e.preventDefault();
			e.stopPropagation();
		}
	});
	$("#respuesta").on("click",".guardar",function(e){
		var cod=$(this).attr("rel");
		var valor=$("input[name='valor["+cod+"]']").val();
		var comprobanteno=$("input[name='comprobanteno["+cod+"]']").val();
		var obs=$("input[name='obs["+cod+"]']").val();
		$.post("guardar.php",{"cod":cod,"valor":valor,"comprobanteno":comprobanteno,"observaciones":obs},datos,"json");
		e.preventDefault();
		e.stopPropagation();
	});
	function datos(data){
		var cod=data.cod;
		$("input[name='kwb["+cod+"]']").val(data.kwb);
		$("input[name='totalfactura["+cod+"]']").val(data.totalfactura);
	}
});