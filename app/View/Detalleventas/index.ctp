<!--<div class="detalleventas index">-->
<div class="">
	<h2><?php echo __('Lista Detalles de Ventas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('venta_id'); ?></th>
			<th><?php echo $this->Paginator->sort('producto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('precioproducto'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($detalleventas as $detalleventa): ?>
	<tr>
		<td><?php echo h($detalleventa['Detalleventa']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalleventa['Venta']['id'], array('controller' => 'ventas', 'action' => 'view', $detalleventa['Venta']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($detalleventa['Producto']['id'], array('controller' => 'productos', 'action' => 'view', $detalleventa['Producto']['id'])); ?>
		</td>
		<td><?php echo h($detalleventa['Detalleventa']['precioproducto']); ?>&nbsp;</td>
		<td><?php echo h($detalleventa['Detalleventa']['cantidad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $detalleventa['Detalleventa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detalleventa['Detalleventa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detalleventa['Detalleventa']['id']), null, __('Are you sure you want to delete # %s?', $detalleventa['Detalleventa']['id'])); ?>
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
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Detalleventa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ventas'), array('controller' => 'ventas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Venta'), array('controller' => 'ventas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
