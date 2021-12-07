<div class="detallecompras view">
<h2><?php echo __('Detallecompra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detallecompra['Detallecompra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detallecompra['Compra']['id'], array('controller' => 'compras', 'action' => 'view', $detallecompra['Compra']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detallecompra['Producto']['id'], array('controller' => 'productos', 'action' => 'view', $detallecompra['Producto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precioproducto'); ?></dt>
		<dd>
			<?php echo h($detallecompra['Detallecompra']['precioproducto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($detallecompra['Detallecompra']['cantidad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detallecompra'), array('action' => 'edit', $detallecompra['Detallecompra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detallecompra'), array('action' => 'delete', $detallecompra['Detallecompra']['id']), null, __('Are you sure you want to delete # %s?', $detallecompra['Detallecompra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detallecompras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detallecompra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
