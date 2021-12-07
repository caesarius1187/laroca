<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
<div class="related">
	<h3><?php echo __('Related Ordentrabajos'); ?></h3>
	<?php if (!empty($usuario['Ordentrabajo'])): ?>
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
	<?php foreach ($usuario['Ordentrabajo'] as $ordentrabajo): ?>
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
