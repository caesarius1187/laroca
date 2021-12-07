<option value="0">Seleccione Mano de Obra</option>
<?php 					
foreach ($manodeobras as $key => $value): ?>
	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; 	
?>