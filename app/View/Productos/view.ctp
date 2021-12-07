<div class="productos view">
<h2><?php echo __('Producto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigooriginal'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['codigooriginal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($producto['Modelo']['id'], array('controller' => 'modelos', 'action' => 'view', $producto['Modelo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($producto['Proveedore']['id'], array('controller' => 'proveedores', 'action' => 'view', $producto['Proveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechacompra'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['fechacompra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numeroserie'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['numeroserie']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Producto'), array('action' => 'edit', $producto['Producto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Producto'), array('action' => 'delete', $producto['Producto']['id']), null, __('Are you sure you want to delete # %s?', $producto['Producto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modelos'), array('controller' => 'modelos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modelo'), array('controller' => 'modelos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detallecompras'), array('controller' => 'detallecompras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detallecompra'), array('controller' => 'detallecompras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalleordentrabajos'), array('controller' => 'detalleordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalleordentrabajo'), array('controller' => 'detalleordentrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalleventas'), array('controller' => 'detalleventas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalleventa'), array('controller' => 'detalleventas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Detallecompras'); ?></h3>
	<?php if (!empty($producto['Detallecompra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Compra Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Precioproducto'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($producto['Detallecompra'] as $detallecompra): ?>
		<tr>
			<td><?php echo $detallecompra['id']; ?></td>
			<td><?php echo $detallecompra['compra_id']; ?></td>
			<td><?php echo $detallecompra['producto_id']; ?></td>
			<td><?php echo $detallecompra['precioproducto']; ?></td>
			<td><?php echo $detallecompra['cantidad']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'detallecompras', 'action' => 'view', $detallecompra['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'detallecompras', 'action' => 'edit', $detallecompra['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'detallecompras', 'action' => 'delete', $detallecompra['id']), null, __('Are you sure you want to delete # %s?', $detallecompra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detallecompra'), array('controller' => 'detallecompras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Detalleordentrabajos'); ?></h3>
	<?php if (!empty($producto['Detalleordentrabajo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Ordendetrabajo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($producto['Detalleordentrabajo'] as $detalleordentrabajo): ?>
		<tr>
			<td><?php echo $detalleordentrabajo['id']; ?></td>
			<td><?php echo $detalleordentrabajo['producto_id']; ?></td>
			<td><?php echo $detalleordentrabajo['precio']; ?></td>
			<td><?php echo $detalleordentrabajo['cantidad']; ?></td>
			<td><?php echo $detalleordentrabajo['ordendetrabajo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'detalleordentrabajos', 'action' => 'view', $detalleordentrabajo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'detalleordentrabajos', 'action' => 'edit', $detalleordentrabajo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'detalleordentrabajos', 'action' => 'delete', $detalleordentrabajo['id']), null, __('Are you sure you want to delete # %s?', $detalleordentrabajo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detalleordentrabajo'), array('controller' => 'detalleordentrabajos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Detalleventas'); ?></h3>
	<?php if (!empty($producto['Detalleventa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Precioproducto'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Venta Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($producto['Detalleventa'] as $detalleventa): ?>
		<tr>
			<td><?php echo $detalleventa['id']; ?></td>
			<td><?php echo $detalleventa['producto_id']; ?></td>
			<td><?php echo $detalleventa['precioproducto']; ?></td>
			<td><?php echo $detalleventa['cantidad']; ?></td>
			<td><?php echo $detalleventa['venta_id']; ?></td>
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
