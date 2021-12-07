
$(document).ready(function(){

    var iTamPantalla = calcularTamPantalla();    
    
 	var iTableheight = iTamPantalla - 150;
 	iTableheight = (iTableheight < 250) ? 250 : iTableheight;     	
 	if (document.getElementById("tblListaProveedores_index"))
 	{
	 	$("#tblListaProveedores_index").dataTable({ 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableheight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,
		});
	}	
});
function agregarProveedor()
{
	location.href = "#agregarProveedor";
}
function getLocalidades(){
	var formData = $('#ProveedorePartidoId').serialize(); 
	$.ajax({ 
			type: 'POST', 
			url: serverLayoutURL+'/localidades/getbycategory', 
			data: formData, 
			success: function(data,textStatus,xhr){ 
				$('#ProveedoreLocalidadeId').empty();
				$('#ProveedoreLocalidadeId').html(data);
			}, 
			error: function(xhr,textStatus,error){ 
				alert(textStatus); 
			} 
		});	
		return false; 
}