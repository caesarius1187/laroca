<script type="text/javascript">
	$(document).ready(function(){
     	var iTableTotalHeight = $(window).height();     	
     	var iTableHeight = iTableTotalHeight - 400;
     	iTableHeight = (iTableHeight < 250) ? 250 : iTableHeight;     	
     	$("#tblTipodeClientes").dataTable( { 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableHeight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":50,
		});
		var listatipos = $("#divListaTiposDeClientes").height();
		$("#div_Tipoclientes_Editar").css("height",(listatipos - 10) + "px");
    })

	function agregarTipoCli()
	{		
		location.href = "#agregarTipoCliente";		
	}
</script>
<!--<div class="usuarios index">-->
<div class="tiposclientes">
	<div id="divListaTiposDeClientes" style="width: <?php echo $TablaTipoClientesWidth ?>%;float:left;">
		<table cellpadding="0" cellspacing="0" class="tbl_dt">
		<tr>
			<td><h2><?php echo __('Tipos de Clientes'); ?></h2></td>		
			<td style="text-align: right;" title="Agregar Tipo de Cliente">
		        <div class="fab blue">
		        <core-icon icon="add" align="center">	            
		            <?php echo $this->Form->button('+', 
		                                        	array('type' => 'button',
				                                            'class' =>"btn_add",
				                                            'title' =>"Agregar Tipo de Cliente",
				                                            'onClick' => "agregarTipoCli()"               
			                                            )	            							
		                    					  );
		            ?> 
		        </core-icon>
		        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
		        </div>
			</td>			
		</tr>
		</table>
		<table id="tblTipodeClientes" cellpadding="0" cellspacing="0" class="tbl_dt">
		<thead>
			<tr>						
				<th><?php echo $this->Paginator->sort('tipo'); ?></th>			
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
		<?php foreach ($tipoclientes as $tipocliente): ?>
		<tr>
			<td><?php echo h($tipocliente['Tipocliente']['tipo']); ?>&nbsp;</td>
			<td class="actions">				
				<?php echo $this->Html->link(__('Editar'), array('action' => 'index', $tipocliente['Tipocliente']['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $tipocliente['Tipocliente']['id']), 
					null, __('Esta seguro que desea eliminar el tipo: %s?', $tipocliente['Tipocliente']['tipo'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>	
		</tbody>	
	</div>	
	
	<!--Popin Agregar Tipo de Cliente-->
	<div>
		<a href="#x" class="overlay" id="agregarTipoCliente"></a>
		<div id="divNuevoTipoCliente" class="popup">
			<div class='section body'>
        		<div id="form_TipoCliente">
        			<?php echo $this->Form->create('Tipocliente', array('action' => 'add')); ?>        			   			
        			<table cellpadding="0" cellspacing="0" class="tbl_add">
        				<tr>
        					<td colspan="2"><h2><?php echo __('Agregar Tipo de Cliente'); ?></h2></td>
        				</tr>    
        				<tr>
        					<td colspan="2">
        						<?php echo $this->Form->input('tipo'); ?>
        					</td>
        				</tr>
        				<tr>
        					<td><?php echo $this->Form->end(__('Aceptar')); ?></td>
        					<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>

        				</tr>

        			</table>        						
        		</div>
        	</div>        	
        	<a class="close" href="#close"></a>
		</div>		
	</div>	
	<!--Fin Popin Agregar Tipo de Cliente-->

	<?php 
	//Editar Tipo de Cliente
	if($editarTipoCliente){?>
		<div id="div_Tipoclientes_Editar" class="Tipoclientes form" style="width:45%;float:right">
		<?php echo $this->Form->create('Tipocliente', array('action' => 'edit', 'type' => 'put')); ?>
			<table cellpadding="0" cellspacing="0" class="tbl_add">
				<tr>
					<td colspan="2">
						<h3><?php echo __('Modificar datos Tipo de Cliente'); ?></h3>
					</td>
				</tr>	
				<tr>
					<td colspan="2">
						<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
						<?php echo $this->Form->input('tipo');?>
					</td>				
				</tr>					
				<tr>
					<td><?php echo $this->Form->end(__('Aceptar')); ?></td>
					<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>
				</tr>
			</table>			
		</div>
	<?php } //Fin Editar Falla ?>

</div>

