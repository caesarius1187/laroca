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
<?php echo $this->Html->script('presupuestos/index');?>
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
		<td colspan="5"><h2><?php echo __('Lista de Presupuestos'); ?></h2></td>	
		
		<td  colspan="5" style="text-align: right;" title="Agregar Presupuesto">
	        <div class="fab blue">
	        <core-icon icon="add" align="center">	            
            <?php 

            echo $this->Form->button('+', 
            	array('type' => 'button',
                        'class' =>"btn_add",
                        'title' =>"Agregar Presupuesto",
                        'onClick' => "window.location.href='".Router::url(array(
                                                            'controller'=>'Presupuestos', 
                                                            'action'=>'add')
                                                             )."'"		   
                     )	            							
			    );
        	
            ?> 
	        </core-icon>
	        <paper-ripple class="circle recenteringTouch" fit></paper-ripple>
	        </div>
		</td>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0" id="tablePresupuesto" class="tbl_dt" style="height: auto">
		<thead>
		<tr>					
			<th>N&ordm;  </th>
			<th>Cliente  </th>
			<th>Total</th>			
			<th>Creado </th>
			<th class="actions" style="text-align:center">Acciones</th>
		</tr>
		</thead>
		<tfoot>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tfoot>
		<tbody>
			<?php 
			foreach ($presupuestos as $presupuesto): ?>
			<tr>					
				<td>
					<?php echo str_pad($presupuesto['Presupuesto']['id'], 9, "0", STR_PAD_LEFT); ?>&nbsp;
				</td>
				<td>
					<?php echo $presupuesto['Presupuesto']['nombre']; ?>
				</td>	
				<td>
					<?php echo $presupuesto['Presupuesto']['total']; ?>
				</td>		
				<td>
					<?php echo $presupuesto['Presupuesto']['created']; ?>
				</td>			
				<td class="actions" style="text-align:center">
					<?php
					$print_img = $this->Html->image('print.png',array('alt'=>'Ver',));
					echo $this->Html->link( $print_img, array('controller'=>'presupuestos','action'=>'view',$presupuesto['Presupuesto']['id']), array('target' => '_blank','escape'=>false));
					?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>	
	</div>
</div>
