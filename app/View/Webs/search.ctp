
<div class="content-about">
	<div>
		<h3>Estado de su orden</h3>
	</div>
			
	<div>
		<div>
			<h1>Consulte su orden de trabajo</h1>
			<p>
				Averigüe el estado actual de su producto ingresando el número de Orden de Trabajo ubicado en la esquina superior derecha de su comprobante.
			</p>
			<?php echo $this->Form->Create('Web', array('controller'=>'Webs' ,'action' => 'search'));?>
				<table class="table_search">
					<tr>
						<td>
							<?php echo $this->Form->input('orden',
										array(
											'type'=>'text',
											'label'=>'Orden'
										)
							);?>
						</td>
						<td ><?php echo $this->Form->end(__('Buscar')); ?></td>
							             
					</tr>
				</table>
		</div>
		<div class="show_result">
			<?php if(isset($ordentrabajos)){
				if(count($ordentrabajos)>0){
					echo "El estado de su orden es ".$ordentrabajos['Ordentrabajo']['observaciones'];
				} else{
					echo "Nº de Orden inexistente";
				}
				
			}?>

		</div>
	</div>
</div>
				
			
</body>
</html>

<!--<?php echo "su estado es ".$ordentrabajos['Ordentrabajo']['observaciones'];
			 if(isset($ordentrabajos)){
				echo "su estado es ".$ordentrabajos['Ordentrabajo']['observaciones'];
			}?>-->