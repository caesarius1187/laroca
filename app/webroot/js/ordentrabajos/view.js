$(document).ready(function(){
     $('#header').hide();
     $(".buttonTipoOrden").click(function(){
		hiddeAllRows();
		 if($(this).hasClass("buttonTipoOrden")){
	        $( this ).switchClass( "buttonTipoOrden", "buttonTipoOrdenDesactivado", 250 );
	      }else{
	      	$(".buttonTipoOrden").each(function(){
	      		$(this).switchClass( "buttonTipoOrden", "buttonTipoOrdenDesactivado", 0 );
	      });
	        $( this ).switchClass( "buttonTipoOrdenDesactivado", "buttonTipoOrden", 250 );
	      }
	      setTimeout(
		  function() 
		  {
			activateRowsActives()
		  }, 300);
	})
	$(".buttonTipoOrdenDesactivado").click(function(){
		hiddeAllRows();
		 if($(this).hasClass("buttonTipoOrdenDesactivado")){
		 	$(".buttonTipoOrden").each(function(){
	      		$(this).switchClass( "buttonTipoOrden", "buttonTipoOrdenDesactivado", 0 );
      		});
	        $( this ).switchClass( "buttonTipoOrdenDesactivado", "buttonTipoOrden", 250 );

	      }else{
	 		$( this ).switchClass( "buttonTipoOrden", "buttonTipoOrdenDesactivado", 250 );
	      }
		 setTimeout(
		  function() 
		  {
			activateRowsActives()
		  }, 300);
	})
	function hiddeAllRows(){
		$('#tblAddOrdenTrabajo tr').each(function() {
			if(!$(this).hasClass('all')){
				$(this).hide();
			}
		});
	}
	function activateRowsActives(){
		if($('#btnN-CMG').hasClass("buttonTipoOrden")){
			showTrWithClass('ncmg');
		}
		if($('#btna1b1r1').hasClass("buttonTipoOrden")){
			showTrWithClass('a1b1r1');
		}
		if($('#btna2b2r2').hasClass("buttonTipoOrden")){
			showTrWithClass('a2b2r2');
		}
		if($('#btna3b3r3').hasClass("buttonTipoOrden")){
			showTrWithClass('a3b3r3');
		}
		if($('#btnplacbronce').hasClass("buttonTipoOrden")){
			showTrWithClass('placbronce');
		}
		if($('#btnplacnicho').hasClass("buttonTipoOrden")){
			showTrWithClass('placnicho');
		}
		if($('#btnplacips').hasClass("buttonTipoOrden")){
			showTrWithClass('placips');
		}
	}
	function showTrWithClass(classToShow){
		$('#tblAddOrdenTrabajo tr').each(function() {
			if($(this).hasClass(classToShow)){
				$(this).show();
			}
		});
	}
	
	mostrarTipoDeOrdenInicial();	
});

function imprimir(){
    $('#header').hide();
    $('#btn_ot').hide();  
    $('#content').css('padding','0px'); 
    window.print();
    $('#content').css('padding','10px 20px 40px'); 
    $('#btn_ot').show();
}
function mostrarTipoDeOrdenInicial(){
	switch($('#tipoorden').val()){
		case'ncmg':
			$('#btnN-CMG').trigger( "click" );
		break;
		case'a1b1r1':
			$('#btna1b1r1').trigger( "click" );
		break;
		case'a2b2r2':
			$('#btna2b2r2').trigger( "click" );
		break;
		case'a3b3r3':
			$('#btna3b3r3').trigger( "click" );
		break;
		case'placbronce':
			$('#btnplacbronce').trigger( "click" );
		break;
		case'placnicho':
			$('#btnplacnicho').trigger( "click" );
		break;
		case'placips':
			$('#btnplacips').trigger( "click" );
		break;
		default:
		$('#btnN-CMG').trigger( "click" );
		break;
	}	
}


