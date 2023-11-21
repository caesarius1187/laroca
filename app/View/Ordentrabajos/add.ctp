<?php echo $this->Html->script('ordentrabajos/add');?>
<!--<div class="ordendetrabajos form">-->

<div class="">
	<?php echo $this->Form->create('Ordentrabajo'); ?>
	<table cellpadding="0" cellspacing="0" class="tbl_add" id="tblAddOrdenTrabajo">
		<?php
		/*DATOS ORDEN DE TRABAJO*/
		?>
		<tr class="all">
			<td >
				<?php echo $this->Form->input('numerodeorden',array('value'=> $numerodeorden[0]['numerodeorden'], 'label'=>'Pedido N�', 'style'=>'width:70%')); ?>
			</td>
			<td >
				<?php echo $this->Form->input('user_id',array('label'=>'Usuario')); ?>
			</td>
		</tr>
		<?php
		/*Datos Del Solicitante*/
		?>
		<tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Datos Solicitante'); ?></h2></td>
		</tr>
		<tr class="all">
			<td colspan="1" width="25%">				
				<?php echo $this->Form->input('solicnombre',array('label'=>'Nombre y Apellido')); ?>			
			</td>
			<td colspan="1" width="25%">				
				<?php echo $this->Form->input('solictelefono',array('label'=>'Telefono')); ?>			
			</td>
			<td colspan="2" width="25%">				
				<?php echo $this->Form->input('solicdireccion',array('label'=>'Direccion')); ?>			
			</td>
		</tr>			
		<tr class="all">
			<td width="25%">				
				<div class="input select">
				<?php
				echo $this->Form->input('cliente_id',array('label'=>'Cliente', 'div' => false, 
					'style' => 'width:80%',
					'type'=>'hidden'
				)
			);				
				echo $this->Html->image('bg-search.png', array('height' => '15', 'style'=>'padding-left:5px; padding-top:5px; cursor:pointer', 'title' => 'Buscar Cliente', 'onClick' => 'cargarCliente();'))				
				;?>
				</div>
			</td>			
			
			<td width="25%">
				<?php echo $this->Form->input('fechaencargo', array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Encargo',
		                                      'default'=>'',//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?></td>	
	
				
			</td>
			<td width="25%">				
				<?php echo $this->Form->input('fechaentrega',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Entrega',
		                                      'default'=>'',//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>		
		</tr>
		<tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Mesada'); ?></h2></td>
		</tr>
		<tr class="all">
			<td  colspan="1">
				<?php echo $this->Form->input('griferia',array(
					'label'=>'Griferia',
					'options'=>[
                		'Grifería', 
						'Sin griferia', 
						'A definir',
                	])); ?>
			</td>
        </tr>
        <tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Observaciones'); ?></h2></td>
		</tr>
		<tr class="all">
            <td class="td_3">
                <?php 
                echo $this->Form->input('observaciondescripcion',array(
                	'label'=>'Descripcion',
					'type'=>'textarea',
                	'style' => 'max-width:240px;display: inline', 
                	'onChange'=>'')); 
            	?>
                <input type="button" style="display:inline;" value="Agregar Observacion" id="btnAgregarObservacion" onClick="agregarobservacion()" class="btn_ot"/>
            </td>
            <td id="tdDetalleObservacion" class="td_4" colspan="4">
            	<table id="tableObservaciones" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>Descripcion</th>
							<th>Creador</th>
							<th>Creado el</th>
							<th>Acciones</th>
						</tr>						
					</thead>
					<tbody>						
						<?php
                        $k=0;
						?>
					</tbody>
				</table>
                <?php echo $this->Form->input('numObservacion',array('value'=>$k+1,'type'=>'hidden')); ?>
                <?php echo $this->Form->input('userName',array('value'=>$this->Session->read('Auth.User.username'),'type'=>'hidden')); ?>
                <?php echo $this->Form->input('userId',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>

            </td>	
        </tr>
		
		
		
		<?php
		/*AVANCES DEL TRABAJO	*/
		?>
		<tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Avances del Trabajo'); ?></h2></td>
		</tr>	
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placnicho">
			<?php
			/*
			<td width="25%">
				<?php echo $this->Form->input('preparada',array(
					'type'=>'select',
					'label'=>'Preparada',
					'options'=>$userPreparas,
					'empty'=>'Seleccionar usuario que prepara'
				)); ?>
			</td>
			*/ ?>
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->radio('corte', [1 => 'Si' ,0 => 'No'], ['legend'=>'Corte']); ?>
				</div>
			</td>
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->radio('medidastomadas', [1 => 'Si' ,0 => 'No'], ['legend'=>'Medidas tomadas']); ?>
				</div>
			</td>
			<?php
			/*
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->radio('retirar', [1 => 'Si' ,0 => 'No'], ['legend'=>'Retirar']); ?>
				</div>
			</td>
			
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->radio('retirada', [1 => 'Si' ,0 => 'No'], ['legend'=>'Retirada', 'value'=>0]); ?>
				</div>
			</td>
			*/ ?>
		</tr>		
		<tr class="all">
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->input('terminada',array('label'=>'Terminada', 'div' => false)); ?>
				</div>
			</td>
			<td width="25%">				
				<?php echo $this->Form->input('entregada',array(
              		'class'=>'datepicker', 
              		'type'=>'text',
              		'label'=>'Entregada',
              		'default'=>'',//date('d-m-Y'),
              		'style'=>'width:75%'
              	)); ?>
			</td>			
		</tr>
		<tr class="all">
			<td colspan="4" class="td_1">
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
					'options'=>$materiales
				)); ?>
				
				<input type="button" value="Agregar Producto" id="btnAgregarProducto" onClick="agregarproducto()" class="btn_ot"/>
			</td>

			<td id="tdDetalleProducto" class="td_4">
				
			</td>		
		</tr>
		<tr class="all">
			<td colspan="4">
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
			<td colspan="4" class="td_1">
				<h2>Pagos</h2>
			</td>
		</tr>
		<tr class="all">	
			<td class="td_5" colspan="4">
            	<table>
            		<tr class="all">
            			<td>
			                <?php
			                echo $this->Form->input('montoPagado',array('label'=>'Monto pagado','type'=>'number'));
			                ?>
			            </td>
			            <td>
			                <?php
			                echo $this->Form->input('medioPago',array(
			                	'label'=>'Medio de pago',
			                	'options'=>[
			                		'efectivo'=>'Efectivo',
			                		'tarjeta debito'=>'Tarjeta Debito',
			                		'tarjeta credito'=>'Tarjeta Credito',
			                		'cheque'=>'Cheque',
			                		'transferencia'=>'Transferencia',
			                		'link de pago'=>'Link de pago'
			                	],
			                ));
			                ?>
			            </td>
			            <td>
                			<input type="button" value="Agregar Pago" id="btnAgregarPago" onClick="agregarpago()" class="btn_ot" />
                		</td>
                	</tr>
                </table>
            </td>
		</tr>		
		<tr class="all">	
			<td colspan="2">
				<table id="tablePagos" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>Num Pago</th>
							<th>Fecha</th>
							<th>Monto</th>
							<th>Metodo</th>
						</tr>						
					</thead>
					<tbody>						
							
					</tbody>
				</table>
                <?php echo $this->Form->input('numPago',array('value'=>0,'type'=>'hidden')); ?>
            </td>
			<td colspan="2" style="display:none">  
				<?php echo $this->Form->input('numDetalleManoDeObra',array('value'=>0,'type'=>'hidden')); ?>
				<table id="tableDMOXOT" cellpadding="0" cellspacing="0" class="tbl_add" style="margin-top:20px;">
					<thead>
						<th>Mano de obra</th>
						<th>Precio</th>						
						<th>Cantidad</th>		
						<th>Descripcion</th>		
						<th>Accion</th>				
					</thead>
					<!--<tfoot>
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
					</tbody>
				</table>
			</td>
		</tr>		
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">
			<td width="25%">
				<?php echo $this->Form->input('total',array('label'=>'Total $')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('acuenta',array('label'=>'A Cuenta $')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('saldo',array('label'=>'Saldo $')); ?>
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
							<?php echo $this->Form->input('costo', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
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

<!-- popin Clientes -->
<div>
<a href="#x" class="overlay" id="lnkListaClientes"></a>
	<div id="divListaClientes" class="popup" style="width:500px">
		<div class='section body'>
    		<div id="form_ListaClientes">        			
    			<table id="tblListaClientes" cellpadding="0" cellspacing="0" style="width:100%">         				
					<thead>
					<tr>
						<th>Nombre</th>												
						<th style="text-align:center" class="actions"><?php echo __('Acciones'); ?></th>
					</tr>
					</thead>
					<tfoot>
						<tr>								  
				            <th></th>			
				            <th></th>              	
						</tr>
					</tfoot>
					<tbody>
					<?php foreach ($tablaclientes as $clientess): ?>
					<tr>		
						<td>
							<!--<a href="#" onlick="SeleccionarCliente(2)">
								
							</a>-->
							<?php echo h($clientess['Cliente']['nombre']); ?>
						</td>	
						<td class="actions">																		
							<?php echo $this->Form->button('Seleccionar', 
		                                        	array('type' => 'button',                      
				                                          'title' =>"Agregar usuario",
				                                          'onClick' => "SeleccionarCliente(".$clientess['Cliente']['id'].")",
				                                          'cursor' => "pointer"               
			                                            )	            							
		                    					  );
		            		?> 
						</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>					
    		</div>
    	</div>
    	<a class="close" href="#close"></a>
	</div>		
</div>
<!-- FIn popin Clientes -->