<script type="text/javascript">			
	$(document).ready(function(){ 
		var iTableTotalHeight = calcularTamPantalla();    
    
 		var iTableheight = iTableTotalHeight - 100;
 		iTableheight = (iTableheight < 250) ? 250 : iTableheight;  
	 	$("#tblListaClientes").dataTable( { 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableheight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,
		});

		var listaHeight = iTableTotalHeight;///$("#divListaClientes").height();
		$("#divClientes_editar").css("height",listaHeight + "px");
		$("#divClientes_editar").css("overflow","auto");
	});
	function agregarCliente()
	{
		location.href = "#agregarCliente";
	}	
	function getLocalidades()
	{
		var formData = $('#ClientePartidoId').serialize(); 		
		$.ajax({ 
				type: 'POST', 
				url: serverLayoutURL+'/localidades/getbycategory', 
				data: formData, 
				success: function(data,textStatus,xhr){ 					
					$( "#divNuevoCliente" ).find( "#ClienteLocalidadeId" ).empty();
					$( "#divNuevoCliente" ).find( "#ClienteLocalidadeId" ).html(data);
					//$('#ClienteLocalidadeId').empty();
					//$('#ClienteLocalidadeId').html(data);
				}, 
				error: function(xhr,textStatus,error){ 
					alert(textStatus); 
				} 
		});			 
	}
	function getLocalidades_edit()
	{
		var formData = $('#ClientePartidoId_edit').serialize(); 		
		$.ajax({ 
				type: 'POST', 
				url: serverLayoutURL+'/localidades/getbycategory', 
				data: formData, 
				success: function(data,textStatus,xhr){ 
					$( "#divClientes_editar" ).find( "#ClienteLocalidadeId" ).empty();
					$( "#divClientes_editar" ).find( "#ClienteLocalidadeId" ).html(data);
					//$('#ClienteLocalidadeId').empty();
					//$('#ClienteLocalidadeId').html(data);
				}, 
				error: function(xhr,textStatus,error){ 
					alert(textStatus); 
				} 
		});			 
	}
