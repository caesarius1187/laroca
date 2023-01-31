<script type="text/javascript">			
	$(document).ready(function(){ 
    
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
	function recargarInforme()
	{
		alert($("#CajaDesde").val());
		alert($("#CajaHasta").val());

		location.href = "#abrirCaja";
	}	
	$('#CajaMovimientosForm').submit(function(){
        //serialize form data
        var formData = $(this).serialize();
        //get form action
        var formUrl = $(this).attr('action');
        $desde = $("#CajaDesde").val();
        $hasta = $("#CajaHasta").val();
        location.href = formUrl+"/desde/"+$desde+"/hasta/"+$hasta;
        return false;
    });
</script>
<div class="cajas form">
	<fieldset>
		<legend>Movimientos de Caja</legend>
		<table>
			<tr>
				<td colspan="5"><h2>Pagos Recibidos</h2></td>
			</tr>
			<tr>
				<th>Fecha</th>
				<th>Num OT</th>
				<th>Monto</th>
				<th>Medio de pago</th>
			</tr>
			<?php
			$totalPagos = 0;
			$subtotalesPagos = [];
			foreach ($pagos as $pago) {
				if(!isset($subtotalesPagos[$pago['Pago']['mediodepago']])){
					$subtotalesPagos[$pago['Pago']['mediodepago']] = 0;
				}
			?>
				<tr>
					<td><?= date('d-m-Y', strtotime($pago['Pago']['fecha'])); ?></td>
					<td><?= $pago['Ordentrabajo']['numerodeorden'] ?></td>
					<td><?= $pago['Pago']['mediodepago'] ?></td>
					<td><?= $pago['Pago']['montodejado'] ?></td>
				</tr>
			<?php
				$totalPagos+=$pago['Pago']['montodejado']*1 ;
				$subtotalesPagos[$pago['Pago']['mediodepago']]+=$pago['Pago']['montodejado']*1 ;
			}
			?>
			<tr>
				<th colspan="3">Total Pagos Recibidos</th>
				<th colspan="1"><?= $totalPagos ?></th>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="5"><h2>Egresos</h2></td>
			</tr>
			<tr>
				<th>Fecha</th>
				<th>Num Comprobante</th>
				<th>Monto</th>
				<th>Medio de Pago</th>
			</tr>
			<?php
			$totalEgresos = 0;
			$subtotalesEgresos = [];
			foreach ($compras as $compra) {
				if(!isset($subtotalesEgresos[$compra['Compras']['mediodepago']])){
					$subtotalesEgresos[$compra['Compras']['mediodepago']] = 0;
				}
			?>
				<tr>
					<td><?php 			
						$dc = new DateTime($compra['Compras']['created']);
						$dc->setTimezone(new DateTimeZone('America/Buenos_Aires'));
 						echo  $dc->format('Y-m-d H:i:s');
 					?></td>
					<td><?= $compra['Compras']['numerocomprobante'] ?></td>
					<td><?= $compra['Compras']['mediodepago'] ?></td>
					<td><?= $compra['Compras']['total'] ?></td>
				</tr>
			<?php
				$totalEgresos+=$compra['Compras']['total']*1 ;
				$subtotalesEgresos[$compra['Compras']['mediodepago']]+=$compra['Compras']['total']*1 ;
			}
			?>
			<tr>
				<th colspan="3">Total Egresos</th>
				<th colspan="1"><?= $totalEgresos ?></th>
			</tr>
		</table>
		<?php
		echo "Saldo: "+$totalPagos-$totalEgresos;

		?>

	</fieldset>
</div>

<div class="actions">
	<?php echo $this->Form->create('Caja',['action'=>'movimientos']); ?>

	<h3><?php echo __('Ver Informe'); ?></h3>
	<?php echo $this->Form->input('desde', array(
		'class'=>'datepicker', 
        'type'=>'text',
        'label'=>'Desde', 
        'default'=>date('d-m-Y',strtotime($desde)),                            
        'readonly'=>'readonly')
	); ?>
	<?php echo $this->Form->input('hasta', array(
		'class'=>'datepicker', 
        'type'=>'text',
        'label'=>'Hasta', 
        'default'=>date('d-m-Y',strtotime($hasta)),                            
        'readonly'=>'readonly')
	); 

	?>
	<td><?php echo $this->Form->end(__('Recargar')); ?></td>
	<h3><?php echo __('Saldo de Caja'); ?></h3>
	<?php
		echo "Saldo: ".($totalPagos-$totalEgresos);
	?>
	<h3><?php echo __('Ingresos'); ?></h3>
	<?php
	foreach ($subtotalesPagos as $k => $subtotalPago) {	
		echo $k.": ".$subtotalPago."<br>";
	}
	?>
	<h3><?php echo __('Egresos'); ?></h3>
	<?php
	foreach ($subtotalesEgresos as $j => $subtotalEgreso) {	
		echo $j.": ".$subtotalEgreso."<br>";

	}

	?>
</div>