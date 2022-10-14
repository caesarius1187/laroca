<script type="text/javascript">
$(document).ready(function()
{
    var iPantallaTam = $(window).height();     	
 	var iTableheight = iPantallaTam - 200;
 	iTableheight = (iTableheight < 250) ? 250 : iTableheight;     	
 	
 	$("#tblListaProductos_index").dataTable({ 
		"sPaginationType": "full_numbers",
		"sScrollY": iTableheight + "px",
	    "bScrollCollapse": true,
	    "iDisplayLength":100,
	});
});
</script>
<!--<div class="compras index">-->
<div class="compras">	
	<table>
		<tr>
			<td colspan="3"><h2><?php echo __('Lista de Egresos'); ?></h2></td>
			<td style="text-align: right;" title="Agregar Falla">
		        <div class="fab blue">
		        <core-icon icon="add" align="center">	            
		            <?php echo $this->Form->button('+', 
		                                        	array('type' => 'button',
				                                          'class' =>"btn_add",
				                                          'title' =>"Agregar Marca",  
				                                          'onClick' => "window.location.href='".Router::url(array(
		                                            	                                   'controller'=>'Compras', 
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

	<table  id="tblListaProductos_index" cellpadding="0" cellspacing="0">
	<thead>
		<tr>	
			<th>Nro. Comprobante</th>
			<th>Fecha</th>			
			<th>Condicion Iva</th>		            			
			<th>Total</th>		            
            <th style='text-align:center'>Acciones</th>	            
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th></th>
			<th></th>            
            <th></th> 
            <th></th>               	
            <th></th>               	
		</tr>
	</tfoot>		
	<tbody>
	<?php foreach ($compras as $compra): ?>
	<tr>
		<td><?php echo h($compra['Compra']['numerocomprobante']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['condicioniva']); ?>&nbsp;</td>		
		<td><?php echo h($compra['Compra']['total']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $compra['Compra']['id'])); ?>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'edit', $compra['Compra']['id'])); ?>
			<?php 
			//echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $compra['Compra']['id']), null, __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>-->
</div>

