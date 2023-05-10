<?php echo $this->Html->script('presupuestos/view',array('inline'=>false));
?>
<style type="text/css">
	.print_td_border{
		border-bottom: 1px black dotted;
	}
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
<div class="presupuestos" id="otrabajoid" style="width:100%;">
	<table class="tbl_ot" cellspacing="0" id="tblAddOrdenTrabajo">
		<tr  class="all">
			<td colspan="3" rowspan="5" style="text-align:center; border: 1px solid">
				<?php echo $this->Html->image('inmemorianlogo.png',array('alt'=>'logo inmemorian','style'=>'')); ?> 
			</td> 	
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-top: 1px solid; border-right: 1px solid">
				E-mail: inmemorian-salta@live.com.ar
			</td> 
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-right: 1px solid">
				Direcci&oacute;n: Alvarado 1129
			</td> 
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-right: 1px solid">
				Tel&eacute;fono: 2437408 (FIJO)
			</td> 			
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-bottom: 1px solid; border-right: 1px solid">
				Whatsapp: 3875459412 
			</td> 			
		</tr>
		<tr  class="all">
			<td colspan="6" style="text-align:center; border: 1px solid">
				<?php echo __('Presupuesto'); ?>
			</td> 			
		</tr>	
		<tr class="all">
			<td colspan="1" class="print_td_title_1" style="border: 1px solid" >
				<?php echo __('Nombre y Apellido:'); ?>
			</td>
			<td colspan="3" style="border: 1px solid;">	
				<?php
				echo $presupuesto['Presupuesto']['nombre'];?>
			</td>
			<td colspan="1" class="print_td_title_1" style="border: 1px solid">
				<?php echo __('Numero:'); ?>
			</td>
			<td colspan="1" style="border: 1px solid;">
				<?php echo $presupuesto['Presupuesto']['id']; ?>
			</td>
		</tr>
		<tr class="all">
			<td style="border: 1px solid;" colspan="4">Conceptos</td>
			<td style="border: 1px solid;">Cantidad</td>
			<td style="border: 1px solid;">Total</td>
		</tr>
			<?php
				foreach ($presupuesto['Detallepresupuesto'] as $detallepresupuesto) {
					?>
					<tr>
						<td colspan="4" class="all" style="border: 1px solid;">
							<?= $detallepresupuesto['Producto']['nombre'] ?>
						</td>
						<td colspan="" class="print_td_title_1" style="border: 1px solid;">
							<?= $detallepresupuesto['cantidad'] ?>
						</td>
						<td colspan="" class="print_td_title_1" style="border: 1px solid;">
							$<?= $detallepresupuesto['precio']*$detallepresupuesto['cantidad'] ?>
						</td>
					</tr>
				<?php
				}
				?>
			
		<tr class="all">
			<td colspan="5" style="border: 1px solid;" >Total:</td>
			<td colspan="1" class="print_td_title_1" style="border: 1px solid;">
				<?php
					echo "$".$presupuesto['Presupuesto']['total'];
				?>
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