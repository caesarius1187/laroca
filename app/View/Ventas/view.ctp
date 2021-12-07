<div class="ventas view">
<h2><?php echo __('Venta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condicioniva'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['condicioniva']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numerocomprobante'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['numerocomprobante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $venta['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($venta['Venta']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordendetrabajo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($venta['Ordentrabajo']['id'], array('controller' => 'ordentrabajos', 'action' => 'view', $venta['Ordentrabajo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Venta'), array('action' => 'edit', $venta['Venta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Venta'), array('action' => 'delete', $venta['Venta']['id']), null, __('Are you sure you want to delete # %s?', $venta['Venta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ventas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Venta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordendetrabajos'), array('controller' => 'ordendetrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordendetrabajo'), array('controller' => 'ordendetrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalleventas'), array('controller' => 'detalleventas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalleventa'), array('controller' => 'detalleventas', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
<div class="related">
	<h3><?php echo __('Related Detalleventas'); ?></h3>
	<?php if (!empty($venta['Detalleventa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Venta Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Precioproducto'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($venta['Detalleventa'] as $detalleventa): ?>
		<tr>
			<td><?php echo $detalleventa['id']; ?></td>
			<td><?php echo $detalleventa['venta_id']; ?></td>
			<td><?php echo $detalleventa['producto_id']; ?></td>
			<td><?php echo $detalleventa['precioproducto']; ?></td>
			<td><?php echo $detalleventa['cantidad']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'detalleventas', 'action' => 'view', $detalleventa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'detalleventas', 'action' => 'edit', $detalleventa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'detalleventas', 'action' => 'delete', $detalleventa['id']), null, __('Are you sure you want to delete # %s?', $detalleventa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detalleventa'), array('controller' => 'detalleventas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
