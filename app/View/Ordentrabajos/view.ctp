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
<div style="width:100%; text-align:center" align="center">
	<h2><?php echo __('La Roca Marmoleria'); ?></h2>
</div>

<div class="ordentrabajos" id="otrabajoid" style="width:100%;">
<table class="tbl_ot" cellspacing="0" id="tblAddOrdenTrabajo">
	<tr  class="all">
		<td colspan="6" style="text-align:center">
			<h2 onclick="reducir();"><?php echo __('Orden de Trabajo'); ?></h2>
		</td> 			
	</tr>	
	<tr class="all">
		<td class="print_td_title_2">
			<?php echo __('Pedido Nro:'); ?>
		</td>
		<td colspan="2" style="border-bottom: 1px dotted;">
			<?php echo $ordentrabajo['Ordentrabajo']['numerodeorden'];?>
		</td>		
	</tr>
	
	<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho notInReducida">
		<td class="print_td_title_1">
			<?php echo __('Observaciones:'); ?>
		</td>
		<td colspan="5" style="border-bottom: 1px dotted;">
			<?php 
			foreach ($ordentrabajo['Observacione'] as $k => $observacion) {
				echo $observacion['descripcion']."/ ";
			}?>				
		</td>		
	</tr>	
	<tr class="all">
		<td colspan="6" style="text-align:center; padding-top:30px">
			<h2><?php echo __('Datos Solicitante'); ?></h2>
		</td> 			
	</tr>	
	<tr class="all">
		<td class="print_td_title_1">
			<?php echo __('Nombre y Apellido:'); ?>
		</td>
		<td colspan="5" style="border-bottom: 1px dotted;">	
			<?php
            if($ordentrabajo['Cliente']['nombre']!='PARTICULAR') {
                echo $ordentrabajo['Cliente']['nombre'] ;
            }
			echo " " . $ordentrabajo['Ordentrabajo']['solicnombre'];?>
		</td>
	</tr>
	<tr class="all">
		<td><?php echo __('Telefono:'); ?></td>
		<td colspan="5" style="border-bottom: 1px dotted;">	
			<?php echo $ordentrabajo['Cliente']['telefono']." ".$ordentrabajo['Ordentrabajo']['solictelefono']; ?>
		</td>
	</tr>
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
	<?php 
	$esOperario = $usuarioTipo == 'operario';
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
	<tr class="all">
		<td>Productos:</td>
		<td colspan="80" class="all" style="border-bottom: 1px dotted;">
			<?php
			foreach ($ordentrabajo['Detalleordentrabajo'] as $detalleordentrabajo) {
				echo $detalleordentrabajo['Producto']['nombre']."-".$detalleordentrabajo['Material']['nombre']."-".$detalleordentrabajo['cantidad'];
				if(!$esOperario) {
					echo "-$".$detalleordentrabajo['precio']." / ";
				}else{
					echo " / ";
				}
			}
			?>
		</td>
	</tr>
<!--	<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placnicho">-->
<!--		<td class="print_td_title_1">-->
<!--			--><?php //echo __('Vinilos:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //echo $ordentrabajo['Ordentrabajo']['vinilos']; ?>
<!--		</td>-->
<!--		<td class="print_td_title_3">-->
<!--			--><?php //echo __('Preparada:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //echo $ordentrabajo['Ordentrabajo']['preparada']; ?>
<!--		</td>-->
<!--		<td class="print_td_title_3">-->
<!--			--><?php //echo __('Grabada:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //
//			 if($ordentrabajo['Ordentrabajo']['grabada'] == 1)
//			 	echo 'Si';
//			 else
//			 	echo 'No';
//			 ?>
<!--		</td>-->
<!---->
<!--	</tr>-->
<!--	<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placnicho">-->
<!--		<td class="print_td_title_1">-->
<!--			--><?php //echo __('Pintada:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //
//				if($ordentrabajo['Ordentrabajo']['pintada'] == 1)
//					echo 'Si';
//				else
//					echo 'No';
//			?>
<!--		</td>-->
<!--	</tr>-->
<!--	<tr class="placbronce">-->
<!--		-->
<!--		-->
<!--		<td class="print_td_title_3">-->
<!--			--><?php //echo __('Bronce:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['bronce'])); ?><!--									-->
<!--		</td>-->
<!--	</tr>-->
<!--	<tr class="all">-->
<!--		<td class="print_td_title_3">-->
<!--			--><?php //echo __('Foto:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['foto'])); ?><!--						-->
<!--		</td>-->
<!--		<td class="print_td_title_1"> -->
<!--			--><?php //echo __('Terminada:'); ?><!--			-->
<!--		</td>-->
<!--		<td style="border-bottom: 1px dotted;">-->
<!--			--><?php //
//				if($ordentrabajo['Ordentrabajo']['terminada'] == 1)
//					echo 'Si';
//				else
//					echo 'No';
//			?>
<!--		</td>-->
<!--		<td class="print_td_title_3">-->
<!--			--><?php //echo __('Entregada:'); ?><!--			-->
<!--		</td>-->
<!--		<td colspan="3" style="border-bottom: 1px dotted;">-->
<!--			--><?php //echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['entregada'])); ?><!--			-->
<!--		</td>				-->
<!--	</tr>-->
	<tr>
		<td colspan="6" style="height:40px"></td>
	</tr>
	
</table>
<table class="tbl_ot" cellspacing="0">
	<tr class="all">
		<td colspan="2" style="text-align:center">
			<?php echo __('Retiro conforme'); ?>
		</td>		
		<td colspan="2" style="text-align:center">
			<?php echo __('Datos Controlados'); ?>
		</td>		
	</tr>
	<tr class="all">
		<td colspan="4" style="height:20px"></td>
	</tr>
	<tr class="all">
		<td>
			<?php echo __('Firma:'); ?>
		</td>
		<td>
		_______________________________
		</td>		
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
		<td>
			<?php echo __('Aclaracion:'); ?>
		</td>
		<td> 			
		_______________________________
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