$(document).ready(function(){

    var iTamPantalla = calcularTamPantalla();    
    
 	var iTableheight = iTamPantalla - 150;
 	iTableheight = (iTableheight < 250) ? 250 : iTableheight;     	
 	if (document.getElementById("tblProductos"))
 	{
	 	$("#tblProductos").dataTable({ 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableheight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,
		});
	}	
	if (document.getElementById("divNuevoProducto_Content"))
	{
		//para la pagina Add.ctp
		$("#ProductoTipo").val("Producto");
	}
	//if (document.getElementById("divEditarProducto_Content"))
	//{
		//para la pagina Edit.ctp
		//$("#divEditarProducto_Content").attr("style","max-height:"+iTamPantalla+"px; overflow:auto; width:100%");
		//$("#content").css("padding-right","0px");
		//$("#content").css("padding-bottom","0px");
	//}
    if($("#ProductoTipo").val() == "Producto")
  	{
  		//$("#ProductoProductoId").val("0");
		$(".listProdCheckBox input").attr("disabled",true);
  	}  	
  	if (!document.getElementById("tblProductos"))
  	{
	  	//Solo para add y edit
	  	$( "input.datepicker" ).datepicker({
	      	yearRange: "-100:+50",
	      	changeMonth: true,
	      	changeYear: true,
	      	constrainInput: false,
	      	showOn: 'both',
	      	buttonImage: "",
	      	dateFormat: 'dd-mm-yy',
	      	buttonImageOnly: true
	    });
  	}
});
function getModelos(){
	var formData = $('#ProductoMarcaId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/modelos/getbycategory', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#ProductoModeloId').empty();
				$('#ProductoModeloId').html(data);

				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}
/*
<?php
echo $this->Js->get('#ProductoMarcaId')->event('change', 
	$this->Js->request(array(
		'controller'=>'modelos',
		'action'=>'getbycategory'
		), array(
			'update'=>'#ProductoModeloId',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
					'isForm' => true,
					'inline' => true
				))
		))
	);
?>*/
function agregarProducto()
{
	location.href = "#agregarProducto";
}
function selectProducto(oObj)
{
	if (oObj.value == "Articulo")
	{
		//$("#ProductoProductoId").val("0");
		$(".listProdCheckBox input").attr("disabled",false);			

	}
	else
	{
		//$("#ProductoProductoId").val("0");
		$(".listProdCheckBox input").attr("disabled",true);
	}
	filtrarFliaDeProdArt(oObj);
}
function filtrarFliaDeProdArt(oObj)
{
	//alert(FliaTipo);
	var formData = $('#'+oObj.id).serialize(); 
//	alert(formData);
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/familiaproductos/familiaportipo', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#ProductoFamiliaproductoId').empty();
				$('#ProductoFamiliaproductoId').html(data);
				//alert(data);
				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus + ": " + error); 
			} 
	});		
}
function sugerirPrecio()
{
	var preciocompra = $("#ProductoPreciocompra").val();
	var precioVenta = 0;
	var pocentaje = $("#ProductoPorcutilidad").val();	
	var porcFlete = 	$("#ProductoPorcflete").val();	
	if (preciocompra != "0" && preciocompra != "" && ((pocentaje != "0" && pocentaje != "")||(porcFlete != "0" && porcFlete != "")))
	{		
		if (porcFlete != "0" && porcFlete != "" && pocentaje != "0" && pocentaje != "")
			pocentaje = parseInt(pocentaje) + parseInt(porcFlete);
		else if (porcFlete != "0" && porcFlete != "")			
				pocentaje = parseInt(porcFlete);
			else
				pocentaje = parseInt(pocentaje);
		
		//alert(parseFloat(preciocompra) + " : " +parseFloat(parseFloat(preciocompra) * parseFloat(pocentaje / 100)))
		precioVenta = parseFloat(preciocompra) * (1 + parseFloat(pocentaje / 100));	
		
		//esto funciona con valores de menos de 100
		//no con valores de + de 100 

		precioVenta = parseFloat(precioVenta).toFixed(2);
		$("#ProductoPrecioventa").val(precioVenta);
		$("#ProductoPrecio").val(precioVenta);					
	}
	else
	{
		$("#ProductoPrecioventa").val("0");
		$("#ProductoPrecio").val("0");
	}
	sugerirPrecioDesc();
}
function sugerirPrecioDesc()
{
	var precioVenta = $("#ProductoPrecioventa").val();
	var pocentaje = $("#ProductoPorcdescuento").val();
	var precioDesc = 0;
	var desc = 0;
	if (precioVenta != "" && precioVenta != "0" && pocentaje != "" && pocentaje != "0")
	{
		pocentaje = parseInt(pocentaje);
		desc = parseFloat(precioVenta) * parseFloat(pocentaje / 100);
		precioDesc = (precioVenta - desc).toFixed(2);
		$("#ProductoPrecio").val(precioDesc);
	}	
}	
