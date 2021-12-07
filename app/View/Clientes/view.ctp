<div class="clientes view">
<h2><?php echo __('Cliente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dni'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['dni']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuit'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['cuit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ventas'), array('controller' => 'ventas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Venta'), array('controller' => 'ventas', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
<div class="related">
	<h3><?php echo __('Related Ordentrabajos'); ?></h3>
	<?php if (!empty($cliente['Ordentrabajo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Usuario Repara Id'); ?></th>
		<th><?php echo __('Fechaingreso'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Fechaegreso'); ?></th>
		<th><?php echo __('Numerodeorden'); ?></th>
		<th><?php echo __('Ordentrabajoscol'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Trabajorealizado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cliente['Ordentrabajo'] as $ordentrabajo): ?>
		<tr>
			<td><?php echo $ordentrabajo['id']; ?></td>
			<td><?php echo $ordentrabajo['usuario_id']; ?></td>
			<td><?php echo $ordentrabajo['usuario_repara_id']; ?></td>
			<td><?php echo $ordentrabajo['fechaingreso']; ?></td>
			<td><?php echo $ordentrabajo['descripcion']; ?></td>
			<td><?php echo $ordentrabajo['fechaegreso']; ?></td>
			<td><?php echo $ordentrabajo['numerodeorden']; ?></td>
			<td><?php echo $ordentrabajo['ordentrabajoscol']; ?></td>
			<td><?php echo $ordentrabajo['cliente_id']; ?></td>
			<td><?php echo $ordentrabajo['trabajorealizado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ordentrabajos', 'action' => 'view', $ordentrabajo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ordentrabajos', 'action' => 'edit', $ordentrabajo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ordentrabajos', 'action' => 'delete', $ordentrabajo['id']), null, __('Are you sure you want to delete # %s?', $ordentrabajo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ventas'); ?></h3>
	<?php if (!empty($cliente['Venta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Condicioniva'); ?></th>
		<th><?php echo __('Numerocomprobante'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Ordendetrabajo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cliente['Venta'] as $venta): ?>
		<tr>
			<td><?php echo $venta['id']; ?></td>
			<td><?php echo $venta['fecha']; ?></td>
			<td><?php echo $venta['monto']; ?></td>
			<td><?php echo $venta['condicioniva']; ?></td>
			<td><?php echo $venta['numerocomprobante']; ?></td>
			<td><?php echo $venta['cliente_id']; ?></td>
			<td><?php echo $venta['total']; ?></td>
			<td><?php echo $venta['ordendetrabajo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ventas', 'action' => 'view', $venta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ventas', 'action' => 'edit', $venta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ventas', 'action' => 'delete', $venta['id']), null, __('Are you sure you want to delete # %s?', $venta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Venta'), array('controller' => 'ventas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
