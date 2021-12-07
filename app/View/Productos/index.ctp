<?php echo $this->Html->script('productos/productos');?>

<div class="productos">	
	<table cellpadding="0" cellspacing="0" class="tbl_dt">
		<tr>
			<td colspan="9"><h2><?php echo __('Lista de Productos'); ?></h2></td>
			<td colspan="2" style="text-align: right;" title="Agregar Producto">
		        <div class="fab blue">
		        <core-icon icon="add" align="center">	            
		            <?php echo $this->Form->button('+', 
		                                        	array('type' => 'button',
				                                            'class' =>"btn_add",
				                                            'title' =>"Agregar Producto",			
				                                            'onClick' => "location.href='/productos/add'",
			                                            )	            							
		                    					  );
		            ?> 
		        </core-icon>
		        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
		        </div>
			</td>
		</tr>
	</table>
	<table id="tblProductos" cellpadding="0" cellspacing="0" class="tbl_dt">
	<thead>
		<tr>		
			<th>Nombre</th>
			<th>Codigo</th>			
			<th>Precio</th>
			<th>Fch. Compra</th>			
			<th>Cant.</th>
			<th>Tipo</th>
			<th class="actions" style="text-align:center">Acciones</th>
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
            <th></th>               	            
		</tr>
	</tfoot>	
	<tbody>
	<?php foreach ($productos as $producto): ?>
	<tr>		
		<td><?php echo h($producto['Producto']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['codigo']); ?>&nbsp;</td>		
		<td><?php echo h($producto['Producto']['precio']); ?>&nbsp;</td>
		<td><?php echo h(date('d-m-Y',strtotime($producto['Producto']['fechacompra']))); ?>&nbsp;</td>
		<!--<td><?php echo h($producto['Producto']['numeroserie']); ?>&nbsp;</td>-->
		<td><?php echo h($producto['Producto']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<!--<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $producto['Producto']['id'])); ?>-->
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $producto['Producto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $producto['Producto']['id']), null, __('Esta seguro que desea eliminar el producto: %s?', $producto['Producto']['nombre'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>	
</div>