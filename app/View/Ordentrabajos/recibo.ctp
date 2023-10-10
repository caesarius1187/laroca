<?php echo $this->Html->script('ordentrabajos/view',array('inline'=>false));
?>
<style type="text/css">
	/*.print_td_border{
		border-bottom: 1px dotted;
	}*/
	.print_td_title_1{
		width: 130px;
	}
	.print_td_title_2{
		width: 110px;
	}	
	.print_td_title_3{
		width: 70px;
	}		
</style>
<script type="text/javascript">
	var reducida = false;
	function reducir(){
		if(!reducida){
			$(".notInReducida").hide();
			reducida = true;
		}else{
			//$(".notInReducida").show();
			reducida = false;
			mostrarTipoDeOrdenInicial();		
			mostrarTipoDeOrdenInicial();			
		}

	}
</script>

<?php 
	$esOperario = $usuarioTipo == 'operario';
?>
<div class="ordentrabajos" id="otrabajoid" style="width:100%;">
<table class="tbl_ot" cellspacing="0" id="">
	<tr  class="all">
		<td colspan="3" rowspan="8" style="text-align:center">
			<?php echo $this->Html->image('larokalogo.png',array('alt'=>'logo La Roca','style'=>'')); ?> 
		</td> 	
	</tr>
	<tr  class="all">
		<td colspan="3" style="text-align:center">
			<h3>E-mail: larocamarmoleria@gmail.com</h3>
		</td> 
	</tr>
	<tr  class="all">
		<td colspan="3" style="text-align:center">
			<h3>Local Comercial: San Juan 1158</h3>
		</td> 
	</tr>
	<tr  class="all">
		<td colspan="3" style="text-align:center">
			<h3>Fabrica: Av. Delgadillo 2265 - Parque Industrial</h3>
		</td> 			
	</tr>
	<tr  class="all">
		<td colspan="3" style="text-align:center">
			<h3>Tel&eacute;fono: (0387) 155333077</h3>
		</td> 			
	</tr>
	<tr  class="all">
		<td colspan="3" style="text-align:center">
			<h3>Facebook: La Roca Marmoleria </h3>
		</td> 			
	</tr>
	<tr  class="all">
		<td colspan="3" style="text-align:center">
			<h3>Instagram: @ilarocamarmoleriasalta </h3>
		</td> 			
	</tr>
	<tr class="all">
		<td colspan="1"  class="print_td_title_1">
			Cliente
		</td>
		<td>
				<?php
				echo " " . $ordentrabajo['Ordentrabajo']['solicnombre'];?>
		</td>
		<td colspan="6" >
			<?php
			if(isset($ordentrabajo['Pago'][0])){
				?>
				Recibo N: <?php echo $ordentrabajo['Pago'][0]['id'] ?>
				<?php
			}else{
				 echo "No se realizo ningun pago" ;
			}
			?>
			
		</td>
	</tr>
	<tr class="all">
		<td colspan="1"  class="print_td_title_1">
			Orden
		</td>
		<td>
			<?php echo $ordentrabajo['Ordentrabajo']['numerodeorden']; ?>
		</td>
		<td colspan="3" >
			Fecha <?php echo date('d-m-Y'); ?>
		</td>
	</tr>
	<tr class="all">
		<td>Concepto</td>
		<td>Material</td>
		<td>Ancho</td>
		<td>Largo</td>
		<td>Cant M2/ML</td>
		<td>Precio Unit</td>
		<td>Total</td>
	</tr>
	<?php foreach ($ordentrabajo['Detalleordentrabajo'] as $detalleordentrabajo) {
		?>
		<tr>
			<td>
				<?php echo $detalleordentrabajo['Producto']['nombre'] ?>
			</td>
			<td>
				<?php echo $detalleordentrabajo['Material']['nombre'] ?>
			</td>
			<td>
				<?php echo $detalleordentrabajo['ancho'] ?>
			</td>
			<td>
				<?php echo $detalleordentrabajo['largo'] ?>
			</td>
			<td>
				<?php echo $detalleordentrabajo['cantidad'] ?>
			</td>
			<td>
				$<?php echo number_format($detalleordentrabajo['precio']*1,2,',','.') ?>
			</td>
			<td>
				$<?php 
				$total = $detalleordentrabajo['cantidad']*1 * $detalleordentrabajo['precio']*1;
				echo number_format($total,2,',','.') 
				?>
			</td>
			<?php
	} ?>
	<tr class="all">
		<td class="print_td_title_1">	
			<?php echo __('Fecha Encargo:'); ?>			
		</td>
		<td style="border-bottom: 1px dotted;">	
			<?php 
			$isDate = validateDate($ordentrabajo['Ordentrabajo']['fechaencargo']);
			if($isDate){
				echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechaencargo'])); 
			}else{
				echo ''; 
			}?>
		</td>
		
		<td class="print_td_title_2">
			<?php echo __('Fecha Entrega:'); ?>			
		</td>
		<td colspan="3" style="border-bottom: 1px dotted;">
			<?php 
			$isDate = validateDate($ordentrabajo['Ordentrabajo']['fechaentrega']);
			if($isDate){
				echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechaentrega'])); 
			}else{
				echo ''; 
			}?>
		</td>
	</tr>
	<tr>
		<td colspan="6" style="height:40px"></td>
	</tr>
	<?php 
	if(!$esOperario) {
	?>
	<tr  class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">
		<td class="print_td_title_1">
			<?php echo __('Total:'); ?>			
		</td>
		<td style="border-bottom: 1px dotted;">	
			<?php echo $ordentrabajo['Ordentrabajo']['total']; ?>
		</td>
		<td class="print_td_title_3">	
			<?php echo __('A Cuenta:'); ?>			
		</td>
		<td style="border-bottom: 1px dotted;">	
			<?php echo $ordentrabajo['Ordentrabajo']['acuenta']; ?>
		</td>
		<td class="print_td_title_3">
			<?php echo __('Saldo:'); ?>			
		</td>
		<td style="border-bottom: 1px dotted;">
			<?php echo $ordentrabajo['Ordentrabajo']['saldo']; ?>
		</td>
	</tr>
	<?php
	}
	?>
</table>
<table class="tbl_ot" cellspacing="0">
	<tr class="all">
		<td colspan="4" style="text-align:center">
			<?php echo __('Atendio'); ?>
		</td>		
	</tr>
	<tr class="all">
		<td colspan="4" style="height:20px"></td>
	</tr>
	<tr class="all">
		<td >
			<?php echo __('Firma:'); ?>
		</td>
		<td>		
		_______________________________
		</td>			
	</tr>
	<tr class="all">
		<td colspan="4" style="height:20px"></td>
	</tr>
	<tr class="all">
		</td>		
		<td>
			<?php echo __('Aclaracion:'); ?>
		</td>
		<td>			
		_______________________________
		</td>					
	</tr>
</table>
</div>
<div>
<?php echo $this->Form->button('Imprimir', 
                                    array('type' => 'button',
                                          'onClick' => "imprimir()",
                                          'id' =>'btn_ot'

                                         )
            );?> 
</div>
<?php
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    if(in_array($date,['0000-00-00','01-01-1970','1970-01-01',''])){
        return false;
    }
    return $d && $d->format($format) == $date;
}?>