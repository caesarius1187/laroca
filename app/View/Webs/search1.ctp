<?php 
	echo $this->Form->Create('Web', array('action' => 'search'));
?>
<table>
	<tr>
		<td>
			<?php echo $this->Form->input('orden',
						array(
							'type'=>'text',
							'label'=>'Orden'
						));?>
		</td>
			

         <td ><?php echo $this->Form->end(__('Aceptar')); ?></td>
             
               

	</tr>
</table>