<?php echo $this->Html->script('jquery-ui',array('inline'=>false));?>
<?php echo $this->Html->script('ventas/edit');?>
<?php echo $this->Form->create('Venta',array('action'=>'index')); ?>
<div>
	<div class="ventas">	
		<?php echo $this->Html->image('logo_ot.png', array('alt' => 'Orden Trabajo', 'width' => '150', 'style' => 'padding-bottom:10px'));?>
		
		<table cellpadding = "0" cellspacing = "0" class="tbl_vt">
			<tr>
				
				<td colspan="4" style="text-align:center; font-size:17px;">
					<b style="font-size: 22px;"><p>X</p></b>
					<p>DOCUMENTO NO VALIDO</p>
					<p>COMO FACTURA</p>
				</td>
			</tr>
			<tr>
				<th width="10%"><?php echo $this->Form->label('Fecha:')?></th>
				<td width="40%"><?php echo $this->Form->label(
							date('d-m-Y',strtotime($this->data['Venta']['fecha']))
							)?></td>
				
				<th width="20%"><?php echo $this->Form->label('N&ordm; Comprobante:')?></th>
				<td width="30%"><?php echo $this->Form->label($this->data['Venta']['numerocomprobante'])?></td>

			</tr>	
			<tr>		
				<th><?php echo $this->Form->label('Cliente:')?></th>
				<td><?php echo $this->Form->label($this->data['Cliente']['nombre'])?>
				</td>
				<th><?php echo $this->Form->label('Condicion iva:')?></th>
				<td><?php echo $this->Form->label($this->data['Venta']['condicioniva'])?>
				</td>
			</tr>
			<tr>
				<td colspan="4"><hr width="100%" color="black" height="2px" aligne="center"></td>
			</tr>


			
		</table>		
	
		<?php if (!empty($this->data['Detalleventa'])): ?>
		<table cellpadding = "0" cellspacing = "0" class="tbl_vt">
		<tr>
			<th><?php echo __('Producto'); ?></th>
			<th><?php echo __('Precio'); ?></th>
			<th><?php echo __('Descuento'); ?></th>
			<th><?php echo __('Cantidad'); ?></th>			
			<th><?php echo __('Subtotal'); ?></th>			
		</tr>
		<?php 
		$i=0;

		foreach ($this->data['Detalleventa'] as $detalleventa): ?>
				
			<tr>
				<?php echo $this->Form->input('Detalleventa.'.$i.'.id',array('type'=>'hidden','default'=>$detalleventa['id'])); ?>
				<?php echo $this->Form->input('Detalleventa.'.$i.'.venta_id',array('type'=>'hidden','default'=>$this->data['Venta']['id'])); ?>
				<td>
					<?php echo $productos[$detalleventa['producto_id']]; ?>
				</td>
				<td>
					<?php echo $detalleventa['precioproducto'];?>
				</td>
				<td>
					<?php echo $detalleventa['descuento'];?>
				</td>
				<td>
					<?php echo $detalleventa['cantidad'];?>
				</td>	
				<td>
					<?php echo $detalleventa['precioproducto']*(1-($detalleventa['descuento']/100)) * $detalleventa['cantidad']?>
				</td>			
			</tr>

			
		<?php $i++; endforeach; ?>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<th style="text-align:right; font-size:22px;">Total:</th>
				<td style="font-size:20px;">	
					<?php echo $this->data['Venta']['total']; ?>
				</td>

			</tr>
			<tr>
				<td colspan="5"><P><u>7 DIAS CORRIDOS DE VALIDEZ DESDE LA FECHA DEL PRESUPUESTO</u></P></td>
			</tr>
		</table>
	<?php 
		endif; 
		echo $this->Form->input('numDetalle',array('value'=>$i,'type'=>'hidden'));
		
	?>
		
	</div>
	<?php echo $this->Form->button('Imprimir', 
                                    array('type' => 'button',
                                          'onClick' => "imprimir()",
                                          'id' =>'btn_ot'

                                         )
            );?> 
</div>


