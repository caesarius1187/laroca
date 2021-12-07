<div class="detallecompras form">
<?php echo $this->Form->create('Detallecompra'); ?>
	<fieldset>
		<legend><?php echo __('Edit Detallecompra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('compra_id');
		echo $this->Form->input('producto_id');
		echo $this->Form->input('precioproducto');
		echo $this->Form->input('cantidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Detallecompra.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Detallecompra.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Detallecompras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
