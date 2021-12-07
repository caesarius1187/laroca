$(document).ready(function(){
	
});

function imprimir(){
    $('#header').hide();
    $('#btn_ot').hide();  
    $('#content').css('padding','0px'); 
    window.print();
    $('#content').css('padding','10px 20px 40px'); 
    $('#btn_ot').show();
}
	


