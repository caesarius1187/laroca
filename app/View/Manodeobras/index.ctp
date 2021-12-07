<script type="text/javascript">	
	$(document).ready(function(){

	    var iTamPantalla = calcularTamPantalla();

	 	var iTableheight = iTamPantalla - 180;
	 	iTableheight = (iTableheight < 250) ? 250 : iTableheight;     	
	 	
	 	$("#tblListaManoObras_index").dataTable({ 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableheight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,
		});

		if (document.getElementById('divManoObra_edit'))
		{
			$("#divManoObra_edit").css("height", iTamPantalla+"px");
		}
	});

	function agregarManoObra()
	{		
		location.href = "#agregarManoObra";		
	}
</script>

<div class="manodeobras">
	<div style="width: <?php echo $TablaManoObraWidth ?>%;float:left;">
	<table cellpadding="0" cellspacing="0" class="tbl_dt">
		<tr>
			<td colspan="2"><h2><?php echo __('Mano de Obra'); ?></h2></td>		
			<td colspan="2" style="text-align: right;" title="Agregar Mano de Obra">
		        <div class="fab blue">
		        <core-icon icon="add" align="center">	            
		            <?php echo $this->Form->button('+', 
		                                        	array('type' => 'button',
				                                            'class' =>"btn_add",
				                                            'title' =>"Agregar Mano de Obra",
				                                            'onClick' => "agregarManoObra()"               
			                                            )	            							
		                    					  );
		            ?> 
		        </core-icon>
		        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
		        </div>
			</td>			
		</tr>
	</table>

	<table id ="tblListaManoObras_index" cellpadding="0" cellspacing="0" class="tbl_dt">
	<thead>
		<tr>		
			<th>Nombre</th>
			<th>Precio</th>
			<th>Descripción</th>
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
	<?php foreach ($manodeobras as $manodeobra): ?>
	<tr>		
		<td><?php echo h($manodeobra['Manodeobra']['nombre']); ?>&nbsp;</td>
		<td><?php echo "$ ".h($manodeobra['Manodeobra']['precio']); ?>&nbsp;</td>
		<td><?php echo h($manodeobra['Manodeobra']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $manodeobra['Manodeobra']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'index', $manodeobra['Manodeobra']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $manodeobra['Manodeobra']['id']), null, __('Esta seguro que desea eliminar mano de obra: # %s?', $manodeobra['Manodeobra']['nombre'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>	
	</div>
	<!--Popin Agregar Mano de Obra-->
	<div>
	<a href="#x" class="overlay" id="agregarManoObra"></a>
		<div id="divNuevoManoObra" class="popup" style="width:300px; height:350px">
			<div class='section body'>
        		<div id="form_manoobra">
        			<?php echo $this->Form->create('Manodeobra', array('action' => 'add')); ?>
        			<table cellpadding="0" cellspacing="0" class="tbl_add">
        				<tr>
        					<td colspan="2">
	        					<h2><?php echo __('Agregar Mano de Obra'); ?></h2>
	        				</td>
	        			</tr>	        			
						<tr>
							<td colspan="2">
								<?php echo $this->Form->input('nombre');?>
							</td>							
						</tr>						
						<tr>
							<td colspan="2">
								<?php echo $this->Form->input('precio');?>
							</td>							
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $this->Form->input('descripcion',array('type' => 'textarea', 'rows' => 3));?>
							</td>							
						</tr>
						<tr>
							<td>
								<?php echo $this->Form->end(__('Agregar')); ?>
							</td>
							<td>
								<?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?>
							</td>
						</tr>
					</table>
					
        		</div>
        	</div>
        	<a class="close" href="#close"></a>
		</div>		
	</div>
	<!--Fin Popin Agregar Mano de Obra-->

	<?php
	//Edit de Propietarios
	if($editarManoObra){?>
	<div id='divManoObra_edit' class="marcas view" style="width:40%;float:right;">
		<?php echo $this->Form->create('Manodeobra', array('action' => 'edit', 'type' => 'put')); ?>		
		<div>
			<h3 style="float:left;"><?php echo __('Modificar Mano de Obra'); ?></h3>
		</div>
		<table cellpadding="0" cellspacing="0" class="tbl_add">			
			<tr>							
				<td colspan="2">
					<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
					<?php echo $this->Form->input('nombre'); ?>
				</td>
			</tr>		
			<tr>
				<td colspan="2">
					<?php echo $this->Form->input('precio'); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo $this->Form->input('descripcion',array('type' => 'textarea', 'rows' => 3)); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->end(__('Modificar')); ?>					
				</td>
				<td>
					<?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?>
				</td>
			</tr>
		</table>
	</div>		
	<?php  } //Fin de if Propietarios?>
</div>
