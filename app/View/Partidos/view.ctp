<div class="partidos view">
<h2><?php echo __('Partido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Partido'), array('action' => 'edit', $partido['Partido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Partido'), array('action' => 'delete', $partido['Partido']['id']), null, __('Are you sure you want to delete # %s?', $partido['Partido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Partidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partido'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Localidades'), array('controller' => 'localidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localidade'), array('controller' => 'localidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Localidades'); ?></h3>
	<?php if (!empty($partido['Localidade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Partido Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($partido['Localidade'] as $localidade): ?>
		<tr>
			<td><?php echo $localidade['id']; ?></td>
			<td><?php echo $localidade['nombre']; ?></td>
			<td><?php echo $localidade['partido_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'localidades', 'action' => 'view', $localidade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'localidades', 'action' => 'edit', $localidade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'localidades', 'action' => 'delete', $localidade['id']), null, __('Are you sure you want to delete # %s?', $localidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Localidade'), array('controller' => 'localidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
