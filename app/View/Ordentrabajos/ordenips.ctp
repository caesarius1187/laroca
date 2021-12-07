<?php echo $this->Html->script('ordentrabajos/ordenips',array('inline'=>false));
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
<div style="width:100%; text-align:center" align="center">
	<h2><?php echo __('IN MEMORIAN'); ?></h2>
</div>
<div class="ordentrabajos" id="otrabajoid" style="width:100%;">
<table class="tbl_ot" cellspacing="0" id="tblAddOrdenTrabajo">
	<tr  class="all">
            <td colspan="6" style="text-align:center">
                    <h2><?php //echo __('Orden de Trabajo'); ?></h2>
            </td> 			
	</tr>	
	<tr class="all">
		<td class="">
			Fecha de autorizacion:
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fchautorizacion'])); ?>
		</td>
		<td class="">
                        Pedido &numero;:
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo $ordentrabajo['Ordentrabajo']['numeropoliza'];?>
		</td>		
	</tr>
	<tr class="all">
		<td class="">
			&numero;: de siniestro:
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo $ordentrabajo['Ordentrabajo']['numerosiniestro']; ?>
		</td>
		<td class="">	
			Fecha Encargo:	
		</td>
		<td style="border-bottom: 1px dotted;">	
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechaencargo'])); ?>
		</td>		
	</tr>
        
	<tr class="ncmg placnicho">
            <td colspan="4">
		DATOS DEL TITULAR O DERECHO HABIENTES
            </td>
	</tr>
        <tr class="all">
            <td class="">
                    <?php echo __('Nombre y Apellido:'); ?>
            </td>
            <td colspan="3" style="border-bottom: 1px dotted;">	
                <?php
                if($ordentrabajo['Cliente']['nombre']!='PARTICULAR') {
                    echo $ordentrabajo['Cliente']['nombre'] ;
                }
                echo " " . $ordentrabajo['Ordentrabajo']['solicnombre'];?>
            </td>
	</tr>
	<tr class="a1b1r1 a2b2r2 a3b3r3">
		<td class="">
			Direccion:
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php //echo $ordentrabajo['Ordentrabajo']['direccion']; ?>
		</td>
		<td class="">
			Telefono:
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo $ordentrabajo['Cliente']['telefono']." ".$ordentrabajo['Ordentrabajo']['solictelefono']; ?>
		</td>
	</tr>	
	<tr class=" ">
		<td colspan="4">
			DATOS DEL FALLECIDO
		</td>		
	</tr>
        <tr class="all">
            <td colspan="1">
                    <?php echo __('Cementerio/Agencia:'); ?>
            </td>
            <td colspan="3" style="border-bottom: 1px dotted;">
                    <?php echo $ordentrabajo['Ordentrabajo']['cementerio']; ?>
            </td>            
	</tr>
        <tr class="all">
            <td colspan="1">
                    <?php echo __('Tipo de trabajo:'); ?>
            </td>
            <td colspan="3" style="border-bottom: 1px dotted;">
                    <?php echo $ordentrabajo['Ordentrabajo']['tipoips']; ?>
            </td>            
	</tr>
        <?php 
        $niveldeips = $ordentrabajo['Ordentrabajo']['niveldeips'];
        if($niveldeips==1){
        ?> 
        <tr class="a2b2r2 a3b3r3">
		<td class="">
			<?php echo __('Nombre:'); ?>
		</td>
		<td colspan="3" style="border-bottom: 1px dotted;"> 
			<?php echo $ordentrabajo['Ordentrabajo']['nombreyapellido1']; ?>
			&nbsp;
		</td>
		
	</tr>	
        <tr class="a2b2r2 a3b3r3">
		<td class="">
			<?php echo __('Fecha Nacimiento:'); ?>
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;"> 
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechanacimiento1'])); ?>
			&nbsp;
		</td>
		<td class="">
			<?php echo __('Fecha Defuncion:'); ?>
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechadefuncion1'])); ?>
			&nbsp;
		</td>		
	</tr>	
        <?php 
        }
        if($niveldeips==2){
        ?> 
        <tr class="a2b2r2 a3b3r3">
		<td class="">
			<?php echo __('Nombre:'); ?>
		</td>
		<td colspan="3" style="border-bottom: 1px dotted;"> 
			<?php echo $ordentrabajo['Ordentrabajo']['nombreyapellido2']; ?>
			&nbsp;
		</td>
	</tr>	
        <tr class="a2b2r2 a3b3r3">
		<td class="">
			<?php echo __('Fecha Nacimiento:'); ?>
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;"> 
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechanacimiento2'])); ?>
			&nbsp;
		</td>
		<td class="">
			<?php echo __('Fecha Defuncion:'); ?>
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechadefuncion2'])); ?>
			&nbsp;
		</td>		
	</tr>	
        <?php 
        }
        if($niveldeips==3){
        ?> 
        <tr class="a2b2r2 a3b3r3">
		<td class="">
			<?php echo __('Nombre:'); ?>
		</td>
		<td colspan="3" style="border-bottom: 1px dotted;"> 
			<?php echo $ordentrabajo['Ordentrabajo']['nombreyapellido3']; ?>
			&nbsp;
		</td>		
	</tr>	
        <tr class="a2b2r2 a3b3r3">
		<td class="">
			<?php echo __('Fecha Nacimiento:'); ?>
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;"> 
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechanacimiento3'])); ?>
			&nbsp;
		</td>
		<td class="">
			<?php echo __('Fecha Defuncion:'); ?>
		</td>
		<td colspan="1" style="border-bottom: 1px dotted;">
			<?php echo date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechadefuncion3'])); ?>
			&nbsp;
		</td>		
	</tr>	
        <?php 
        }
        ?>
        <tr class="ncmg placnicho">
		<td class="">
                    &numero; de nicho / &numero; Sector y Parcela:
		</td>
		<td colspan="3" style="border-bottom: 1px dotted;">
			<?php echo $ordentrabajo['Ordentrabajo']['numnicho'];?>
                    <?php echo $ordentrabajo['Ordentrabajo']['numsectorparcela']; ?>
		</td>
		
	</tr>	
        <tr>
            <td class="">
                Fecha Entrega:
            </td>
            <td colspan="3" style="border-bottom: 1px dotted;">
                	
            </td>
        </tr>
        <tr >
            <td rowspan="2" style="height: 50px;">
                Firma en Conformidad:
            </td>
            <td rowspan="2" colspan="3" style="border-bottom: 1px dotted;">
                	
            </td>
        </tr>
        <tr >
          
        </tr>
	<?php
	/*GRABADO O DATOS PLACA*/
	?>
	
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