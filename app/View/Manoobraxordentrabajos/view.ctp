<div class="manoobraxordentrabajos view">
<h2><?php echo __('Manoobraxordentrabajo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($manoobraxordentrabajo['Manoobraxordentrabajo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordentrabajo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($manoobraxordentrabajo['Ordentrabajo']['numerodeorden'], array('controller' => 'ordentrabajos', 'action' => 'view', $manoobraxordentrabajo['Ordentrabajo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manodeobra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($manoobraxordentrabajo['Manodeobra']['nombre'], array('controller' => 'manodeobras', 'action' => 'view', $manoobraxordentrabajo['Manodeobra']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($manoobraxordentrabajo['Manoobraxordentrabajo']['precio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manoobraxordentrabajo'), array('action' => 'edit', $manoobraxordentrabajo['Manoobraxordentrabajo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manoobraxordentrabajo'), array('action' => 'delete', $manoobraxordentrabajo['Manoobraxordentrabajo']['id']), null, __('Are you sure you want to delete # %s?', $manoobraxordentrabajo['Manoobraxordentrabajo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manoobraxordentrabajos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manoobraxordentrabajo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('controller' => 'manodeobras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra'), array('controller' => 'manodeobras', 'action' => 'add')); ?> </li>
	</ul>
</div>