</script>
<!--<div class="clientes index">-->
<div id="divListaClientes" class="" style="width: <?php echo $TablaClientesWidth ?>%;float:left;">
	<table cellpadding="0" cellspacing="0" class="tbl_dt">
	<tr>
		<td colspan="3">
			<h2><?php echo __('Clientes'); ?></h2>
		</td>
		<td style="text-align: right;" title="Agregar Cliente">
	        <div class="fab blue">
	        <core-icon icon="add" align="center">
	            
	            <?php echo $this->Form->button('+', 
	                                        	array('type' => 'button',
	                                            'class' =>"btn_add",	                                            
	                                            'onClick' => "agregarCliente()"
	                                            )	            							
	                    					  );
	            ?> 
	        </core-icon>
	        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
	        </div>
		</td>
	</tr>	
	</table>

	<table id="tblListaClientes" cellpadding="0" cellspacing="0" class="tbl_dt">    
	<thead>
	<tr>
		<th>Nombre</th>
		<th>Direccion</th>
		<th>DNI</th>
		<th>Celular</th>					
		<th style="text-align:center" class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tfoot>
		<tr>
			<th></th>			
            <th></th>  
            <th></th>			
            <th></th>              	
		</tr>
	</tfoot>
	<tbody>
	<?php foreach ($clientes as $clientess): ?>
	<tr>		
		<td><?php echo h($clientess['Cliente']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($clientess['Cliente']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($clientess['Cliente']['dni']); ?>&nbsp;</td>
		<td><?php echo h($clientess['Cliente']['celular']); ?>&nbsp;</td>
		<td class="actions">			
			<?php echo $this->Html->link(__('Editar'), array('action' => 'index', $clientess['Cliente']['id'], 'edit')); 
			?>	
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $clientess['Cliente']['id']), null, __('Esta seguro que desea eliminar al cliente: %s?', $clientess['Cliente']['nombre'])); 
			?>					
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	
</div>
<?php
//Aca es donde mostramos las VIEW de un cliente
if($mostrarView){?>
<div class="clientes view" style="width:55%;float:right;">
	<div>
		<h3 style="float:left;"><?php echo __('Datos del Cliente'); ?></h3>
	</div>
	<div>
		<table>
			<tr>
				<td><?php echo __('Nombre'); ?></td>
				<td><?php echo h($cliente['Cliente']['nombre']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Dni'); ?></td>
				<td><?php echo h($cliente['Cliente']['dni']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Direccion'); ?></td>
				<td><?php echo h($cliente['Cliente']['direccion']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Telefono'); ?></td>
				<td><?php echo h($cliente['Cliente']['telefono']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Celular'); ?></td>
				<td><?php echo h($cliente['Cliente']['celular']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Mail'); ?></td>
				<td><?php echo h($cliente['Cliente']['mail']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Cuit'); ?></td>
				<td><?php echo h($cliente['Cliente']['cuit']); ?></td>
			</tr>
			<tr>
				<td><?php echo __('Tipo'); ?></td>
				<td></td>
			</tr>
		</table>	
	</div>
</div>
<?php  } //Fin de if mostrarView?>

<!--Agregar Nuevo Cliente-->
<div>
<a href="#x" class="overlay" id="agregarCliente"></a>
	<div id="divNuevoCliente" class="popup" style="width:500px;">
		<div class='section body'>
			<?php echo $this->Form->create('Cliente', array('action' => 'add')); ?>
			<table cellpadding="0" cellspacing="0" class="tbl_add">
			<tr>
				<td colspan="2">
					<h3><?php echo __('Agregar Cliente'); ?></h3>
				</td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $this->Form->input('nombre');?></td>
				<td><?php echo $this->Form->input('dni');?></td>				
			</tr>
			<tr>
				<td colspan="2">
					<?php echo $this->Form->input('direccion');?>
				</td>
				<td><?php echo $this->Form->input('barrio');?></td>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->input('partido_id', array('label' => 'Partido','onChange'=>'getLocalidades()', 'style' => 'width:100px'));?>
				</td>
				<td>
					<?php echo $this->Form->input('localidade_id', array('label' => 'Localidades', 'style' => 'width:200px'));?>
				</td>
				<td>
					<?php echo $this->Form->input('cuit');?>
				</td>
			</tr>						
			<tr>
				<td colspan="3">
					<?php echo $this->Form->input('mail');?>
				</td>				
			</tr>
			<tr>				
				<td>
					<?php echo $this->Form->input('telefono');?>
				</td>
				<td>
					<?php echo $this->Form->input('celular');?>
				</td>				
			</tr>	
			<tr>
				<td></td>
				<td><?php echo $this->Form->end(__('Aceptar')); ?></td>
				<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>
			</tr>
			</table>
		</div>		
	<a class="close" href="#close"></a>
	</div>
</div>	
 <!--Fin Agregar Nuevo Cliente-->

<?php 
//Editar Cliente
if($editarCliente){?>
	<div id="divClientes_editar" class="clientes form" style="width:43%;float:right;padding-right:0px">
	<?php echo $this->Form->create('Cliente', array('action' => 'edit', 'type' => 'put')); ?>				
		<table cellpadding="0" cellspacing="0" class="tbl_add">
		<tr>
			<td colspan="3">
				<h3><?php echo __('Modificar datos del Cliente'); ?></h3>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->Form->input('nombre');?>
			</td>			
			<td><?php echo $this->Form->input('dni');?></td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $this->Form->input('direccion');?>
			</td>
			<td><?php echo $this->Form->input('barrio');?></td>			
		</tr>
		<tr>
			<td>
				<?php echo $this->Form->input('partido_id', array('id'=>'ClientePartidoId_edit', 'label' => 'Partido','onChange'=>'getLocalidades_edit()', 'style' => 'width:100px', 'default'=>$miLoc['Localidade']['partido_id']));?>
			</td>
			<td>
				<?php echo $this->Form->input('localidade_id', array('label' => 'Localidades', 'style' => 'width:130px'));?>
			</td>	
			<td><?php echo $this->Form->input('cuit');?></td>						
		</tr>		
		<tr>			
			<td colspan="3">
				<?php echo $this->Form->input('mail');?>
			</td>			
		</tr>		
		<tr>
			<td><?php echo $this->Form->input('telefono');?></td>
			<td><?php echo $this->Form->input('celular');?></td>
		</tr>				
		<tr>
			<td></td>
			<td>
				<?php echo $this->Form->end(__('Aceptar')); ?>				
			</td>
			<td>
				<?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?>
			</td>
			
		</tr>
		</table>
	</div>
<?php } //Fin de if editarCliente ?>