<script type="text/javascript">			
	$(document).ready(function(){ 
    
	 	$("#tblListaClientes").dataTable( { 
			"sPaginationType": "full_numbers",
			//"sScrollY": iTableheight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,
		});

		$("#divClientes_editar").css("overflow","auto");
	});
	function abrirCaja()
	{
		location.href = "#abrirCaja";
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
<div id="divListaCajas" class="" >
	<table cellpadding="0" cellspacing="0" class="tbl_dt">
	<tr>
		<td colspan="3">
			<h2><?php echo __('Cajas'); ?></h2>
		</td>
		<td style="text-align: right;" title="Abrir Caja">
	        <div class="fab blue">
	        <core-icon icon="add" align="center">
	            
	            <?php echo $this->Form->button('+', 
	                                        	array('type' => 'button',
	                                            'class' =>"btn_add",	                                            
	                                            'onClick' => "abrirCaja()"
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
		<th>Fecha</th>
		<th>Hora Apertura</th>
		<th>Monto Apertura</th>
		<th>Hora Cierre</th>
		<th>Monto Cierre</th>
		<th style="text-align:center" class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tfoot>
		<tr>
			<th></th>			
            <th></th>  
            <th></th>			
            <th></th>			
            <th></th>			
            <th></th>              	
		</tr>
	</tfoot>
	<tbody>
	<?php 
	$existeCajaAbierta = false;
	$ultimaCaja = 0;
	foreach ($cajas as $caja): ?>
	<tr>		
		<td><?php echo h($caja['Caja']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($caja['Caja']['horaApertura']); ?>&nbsp;</td>
		<td><?php echo h($caja['Caja']['montoApertura']); ?>&nbsp;</td>
		<td><?php echo h($caja['Caja']['horaCierre']); ?>&nbsp;</td>
		<td><?php echo h($caja['Caja']['montoCierre']); ?>&nbsp;</td>
		<td class="actions">			
			<?php 
			if($caja['Caja']['usuarioCierre_id']){
				echo $this->Html->link(__('Ver Caja'), array('action' => 'edit', $caja['Caja']['id']));
				$ultimaCaja = $caja['Caja']['montoCierre'];

			}else{
				echo $this->Html->link(__('Cerrar Caja'), array('action' => 'edit', $caja['Caja']['id']));
				$existeCajaAbierta = true;
			}	
			?>	
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	
</div>
<?php
//Aca es donde mostramos las VIEW de un cliente
$mostrarView = false;
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
<a href="#x" class="overlay" id="abrirCaja"></a>
	<div id="divNuevoCliente" class="popup" style="width:500px;">
		<div class='section body'>
			<?php 
			if(!$existeCajaAbierta){
				echo $this->Form->create('Caja', array('action' => 'add')); ?>
				<h3><?php echo __('Abrir Caja'); ?></h3>
				<?php echo $this->Form->input('montoApertura',['value'=>$ultimaCaja]);?>
				<?php echo $this->Form->input('descripcionApertura');?>
				<?php echo $this->Form->end(__('Aceptar')); ?>
				<?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); 
			}else{
				echo "<h3>Ya hay una caja abierta</h3>";
			}?>
		</div>		
	<a class="close" href="#close"></a>
	</div>
</div>	
 <!--Fin Agregar Nuevo Cliente-->

 <!--Agregar Nuevo Cliente-->
<div>
<a href="#x" class="overlay" id="cerrarCaja"></a>
	<div id="divNuevoCliente" class="popup" style="width:500px;">
		<div class='section body'>
			<?php echo $this->Form->create('Caja', array('action' => 'add')); ?>
			<h3><?php echo __('Cerrar Caja'); ?></h3>
			<?php echo $this->Form->input('montoCierre');?>
			<?php echo $this->Form->input('descripcionCierre');?>
			<?php echo $this->Form->end(__('Aceptar')); ?>
			<?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?>
		</div>		
	<a class="close" href="#close"></a>
	</div>
</div>	
 <!--Fin Agregar Nuevo Cliente-->

<?php 
//Editar Cliente
$editarCliente  = false;
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