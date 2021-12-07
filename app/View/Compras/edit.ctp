<?php echo $this->Html->script('compras/edit');?>
<div id="ContenidoCompras_Edit" class="compras">

	<?php echo $this->Form->create('Compra'); ?>	

	<table cellpadding="0" cellspacing="0" class="tbl_add">
	<tr>
		<td colspan="4"><h2><?php echo __('Datos de la Compra'); ?></h2></td>
	</tr>
	<tr>
		<td></td>		
			
		<td >
			<?php echo $this->Form->input('fecha', array(
	                            							'class'=>'datepicker', 
						                                    'type'=>'text',
						                                    'label'=>'Fecha', 
						                                    'default'=>date('d-m-Y'),                            
						                                    'readonly'=>'readonly')
			); ?>
	    </td>		
					
		<td><?php echo $this->Form->input('numerocomprobante', array('label' => 'N&ordm; Comprobante','readonly'=>'readonly')); ?></td>
		<td><?php echo $this->Form->input('condicioniva', array('label' => 'Condicion Iva', 'readonly'=>'readonly')); ?></td>
		<!--<td><?php echo $this->Form->input('monto'); ?></td>-->		
				
	</tr>
	</table>	

	<table id="tblDetalleCompra_agregar" cellpadding="0" cellspacing="0">
		<tr>
			<td>Producto</td>
			<td>Precio Compra - % Util. - % Flete</td>
			<td>Precio Vta. - % Desc.</td>
			<td>Precio Dto.</td>
			<td>Cantidad</td>
			
		</tr>
		<?php 
		$i=0;
		foreach ($this->data['Detallecompra'] as $detallecompra): ?>
			<tr>
				<?php echo $this->Form->input('Detallecompra.'.$i.'.id',array('type'=>'hidden','default'=>$detallecompra['id'])); ?>
				<?php echo $this->Form->input('Detallecompra.'.$i.'.compra_id',array('type'=>'hidden','default'=>$this->data['Compra']['id'])); ?>

				<td>
					<?php echo $this->Form->input('Detallecompra.'.$i.'.producto_id',array('disabled'=>'disabled','default'=>$detallecompra['producto_id'], 'label' => false, 'style' =>'width:200px')); ?>

					
				</td>
				<td>
					<?php echo $this->Form->input('Detallecompra.'.$i.'.precioproducto',array('type'=>'text','default'=>$detallecompra['precioproducto'],'readonly'=>'readonly', 'label' => false, 'style' => 'width:70px', 'div' => false));
					 ?>
					 <?php echo $this->Form->input('Detallecompra.'.$i.'.Porcutilidad',array('readonly'=>'readonly','default'=>$detallecompra['porcutilidad'], 'label' => false, 'style' => 'width:40px', 'div' => false)); 
					 ?>
					 <?php echo $this->Form->input('Detallecompra.'.$i.'.Porcflete',array('readonly'=>'readonly','default'=>$detallecompra['porcflete'], 'label' => false, 'style' => 'width:40px', 'div' => false)); 
					 ?>
				</td>
				<td>
					<?php echo $this->Form->input('Detallecompra.'.$i.'.Precioventa',array('type'=>'text','default'=>$detallecompra['precioventa'],'readonly'=>'readonly', 'label' => false, 'style' => 'width:70px', 'div' => false));
					?>
					<?php echo $this->Form->input('Detallecompra.'.$i.'.Porcdescuento',array('readonly'=>'readonly','default'=>$detallecompra['porcdescuento'], 'label' => false, 'style' => 'width:40px', 'div' => false)); 
					?>
				</td>
				<td>
					<?php echo $this->Form->input('Detallecompra.'.$i.'.Preciodesc',array('readonly'=>'readonly','default'=>$detallecompra['preciodesc'], 'label' => false, 'div' => false, 'style'=>'width:70px')); 
					?>
				</td>
				<td><?php echo $this->Form->input('Detallecompra.'.$i.'.cantidad',array('readonly'=>'readonly','default'=> $detallecompra['cantidad'], 'label' => false, 'style'=>'width:50px')); ?>
				</td>				
			</tr>
		<?php $i++; endforeach; ?>
		</table>	

		<table cellpadding="0" cellspacing="0" class="tbl_add">
		<tr>
			<td width="75%">&nbsp;</td>
			<td style="text-align: right; vertical-align:middle;">
				<lable class="lbl_ot">COSTO</label>
			</td>
			<td>
				<?php echo $this->Form->input('total', array('label' => 'Total', 'readonly' => 'readonly', 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>

		</tr>
		</table>
				
	
	

	<?php echo $this->Html->link(__('Volver'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?>
</div>

