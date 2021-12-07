<div class="detalleordentrabajos form">
<?php echo $this->Form->create('Detalleordentrabajo'); ?>
	<fieldset>
		<legend><?php echo __('Add Detalleordentrabajo'); ?></legend>
	<?php
		echo $this->Form->input('producto_id');
		echo $this->Form->input('precio');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('ordentrabajo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Detalleordentrabajos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
