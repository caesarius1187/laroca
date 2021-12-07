<div class="manodeobras form">
<?php echo $this->Form->create('Manodeobra'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manodeobra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('precio');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Manodeobra.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Manodeobra.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Manodeobras'), array('controller' => 'manodeobras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra'), array('controller' => 'manodeobras', 'action' => 'add')); ?> </li>
	</ul>
</div>
