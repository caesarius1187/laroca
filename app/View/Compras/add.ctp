<?php echo $this->Html->script('compras/add');?>
<div id="ContenidoCompras_Add" class="compras">
	<!--Lista de Productos con precios a utilizar-->
	<input id='hdnNroDetalleCompra' type='hidden' value='0'/>
	<table id='tblListaDeProductos' style='display:none'>
	<?php 
		//echo print_r($todosLosProductos) 
		foreach ($todosLosProductos as $producto): 
			$ProdId = $producto['Producto']['id'];
	?>
		<tr id='trProucto_<?php echo $ProdId ?>'>		
			<td id='tdProdNombre_<?php echo $ProdId ?>' ><?php echo $producto['Producto']['nombre']; ?></td>
			<td id='tdProdPcioCompra_<?php echo $ProdId ?>'><?php echo $producto['Producto']['preciocompra']; ?></td>			
			<td id='tdPorcUtilidad_<?php echo $ProdId ?>'><?php echo $producto['Producto']['porcutilidad']; ?></td>			
			<td id='tdPorcFlete_<?php echo $ProdId ?>'><?php echo $producto['Producto']['porcflete']; ?></td>			
			<td id='tdPcioVenta_<?php echo $ProdId ?>'><?php echo $producto['Producto']['precioventa']; ?></td>
			<td id='tdPorcDesc_<?php echo $ProdId ?>'><?php echo $producto['Producto']['porcdescuento']; ?></td>
			<td id='tdPcioDescuento_<?php echo $ProdId ?>'><?php echo $producto['Producto']['precio']; ?></td>			
			<td id='tdProdCantidad_<?php echo $ProdId ?>'><?php echo $producto['Producto']['cantidad']; ?></td>
			<td id='tdProdTipo_<?php echo $ProdId ?>'><?php echo $producto['Producto']['tipo']; ?></td>			
		</tr>
	<?php endforeach; ?>			
	</table>

	<?php echo $this->Form->create('Compra'); ?>	
	<table cellpadding="0" cellspacing="0" class="tbl_add">
	<tr>
		<td colspan="4"><h2><?php echo __('Agregar Compra'); ?></h2></td>
	</tr>
	<tr>
		<td></td>		
				
		<td><?php echo $this->Form->input('fecha', array(
	                            							'class'=>'datepicker', 
						                                    'type'=>'text',
						                                    'label'=>'Fecha', 
						                                    'default'=>date('d-m-Y'),                            
						                                    'readonly'=>'readonly')
						                                    ); ?>
	    </td>		
					
		<td><?php echo $this->Form->input('numerocomprobante', array('label' => 'N&ordm; Comprobante')); ?></td>
		<td><?php echo $this->Form->input('condicioniva', array(
						'label' => 'Condicion Iva',
						'type'=>'select',
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
							)
						));?></td>
		<!--<td><?php echo $this->Form->input('monto'); ?></td>-->		
				
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0" class="tbl_add">
	<tr>
		<td style="width:25%">
			<?php echo $this->Form->input('producto_id',array('id'=>'ddlListaProductos','label'=>'Agregar Productos a la Compra', 'style' => 'width:250px'))?>
		</td>
		<td style="width:25%">
			<div class='input select' style="margin-top:17px">
				<input id="btnAgregarProducto" type="button" value="Agregar Producto" class="btn_ot" onClick="checkearProducto()"/>
			</div>
		</td>
		<td>
		</td>		
		<td></td>		
	</tr>
	</table>
	<table id="tblDetalleCompra_agregar" cellpadding="0" cellspacing="0" >
		<tr>
			<td>Producto</td>
			<td>Precio Compra - % Util. - % Flete</td>
			<td>Precio Vta. - % Desc.</td>
			<td>Precio Dto.</td>
			<td>Cantidad</td>
			<td>Acciones</td>
		</tr>
	</table>
	<br>
	<br>
	<table cellpadding="0" cellspacing="0" class="tbl_add">
		<tr>
			<td width="70%">&nbsp;</td>
			<td><label class="lbl_ot">TOTAL</label></td>
			<td>
	        	<?php echo $this->Form->input('total',array("readonly"=>"readonly", 'label' => '', 'style' =>'font-size:180%; width: 120px'))?>
	        </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><?php echo $this->Form->end(__('Aceptar')); ?></td>
			<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>
		</tr>
	</table>
</div>

