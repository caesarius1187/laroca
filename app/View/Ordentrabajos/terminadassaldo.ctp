<?php echo $this->Html->css('bootstrapmodal');

echo $this->Html->script('jquery-ui.js',array('inline'=>false));

echo $this->Html->script('languages.js',array('inline'=>false));
echo $this->Html->script('numeral.js',array('inline'=>false));
echo $this->Html->script('moment.js',array('inline'=>false));
echo $this->Html->script('jquery-calx-2.2.6',array('inline'=>false));

echo $this->Html->script('datatables.min.js',array('inline'=>false));
echo $this->Html->script('dataTables.altEditor.js',array('inline'=>false));
echo $this->Html->script('bootstrapmodal.js',array('inline'=>false));
echo $this->Html->script('dataTables.buttons.min.js',array('inline'=>false));
echo $this->Html->script('buttons.print.min.js',array('inline'=>false));
echo $this->Html->script('buttons.flash.min.js',array('inline'=>false));
echo $this->Html->script('jszip.min.js',array('inline'=>false));
echo $this->Html->script('pdfmake.min.js',array('inline'=>false));
echo $this->Html->script('vfs_fonts.js',array('inline'=>false));
echo $this->Html->script('buttons.html5.min.js',array('inline'=>false));?>
<?php echo $this->Html->script('ordentrabajos/index');?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"/>-->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css"/>

<!--<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>-->

<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<div class="">	
	<table cellpadding="0" cellspacing="0" class="tbl_dt">
	<tr>
		<td colspan="5"><h2><?php echo __('Lista de Ordenes a Terminadas '.$estadoSaldo?'Con Saldo':'Sin Saldo'); ?></h2></td>		
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0" id="tableOrdenTrabajo" class="tbl_dt" style="height: auto">
		<thead>
		<tr>					
			<th>N&ordm; Orden </th>
			<th>Nombre(placa) </th>
			<th>Cementerio</th>			
			<th>Cliente </th>
			<th>Fch. Encargo </th>
			<th>Fch. Entrega </th>
			<th>Detalle </th>
			<th>Obvservacion </th>
			<th>Bronce </th>							
			<th>Fch. Encargo Bronce </th>
			<th>Vinilo </th>							
			<th>Retirar </th>							
			<th>Retirada </th>							
			<th>Terminada </th>							
			<th>Para IPS </th>							
			<th>Saldo</th>							
			<th class="actions" style="text-align:center">Acciones</th>
		</tr>
		</thead>
		<tfoot>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>						
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tfoot>
		<tbody>
			<?php 
			$esOperario = $usuarioTipo == 'operario';
			foreach ($ordentrabajos as $ordentrabajo): ?>
			<tr>					
				<td>
					<?php echo str_pad($ordentrabajo['Ordentrabajo']['numerodeorden'], 9, "0", STR_PAD_LEFT); ?>&nbsp;
				</td>
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['nombreyapellido3']."-".$ordentrabajo['Ordentrabajo']['nombreyapellido2']."-".$ordentrabajo['Ordentrabajo']['nombreyapellido1']; ?>
				</td>	
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['cementerio']; ?>
				</td>		
				<td>
					<?php echo $ordentrabajo['Cliente']['nombre']; ?>
				</td>			
				<td>
					<span style="display:none">					
						<?php 
						echo date('Y-m-d',strtotime($ordentrabajo['Ordentrabajo']['fechaencargo'])); 
						?>
					</span>
					<?php echo $ordentrabajo['Ordentrabajo']['fechaencargo']?date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechaencargo'])):''; ?>
				</td>
				<td>
					<span style="display:none">					
						<?php 
						echo date('Y-m-d',strtotime($ordentrabajo['Ordentrabajo']['fechaentrega'])); 
						?>
					</span>
					<?php echo $ordentrabajo['Ordentrabajo']['fechaentrega']?date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechaentrega'])):''; ?>
				</td>
				<td>
					<?php
					foreach ($ordentrabajo['Detalleordentrabajo'] as $detalleordentrabajo) {
						echo $detalleordentrabajo['Producto']['codigo']."-".$detalleordentrabajo['cantidad'];
					}
					?>
				</td>
				<td>
					<?php 
					echo $ordentrabajo['Ordentrabajo']['observaciones']; 
					foreach ($ordentrabajo['Observacione'] as $observacion) {
						echo $observacion['descripcion'];
					}
					?>
				</td>
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['placa']? "SI":"NO";  ?>
				</td>
				<td>
					<span style="display:none">					
						<?php 
						echo date('Y-m-d',strtotime($ordentrabajo['Ordentrabajo']['fechaencargobronce'])); 
						?>
					</span>

					<?php echo $ordentrabajo['Ordentrabajo']['fechaencargobronce']?date('d-m-Y',strtotime($ordentrabajo['Ordentrabajo']['fechaencargobronce'])):''; ?>
				</td>
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['vinilos'] ?>
				</td>	
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['retirar']? "SI":"NO"; ?>
				</td>
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['retirada']? "SI":"NO"; ?>
				</td>	
							

				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['terminada']? "SI":"NO"; ?>
				</td>	
				<td>
					<?php echo $ordentrabajo['Ordentrabajo']['paraips']? "SI":"NO"; ?>
				</td>	
				<td>
					<?php echo number_format($ordentrabajo['Ordentrabajo']['saldo'],2,',','.'); ?>
				</td>	
				<td class="actions" style="text-align:center">
					<?php
					$print_img = $this->Html->image('print.png',array('alt'=>'edit',));
					$money_img = $this->Html->image('print.png',array('alt'=>'edit',));
					$edit_img = $this->Html->image('edit_view.png',array('alt'=>'edit',));
					$ips = $this->Html->image('ips.jpg',array('alt'=>'ips','style'=>'width:32px;height:20px'));
					$delete_img = $this->Html->image('ic_delete_black_24dp.png',array('alt'=>'edit',));
                                        if($ordentrabajo['Ordentrabajo']['paraips']){
                                            echo $this->Html->link( $ips, array('controller'=>'ordentrabajos','action'=>'ordenips',$ordentrabajo['Ordentrabajo']['id']), array('target' => '_blank','escape'=>false));
                                        }
					echo $this->Html->link( "$", array('controller'=>'ordentrabajos','action'=>'recibo',$ordentrabajo['Ordentrabajo']['id']), array('target' => '_blank','escape'=>false));
					echo $this->Html->link( $print_img, array('controller'=>'ordentrabajos','action'=>'view',$ordentrabajo['Ordentrabajo']['id']), array('target' => '_blank','escape'=>false));
					if(!$esOperario) {
						echo $this->Html->link( $edit_img, array('controller'=>'ordentrabajos','action'=>'edit',$ordentrabajo['Ordentrabajo']['id']), array('target' => '_blank','escape'=>false));
						echo $this->Form->postLink(
							$delete_img,
							array('action' => 'delete', $ordentrabajo['Ordentrabajo']['id']),
							['escape'=>false],
							__('Esta seguro que desea eliminar la orden # %s?', $ordentrabajo['Ordentrabajo']['id'])
						);
					} ?>

				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>	
	</div>
</div>
