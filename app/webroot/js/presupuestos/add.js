$(document).ready(function(){
    $(".recalculable").change(function() {
        actualizarTotal();
    });
    actualizarTotal();
});
//Obtiene los detalles del producto seleccionado para vender en la orden de trabajo
function getDetallesProducto(){
	//var formData = $('#OrdentrabajoProductodetalleId').serialize(); 
	formData = $('#PresupuestoProductoId').serialize(); 	
	//alert(formData);
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/productos/getdetalle', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#tdDetalleProducto').empty();
				$('#tdDetalleProducto').html(data);				
				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}	

//Agrega un producto para vender en la orden de trabajo
function agregarproducto(){
	
	var numDetalle = $('#PresupuestoNumDetalle').val();
	var newDetalle = '<tr id="RowDetalle'+numDetalle+'">';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	var nombreProducto = $('#PresupuestoProductoId option[value=' + $('#PresupuestoProductoId').val() + ']').html();
	newDetalle +='		<input readonly="readonly" value="'+nombreProducto+'" >';
	var idProducto = $('#PresupuestoProductoId').val();
	newDetalle +='		<input name="data[Detallepresupuesto]['+numDetalle+'][producto_id]" readonly="readonly" id="Detallepresupuesto'+numDetalle+'ProductoId" type="hidden" value="'+idProducto+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioProducto = $('#OrdentrabajoPreciodetalle').val();
	newDetalle +='		<input name="data[Detallepresupuesto]['+numDetalle+'][precio]" onchange="actualizarTotal();" step="any" id="Detallepresupuesto'+numDetalle+'Precio" type="number" value="'+precioProducto+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var cantidadProducto = $('#OrdentrabajoCantidaddetalle').val();
	newDetalle +='		<input name="data[Detallepresupuesto]['+numDetalle+'][cantidad]" readonly="readonly" id="Detallepresupuesto'+numDetalle+'Cantidad" type="number" value="'+cantidadProducto+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detallepresupuesto]['+numDetalle+'][descripcion]" id="Detallepresupuesto'+numDetalle+'Descripcion" value="" >';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<input  type="button" value="X"  title="Eliminar" onclick="eliminarDetalle('+numDetalle+')" class="eliminar">';
	newDetalle +='</td>';
	newDetalle +='</tr>';
	$('#PresupuestoNumDetalle').val(numDetalle*1+1);	
	$('#tableDOT').append(newDetalle);
	actualizarTotal();
}

//Elimina un producto a vender en la orden de trabajo
function eliminarDetalle(numDetalle){
	$('#RowDetalle'+numDetalle).remove() ;
	actualizarTotal();
}

//Actualiza el costo total de la orden de trabajo
function actualizarTotal(){
	var numDetalle = $('#PresupuestoNumDetalle').val()*1;
	var total=0;
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Detallepresupuesto'+i+'Precio')) {
			var precio=$('#Detallepresupuesto'+i+'Precio').val()*1 ;
			var cantidad=$('#Detallepresupuesto'+i+'Cantidad').val()*1 ;
			total += precio*cantidad;
		}		
	}
	/*numDetalle = $('#PresupuestoNumDetalleManoDeObra').val()*1;
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Manoobraxordentrabajo'+i+'Precio')) {
			var precio=$('#Manoobraxordentrabajo'+i+'Precio').val()*1 ;
			var cantidad=$('#Manoobraxordentrabajo'+i+'Cantidad').val()*1 ;
			total += precio*cantidad;
		}		
	}*/
	$('#PresupuestoTotal').val(total);
    calcularSaldo();
}
function calcularSaldo(){

}