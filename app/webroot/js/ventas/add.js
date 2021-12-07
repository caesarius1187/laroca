$(document).ready(function(){
	var iPantallaTam = $(window).height();      
    var iTableheight = iPantallaTam - 210;
    iTableheight = (iTableheight < 250) ? 250 : iTableheight;

    $("#content").attr("style","height:"+iTableheight+"px; overflow:auto;");
    //$("#content").css("height", iTableheight+"px");
	//$("#content").css("overflow","auto");
	actualizarTotal();	
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
     $('#VentaAddForm').submit(function(){ 
     		var numDetalle = $('#VentaNumDetalle').val()*1;
			for(var i=0;i<numDetalle;i++){
				if(document.getElementById('Detalleventa'+i+'Precioproducto')) {					
					var aplicadescuento = $('#Detalleventa'+i+'Aplicadescuento').is(':checked');
					if(!aplicadescuento){						
						$('#Detalleventa'+i+'Descuento').val(0) ;
					}					
				}		
			}
			for(var i=0;i<numDetalle;i++){
					if(document.getElementById('Detalleventa'+i+'ProductoId')) {
							return true;
					}		
				}
			alert("Agregue al menos un producto a la venta");			
			return false;
     });
});
function agregarproducto(){
	var numDetalle = $('#VentaNumDetalle').val();
	if(yaestaagregado( $('#VentaProductoId').val())){
		alert("Este producto ya esta agregado");
		return;
	}
	if(!tienestock( $('#VentaProductoId').val())){
		alert("Este producto no tiene stock disponible");
		return;
	}
	var newDetalle = '<tr id="RowDetalle'+numDetalle+'">';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	var nombreProducto = $('#VentaProductoId option[value=' + $('#VentaProductoId').val() + ']').html();
	newDetalle +='		<input readonly="readonly" value="'+nombreProducto+'" >';
	var idProducto = $('#VentaProductoId').val();
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][producto_id]" readonly="readonly" id="Detalleventa'+numDetalle+'ProductoId" type="hidden" value="'+idProducto+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioProducto = $('#VentaPrecioproducto option[value=' + $('#VentaProductoId').val() + ']').html();
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][precioproducto]" onchange="actualizarTotal();" step="any" id="Detalleventa'+numDetalle+'Precioproducto" type="number" value="'+precioProducto+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';

	var precioDescuento = $('#VentaPreciodescuento option[value=' + $('#VentaProductoId').val() + ']').html();
	var precioamostrar = precioProducto*(1-(precioDescuento/100));
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][preciodescuento]" step="any" id="Detalleventa'+numDetalle+'Preciodescuento" type="number" value="'+precioamostrar+'" class="changeTotal" disabled="disabled" >';
	newDetalle +='	</div>';
	newDetalle +='</td> ';

	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][descuento]" onchange="actualizarTotal();" step="any" id="Detalleventa'+numDetalle+'Descuento" type="number" value="'+precioDescuento+'" class="changeTotal" disabled="disabled"  >';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='  <input type="checkbox" name="data[Detalleventa]['+numDetalle+'][aplicadescuento]" value="1" id="Detalleventa'+numDetalle+'Aplicadescuento" onchange="actualizarTotal();"/>';
	newDetalle +='</td> ';

	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][cantidad]" onchange="checkstock('+numDetalle+');" id="Detalleventa'+numDetalle+'Cantidad" type="number" value="0" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var stockProducto = $('#VentaStockproductos option[value=' + $('#VentaProductoId').val() + ']').html();
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][stock]" onchange="" id="Detalleventa'+numDetalle+'Stock" type="text" value="'+stockProducto+'" class="changeTotal" disabled="disabled">';
	newDetalle +='	</div>';
	newDetalle +='</td>';

	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="" onchange="" step="any" id="Detalleventa'+numDetalle+'Subtotal" type="number" value="0" class="changeTotal" disabled="disabled">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';

	newDetalle +='<td>';
	newDetalle +='	<input  type="button" value="X" title="Eliminar"  onclick="eliminarDetalle('+numDetalle+')" class="eliminar">';
	newDetalle +='</td>';
	newDetalle +='</tr>';
	$('#VentaNumDetalle').val(numDetalle*1+1);	
	$('#TablaVentaAdd').append(newDetalle);
	actualizarTotal();
	//$( "#TablaVentaAdd" ).find( ".changeTotal" ).on('change', function() {
	// alert( $(this).val());
	//});
	
}
function eliminarDetalle(numDetalle){
	$('#RowDetalle'+numDetalle).remove() ;
	actualizarTotal();
}
function yaestaagregado(numDetalle){
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Detalleventa'+i+'ProductoId')) {
			if($('#Detalleventa'+i+'ProductoId').val()==numDetalle){
				return true;
			}
			
		}		
	}
	return false;
}
function tienestock(numDetalle){
	var stock=$('#VentaStockproductos option[value=' + $('#VentaProductoId').val() + ']').html();
	if(stock<=0)
		return false;
	return true;
}
function checkstock(numDetalle){
	var cantidad=$('#Detalleventa'+numDetalle+'Cantidad').val()*1 ;
	var stock=$('#Detalleventa'+numDetalle+'Stock').val()*1 ;
	var left = stock-cantidad;
	if(left<0){
		$('#Detalleventa'+numDetalle+'Cantidad').val(stock) ;
		alert('No tiene suficiente stock de este producto. Disponible: '+stock);
	}
	actualizarTotal();
}
function actualizarTotal(){
	var numDetalle = $('#VentaNumDetalle').val()*1;
	var total=0;
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Detalleventa'+i+'Precioproducto')) {
			var precio=$('#Detalleventa'+i+'Precioproducto').val()*1 ;
			var cantidad=$('#Detalleventa'+i+'Cantidad').val()*1 ;
			var descuento=0 ;
			var aplicadescuento = $('#Detalleventa'+i+'Aplicadescuento').is(':checked');
			if(aplicadescuento){
				descuento=$('#Detalleventa'+i+'Descuento').val() ;
				$('#Detalleventa'+i+'Descuento').prop('disabled',false);
			}else{
				$('#Detalleventa'+i+'Descuento').prop('disabled',true);
			}

			var subtotal= precio*(1-(descuento/100))*cantidad;			
			$('#Detalleventa'+i+'Subtotal').val(subtotal.toFixed(2)) ;
			$('#Detalleventa'+i+'Preciodescuento').val((precio*(1-(descuento/100))).toFixed(2)) ;
			total += subtotal;			
		}		
	}
	$('#VentaTotal').val(total);

}
function getModelos(){
	var formData = $('#VentaMarcaId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/modelos/getbycategory', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#VentaModeloId').empty();
				$('#VentaModeloId').html(data);
				if(data=!""){
					getProductos();					
				}
				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
	}
//Obtiene los productos del modelo seleccionado para el producto a reparar
function getProductos(){
	var formData = $('#VentaModeloId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/productos/getbymodel', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#VentaProductoId').empty();
				$('#VentaProductoId').html(data);
				if(data=!""){

				}
					
				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}	

