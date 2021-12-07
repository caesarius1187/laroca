<div class="detalleventas view">
<h2><?php echo __('Detalleventa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detalleventa['Detalleventa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Venta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detalleventa['Venta']['id'], array('controller' => 'ventas', 'action' => 'view', $detalleventa['Venta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detalleventa['Producto']['id'], array('controller' => 'productos', 'action' => 'view', $detalleventa['Producto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precioproducto'); ?></dt>
		<dd>
			<?php echo h($detalleventa['Detalleventa']['precioproducto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($detalleventa['Detalleventa']['cantidad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detalleventa'), array('action' => 'edit', $detalleventa['Detalleventa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detalleventa'), array('action' => 'delete', $detalleventa['Detalleventa']['id']), null, __('Are you sure you want to delete # %s?', $detalleventa['Detalleventa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalleventas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalleventa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ventas'), array('controller' => 'ventas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Venta'), array('controller' => 'ventas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
