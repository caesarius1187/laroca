<?php echo $this->Html->script('ordentrabajos/add');?>
<script type="text/javascript">
	$(document).ready(function(){ 
		
		//var iTableTotalHeight = $(window).height();     	
	 	//var iTableHeight = iTableTotalHeight - 400;
	 	//iTableHeight = (iTableHeight < 250) ? 250 : iTableHeight;     		 	
	 	//getDetallesManoDeObra();

	 	$( "input.datepicker" ).datepicker({
	      	yearRange: "-100:+50",
	      	changeMonth: true,
	      	changeYear: true,
	      	constrainInput: false,
	      	showOn: 'both',
	      	buttonImage: "",
	      	dateFormat: 'dd-mm-yy',
	      	buttonImageOnly: true
	    });
		
	});
</script>
<!--<div class="ordendetrabajos form">-->
<div class="div_ot">
<?php echo $this->Form->create('Ordentrabajo'); ?>
	<table cellpadding="0" cellspacing="0" class="tbl_add" id="tblAddOrdenTrabajo">
		<tr class="all"> 
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Modificar Orden de Trabajo'); ?></h2>
			</td> 			
		</tr>	
		<?php
		/*DATOS ORDEN DE TRABAJO*/
		?>
		<tr class="all">
			<td >
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->Form->input('numerodeorden',array('label'=>'Pedido N�', 'style'=>'width:70%')); ?>
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
				echo $this->Form->input('cliente_id',array('label'=>'Cliente', 'div' => false, 'style' => 'width:80%','type'=>'hidden'));				
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
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho" style="display: none;">
			<td width="25%">
				<?php // echo $this->Form->input('total',array('label'=>'Total $')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('acuenta',array('label'=>'A Cuenta $')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('saldo',array('label'=>'Saldo $')); ?>
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
			/*<td width="25%">
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
			/*<td width="25%">
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
			<td colspan="4" style="text-align:center"><h2><?php echo __('Observaciones'); ?></h2></td>
		</tr>
		<tr class="all">
            <td class="td_3">
                <?php 
                echo $this->Form->input('observaciondescripcion',array(
					'type'=>'textarea',
                	'label'=>'Descripcion',
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
						foreach ($this->request->data['Observacione'] as $k => $observacion) {
							?>
                            <tr id="RowObservacion<?php echo $observacion['id'] ?>" class="all">
                                <td>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.id',['value'=>$observacion['id'],'type'=>'hidden','disabled'=>true]) ?>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.descripcion',['type'=>'textarea','value'=>$observacion['descripcion'],'disabled'=>true]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.usuario_id',[
                                    	'value'=>$observacion['User']['nombre'],
                                    	'options'=>$users,
                                    	'disabled'=>true
                                    ]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.created',[
                                    	'type'=> 'text',
                                    	'value'=>date('d-m-Y',strtotime($observacion['created'])),
                                    	'disabled'=>true
                                    ]) ?>
                                </td>
                                <td>
                                    <!--<input  type="button" value="X"  title="Eliminar" onclick="eliminarObservacionGuardada(<?php echo $observacion['id']; ?>)" class="eliminar">-->
                                </td>
							</tr>
							<?php
						}?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numObservacion',array('value'=>$k+1,'type'=>'hidden')); ?>
                <?php echo $this->Form->input('userName',array('value'=>$this->Session->read('Auth.User.username'),'type'=>'hidden')); ?>
                <?php echo $this->Form->input('userId',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>

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
					'options'=>$materiales,
					'empty'=>'Seleccionar Material'
				)); ?>
                <input type="button" value="Agregar Producto" id="btnAgregarProducto" onClick="agregarproducto()" class="btn_ot"/>
            </td>
            <td id="tdDetalleProducto" class="td_4">

            </td>

            

            <td id="tdDetalleManodeobra" class="td_6" style="display:none">
            </td>

            <td class="td_5" style="display:none">
                <?php
                echo $this->Form->input('manodeobra_id',array('label'=>'Mano de obra','onChange'=>'getDetallesManoDeObra()'));
                ?>
                <!--<?php echo $this->Html->image('add.png', array('id' => 'btnAgregarManoDeObra','onClick' => 'agregarmanodeobra()', 'class' => 'image', 'title' =>'Agregar mano de obra'));?>	-->
                <input type="button" value="Agregar Mano de Obra" id="btnAgregarManoDeObra" onClick="agregarmanodeobra()" class="btn_ot"/>
            </td>
            <td id="tdDetalleManodeobra" class="td_6" style="display:none">
            </td>
        </tr>

        <tr class="all">
			<td colspan="4">
				<table id="tableDOT" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>CONCEPTO</th>
							<th>MATERIAL</th>
							<th>ANCHO</th>
							<th>LARGO</th>
							<th>CANT. M2/ML</th>
							<th>PRECIO UNIT.</th>
							<th>TOTAL</th>
							<th>DESCRIPCION</th>
						</tr>						
					</thead>
					<tbody>						
						<?php
                        $k=0;
						foreach ($this->request->data['Detalleordentrabajo'] as $k => $producto) {
							?>
                            <tr id="RowDetalle<?php echo $producto['id'] ?>" class="all">
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.id',['value'=>$producto['id'],'type'=>'hidden']) ?>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.nombreproducto',['value'=>$producto['Producto']['nombre']]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.id',['value'=>$producto['id'],'type'=>'hidden']) ?>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.nombrematerial',['value'=>$producto['Material']['nombre']]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.ancho',['value'=>$producto['ancho'],'class'=>'recalculable','onchange'=>'actualizarDetalle('.$k.')']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.largo',['value'=>$producto['largo'],'class'=>'recalculable','onchange'=>'actualizarDetalle('.$k.')']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.cantidad',['value'=>$producto['cantidad'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.precio',['value'=>$producto['precio'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.total',['value'=>$producto['precio']*$producto['cantidad'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.descripcion',['value'=>$producto['descripcion'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <input  type="button" value="X"  title="Eliminar" onclick="eliminarDetalleGuardado(<?php echo $producto['id']; ?>)" class="eliminar">
                                </td>
							</tr>
							<?php
						}?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numDetalle',array('value'=>$k+1,'type'=>'hidden')); ?>
            </td>
        </tr>
        <tr class="all">
            <td colspan="2" class="td_2">
                <h2>Pagos</h2>
            </td>
        </tr>
        <tr class="all">
        	<td class="td_5" colspan="2">
            	<table>
            		<tr class="all">
            			<td>
			                <?php
			                echo $this->Form->input('montoPagado',array('label'=>'Monto pagado'));
			                ?>
			            </td>
			            <td>
			                <?php
			                echo $this->Form->input('medioPago',array(
			                	'label'=>'Medio de pago',
			                	'options'=>[
			                		'efectivo'=>'Efectivo',
			                		'tarjeta'=>'Tarjeta',
			                		'tarjeta debito'=>'Tarjeta Debito',
			                		'tarjeta credito'=>'Tarjeta Credito',
			                		'cheque'=>'Cheque',
			                		'transferencia'=>'Transferencia'
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
            <td colspan="4">
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
						<?php
                        $j=0;
						foreach ($this->request->data['Pago'] as $j => $pago) {
							?>
                            <tr id="RowPago<?php echo $pago['id'] ?>" class="all">
                                <td>
                                    <?php echo $this->Form->label($pago['id']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($pago['fecha']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($pago['montodejado']) ?>
                                    <?php echo $this->Form->input('montodejado'.$pago['id'], ['value'=>$pago['montodejado'], 'type'=>'hidden', 'class'=>'pagadoYaCargado']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($pago['mediodepago']) ?>
                                </td>
                                <td>
                                    <input  type="button" value="I"  title="Imprimir" onclick="Imprimir(<?php echo $pago['id']; ?>)" class="imprimir">
                                    <input  type="button" value="X"  title="Eliminar" onclick="eliminarPagoGuardado(<?php echo $pago['id']; ?>)" class="eliminar">
                                </td>
							</tr>
						<?php
						} ?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numPago',array('value'=>$j+1,'type'=>'hidden')); ?>
            </td>
		</tr>
		<tr class="all">
            <td colspan="2" class="td_2">
                <h2>Conformacion del precio</h2>
            </td>
        </tr>
        <tr class="all">
        	<td class="td_5" colspan="2">
            	<table>
            		<tr class="all">
            			<td>
			                <?php
			                echo $this->Form->input('montoConformado',array('label'=>'Monto a Conformar'));
			                ?>
			            </td>
			            <td>
			                <?php
			                echo $this->Form->input('medioPagoConformacion',array(
			                	'label'=>'Medio de pago',
			                	'options'=>[
			                		'efectivo'=>'Efectivo',
			                		'tarjeta bancarizada 6 cuotas'=>'Tarjeta Bancarizada 6 cuotas',
			                		'tarjeta bancarizada 12 cuotas'=>'Tarjeta Bancarizada 12 cuotas',
			                		'tarjeta naranja z'=>'tarjeta naranja z',
			                		'link de pago 12 cuotas'=>'Link de pago 12 cuotas'
			                		,
			                		'link de pago 18 cuotas'=>'Link de pago 18 cuotas'
			                	],
			                ));
			                ?>
			            </td>
			            <td>
                			<input type="button" value="Agregar Conformacion de Precio" id="btnAgregarConformacionPrecio" onClick="agregarConformacionPrecio()" class="btn_ot" />
                		</td>
                	</tr>
                </table>
            </td>
        </tr>
        <tr class="all">
            <td colspan="4">
				<table id="tableConformacionPrecio" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>Numero</th>
							<th>Monto</th>
							<th>Medio de pago</th>
							<th>Interes</th>
							<th>Descuento</th>
							<th>Sub Total</th>
						</tr>						
					</thead>
					<tbody>						
						<?php
                        $k=0;
						foreach ($this->request->data['Preciodetalle'] as $k => $preciodetalle) {
							?>
                            <tr id="RowConformacionPrecio<?php echo $preciodetalle['id'] ?>" class="all">
                                <td>
                                    <?php echo $preciodetalle['id']*1 ?>
                                </td>
                                <td>
                                    <?php echo $preciodetalle['monto']*1 ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($preciodetalle['mediodepago']) ?>
                                </td>
                                <td>
                                    <?php echo $preciodetalle['interes']*1 ?>
                                </td>
                                <td>
                                    <?php echo $preciodetalle['descuento']*1 ?>
                                </td>
                                <td>
                                    <?php echo $preciodetalle['subtotal']*1 ?>
                                    <?php echo $this->Form->input('montoconformado'.$preciodetalle['id'], ['value'=>$preciodetalle['subtotal'], 'type'=>'hidden', 'class'=>'porPagarConformado']) ?>
                                </td>
                                <td>
                                    <input  type="button" value="X"  title="Eliminar" onclick="eliminarPrecioDetalle(<?php echo $preciodetalle['id']; ?>)" class="eliminar">
                                </td>
							</tr>
						<?php
						} ?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numConformacionPrecio',array('value'=>$k+1,'type'=>'hidden')); ?>
            </td>
		</tr>
        <tr class="all">
            <td colspan="4">
                <table cellpadding="0" cellspacing="0">
                    <tr class="all">
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Precio</label>
                        </td>
                        <td width="20%">
                            <?php echo $this->Form->input('total',array('label'=>'Total','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?>
                            <?php //echo $this->Form->input('costo', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Total Conformado</label>
                        </td>
                        <td width="20%">
							<?php echo $this->Form->input('totalconformado', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?>
						</td>
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Pagado</label>
                        </td>
                        <td width="20%">
                            <?php echo $this->Form->input('pagado', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Saldo Total</label>
                        </td>
                        <td width="20%">
                            <?php echo $this->Form->input('saldoTotal', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
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
<?php
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    if(in_array($date,['0000-00-00','01-01-1970','1970-01-01',''])){
        return false;
    }
    return $d && 1 == 1;
}?>