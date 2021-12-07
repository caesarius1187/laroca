<div class="manoobraxordentrabajos form">
<?php echo $this->Form->create('Manoobraxordentrabajo'); ?>
	<fieldset>
		<legend><?php echo __('Add Manoobraxordentrabajo'); ?></legend>
	<?php
		echo $this->Form->input('ordentrabajo_id');
		echo $this->Form->input('manodeobra_id');
		echo $this->Form->input('precio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Manoobraxordentrabajos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('controller' => 'manodeobras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra'), array('controller' => 'manodeobras', 'action' => 'add')); ?> </li>
	</ul>
</div>
