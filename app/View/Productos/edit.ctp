<?php echo $this->Html->script('productos/productos'); ?>

<div id="divEditarProducto_Content">
	<?php echo $this->Form->create('Producto',array('controller'=>'productos','action'=>'edit','type'=>'post')); ?>
	<table cellpadding="0" cellspacing="0" class="tbl_add">
		<tr>
			<td colspan="4"><h2><?php echo __('Modificar Producto'); ?></h2></td>
		</tr>
		<tr>			
		</tr>
		<tr>
			<td><?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('nombre'); ?></td>
			<td>
				<?php echo $this->Form->input('numeroserie', array('label' => 'Numero Serie', 'style' => 'width:200px')); ?>
			</td>
			<td>				
				<?php 
                 echo $this->Form->input('fechacompra', array(
                            'class'=>'datepicker', 
                            'type'=>'text',
                            'label'=>'Fecha compra',
                            'default'=>date('d-m-Y'),
                            'readonly'=>'readonly')
                 );?>
			</td>		
			<td>
				<?php $DdlOpcioneTipo = array('Producto' => 'Producto', 'Material'=> 'Material');?>
				<?php echo $this->Form->input('tipo', array('type' => 'select', 'options' => $DdlOpcioneTipo, 'style' => 'width:200px', 'onchange' => 'selectProducto(this)')); ?>
			</td>	
		</tr>
		<tr>
			<td>
				<?php echo $this->Form->input('codigo', array('label' => 'Codigo Interno','style' => 'width:200px')); ?>
			</td>
			<td>
				<?php echo $this->Form->input('codigooriginal', array('label' => 'Codigo Original', 'style' => 'width:200px')); ?>
			</td>
			<td>				
			</td>			
			<td>			
				<?php echo $this->Form->input('cantidad', array('style' => 'width:200px')); ?>
			</td>
		</tr>
		<tr>
			<td>
				<div class="input select">
				<?php echo $this->Form->input('preciocompra', array('label' => 'Precio Compra', 'style' => 'width:80px', 'onchange' => 'sugerirPrecio()', 'div' => false)); 
					  	
				?>										-->
				<?php echo $this->Form->input('porcutilidad', array('label' => false ,'style' => 'width:40px', 'onchange' => 'sugerirPrecio()', 'div' => false, 'title' => 'Ingrese porcentaje de UTILIDAD para calcular precio de venta.')); ?>

				<?php echo $this->Form->input('porcflete', array('label'=>false,'style' => 'width:40px', 'onchange' => 'sugerirPrecio()','div' => false, 'title' => 'Ingrese porcentaje de FELETE para calcular precio de venta.')); ?>
				</div>
			</td>
			<td>
				<div class="input select">
				<?php echo $this->Form->input('precioventa', array('label' => 'Precio Venta', 'style' => 'width:110px', 'onchange' => 'sugerirPrecioDesc()', 'div' => false)); 
				?>
				
				<?php echo $this->Form->input('porcdescuento', array('label' => false ,'style' => 'width:40px', 'onchange' => 'sugerirPrecioDesc()', 'div' => false, 'title' => 'Ingrese porcentaje de DESCUENTO para calcular precio con descuento.')); ?>
				</div>						
			</td>
			<td>
				<?php echo $this->Form->input('precio', array('label' => 'Precio Desc.','style' => 'width:200px')); ?>
			</td>
		</tr>		
		<tr>
			<td></td>
			<td><?php echo $this->Form->end(__('Modificar')); ?></td>							
			<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>			
			<td></td>
		</tr>
	</table>
		
	</table>					
</div>