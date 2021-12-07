var misordenes ;
$(document).ready(function(){
    var iPantallaTam = $(window).height();         
    var iTableheight = iPantallaTam - 380;
    iTableheight = (iTableheight < 250) ? 250 : iTableheight;       
    /*$("#tableOrdenTrabajo").DataTable( {
        'initComplete': function () {
           
        }
    });*/
    misordenes = $('#tableOrdenTrabajo').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'todas' ]
        ],
        order: [[0, "desc" ]]
    } );
    
    calcularFooterTotales(misordenes);
    
});
 function calcularFooterTotales(mitabla){
    mitabla.columns([1,2,3,6,7]).every( function () {
          var column = this;
          var select = $('<select><option value=""></option></select>')
                  .addClass("datatablefilter")
              .appendTo( $(column.header()).empty() )
              .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                  );

                  column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
              } );

          column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
      } );
}