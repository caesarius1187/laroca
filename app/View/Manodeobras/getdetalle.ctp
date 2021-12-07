<?php 
if(isset($manodeobras['Manodeobra']['precio'])){
	echo $this->Form->input('preciodetallemanodeobra',array(
		'label'=>'Precio',
		'value'=>$manodeobras['Manodeobra']['precio'],
		'id'=>'OrdentrabajoPreciodetallemanodeobra',
		'style'=>'width:30px;'		
		));
	echo $this->Form->input('cantidaddetallemanoobra',array(
		'label'=>'Cantidad',
		'value'=>1,
		'id'=>'OrdentrabajoCantidaddetalleManodeobra',
		'style'=>'width:30px;'
		));	
}else{
	echo "Seleccione una mano de obra";
}?>