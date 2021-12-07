<div class="compras view">
<h2><?php echo __('Compra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condicioniva'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['condicioniva']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numerocomprobante'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['numerocomprobante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($compra['Proveedore']['id'], array('controller' => 'proveedores', 'action' => 'view', $compra['Proveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['total']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Compra'), array('action' => 'edit', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Compra'), array('action' => 'delete', $compra['Compra']['id']), null, __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detallecompras'), array('controller' => 'detallecompras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detallecompra'), array('controller' => 'detallecompras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Detallecompras'); ?></h3>
	<?php if (!empty($compra['Detallecompra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Compra Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Precioproducto'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($compra['Detallecompra'] as $detallecompra): ?>
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
