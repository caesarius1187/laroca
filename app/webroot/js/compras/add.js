$(document).ready(function(){
	//actualizarTotal();	
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

    var iPantallaTam = $(window).height();      
    var iTableheight = iPantallaTam - 160;
    iTableheight = (iTableheight < 250) ? 250 : iTableheight;

    $("#ContenidoCompras_Add").attr("style","height:"+iTableheight+"px; overflow:auto; width:100%");
});

compras_productos_agregados = "";
function checkearProducto()
{
	var idProducto = $('#ddlListaProductos').val();
	if (compras_productos_agregados.indexOf(idProducto) == -1)
	{
		compras_productos_agregados += idProducto + ","; 
		agregarproducto();
	}
	else
	{
		var ProodNombre = $("#tdProdNombre_"+idProducto).html();
		alert('El producto: ' + ProodNombre + ' .Ya fue agregado al detalle de compra.');
	}
}
function agregarproducto()
{
	var numDetalle = $('#hdnNroDetalleCompra').val();
	var idProducto = $('#ddlListaProductos').val();
	var nombreProducto = $('#tdProdNombre_' + idProducto).html();
	var precioCompra = $('#tdProdPcioCompra_' + idProducto).html();
	var precioVta = $('#tdPcioVenta_' + idProducto).html();
	var precioDto = $('#tdPcioDescuento_' + idProducto).html();
	var porcUtilidad = $('#tdPorcUtilidad_' + idProducto).html();
	var porcFlete = $('#tdPorcFlete_' + idProducto).html();
	var porcDesc = $('#tdPorcDesc_' + idProducto).html();

	var newDetalle = '<tr id="RowDetalle_'+numDetalle+'">';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';	
	newDetalle +='		<input readonly="readonly" value="'+nombreProducto+'" >';	
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][producto_id]" readonly="readonly" id="Detallecompra'+numDetalle+'ProductoId" type="hidden" value="'+idProducto+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';	
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][precioproducto]" onchange="actualizarTotal('+numDetalle+');" step="any" id="Detallecompra'+numDetalle+'Precioproducto" value="'+precioCompra+'" style="width:80px"  >';
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][porcutilidad]" onchange="sugerirPrecio('+numDetalle+');" id="Detallecompra'+numDetalle+'Porcutilidad" style="width:50px" value="'+porcUtilidad+'" type="number" step="any" >';
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][porcflete]" onchange="sugerirPrecio('+numDetalle+');" id="Detallecompra'+numDetalle+'Porcflete" style="width:50px" value="'+porcFlete+'" type="number" step="any" >';
	newDetalle +='	</div>';
	newDetalle +='</td> ';	
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';	
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][precioventa]" onchange="sugerirPrecioDesc('+numDetalle+');" id="Detallecompra'+numDetalle+'Precioventa" style="width:80px" value="'+precioVta+'" >';
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][porcdescuento]" onchange="sugerirPrecioDesc('+numDetalle+');" id="Detallecompra'+numDetalle+'Porcdescuento" style="width:50px" value="'+porcDesc+'" type="number" >';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';	
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][preciodesc]" onchange="" id="Detallecompra'+numDetalle+'Preciodesc" style="width:100px" value="'+precioDto+'" >';	
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detallecompra]['+numDetalle+'][cantidad]" id="Detallecompra'+numDetalle+'Cantidad" type="number" value="0" onchange="actualizarTotal('+numDetalle+');" style="width:60px">';
	newDetalle +='	</div>';
	newDetalle +='</td>';	
	newDetalle +='<td>';
	newDetalle +='	<div class="input text">';
	newDetalle +='		<input type="button" value="X" onclick="eliminarLineaDetalle('+numDetalle+','+idProducto+')" class="eliminar" >';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	$('#hdnNroDetalleCompra').val(numDetalle*1+1);	
	$('#tblDetalleCompra_agregar').append(newDetalle);	
}
function eliminarLineaDetalle(numDetalle,idProducto)
{
	compras_productos_agregados = compras_productos_agregados.replace(idProducto, "");

	var sPrecioCompra = $("#Detallecompra"+numDetalle+"Precioproducto").val();
	var sCantidad = $("#Detallecompra"+numDetalle+"Cantidad").val();
	var sTotal = $("#CompraTotal").val();
	if (sPrecioCompra != "" && sCantidad != "")
	{
		var fPrecioCompra = parseFloat(sPrecioCompra);
		var iCantidad = parseInt(sCantidad);
		var fTotal = fPrecioCompra * iCantidad;
		var TotalCompra = (sTotal != "") ? (parseFloat(sTotal) - fTotal).toFixed(2) : 0;
		$("#CompraTotal").val(TotalCompra);
	}

	$("#RowDetalle_"+numDetalle).remove();
}
function actualizarTotal(numDetalle)
{
	var cantDetalle = $('#hdnNroDetalleCompra').val();
	cantDetalle = parseInt(cantDetalle);
	$("#CompraTotal").val('');
	var Total = 0;
	for (i=0; i<=cantDetalle; i++)
	{
		if (document.getElementById("Detallecompra"+i+"Precioproducto"))
		{
			var sPrecioCompra = $("#Detallecompra"+i+"Precioproducto").val();
			var sCantidad = $("#Detallecompra"+i+"Cantidad").val();
			var fPrecioCompra = 0;
			var iCantidad = 0;			
			var fTotal = 0;
			
			if (sPrecioCompra != "" && sCantidad != "")
			{
				var fPrecioCompra = parseFloat(sPrecioCompra);
				var iCantidad = parseInt(sCantidad);
				var fTotal = fPrecioCompra * iCantidad;					
				Total = Total + fTotal;
			}
		}
	}
	Total = parseFloat(Total).toFixed(2);
	$("#CompraTotal").val(Total);	
	sugerirPrecio(numDetalle);
}
function sugerirPrecio(numDetalle)
{
	var preciocompra = $("#Detallecompra"+numDetalle+"Precioproducto").val();	
	var precioVenta = 0;	
	var pocentaje = $("#Detallecompra"+numDetalle+"Porcutilidad").val();		
	var porcFlete = 	$("#Detallecompra"+numDetalle+"Porcflete").val();	
	if (preciocompra != "0" && preciocompra != "" && ((pocentaje != "0" && pocentaje != "")||(porcFlete != "0" && porcFlete != "")))
	{		
		if (porcFlete != "0" && porcFlete != "" && pocentaje != "0" && pocentaje != "")
			pocentaje = parseInt(pocentaje) + parseInt(porcFlete);
		else if (porcFlete != "0" && porcFlete != "")			
				pocentaje = parseInt(porcFlete);
			else
				pocentaje = parseInt(pocentaje);		
		
		precioVenta = parseFloat(preciocompra) + parseFloat(parseFloat(preciocompra) * parseFloat(pocentaje / 100));	
		precioVenta = parseFloat(precioVenta).toFixed(2);
		$("#Detallecompra"+numDetalle+"Precioventa").val(precioVenta);
		$("#Detallecompra"+numDetalle+"Preciodesc").val(precioVenta);					
	}	
	sugerirPrecioDesc(numDetalle);
}
function sugerirPrecioDesc(numDetalle)
{
	var precioVenta = $("#Detallecompra"+numDetalle+"Precioventa").val();
	var pocentaje = $("#Detallecompra"+numDetalle+"Porcdescuento").val();
	var precioDesc = 0;
	var desc = 0;
	if (precioVenta != "" && precioVenta != "0" && pocentaje != "" && pocentaje != "0")
	{
		pocentaje = parseInt(pocentaje);
		desc = parseFloat(precioVenta) * parseFloat(pocentaje / 100);
		precioDesc = (precioVenta - desc).toFixed(2);
		$("#Detallecompra"+numDetalle+"Preciodesc").val(precioDesc);
	}	
}	