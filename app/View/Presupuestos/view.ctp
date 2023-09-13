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
			<td colspan="3" rowspan="7" style="text-align:center; border: 1px solid">
				<?php echo $this->Html->image('larokalogo.jpg',array('alt'=>'logo la roca','style'=>'width: 100px;')); ?> 
			</td> 	
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-top: 1px solid; border-right: 1px solid">
				E-mail: larocamarmoleria@gmail.com
			</td> 
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-right: 1px solid">
				Direcci&oacute;n: San Juan 1158
			</td> 
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-right: 1px solid">
				Fabrica: Av. Delgadillo 2265 - Parque Industrial
			</td> 
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-right: 1px solid">
				Tel&eacute;fono: (387)155333077
			</td> 			
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-bottom: 1px solid; border-right: 1px solid">
				Conoce nuestros trabajos
			</td> 			
		</tr>
		<tr  class="all">
			<td colspan="3" style="text-align:center; border-bottom: 1px solid; border-right: 1px solid">
				<?php echo $this->Html->image('instagram.png',array('alt'=>'logo la roca','style'=>'width: 20px;')); ?> larocamarmoleriasalta 
				<?php echo $this->Html->image('facebook.png',array('alt'=>'logo la roca','style'=>'width: 20px;')); ?> 
				La Roca Marmoleria
			</td> 			
		</tr>
		<tr  class="all">
			<td colspan="6" style="text-align:center; border: 1px solid; color: white;background-color: black;">
				<?php echo __('Presupuesto'); ?>
			</td> 			
		</tr>	
		<tr class="all">
			<td colspan="1" class="print_td_title_1" style="border: 1px solid" >
				<b><?php echo __('Cliente:'); ?></b>
			</td>
			<td colspan="3" style="border: 1px solid;" text-align="left">	
				<?php
				echo $presupuesto['Presupuesto']['nombre'];?>asd
			</td>
			<td colspan="1" class="print_td_title_1" style="border: 1px solid" >
				<b><?php echo __('Numero:'); ?></b>
			</td>
			<td colspan="1" style="border: 1px solid;">
				<?php echo $presupuesto['Presupuesto']['id']; ?>
			</td>
		</tr>
		<tr class="all">
			<td colspan="1" class="print_td_title_1" style="border: 1px solid" >
				<b><?php echo __('Direccion:'); ?></b>
			</td>
			<td colspan="3" style="border: 1px solid;" text-align="left">	
				<?php
				echo $presupuesto['Presupuesto']['direccion'];?>asd
			</td>
			<td colspan="1" class="print_td_title_1" style="border: 1px solid" >
				<b><?php echo __('Fecha:'); ?></b>
			</td>
			<td colspan="1" style="border: 1px solid;">
				<?php echo $today = date_format(date_create($presupuesto['Presupuesto']['created']),"d-m-Y");  ?>
			</td>
		</tr>
		<tr class="all">
			<td style="border: 1px solid;" colspan=""><b>CONCEPTOS</b></td>
			<td style="border: 1px solid;"><b>ANCHO</b></td>
			<td style="border: 1px solid;"><b>LARGO</b></td>
			<td style="border: 1px solid;"><b>CANT.M2/ML</b></td>
			<td style="border: 1px solid;"><b>PRECIO UNIT.</b></td>
			<td style="border: 1px solid;"><b>TOTAL</b></td>
		</tr>
			<?php
				foreach ($presupuesto['Detallepresupuesto'] as $detallepresupuesto) {
					?>
					<tr>
						<td colspan="" class="all" style="border: 1px solid;">
							<?= $detallepresupuesto['Producto']['nombre'] ?>
						</td>
						<td colspan="" class="all" style="border: 1px solid;">
							<?= $detallepresupuesto['ancho'] ?>
						</td>
						<td colspan="" class="all" style="border: 1px solid;">
							<?= $detallepresupuesto['largo'] ?>
						</td>
						<td colspan="" class="print_td_title_1" style="border: 1px solid;">
							<?= $detallepresupuesto['cantidad'] ?>
						</td>
						<td colspan="" class="print_td_title_1" style="border: 1px solid;">
							$<?= $detallepresupuesto['precio']?>
						</td>
						<td colspan="" class="print_td_title_1" style="border: 1px solid;">
							$<?= $detallepresupuesto['precio']*$detallepresupuesto['cantidad'] ?>
						</td>
					</tr>
				<?php
				}
				?>
			
		<tr class="all">
			<td colspan="4" style="border: 1px solid;" ></td>
			<td colspan="1" style="border: 1px solid;" ><b>TOTAL:</b></td>
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