<div class="detalleordentrabajos view">
<h2><?php echo __('Detalleordentrabajo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detalleordentrabajo['Detalleordentrabajo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detalleordentrabajo['Producto']['nombre'], array('controller' => 'productos', 'action' => 'view', $detalleordentrabajo['Producto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($detalleordentrabajo['Detalleordentrabajo']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($detalleordentrabajo['Detalleordentrabajo']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordentrabajo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detalleordentrabajo['Ordentrabajo']['numerodeorden'], array('controller' => 'ordentrabajos', 'action' => 'view', $detalleordentrabajo['Ordentrabajo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detalleordentrabajo'), array('action' => 'edit', $detalleordentrabajo['Detalleordentrabajo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detalleordentrabajo'), array('action' => 'delete', $detalleordentrabajo['Detalleordentrabajo']['id']), null, __('Are you sure you want to delete # %s?', $detalleordentrabajo['Detalleordentrabajo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalleordentrabajos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalleordentrabajo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
