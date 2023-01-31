<?php echo $this->Html->script('ordentrabajos/add');?>
<script type="text/javascript">
	$(document).ready(function(){ 
		
		//var iTableTotalHeight = $(window).height();     	
	 	//var iTableHeight = iTableTotalHeight - 400;
	 	//iTableHeight = (iTableHeight < 250) ? 250 : iTableHeight;     		 	
	 	//getDetallesManoDeObra();

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
</script>
<!--<div class="ordendetrabajos form">-->
<div id="bottoneraHead" style="width:100%">
	<div id="btnN-CMG" class="buttonTipoOrdenDesactivado">
		N-CMG
	</div>
	<div id="btna1b1r1" class="buttonTipoOrdenDesactivado">
		A1-B1-R1
	</div>
	<div id="btna2b2r2" class="buttonTipoOrdenDesactivado">
		A2-B2-R2
	</div>
	<div id="btna3b3r3" class="buttonTipoOrdenDesactivado">
		A3-B3-R3
	</div>
	<div id="btnplacbronce" class="buttonTipoOrdenDesactivado" style="display:none">
		Placa de bronce
	</div>
	<div id="btnplacnicho" class="buttonTipoOrdenDesactivado" style="display:none">
		Placa para nicho
	</div>
	<div id="btnplacips" class="buttonTipoOrdenDesactivado"  style="display:none">
		Placa para IPS
	</div>
</div>
<div class="div_ot">
<?php echo $this->Form->create('Ordentrabajo'); ?>
	<table cellpadding="0" cellspacing="0" class="tbl_add" id="tblAddOrdenTrabajo">
		<tr class="all"> 
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Modificar Orden de Trabajo'); ?></h2>
			</td> 			
		</tr>	
		<tr class="all">
			<td >
				<?php echo $this->Form->input('numerodeorden',array('label'=>'Pedido N�', 'style'=>'width:70%')); ?>
			</td>
			<td>
				<?php
				$optionCementerio = array(
					'Cementerio'=>[
						'La Paz'=>'La Paz',
						'Santa Teresita'=>'Santa Teresita',
						'Divina Misericordia'=>'Divina Misericordia',
						'San Antonio de Padua'=>'San Antonio de Padua',
						'Santa Cruz'=>'Santa Cruz',
						'Memorial'=>'Memorial',
						'San Lorenzo'=>'San Lorenzo',
						'Jardin Celestial'=>'Jardin Celestial',
						'Jardin de la Paz'=>'Jardin de la Paz',
						'Rosario de Lerma'=>'Rosario de Lerma',
						'San Lucas'=>'San Lucas',
						'Zenta'=>'Zenta',
						'Otro'=>'Otro',
					],
					'Agencia'=>[
						'Capital'=>'Capital',
						'Cafayate'=>'Cafayate',
						'Rosario de la Frontera'=>'Rosario de la Frontera',
						'Metan'=>'Metan',
						'Guemes'=>'Guemes',
						'Joaquin V. Gonzales'=>'Joaquin V. Gonzales',
						'Tartagal'=>'Tartagal',
						'Oran'=>'Oran',
						'Cachi'=>'Cachi',
						'Otra Agencia'=>'Otra Agencia'
					]
				);
				echo $this->Form->input('cementerio',array(
					'type'=>'select',
					'options'=>$optionCementerio,
					'label'=>'Cementerio/Agencia')); ?>
			</td>
			<td >
				<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
				<?php echo $this->Form->input('user_id',array('label'=>'Usuario')); ?>
				<?php echo $this->Form->input('tipoorden',array('type'=>'hidden')); ?>
			</td>
			<td style="vertical-align:middle">
				<?php echo $this->Form->input('ocultarprecioenimpresion',array('label'=>'Ocultar precios en impresi&oacute;n', 'style' => 'margin-top:5px')); ?>			
			</td>
		</tr>		
		<tr class="ncmg placnicho">
                    <td>
                        <?php echo $this->Form->input('numnicho',array('label'=>'N� Nicho')); ?>
                    </td>
		</tr>
        <tr class="all">
            <td>
                <?php echo $this->Form->radio('paraips', [1 => 'Si' ,0 => 'No'], ['legend'=>'Para IPS']); ?>
            </td>
            <td>
                <?php echo $this->Form->radio('placa', [1 => 'Si' ,0 => 'No'], ['legend'=>'Bronce']);  
                $isDate = validateDate($this->request->data['Ordentrabajo']['fechaencargobronce'],'Y-m-d h:i:s');
                                
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechaencargobronce']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechaencargobronce',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Encargo Bronce',
		                                      'value'=>$procesedDate,//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      ));

                ?>
            </td>
            <td>
                <?php echo $this->Form->radio('otro', [1 => 'Si' ,0 => 'No']); ?>
            </td>
            <td>
                <?php echo $this->Form->radio('corte', [1 => 'Si' ,0 => 'No']);  ?>
            </td>
		</tr>
                <tr class="all paraips">
			<td>
				<?php
                                echo $this->Form->input('fchautorizacion',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Autorizacion',
		                                      'default'=>'',//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); 
                                ?>
			</td>
			<td>
				<?php echo $this->Form->input('numeropoliza',array('label'=>'Numero poliza')); ?>
			</td>
			<td>
				<?php echo $this->Form->input('numerosiniestro',array('label'=>'Numero siniestro')); ?>
			</td>
			<td>
				<?php 
                                $tipoips=[
                                    'Lapida para nicho Opc 1'=>'Lapida para nicho Opc 1', 
                                    'Lapida para nicho Opc 2'=>'Lapida para nicho Opc 2', 
                                    'Lapida para parcela'=>'Lapida para parcela', 
                                    'Agregadod de nivel'=>  'Agregadod de nivel'
                                ];
                                echo $this->Form->input('tipoips',array(
                                    'label'=>'Tipo trabajo',
                                    'type'=>'select',
                                    'options'=>$tipoips,
                                    )); 
                                echo $this->Form->input('niveldeips',array(
                                    'label'=>'Nivel para IPS',
                                    'type'=>'select',
                                    'options'=>[1=>'1',2=>'2',3=>'3'],
                                    )); 
                                ?>
			</td>
		</tr>
		<tr class="a1b1r1 a2b2r2 a3b3r3">		
			<td>
				<?php echo $this->Form->input('numsectorparcela',array('label'=>'N� y Sector de Parcela')); ?>
			</td>
		</tr>
		<?php
		/*GRABADO O DATOS PLACA*/
		?>
		<tr class="ncmg placbronce placnicho">
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Grabado o Datos de placa'); ?></h2>
			</td>
		</tr>	
		<?php
		/*3er Nivel*/
		?>
		<tr class="a1b1r1 a2b2r2 a3b3r3">
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Datos de placa'); ?></h2>
			</td>
		</tr>
		<tr class="a1b1r1 a2b2r2 a3b3r3">
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Datos nivel'); ?></h2>
			</td>
		</tr>
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placnicho">		
			<td>
				<?php
				$optionSimbolo = array(
					'ninguno'=>'ninguno',
					'1'=>'1',
					'2'=>'2',
					'3'=>'3',
					'4'=>'4',
					'5'=>'5',
					'6'=>'6',
					'7'=>'7',
					'8'=>'8',
					'9'=>'9',
					'10'=>'10',
					'11'=>'11',
					'12'=>'12',
					'13'=>'13',
					'14'=>'14',
					'15'=>'15',
					'16'=>'16',
					'17'=>'17',
					'18'=>'18',
					'19'=>'19',
					'20'=>'20',
					'21'=>'21',
					'22'=>'22',
					'23'=>'23',
					'24'=>'24',
					'25'=>'25',
					'26'=>'26',
					'27'=>'27',
					'28'=>'28',
					'29'=>'29',
					'30'=>'30',
					'31'=>'31',
					'32'=>'32',
					'33'=>'33',
					'34'=>'34',
					'35'=>'35',
					'36'=>'36',
					'37'=>'37',
					'38'=>'38',
					'39'=>'39',
					'40'=>'40',
					'41'=>'41',
					'42'=>'42',
					'43'=>'43',
					'44'=>'44',
					'45'=>'45',
					'46'=>'46',
					'47'=>'47',
					'48'=>'48',
					'49'=>'49',
					'50'=>'50',
				);
				echo $this->Form->input('simboloreligioso',array('type'=>'select','options'=>$optionSimbolo,'label'=>'Simbolo Religioso')); ?>
			</td>

		</tr>
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">		
			<td>
				<?php echo $this->Form->input('nombreyapellido3',array('label'=>'Nombre y Apellido')); ?>
			</td>
			<td>
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechanacimiento3']);
                                
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechanacimiento3']));
				}else{
					$procesedDate = "";
				}
                                
				echo $this->Form->input('fechanacimiento3',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Nacimiento',
		                                      'value'=>$procesedDate,//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td>
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechadefuncion3']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechadefuncion3']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechadefuncion3',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Defuncion',
		                                      'value'=>$procesedDate,//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td>
				<?php echo $this->Form->input('nivel3',array('label'=>'Nivel','options'=>['1'=>'1','2'=>'2','3'=>'3'])); ?>
			</td>
		</tr><?php
		/*2do Nivel*/
		?>
		<tr class="a2b2r2 a3b3r3">
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Datos nivel'); ?></h2>
			</td>
		</tr>
		<tr class="a2b2r2 a3b3r3">		
			<td>
				<?php echo $this->Form->input('nombreyapellido2',array('label'=>'Nombre y Apellido')); ?>
			</td>
			<td>
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechanacimiento2']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechanacimiento2']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechanacimiento2',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Nacimiento',
		                                      'value'=>$procesedDate,//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td>
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechadefuncion2']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechadefuncion2']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechadefuncion2',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Defuncion',
		                                      'default'=>'',//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td>
				<?php echo $this->Form->input('nivel2',array('label'=>'Nivel','options'=>['1'=>'1','2'=>'2','3'=>'3'])); ?>
			</td>
		</tr>	
		<?php
		/*1er Nivel*/
		?>
		<tr class="a3b3r3">
			<td colspan="4" style="text-align:center">
				<h2><?php echo __('Datos nivel'); ?></h2>
			</td>
		</tr>
		<tr class="a3b3r3">		
			<td>
				<?php echo $this->Form->input('nombreyapellido1',array('label'=>'Nombre y Apellido')); ?>
			</td>
			<td>
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechanacimiento1']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechanacimiento1']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechanacimiento1',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Nacimiento',
		                                      'value'=>$procesedDate,//date('d-m-Y'),
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td>
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechadefuncion1']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechadefuncion1']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechadefuncion1',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Defuncion',
		                                      'value'=>$procesedDate,
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td>
				<?php echo $this->Form->input('nivel1',array('label'=>'Nivel','options'=>['1'=>'1','2'=>'2','3'=>'3'])); ?>
			</td>
		</tr>	
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">
			<td colspan="4" >
				<?php echo $this->Form->input('dedicatoria',array('type'=>'textarea','rows' => 2)); ?>
			</td>
		</tr>	
		<!--<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">
			<td colspan="4" >
				<?php echo $this->Form->input('observaciones',array('type'=>'textarea','rows' => 2)); ?>
			</td>
		</tr>-->
		<?php
		/*Datos Del Solicitante*/
		?>		
		<tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Datos Solicitante'); ?></h2></td>
		</tr>
		<tr  class="all">
			<!--<td width="25%">				
				<?php echo $this->Form->input('tipocliente_id',array('label'=>'Tipo de Cliente')); ?>			
			</td>-->
			<td width="25%">				
				<div class="input select">
				<?php
				echo $this->Form->input('cliente_id',array('label'=>'Cliente', 'div' => false, 'style' => 'width:80%'));				
				echo $this->Html->image('bg-search.png', array('height' => '15', 'style'=>'padding-left:5px; padding-top:5px; cursor:pointer', 'title' => 'Buscar Cliente', 'onClick' => 'cargarCliente();'))				
				;?>
				</div>
			</td>			
			
			<td width="25%">
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechaencargo']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechaencargo']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechaencargo', array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Encargo',
		                                      'value'=>$procesedDate,
		                                      'style'=>'width:75%'
		                                      )); ?></td>	
	
				
			</td>
			<td width="25%">				
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['fechaentrega']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['fechaentrega']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('fechaentrega',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Fch. Entrega',
		                                      'value'=>$procesedDate,
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>		
		</tr>
		<tr class="all">
			<td colspan="2" width="25%">				
				<?php echo $this->Form->input('solicnombre',array('label'=>'Nombre y Apellido')); ?>			
			</td>
			<td colspan="2" width="25%">				
				<?php echo $this->Form->input('solictelefono',array('label'=>'Telefono')); ?>			
			</td>
		</tr>
		<tr  class="ncmg a1b1r1 a2b2r2 a3b3r3 placbronce placnicho">
			<td width="25%">
				<?php echo $this->Form->input('total',array('label'=>'Total $')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('acuenta',array('label'=>'A Cuenta $')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('saldo',array('label'=>'Saldo $')); ?>
			</td>
		</tr>
		<?php
		/*AVANCES DEL TRABAJO	*/
		?>

		<tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Avances del Trabajo'); ?></h2></td>
		</tr>	
		<tr class="ncmg a1b1r1 a2b2r2 a3b3r3 placnicho">
			<td width="25%">
				<?php echo $this->Form->input('vinilos',array('label'=>'Vinilos')); ?>
			</td>
			<td width="25%">
				<?php echo $this->Form->input('preparada',array(
					'label'=>'Preparada','options'=>$userPreparas,
					'empty'=>'Seleccionar usuario que prepara'
				)); ?>
			</td>
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->radio('retirar', [1 => 'Si' ,0 => 'No'], ['legend'=>'Retirar']); ?>
				</div>
			</td>
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->radio('retirada', [1 => 'Si' ,0 => 'No'], ['legend'=>'Retirada']); ?>
				</div>
			</td>
		</tr>	
		<tr class="placbronce">
			<td width="25%">				
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['bronce']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['bronce']));
				}else{
					$procesedDate = "";
				}	                                
				echo $this->Form->input('bronce',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Bronce',
		                                      'value'=>$procesedDate,
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
		</tr>		
		
		<tr class="all">
			<td width="25%">				
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['foto']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['foto']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('foto',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'label'=>'Foto',
		                                      'value'=>$procesedDate,
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>
			<td width="25%">
				<div style="margin-top:25px">
				<?php echo $this->Form->input('terminada',array('label'=>'Terminada', 'div' => false)); ?>
				</div>
			</td>
			<td width="25%">
				<div style="margin-top:25px">
					<?php echo $this->Form->input('yaentregada',array('label'=>'Entregada', 'div' => false)); ?>
				</div>
			</td>
			<td width="25%">				
				<?php 
				$isDate = validateDate($this->request->data['Ordentrabajo']['entregada']);
				if($isDate){
					$procesedDate = date('d-m-Y',strtotime($this->request->data['Ordentrabajo']['entregada']));
				}else{
					$procesedDate = "";
				}
				echo $this->Form->input('entregada',array(
		                                      'class'=>'datepicker', 
		                                      'type'=>'text',
		                                      'value'=>$procesedDate,
		                                      'style'=>'width:75%'
		                                      )); ?>
			</td>			
		</tr>
		<tr class="all">
			<td  colspan="1">
				<?php echo $this->Form->input('material',array('label'=>'Material','type'=>'textarea','rows' => 2)); ?>
			</td>
			<td  colspan="1">
				<?php echo $this->Form->input('medidas',array('label'=>'Medidas','type'=>'textarea','rows' => 2)); ?>
			</td>
            <td id="tdDetalleObservacion"  colspan="4">
				<?php echo $this->Form->input('tipoycolorletra',array('label'=>'Tipo y Color de Letra','type'=>'textarea','rows' => 2)); ?>
            </td>	
        </tr>
		<tr class="all">
			<td colspan="4" style="text-align:center"><h2><?php echo __('Observaciones'); ?></h2></td>
		</tr>
		<tr class="all">
            <td class="td_3">
                <?php 
                echo $this->Form->input('observaciondescripcion',array(
					'type'=>'textarea',
                	'label'=>'Descripcion',
                	'style' => 'max-width:240px;display: inline', 
                	'onChange'=>'')); 
            	?>
                <input type="button" style="display:inline;" value="Agregar Observacion" id="btnAgregarObservacion" onClick="agregarobservacion()" class="btn_ot"/>
            </td>
            <td id="tdDetalleObservacion" class="td_4" colspan="4">
            	<table id="tableObservaciones" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>Descripcion</th>
							<th>Creador</th>
							<th>Creado el</th>
							<th>Acciones</th>
						</tr>						
					</thead>
					<tbody>						
						<?php
                        $k=0;
						foreach ($this->request->data['Observacione'] as $k => $observacion) {
							?>
                            <tr id="RowObservacion<?php echo $observacion['id'] ?>" class="all">
                                <td>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.id',['value'=>$observacion['id'],'type'=>'hidden','disabled'=>true]) ?>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.descripcion',['type'=>'textarea','value'=>$observacion['descripcion'],'disabled'=>true]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.usuario_id',[
                                    	'value'=>$observacion['User']['nombre'],
                                    	'options'=>$users,
                                    	'disabled'=>true
                                    ]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Observacione.'.$k.'.created',[
                                    	'type'=> 'text',
                                    	'value'=>date('d-m-Y',strtotime($observacion['created'])),
                                    	'disabled'=>true
                                    ]) ?>
                                </td>
                                <td>
                                    <!--<input  type="button" value="X"  title="Eliminar" onclick="eliminarObservacionGuardada(<?php echo $observacion['id']; ?>)" class="eliminar">-->
                                </td>
							</tr>
							<?php
						}?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numObservacion',array('value'=>$k+1,'type'=>'hidden')); ?>
                <?php echo $this->Form->input('userName',array('value'=>$this->Session->read('Auth.User.username'),'type'=>'hidden')); ?>
                <?php echo $this->Form->input('userId',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>

            </td>	
        </tr>
        <tr class="all">
            <td colspan="2" class="td_1">
                <h2>Productos</h2>
            </td>
            <td colspan="2" class="td_2">
                <h2>Pagos</h2>
            </td>
            <td colspan="2" class="td_2" style="display:none">
                <h2>Mano de Obra</h2>
            </td>
        </tr>
        <tr class="all">
            <td class="td_3">
                <!--<?php echo $this->Form->input('productodetalle_id',array('label'=>'Producto','onChange'=>'getDetallesProducto()', 'style' => 'max-width:240px')); ?>-->
                <?php echo $this->Form->input('producto_id',array('label'=>'Producto','style' => 'max-width:240px', 'onChange'=>'getDetallesProducto()')); ?>
                <input type="button" value="Agregar Producto" id="btnAgregarProducto" onClick="agregarproducto()" class="btn_ot"/>
            </td>
            <td id="tdDetalleProducto" class="td_4">

            </td>

            <td class="td_5" colspan="2">
            	<table>
            		<tr class="all">
            			<td>
			                <?php
			                echo $this->Form->input('montoPagado',array('label'=>'Monto pagado','type'=>'number'));
			                ?>
			            </td>
			            <td>
			                <?php
			                echo $this->Form->input('medioPago',array(
			                	'label'=>'Medio de pago',
			                	'options'=>[
			                		'efectivo'=>'Efectivo',
			                		'tarjeta'=>'Tarjeta',
			                		'tarjeta debito'=>'Tarjeta Debito',
			                		'tarjeta credito'=>'Tarjeta Credito',
			                		'cheque'=>'Cheque',
			                		'transferencia'=>'Transferencia'
			                	],
			                ));
			                ?>
			            </td>
			            <td>
                			<input type="button" value="Agregar Pago" id="btnAgregarPago" onClick="agregarpago()" class="btn_ot" />
                		</td>
                	</tr>
                </table>
            </td>

            <td id="tdDetalleManodeobra" class="td_6" style="display:none">
            </td>

            <td class="td_5" style="display:none">
                <?php
                echo $this->Form->input('manodeobra_id',array('label'=>'Mano de obra','onChange'=>'getDetallesManoDeObra()'));
                ?>
                <!--<?php echo $this->Html->image('add.png', array('id' => 'btnAgregarManoDeObra','onClick' => 'agregarmanodeobra()', 'class' => 'image', 'title' =>'Agregar mano de obra'));?>	-->
                <input type="button" value="Agregar Mano de Obra" id="btnAgregarManoDeObra" onClick="agregarmanodeobra()" class="btn_ot"/>
            </td>
            <td id="tdDetalleManodeobra" class="td_6" style="display:none">
            </td>
        </tr>
        <tr class="all">
			<td colspan="2">
				<table id="tableDOT" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Descripcion</th>
						</tr>						
					</thead>
					<tbody>						
						<?php
                        $k=0;
						foreach ($this->request->data['Detalleordentrabajo'] as $k => $producto) {
							?>
                            <tr id="RowDetalle<?php echo $producto['id'] ?>" class="all">
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.id',['value'=>$producto['id'],'type'=>'hidden']) ?>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.nombreproducto',['value'=>$producto['Producto']['nombre']]) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.precio',['value'=>$producto['precio'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.cantidad',['value'=>$producto['cantidad'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->input('Detalleordentrabajo.'.$k.'.descripcion',['value'=>$producto['descripcion'],'class'=>'recalculable']) ?>
                                </td>
                                <td>
                                    <input  type="button" value="X"  title="Eliminar" onclick="eliminarDetalleGuardado(<?php echo $producto['id']; ?>)" class="eliminar">
                                </td>
							</tr>
							<?php
						}?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numDetalle',array('value'=>$k+1,'type'=>'hidden')); ?>
            </td>
            <td colspan="2">
				<table id="tablePagos" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<tr class="all">
							<th>Num Pago</th>
							<th>Fecha</th>
							<th>Monto</th>
							<th>Metodo</th>
						</tr>						
					</thead>
					<tbody>						
						<?php
                        $j=0;
						foreach ($this->request->data['Pago'] as $j => $pago) {
							?>
                            <tr id="RowPago<?php echo $pago['id'] ?>" class="all">
                                <td>
                                    <?php echo $this->Form->label($pago['id']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($pago['fecha']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($pago['montodejado']) ?>
                                    <?php echo $this->Form->input('montodejado'.$pago['id'], ['value'=>$pago['montodejado'], 'type'=>'hidden', 'class'=>'pagadoYaCargado']) ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->label($pago['mediodepago']) ?>
                                </td>
                                <td>
                                    <input  type="button" value="I"  title="Imprimir" onclick="Imprimir(<?php echo $pago['id']; ?>)" class="imprimir">
                                    <input  type="button" value="X"  title="Eliminar" onclick="eliminarPagoGuardado(<?php echo $pago['id']; ?>)" class="eliminar">
                                </td>
							</tr>
						<?php
						} ?>						
					</tbody>
				</table>
                <?php echo $this->Form->input('numPago',array('value'=>$j+1,'type'=>'hidden')); ?>
            </td>
			<td colspan="2" style="display:none">
				<?php echo $this->Form->input('numDetalleManoDeObra',array('value'=>0,'type'=>'hidden')); ?>
				<table id="tableDMOXOT" cellpadding="0" cellspacing="0" class="tbl_add">
					<thead>
						<th>Mano de obra</th>
						<th>Precio</th>						
						<th>Cantidad</th>						
					</thead>
					<tbody>
						<?php 
						foreach ($this->request->data['Manoobraxordentrabajo'] as $producto) {
							?>
							<tr>
								<td><?php echo $producto['Manodeobra']['nombre']?></td>
								<td><?php echo $producto['precio']?></td>
								<td><?php echo $producto['cantidad']?></td>
							</tr>
							<?php
						}?>	
					</tbody>
				</table>
			</td>
		</tr>
        <tr class="all">
            <td colspan="4">
                <table cellpadding="0" cellspacing="0">
                    <tr class="all">
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Precio</label>
                        </td>
                        <td width="40%">
                            <?php echo $this->Form->input('costo', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Pagado</label>
                        </td>
                        <td width="40%">
                            <?php echo $this->Form->input('pagado', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
                        <td style="text-align: right; vertical-align:middle;">
                            <label class="lbl_ot">Saldo Total</label>
                        </td>
                        <td width="40%">
                            <?php echo $this->Form->input('saldoTotal', array('type' => 'money','value'=>0, 'label'=>'', 'style' => 'width:90%; font-size:150%;')); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="all">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?php echo $this->Form->end(__('Aceptar')); ?></td>
			<td><?php echo $this->Html->link(__('Cancelar'),array('action' => 'index'), array('class' => 'btn_cancelar')); ?></td>
		</tr>
	</table>	
</div>
<!-- popin Clientes -->



<div>
<a href="#x" class="overlay" id="lnkListaClientes"></a>
	<div id="divListaClientes" class="popup" style="width:500px">
		<div class='section body'>
    		<div id="form_ListaClientes">        			
    			<table id="tblListaClientes" cellpadding="0" cellspacing="0" style="width:100%">         				
					<thead>
					<tr>
						<th>Nombre</th>												
						<th style="text-align:center" class="actions"><?php echo __('Acciones'); ?></th>
					</tr>
					</thead>
					<tfoot>
						<tr>								  
				            <th></th>			
				            <th></th>              	
						</tr>
					</tfoot>
					<tbody>
					<?php foreach ($tablaclientes as $clientess): ?>
					<tr>		
						<td>
							<!--<a href="#" onlick="SeleccionarCliente(2)">
								
							</a>-->
							<?php echo h($clientess['Cliente']['nombre']); ?>
						</td>	
						<td class="actions">																		
							<?php echo $this->Form->button('Seleccionar', 
		                                        	array('type' => 'button',                      
				                                          'title' =>"Agregar usuario",
				                                          'onClick' => "SeleccionarCliente(".$clientess['Cliente']['id'].")",
				                                          'cursor' => "pointer"               
			                                            )	            							
		                    					  );
		            		?> 
						</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>					
    		</div>
    	</div>
    	<a class="close" href="#close"></a>
	</div>		
</div>
<!-- FIn popin Clientes -->
<?php
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    if(in_array($date,['0000-00-00','01-01-1970','1970-01-01',''])){
        return false;
    }
    return $d && 1 == 1;
}?>