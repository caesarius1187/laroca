<?php 
if(isset($productos['Producto']['precioventa'])){
	echo $this->Form->input('preciodetalle',array(
		'label'=>'Precio',
		'value'=>$productos['Producto']['precioventa'],
		'id'=>'OrdentrabajoPreciodetalle',
		'style'=>'width:40px;'		
		));
	echo $this->Form->input('cantidaddetalle',array(
		'label'=>'Cantidad',
		'value'=>1,
		'id'=>'OrdentrabajoCantidaddetalle',
		//'onChange'=>'checkstock()',
		'style'=>'width:40px;'
		));
	echo $this->Form->input('stockdetalle',array(
		'label'=>'Stock Disponible',
		'value'=>$productos['Producto']['cantidad'],
		'id'=>'OrdentrabajoStockdetalle',
		'disabled'=>'disabled',
		'style'=>'width:40px;'
		));
}else{
	echo "Seleccione un producto";
}?>