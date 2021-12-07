<div class="detalleventas form">
<?php echo $this->Form->create('Detalleventa'); ?>
	<fieldset>
		<legend><?php echo __('Edit Detalleventa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('venta_id');
		echo $this->Form->input('producto_id');
		echo $this->Form->input('precioproducto');
		echo $this->Form->input('cantidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

