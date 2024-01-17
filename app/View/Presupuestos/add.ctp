<?php echo $this->Html->script('presupuestos/add');?>

<div class="">
	<?php echo $this->Form->create('Presupuesto'); ?>
	<table cellpadding="0" cellspacing="0" class="tbl_add" id="tblAddPresupuesto">
		<tr class="a3b3r3">		
			
		</tr>	
        </tr>
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">
			<td>
				<?php echo $this->Form->input('nombre',array('label'=>'Nombre y Apellido')); ?>
			</td>
			<td>
				<?php echo $this->Form->input('direccion',array('label'=>'Direccion')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('total',array('label'=>'Total $')); ?>
			</td>
		</tr>	
		<?php
		/*AVANCES DEL TRABAJO	*/
		?>
		<tr class="all">
			<td colspan="2" class="td_1">
				<h2>Productos</h2>
			</td>
		</tr>
		<tr class="all">
			<td class="td_3">				
				<!--<?php echo $this->Form->input('productodetalle_id',array('label'=>'Producto','onChange'=>'getDetallesProducto(1)', 'style' => 'max-width:240px')); ?>-->

				<?php echo $this->Form->input('producto_id',array('label'=>'Producto','style' => 'max-width:240px', 'onChange'=>'getDetallesProducto(1)')); ?>
				<?php echo $this->Form->input('material_id',array(
					'label'=>'Material',
					'style' => 'max-width:240px', 
					'onChange'=>'getDetallesProducto(2)',
					'options'=>$materiales,
					'empty'=>'Seleccionar Material'
				)); ?>
				
				<input type="button" value="Agregar Producto" id="btnAgregarProducto" onClick="agregarproducto()" class="btn_ot"/>
			</td>

			<td id="tdDetalleProducto" class="td_4">
				
			</td>		
		</tr>		
		<tr class="all">
			<td colspan="2">
				<?php echo $this->Form->input('numDetalle',array('value'=>0,'type'=>'hidden')); ?>
				<table id="tableDOT" cellpadding="0" cellspacing="0" class="tbl_add" style="margin-top:20px;">
					<thead>
						<th>CONCEPTO</th>
						<th>MATERIAL</th>
						<th>ANCHO</th>
						<th>LARGO</th>
						<th>CANT. M2/ML</th>
						<th>PRECIO UNIT.</th>
						<th>TOTAL</th>
						<th>DESCRIPCION</th>
					</thead>
					<!--<tfoot>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tfoot>-->
					<tbody>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tbody>
				</table>
			</td>
		</tr>		
		<tr class="all">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr class="all">
						<td style="text-align: right; vertical-align:middle;">
							<label class="lbl_ot">Precio</label>
						</td>
						<td width="40%">
							<?php echo $this->Form->input('total2', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr class="all">
			<td>&nbsp;</td>
			<td>&nbsp;</td>			
			<td><?php echo $this->Form->end(__('Aceptar')); ?></td>
			<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>
		</tr>
	</table>		
</div>
