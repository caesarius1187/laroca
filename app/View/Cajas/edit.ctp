<div class="cajas form">
	<?php echo $this->Form->create('Caja'); ?>
	<fieldset>
		<legend><?php
				if ($this->data['Caja']['usuarioCierre_id'] == null) {
					echo __('Cerrar Caja');
				} else {
					echo __('Ver Caja');
				}
				?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fecha', ['type' => 'hidden']);
		echo $this->Form->input('usuarioApertura_id', ['type' => 'hidden']);
		echo $this->Form->label('Fecha:');
		echo $this->Form->label(date('d-m-Y', strtotime($this->data['Caja']['fecha'])));
		echo $this->Form->input('montoApertura', ['readonly' => 'readonly']);
		echo $this->Form->label('Hora Apertura:');
		$ha = new DateTime($this->data['Caja']['horaApertura']);
		echo $this->Form->label($ha->format('H:i:s'));
		echo $this->Form->input('descripcionApertura', ['readonly' => 'readonly']);

		?>
		<table>
			<tr>
				<td colspan="5"><h2>Pagos Recibidos</h2></td>
			</tr>
			<tr>
				<th>Fecha</th>
				<th>Num OT</th>
				<th>Monto</th>
			</tr>
			<?php
			$totalPagos = 0;
			foreach ($pagos as $pago) {
			?>
				<tr>
					<td><?= $pago['Pago']['fecha'] ?></td>
					<td><?= $pago['Ordentrabajo']['numerodeorden'] ?></td>
					<td><?= $pago['Pago']['montodejado'] ?></td>
				</tr>
			<?php
				$totalPagos+=$pago['Pago']['montodejado']*1 ;
			}
			?>
			<tr>
				<th colspan="2">Total Pagos Recibidos</th>
				<th colspan="1"><?= $totalPagos ?></th>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="5"><h2>Egresos</h2></td>
			</tr>
			<tr>
				<th>Fecha</th>
				<th>Num Comprobante</th>
				<th>Monto</th>
			</tr>
			<?php
			$totalEgresos = 0;
			foreach ($compras as $compra) {
			?>
				<tr>
					<td><?= $compra['Compras']['fecha'] ?></td>
					<td><?= $compra['Compras']['numerocomprobante'] ?></td>
					<td><?= $compra['Compras']['total'] ?></td>
				</tr>
			<?php
				$totalEgresos+=$compra['Compras']['total']*1 ;
			}
			?>
			<tr>
				<th colspan="2">Total Egresos</th>
				<th colspan="1"><?= $totalEgresos ?></th>
			</tr>
		</table>
		<?php
		if ($this->data['Caja']['usuarioCierre_id'] != null) {
			echo $this->Form->input('usuarioCierre_id', ['type' => 'hidden']);
			echo $this->Form->input('horaCierre', ['type' => 'hidden']);
			echo $this->Form->label('Hora Cierre:');
			$hc = new DateTime($this->data['Caja']['horaCierre']);
			echo $this->Form->label($hc->format('H:i:s'));
			echo $this->Form->input('montoCierre', ['readonly' => 'readonly']);
			echo $this->Form->input('descripcionCierre', ['readonly' => 'readonly']);
		} else {
			echo $this->Form->input('descripcionApertura', ['readonly' => 'readonly']);
			echo $this->Form->input('montoCierre',[
				'value'=>$totalEgresos+$totalPagos,
				'readonly' => 'readonly'
			]);
			echo $this->Form->input('descripcionCierre');
		}
		?>
	</fieldset>
	<?php
	if ($this->data['Caja']['usuarioCierre_id'] == null) {
		echo $this->Form->end(__('Cerrar Caja'));
	} else {
		echo $this->Form->end(__('Salir'));
	}
	?>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cliente.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cliente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordentrabajos'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordentrabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ventas'), array('controller' => 'ventas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Venta'), array('controller' => 'ventas', 'action' => 'add')); ?> </li>
	</ul>
</div>-->