<script type="text/javascript">
	$(document).ready(function(){
		var iTableTotalHeight = $(window).height();     			
	    var iTableHeight = iTableTotalHeight - 400;
	    iTableHeight = (iTableHeight < 250) ? 250 : iTableHeight; 
	    
		$("#tblListaVentas_index").dataTable( { 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableHeight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,		    
		});
	})
</script>
<!--<div class="ventas index">-->
<div class="ventas">
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="6">
			<h2><?php echo __('Lista de Ventas'); ?></h2>
		</td>
		<td colspan="2" style="text-align: right;" title="Agregar Compra">
	        <div class="fab blue">
	        <core-icon icon="add" align="center">	            
	            <?php echo $this->Form->button('+', 
	                                        	array('type' => 'button',
			                                          'class' =>"btn_add",
			                                          'title' =>"Agregar Venta",  
			                                          'onClick' => "window.location.href='".Router::url(array(
	                                            	                                   'controller'=>'Ventas', 
	                                            	                                   'action'=>'add')
	                                            	                      				)."'"                                         
		                                            )	            							
	                    					  );
	            ?> 
	        </core-icon>
	        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
	        </div>
		</td>
	</tr>
	</table>

	<table id='tblListaVentas_index' cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th>Num. Comprobante</th>
		<th>Fecha Vta.</th>			
		<th>Cond. Iva</th>		
		<th>Cliente</th>
		<th>Tipo</th>		
		<th>Total</th>			
		<th class="actions" style='text-align:center'>Acciones</th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th></th>
		<th></th>
        <th></th>    
        <th></th>
		<th></th>
        <th></th>                           		                
	</tr>
	</tfoot>
	<tbody>
	<?php foreach ($ventas as $venta): ?>
	<tr>
		<td><?php echo h($venta['Venta']['numerocomprobante']); ?>&nbsp;</td>
		<td><?php echo h($venta['Venta']['fecha']); ?>&nbsp;</td>		
		<td><?php echo h($venta['Venta']['condicioniva']); ?>&nbsp;</td>		
		<td>
			<?php //echo $this->Html->link($venta['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $venta['Cliente']['id'])); 
			echo h($venta['Cliente']['nombre']);
			?>
		</td>
		<td><?php echo h($venta['Venta']['tipoventa']); ?>&nbsp;</td>		
		<td><?php echo h($venta['Venta']['total']); ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('Imprimir'), array('action' => 'edit', $venta['Venta']['id']), array( 'target' => '_blank')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
