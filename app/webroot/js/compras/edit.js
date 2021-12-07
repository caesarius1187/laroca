$(document).ready(function(){
	//actualizarTotal();	
    /*$( "input.datepicker" ).datepicker({
        yearRange: "-100:+50",
        changeMonth: true,
        changeYear: true,
        constrainInput: false,
        showOn: 'both',
        buttonImage: "",
        dateFormat: 'dd-mm-yy',
        buttonImageOnly: true
    });   */
    var iPantallaTam = $(window).height();      
    var iTableheight = iPantallaTam - 160;
    iTableheight = (iTableheight < 250) ? 250 : iTableheight;

    $("#ContenidoCompras_Edit").attr("style","height:"+iTableheight+"px; overflow:auto; width:100%");
    
});