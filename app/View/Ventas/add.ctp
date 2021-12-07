<?php echo $this->Html->script('ventas/add');?>
<div id='ContenidoVentas_Add' class="ventas " style='width:100%'>
<?php echo $this->Form->create('Venta'); ?>
	
	<table cellpadding="0" cellspacing="0" class="tbl_add">
		<tr>
			<td colspan="5"><h2><?php echo __('Agregar Venta'); ?></h2></td>
		</tr>
		<?php			
		if(is_null($numerocomprobantes[0]['numerocomprobante']))
			$numerocomprobantes[0]['numerocomprobante']=0; ?>	
		
		<tr>
			<td>
				<?php echo $this->Form->input('cliente_id',array('empty'=>'Seleccionar cliente', 'width' => '200px'))?>
			</td>
			<td>
			
				<?php echo $this->Form->input('fecha', array(
	                                   'class'=>'datepicker', 
	                                   'type'=>'text',
	                                   'label'=>'Fecha', 

	                                   'default'=>date('d-m-Y'),                            
	                                   'readonly'=>'readonly',
	                                   'style'=>'width:70%')) ?>
	        </td>
	        <td>
	        	<?php echo $this->Form->input('condicioniva',array(
	   					'type'=>'select',
	   					'label'=>'Condicion IVA',
	   					'options'=>array(	   						
	   						'IVA Responsable Inscripto'=>'IVA Resp. Insc.',
							'IVA Responsable no Inscripto'=>'IVA Resp. no Insc.',
							'IVA no Responsable'=>'IVA no Resp.',
							'IVA Sujeto Exento'=>'IVA Sujeto Exento',
							'Consumidor Final'=>'Consumidor Final',
							'Responsable Monotributo'=>'Responsable Monotributo',
							'Sujeto no Categorizado'=>'Sujeto no Categorizado',
							'Proveedor del Exterior'=>'Proveedor del Exterior',
							'Cliente del Exterior'=>'Cliente del Exterior',
							'IVA Liberado Ley N 19.640'=>'IVA Liberado Ley N 19.640',
							'IVA Responsable Inscripto Agente de Percepcion'=>'IVA Resp. Insc. Agente de Percep.',
							'Pequeno Contribuyente Eventual'=>'Pequeno Contribuyente Eventual',
							'Monotributista Social'=>'Monotributista Social',
							'Pequeno Contribuyente Eventual Social'=>'Pequeno Contrib. Eventual Social'
							),
	   					)
					) ?>
	        </td>
	        <td>
	        	<?php echo $this->Form->input('numerocomprobante',array(
	   					'label'=>'N&ordm; de comprobante',
	   					'default'=>$numerocomprobantes[0]['numerocomprobante'],'type'=>'text'))?>
	        </td>
	        
		</tr>
	
		<tr>
			<td>
				<?php echo $this->Form->input('producto_id',array('label'=>'Producto','required'=>true, 'style'=>'width:300px')); ?>
			</td>
			<td>
				<div class='input select' style="margin-top:17px">
					<input type="button" value="Agregar Producto" id="btnAgregarProducto" style='cursor:pointer' class="btn_ot" onClick="agregarproducto()"/>	
				</div>
			</td>	
			<td>				
			</td>
			<td>				
			</td>						
		</tr>	
	</table>
	<table id="TablaVentaAdd">	
		<?php 
		echo $this->Html->tableCells(
			array(
				array(
					'Producto',
					'Precio',
					'Prec. Desc.',
					'Desc.(%)',					
					'c/Desc.',					
				 	'Cantidad',
				 	'Stock',
				 	'SubTotal',				 	
				 	'Accion',
					),			   			    		   
			)
		);			 ?>
	</table>
	<?php
		echo $this->Form->input('numDetalle',array('value'=>0,'type'=>'hidden'));
		echo $this->Form->input('precioproducto',array('type'=>'select','options'=>$productosprecios,'style'=>'display:none','label'=>''));
		echo $this->Form->input('preciodescuento',array('type'=>'select','options'=>$productosdescuentos,'style'=>'display:none','label'=>''));
		echo $this->Form->input('stockproductos',array('type'=>'select','options'=>$productosstock,'style'=>'display:none','label'=>''));
	?>
	<div>
		<table cellpadding="0" cellspacing="0" class="tbl_add">
		<tr>
			<td colspan="3">&nbsp;</td>
			<td><label class="lbl_ot">TOTAL</label></td>
			<td>
	        	<?php echo $this->Form->input('total',array("readonly"=>"readonly", 'label' => '', 'style' =>'font-size:180%; width: 120px'))?>
	        </td>
		</tr>
		<tr>
			<td width="20%">
				<?php echo $this->Form->input('tipoventa',array(
	   					'type'=>'select',
	   					'label'=>'Tipo Venta',
	   					'style'=>'width:100%',
	   					'options'=>array(	   						
	   						'venta'=>'VENTA',
							'presupuesto'=>'PRESUPUESTO'
						),
	   					)
					) 
				?>
			</td>
			<td width="20%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="20%"><?php echo $this->Form->end(__('Aceptar')); ?></td>
			<td width="20%"><?php echo $this->Html->link(__('Cancelar'), array('action' => 'index'), array('class' => 'btn_cancelar')); ?> </td>
		</tr>
		</table>
	</div>
</div>
