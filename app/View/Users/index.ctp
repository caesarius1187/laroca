<script type="text/javascript">	
	$(document).ready(function(){
	    var iPantallaTam = $(window).height();     	
	 	var iTableheight = iPantallaTam - 360;
	 	iTableheight = (iTableheight < 250) ? 250 : iTableheight;     	
	 	
	 	$("#tblListaUsuarios_index").dataTable({ 
			"sPaginationType": "full_numbers",
			"sScrollY": iTableheight + "px",
		    "bScrollCollapse": true,
		    "iDisplayLength":100,
		});
	});

	function agregarUsuario()
	{
		//alert('marcancha charancha')
		location.href = "#agregarUsuario";		
	}
</script>
<!--<div class="usuarios index">-->
<div class="usuarios">
	<div style="width: <?php echo $TablaUsuariosWidth ?>%;float:left;">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3"><h2><?php echo __('Usuarios'); ?></h2></td>		
			<td colspan="2" style="text-align: right;" title="Agregar User">
		        <div class="fab blue">
		        <core-icon icon="add" align="center">	            
		            <?php echo $this->Form->button('+', 
		                                        	array('type' => 'button',
				                                            'class' =>"btn_add",
				                                            'title' =>"Agregar usuario",
				                                            'onClick' => "agregarUsuario()"               
			                                            )	            							
		                    					  );
		            ?> 
		        </core-icon>
		        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
		        </div>
			</td>			
		</tr>
		</table>
		
		<table id="tblListaUsuarios_index" cellpadding="0" cellspacing="0">
		<thead>
			<tr>			
				<th>Nombre</th>
				<th>Nombre de Usuario</th>
				<!--<th><?php echo $this->Paginator->sort('Contraseña'); ?></th>-->
				<th>Tipo</th>
				<th style="text-align:center" class="actions">Acciones</th>
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
		<?php foreach ($users as $user): ?>
		<tr>		
			<td><?php echo h($user['User']['nombre']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
			<!--<td>
				<?php echo h($user['User']['password']); ?>&nbsp;				
			</td>-->
			<td><?php echo h($user['User']['tipo']); ?>&nbsp;</td>
			<td class="actions">
				<!--<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>-->
				<?php echo $this->Html->link(__('Editar'), array('action' => 'index', $user['User']['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $user['User']['id']), null, __('Esta seguro que desea eliminar al usuario: %s?', $user['User']['nombre'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>		
	</div>

	<!--Popin Agregar Marcas-->
	<div>
	<a href="#x" class="overlay" id="agregarUsuario"></a>
		<div id="divNuevoUsuario" class="popup">
			<div class='section body'>
        		<div id="form_usuario">
        			<?php echo $this->Form->create('User', array('action' => 'add')); ?>
        			<table>
        				<tr>
        					<td colspan="2">
	        					<h2><?php echo __('Agregar Usuario'); ?></h2>
	        				</td>
	        			</tr>
						<tr>
							<td><?php echo $this->Form->input('nombre');?></td>
							<td><?php echo $this->Form->input('username', array('label'=>'Usuario'));?></td>
						</tr>
						<tr>
							<td><?php echo $this->Form->input('password', array('label'=>'Contraseña'));?></td>					
							<td>
								<?php $DdlOpcioneUsuarios = array('admin' => 'Administrador', 'vendedor'=> 'Vendedor');?>
								<?php echo $this->Form->input('tipo', array('type' => 'select', 'options' => $DdlOpcioneUsuarios, 'style' => 'width:200px')); ?>
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
	<!--Fin Popin Agregar Marcas-->

	<?php
	//Edit de Marcas
	if($editarUsuario){?>
	<div class="marcas view" style="width:45%;float:right;">
		<?php echo $this->Form->create('User', array('action' => 'edit', 'type' => 'put')); ?>
		<div>
			<h3 style="float:left;"><?php echo __('Modificar datos del Usuario'); ?></h3>
		</div>
		<table>
			<tr>
				<td>
					<?php
						echo $this->Form->input('id', array('type' => 'hidden'));
						echo $this->Form->input('nombre');
					?>					
				</td>
				<td><?php echo $this->Form->input('username', array('label'=>'Usuario'));?></td>				
			</tr>
			<tr>
				<td><?php echo $this->Form->input('password', array('label'=>'Contraseña'));?></td>					
				<td>
					<?php $DdlOpcioneUsuarios = array('admin' => 'Administrador', 'vendedor'=> 'Vendedor');?>
					<?php echo $this->Form->input('tipo', array('type' => 'select', 'options' => $DdlOpcioneUsuarios, 'style' => 'width:200px')); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $this->Form->end(__('Aceptar ')); ?>					
				</td>
				<td>
					<?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?>
				</td>
			</tr>
		</table>
	</div>		
	<?php  } //Fin de if editarMarca?>

</div>

