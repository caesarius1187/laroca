<div class="localidades view">
<h2><?php echo __('Localidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($localidade['Localidade']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partido'); ?></dt>
		<dd>
			<?php echo $this->Html->link($localidade['Partido']['nombre'], array('controller' => 'partidos', 'action' => 'view', $localidade['Partido']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Localidade'), array('action' => 'edit', $localidade['Localidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Localidade'), array('action' => 'delete', $localidade['Localidade']['id']), null, __('Are you sure you want to delete # %s?', $localidade['Localidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Localidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localidade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partidos'), array('controller' => 'partidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partido'), array('controller' => 'partidos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Proveedores'); ?></h3>
	<?php if (!empty($localidade['Proveedore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Localidade Id'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Mail'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Cuit'); ?></th>
		<th><?php echo __('Condicioniva'); ?></th>
		<th><?php echo __('Tipoproveedor'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($localidade['Proveedore'] as $proveedore): ?>
		<tr>
			<td><?php echo $proveedore['id']; ?></td>
			<td><?php echo $proveedore['nombre']; ?></td>
			<td><?php echo $proveedore['direccion']; ?></td>
			<td><?php echo $proveedore['localidade_id']; ?></td>
			<td><?php echo $proveedore['telefono']; ?></td>
			<td><?php echo $proveedore['mail']; ?></td>
			<td><?php echo $proveedore['celular']; ?></td>
			<td><?php echo $proveedore['cuit']; ?></td>
			<td><?php echo $proveedore['condicioniva']; ?></td>
			<td><?php echo $proveedore['tipoproveedor']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proveedores', 'action' => 'view', $proveedore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proveedores', 'action' => 'edit', $proveedore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proveedores', 'action' => 'delete', $proveedore['id']), null, __('Are you sure you want to delete # %s?', $proveedore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
