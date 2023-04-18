$(document).ready(function(){ });

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


