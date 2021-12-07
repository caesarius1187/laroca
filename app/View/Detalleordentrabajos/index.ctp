<div class="detalleordentrabajos index">
	<h2><?php echo __('Detalleordentrabajos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('producto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('precio'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('ordentrabajo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($detalleordentrabajos as $detalleordentrabajo): ?>
	<tr>
		<td><?php echo h($detalleordentrabajo['Detalleordentrabajo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalleordentrabajo['Producto']['nombre'], array('controller' => 'productos', 'action' => 'view', $detalleordentrabajo['Producto']['id'])); ?>
		</td>
		<td><?php echo h($detalleordentrabajo['Detalleordentrabajo']['precio']); ?>&nbsp;</td>
		<td><?php echo h($detalleordentrabajo['Detalleordentrabajo']['cantidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalleordentrabajo['Ordentrabajo']['numerodeorden'], array('controller' => 'ordentrabajos', 'action' => 'view', $detalleordentrabajo['Ordentrabajo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $detalleordentrabajo['Detalleordentrabajo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detalleordentrabajo['Detalleordentrabajo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detalleordentrabajo['Detalleordentrabajo']['id']), null, __('Are you sure you want to delete # %s?', $detalleordentrabajo['Detalleordentrabajo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
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
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Detalleordentrabajo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
