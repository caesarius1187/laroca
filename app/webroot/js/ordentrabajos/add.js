$(document).ready(function(){
    //var iTamPantalla = calcularTamPantalla();		
    //getDetallesManoDeObra();
    getDetallesProducto(1);

    $('#OrdentrabajoCosto').val('');

    $("#tblListaClientes").dataTable({ 
            "sPaginationType": "full_numbers",
            "sScrollY": "200px",
        "bScrollCollapse": true,
        "iDisplayLength":100,
    });

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
    $("#tblListaClientes_filter").attr("style","float:left; text-align:center");
   
        //calculo del saldo
    $("#OrdentrabajoTotal").change(function() {
            calcularSaldo();
    });
    $("#OrdentrabajoAcuenta").change(function() {
            calcularSaldo();
    });
    $("#OrdentrabajoSaldo").change(function() {
            calcularSaldo();
    });
    $(".recalculable").change(function() {
        actualizarTotal();
    });
    actualizarTotal();
});

//vamos a inicializar el formulario en caso de que el campo Tipo de Orden venga con un valor predeterminado
function calcularSaldo(){

}

/*
//Obtiene los modelos de la marca seleccionada para la seleccion del producto a reparar
function getModelos(){
	var formData = $('#OrdentrabajoMarcaId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/modelos/getbycategory', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#OrdentrabajoModeloId').empty();
				//if(data != "")
				//alert(data);
				if(data.indexOf("<option") == -1)
				{
					var sOpciones = "<option value='0'></option>";
					$('#OrdentrabajoModeloId').html(sOpciones);
				}
				else				
					$('#OrdentrabajoModeloId').html(data);					
				
				getProductos();
			}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
	}
//Obtiene los productos del modelo seleccionado para el producto a reparar
function getProductos(){
	var formData = $('#OrdentrabajoModeloId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/productos/getbymodel', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#OrdentrabajoProductoId').empty();
				$('#OrdentrabajoProductoId').html(data);
				if(data != "")
					getFallas();
			}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}	

//obtiene los modelos de la marca seleccionada para agregar productos a vender en la orden de trabajo
function getModelosDetalle(){
	var formData = $('#OrdentrabajoMarcadetalleId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/modelos/getbycategory', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#OrdentrabajoModelodetalleId').empty();
				//alert(data);
				if(data.indexOf("<option") == -1)
				{
					var sOpciones = "<option value='0'></option>";
					$('#OrdentrabajoModelodetalleId').html(sOpciones);
				}
				else
				{
					$('#OrdentrabajoModelodetalleId').html(data);
				}
				//if(data=!"")
				//	getProductosDetalle();
				getProductosDetalle();
			}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
	}
	
//obtiene los productos del modelo seleccionado para agregar productos a vender en la orden de trabajo
function getProductosDetalle(){
	var formData = $('#OrdentrabajoModelodetalleId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/productos/getbymodel', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#OrdentrabajoProductodetalleId').empty();
				$('#OrdentrabajoProductodetalleId').html(data);
				if(data!="")
					getDetallesProducto();
				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}	
*/
//Agrega un pagos para la orden de trabajo
function agregarpago(){
		 
	var numPago = $('#OrdentrabajoNumPago').val()*1+1;

	var rowPago = $("<tr>")
						.attr('id',"RowPago"+numPago);

	var dt = new Date();

	var dd = String(dt.getDate()).padStart(2, '0');
	var mm = String(dt.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = dt.getFullYear();
	var date = yyyy + "-" + mm + "-" + dd;

	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	var montoDejado = $("#OrdentrabajoMontoPagado").val();
	var mediopago = $('#OrdentrabajoMedioPago').val()
	rowPago
		.append(
			$('<td>').html(numPago)
		)
		.append(
			$('<td>')
				.append(
					$('<div>')
						.addClass('input text')
						.append(
							$('<input>')
								.attr('id','Pago'+numPago+'Fecha')
								.attr('name','data[Pago]['+numPago+'][fecha]')
								.val(date + " " + time)
						)
				)		
		)
		.append(
			$('<td>').append(
				$('<div>')
					.addClass('input text')
					.append(
						$('<input>')
							.attr('id','Pago'+numPago+'Montodejado')
							.attr('name','data[Pago]['+numPago+'][montodejado]')
							.addClass('porPagar')
							.val(montoDejado)
					)
			)	
		)
		.append(
			$('<td>').append(
				$('<div>')
					.addClass('input text')
					.append(
						$('<input>')
							.attr('id','Pago'+numPago+'Mediodepago')
							.attr('name','data[Pago]['+numPago+'][mediodepago]')
							.val(mediopago)
					)
			)	
		)
		.append(
			$('<td>').append(
				$('<input>')
					.attr('onClick', 'eliminarDetalleOnTheFly('+numPago+')')
					.attr('type','button')
					.attr('value','X')
					.attr('title','Eliminar')
			)
		);
	$("#tablePagos").find('tbody').append(rowPago);
	$('#OrdentrabajoNumPago').val(numPago*1+1);	
	actualizarTotal();
}
function eliminarDetalleOnTheFly(numPago){
	$("#RowPago"+numPago).remove();
	actualizarTotal();
}
//Agrega un producto para vender en la orden de trabajo
function agregarproducto(){
	/*if(!checkstock()){
		alert("Seleccione un producto");
		return;
	}*/
	var numDetalle = $('#OrdentrabajoNumDetalle').val();
	var newDetalle = '<tr id="RowDetalle'+numDetalle+'">';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	var nombreProducto = $('#OrdentrabajoProductoId option[value=' + $('#OrdentrabajoProductoId').val() + ']').html();
	newDetalle +='		<input readonly="readonly" value="'+nombreProducto+'" >';
	var idProducto = $('#OrdentrabajoProductoId').val();
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][producto_id]" readonly="readonly" id="Detalleordentrabajo'+numDetalle+'ProductoId" type="hidden" value="'+idProducto+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	var nombreMaterial = $('#OrdentrabajoMaterialId option[value=' + $('#OrdentrabajoMaterialId').val() + ']').html();
	newDetalle +='		<input readonly="readonly" value="'+nombreMaterial+'" >';
	var idMaterial = $('#OrdentrabajoMaterialId').val();
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][material_id]" readonly="readonly" id="Detalleordentrabajo'+numDetalle+'MaterialId" type="hidden" value="'+idMaterial+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioProducto = $('#OrdentrabajoPreciodetalle').val();
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][ancho]" onchange="actualizarDetalle('+numDetalle+');" step="any" id="Detalleordentrabajo'+numDetalle+'Ancho" type="number" value="" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioProducto = $('#OrdentrabajoPreciodetalle').val();
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][largo]" onchange="actualizarDetalle('+numDetalle+');" step="any" id="Detalleordentrabajo'+numDetalle+'Largo" type="number" value="" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][cantidad]" id="Detalleordentrabajo'+numDetalle+'Cantidad" type="number" value="" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioProducto = $('#OrdentrabajoPreciodetalle').val();
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][precio]" onchange="actualizarTotal();" step="any" id="Detalleordentrabajo'+numDetalle+'Precio" type="number" value="'+precioProducto+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioProducto = $('#OrdentrabajoPreciodetalle').val();
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][subtotal]" onchange="actualizarDetalle('+numDetalle+');" step="any" id="Detalleordentrabajo'+numDetalle+'Subtotal" type="number" value="'+precioProducto+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<input name="data[Detalleordentrabajo]['+numDetalle+'][descripcion]" id="Detalleordentrabajo'+numDetalle+'Descripcion" value="" >';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<input  type="button" value="X"  title="Eliminar" onclick="eliminarDetalle('+numDetalle+')" class="eliminar">';
	newDetalle +='</td>';
	newDetalle +='</tr>';

	$('#OrdentrabajoNumDetalle').val(numDetalle*1+1);	
	$('#tableDOT').append(newDetalle);
	actualizarTotal();

}
function agregarobservacion(){
	if(!$("#OrdentrabajoObservaciondescripcion").val()!=""){
		alert("Agregue una descripcion");
		return;
	}
	
	var numDetalle = $('#OrdentrabajoNumObservacion').val();
	var userId = $('#OrdentrabajoUserId').val();
	var userName = $('#OrdentrabajoUserName').val();
	var newDetalle = '<tr id="RowObservacion'+numDetalle+'">';
	var dt = new Date();

	var dd = String(dt.getDate()).padStart(2, '0');
	var mm = String(dt.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = dt.getFullYear();
	var date = dd + "-" + mm + "-" + yyyy;
	var dateO = yyyy + "-" + mm + "-" + dd;

	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	var descripcion = $('#OrdentrabajoObservaciondescripcion').val();
	newDetalle +='		<input name="data[Observacione]['+numDetalle+'][descripcion]" readonly="readonly" id="Observacione'+numDetalle+'Descripcion" type="text" value="'+descripcion+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	newDetalle +='		<input name="data[Observacione]['+numDetalle+'][user_id]" readonly="readonly" id="Observacione'+numDetalle+'UserId" type="hidden" value="'+userId+'">';
	newDetalle +='		<input name="data[Observacione]['+numDetalle+'][userName]" readonly="readonly" id="Observacione'+numDetalle+'UserName" type="text" value="'+userName+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	newDetalle +='		<input name="data[Observacione]['+numDetalle+'][creadoEl]" readonly="readonly" id="Observacione'+numDetalle+'CreadoEl" type="text" value="'+dateO+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<input  type="button" value="X"  title="Eliminar" onclick="eliminarObservacion('+numDetalle+')" class="eliminar">';
	newDetalle +='</td>';
	newDetalle +='</tr>';
	$('#OrdentrabajoNumObservacion').val(numDetalle*1+1);	
	$('#tableObservaciones').append(newDetalle);
	$('#OrdentrabajoObservaciondescripcion').val('');	

}

function eliminarObservacion(numDetalle){
	$("#RowObservacion"+numDetalle).remove();
}
//Elimina un producto a vender en la orden de trabajo
function eliminarDetalle(numDetalle){
	$('#RowDetalle'+numDetalle).remove() ;
	actualizarTotal();
}
function eliminarDetalleGuardado(numDetalle){
    formData = "";
    //alert(formData);
    $.ajax({
        type: 'POST',
        url: serverLayoutURL+'/detalleordentrabajos/delete/'+numDetalle,
        data: formData,
        success: function(data,textStatus,xhr){
            var respuesta = JSON.parse(data);
            alert(respuesta.respuesta);
            if(respuesta.error=="0"){
                $('#RowDetalle'+numDetalle).remove() ;
                actualizarTotal();
            }
        },
        error: function(xhr,textStatus,error){
            alert(textStatus);
        }
    });
    return false;
}

//Checkea el stock del producto que se quiere vender en la orden de trabajo
function checkstock(){
	//no vamos a checkiar el stock
	return true;
	
	var cantidad=$('#OrdentrabajoCantidaddetalle').val()*1 ;
	var stock=$('#OrdentrabajoStockdetalle').val()*1 ;
	var left = stock-cantidad;
	if(isNaN(cantidad)||isNaN(stock)){
		return false;
	}
	if(cantidad==0){
		$('#OrdentrabajoCantidaddetalle').val(1) ;
		alert('No puede agregar cantidad 0');
		return false;
	}
	else if(left<0){
		$('#OrdentrabajoCantidaddetalle').val(stock) ;
		alert('No tiene suficiente stock de este producto. Disponible: '+stock);
		return false;
	}
	return true;
}
function actualizarDetalle(numDetalle){
	var ancho = $('#Detalleordentrabajo'+numDetalle+'Ancho').val();
	var largo = $('#Detalleordentrabajo'+numDetalle+'Largo').val();
	var cantidad = ancho*largo;
	$('#Detalleordentrabajo'+numDetalle+'Cantidad').val(cantidad);
	var precio = $('#Detalleordentrabajo'+numDetalle+'Precio').val();
	var subtotal = precio*cantidad;
	$('#Detalleordentrabajo'+numDetalle+'Subtotal').val(subtotal);
	actualizarTotal();
}
//Actualiza el costo total de la orden de trabajo
function actualizarTotal(){
	var numDetalle = $('#OrdentrabajoNumDetalle').val()*1;
	var total=0;
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Detalleordentrabajo'+i+'Precio')) {
			var precio=$('#Detalleordentrabajo'+i+'Precio').val()*1 ;
			var cantidad=$('#Detalleordentrabajo'+i+'Cantidad').val()*1 ;
			total += precio*cantidad;
		}		
	}
	/*numDetalle = $('#OrdentrabajoNumDetalleManoDeObra').val()*1;
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Manoobraxordentrabajo'+i+'Precio')) {
			var precio=$('#Manoobraxordentrabajo'+i+'Precio').val()*1 ;
			var cantidad=$('#Manoobraxordentrabajo'+i+'Cantidad').val()*1 ;
			total += precio*cantidad;
		}		
	}*/
	var yaPagado = 0;	
	$(".pagadoYaCargado").each(function () {
		yaPagado += $(this).val()*1;
	});
	$(".porPagar").each(function () {
		yaPagado += $(this).val()*1;
	})

	$('#OrdentrabajoCosto').val(total);
	$('#OrdentrabajoPagado').val(yaPagado);
	$('#OrdentrabajoSaldoTotal').val(total-yaPagado);
	$('#OrdentrabajoSaldo').val(total-yaPagado);
	$('#OrdentrabajoAcuenta').val(yaPagado);
	$('#OrdentrabajoTotal').val(total);
	OrdentrabajoAcuenta

    calcularSaldo();
}
//Obtiene los detalles del producto seleccionado para vender en la orden de trabajo
function getDetallesProducto(producto){
	//var formData = $('#OrdentrabajoProductodetalleId').serialize(); 
	if(producto==1){
		formData = $('#OrdentrabajoProductoId').serialize(); 	
	}else{
		formData = $('#OrdentrabajoMaterialId').serialize(); 	

	}
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
//Obtiene los detalles de la mano de obra seleccionada para agregar a la orden de trabajo
/*
ya no se usa mano de obra
function getDetallesManoDeObra(){
	var formData = $('#OrdentrabajoManodeobraId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/manodeobras/getdetalle', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#tdDetalleManodeobra').empty();
				$('#tdDetalleManodeobra').html(data);				
				}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}	
function agregarmanodeobra(){
	var vPrecio=$('#OrdentrabajoPreciodetallemanodeobra').val()*1 ;
	if(isNaN(vPrecio)){
		alert("Seleccione una mano de obra");
		return false;
	}
	var numDetalle = $('#OrdentrabajoNumDetalleManoDeObra').val();
	var newDetalle = '<tr id="RowDetalleManoDeObra'+numDetalle+'">';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	var nombreManoDeObra = $('#OrdentrabajoManodeobraId option[value=' + $('#OrdentrabajoManodeobraId').val() + ']').html();
	newDetalle +='		<input readonly="readonly" value="'+nombreManoDeObra+'" >';
	var idManoDeObra = $('#OrdentrabajoManodeobraId').val();
	newDetalle +='		<input name="data[Manoobraxordentrabajo]['+numDetalle+'][manodeobra_id]" readonly="readonly" id="Manoobraxordentrabajo'+numDetalle+'ManodeobraId" type="hidden" value="'+idManoDeObra+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var precioManoDeObra = $('#OrdentrabajoPreciodetallemanodeobra').val();
	newDetalle +='		<input name="data[Manoobraxordentrabajo]['+numDetalle+'][precio]" onchange="actualizarTotal();" step="any" id="Manoobraxordentrabajo'+numDetalle+'Precio" type="number" value="'+precioManoDeObra+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';	
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	var cantidadManoDeObra = $('#OrdentrabajoCantidaddetalleManodeobra').val();
	newDetalle +='		<input name="data[Manoobraxordentrabajo]['+numDetalle+'][cantidad]" readonly="readonly" id="Manoobraxordentrabajo'+numDetalle+'Cantidad" type="number" value="'+cantidadManoDeObra+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='<td>';
	newDetalle +='	<input  type="button" value="X" title="Eliminar" onclick="eliminarDetalleManoDeObra('+numDetalle+')" class="eliminar">';
	newDetalle +='</td>';
	newDetalle +='</tr>';
	$('#OrdentrabajoNumDetalleManoDeObra').val(numDetalle*1+1);	
	$('#tableDMOXOT').append(newDetalle);
	actualizarTotal();
}
function eliminarDetalleManoDeObra(numDetalle){
	$('#RowDetalleManoDeObra'+numDetalle).remove() ;
	actualizarTotal();
}*/
function cargarCliente()
{
	location.href = "#lnkListaClientes";
}
function SeleccionarCliente(cliId)
{
	$("#OrdentrabajoClienteId").val(cliId);
	location.href = "#close";
}