<div class="manoobraxordentrabajos index">
	<h2><?php echo __('Manoobraxordentrabajos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ordentrabajo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('manodeobra_id'); ?></th>
			<th><?php echo $this->Paginator->sort('precio'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($manoobraxordentrabajos as $manoobraxordentrabajo): ?>
	<tr>
		<td><?php echo h($manoobraxordentrabajo['Manoobraxordentrabajo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($manoobraxordentrabajo['Ordentrabajo']['numerodeorden'], array('controller' => 'ordentrabajos', 'action' => 'view', $manoobraxordentrabajo['Ordentrabajo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($manoobraxordentrabajo['Manodeobra']['nombre'], array('controller' => 'manodeobras', 'action' => 'view', $manoobraxordentrabajo['Manodeobra']['id'])); ?>
		</td>
		<td><?php echo h($manoobraxordentrabajo['Manoobraxordentrabajo']['precio']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $manoobraxordentrabajo['Manoobraxordentrabajo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $manoobraxordentrabajo['Manoobraxordentrabajo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $manoobraxordentrabajo['Manoobraxordentrabajo']['id']), null, __('Are you sure you want to delete # %s?', $manoobraxordentrabajo['Manoobraxordentrabajo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Manoobraxordentrabajo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('controller' => 'manodeobras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra'), array('controller' => 'manodeobras', 'action' => 'add')); ?> </li>
	</ul>
</div>
