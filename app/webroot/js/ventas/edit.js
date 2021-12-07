$(document).ready(function(){
     $('#header').hide();
});

function imprimir(){
    $('#header').hide();
    $('#btn_ot').hide();  
    $('#content').css('padding','0px'); 
    window.print();
    $('#content').css('padding','10px 20px 40px'); 
    $('#btn_ot').show();
}




/*$(document).ready(function(){
	var iPantallaTam = $(window).height();      
    var iTableheight = iPantallaTam - 190;
    iTableheight = (iTableheight < 250) ? 250 : iTableheight;

    $("#content").attr("style","height:"+iTableheight+"px; overflow:auto;");

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
});
function agregarproducto(){
	var numDetalle = $('#VentaNumDetalle').val();
	var newDetalle = '<tr>';
	newDetalle +=' <td>';
	newDetalle +='	<div class="input text">';
	newDetalle +='		<label for="Detalleventa'+numDetalle+'ProductoId">Producto</label>';
	var nombreProducto = $('#listOfproducts option[value=' + $('#listOfproducts').val() + ']').html();
	newDetalle +='		<input readonly="readonly" value="'+nombreProducto+'" >';
	var idProducto = $('#listOfproducts').val();
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][producto_id]" readonly="readonly" id="Detalleventa'+numDetalle+'ProductoId" type="hidden" value="'+idProducto+'">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<label for="Detalleventa'+numDetalle+'Precioproducto">Precioproducto</label>';
	var precioProducto = $('#VentaPrecioproducto option[value=' + $('#listOfproducts').val() + ']').html();
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][precioproducto]" onchange="actualizarTotal();" step="any" id="Detalleventa'+numDetalle+'Precioproducto" type="number" value="'+precioProducto+'" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td> ';
	newDetalle +='<td>';
	newDetalle +='	<div class="input number">';
	newDetalle +='		<label for="Detalleventa'+numDetalle+'Cantidad">Cantidad</label>';
	newDetalle +='		<input name="data[Detalleventa]['+numDetalle+'][cantidad]" onchange="actualizarTotal();" id="Detalleventa'+numDetalle+'Cantidad" type="number" value="0" class="changeTotal">';
	newDetalle +='	</div>';
	newDetalle +='</td>';
	newDetalle +='</tr>';
	$('#VentaNumDetalle').val(numDetalle*1+1);	
	$('#TablaVentaAdd').append(newDetalle);

	//$( "#TablaVentaAdd" ).find( ".changeTotal" ).on('change', function() {
	// alert( $(this).val());
	//});
	
}
function actualizarTotal(){
	var numDetalle = $('#VentaNumDetalle').val()*1;
	var total=0;
	for(var i=0;i<numDetalle;i++){
		if(document.getElementById('Detalleventa'+i+'Precioproducto')) {
			var precio=$('#Detalleventa'+i+'Precioproducto').val()*1 ;
			var cantidad=$('#Detalleventa'+i+'Cantidad').val()*1 ;
			total += precio*cantidad;
		}		
	}
	$('#VentaTotal').val(total);

}*/

