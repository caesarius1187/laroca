<script type="text/javascript">
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
			<td colspan="4"><h2><?php echo __('Usuarios'); ?></h2></td>		
			<td colspan="2" style="text-align: right;" title="Agregar Usuario">
		        <div class="fab blue">
		        <core-icon icon="add" align="center">	            
		            <?php echo $this->Form->button('+', 
		                                        	array('type' => 'button',
				                                            'class' =>"btn_add",
				                                            'title' =>"Agregar Usuario",
				                                            'onClick' => "agregarUsuario()"               
			                                            )	            							
		                    					  );
		            ?> 
		        </core-icon>
		        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
		        </div>
			</td>			
		</tr>
		<tr>			
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('Contraseña'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th style="text-align:center" class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		<?php foreach ($usuarios as $usuario): ?>
		<tr>		
			<td><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
			<td><?php echo h($usuario['Usuario']['username']); ?>&nbsp;</td>
			<td><?php echo h($usuario['Usuario']['password']); ?>&nbsp;</td>
			<td><?php echo h($usuario['Usuario']['tipo']); ?>&nbsp;</td>
			<td class="actions">
				<!--<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>-->
				<?php echo $this->Html->link(__('Editar'), array('action' => 'index', $usuario['Usuario']['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Esta seguro que desea eliminar al usuario: %s?', $usuario['Usuario']['nombre'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</div>

	<!--Popin Agregar Marcas-->
	<div>
	<a href="#x" class="overlay" id="agregarUsuario"></a>
		<div id="divNuevoUsuario" class="popup">
			<div class='section body'>
        		<div id="form_usuario">
        			<?php echo $this->Form->create('Usuario', array('action' => 'add')); ?>
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
					</table>
					<?php echo $this->Form->end(__('Agregar')); ?>
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
		<?php echo $this->Form->create('Usuario', array('action' => 'edit', 'type' => 'put')); ?>
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
					<?php echo $this->Form->end(__('Modificar')); ?>					
				</td>
				<td>
					<?php echo $this->Html->link(__('Cerrar'),array('action' => 'index')); ?>
				</td>
			</tr>
		</table>
	</div>		
	<?php  } //Fin de if editarMarca?>

</div>

