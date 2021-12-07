<div class="manodeobras view">
<h2><?php echo __('Manodeobra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($manodeobra['Manodeobra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($manodeobra['Manodeobra']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($manodeobra['Manodeobra']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($manodeobra['Manodeobra']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manodeobra'), array('action' => 'edit', $manodeobra['Manodeobra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manodeobra'), array('action' => 'delete', $manodeobra['Manodeobra']['id']), null, __('Are you sure you want to delete # %s?', $manodeobra['Manodeobra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('controller' => 'manodeobras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra'), array('controller' => 'manodeobras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Manodeobras'); ?></h3>
	<?php if (!empty($manodeobra['Manodeobra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($manodeobra['Manodeobra'] as $manodeobra): ?>
		<tr>
			<td><?php echo $manodeobra['id']; ?></td>
			<td><?php echo $manodeobra['nombre']; ?></td>
			<td><?php echo $manodeobra['precio']; ?></td>
			<td><?php echo $manodeobra['descripcion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'manodeobras', 'action' => 'view', $manodeobra['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'manodeobras', 'action' => 'edit', $manodeobra['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'manodeobras', 'action' => 'delete', $manodeobra['id']), null, __('Are you sure you want to delete # %s?', $manodeobra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Manodeobra'), array('controller' => 'manodeobras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
