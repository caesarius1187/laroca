<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<!--<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>-->			
			<h1>Azul Refrigeración</h1>
			<div class="actions" style="width:100%;">
				<div style="width:100%;margin-bottom:20px">
					<?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?>
					<?php echo $this->Html->link(__('Lista de Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> 

					<?php echo $this->Html->link(__('Nueva Orden de Trabajo'), array('controller' => 'ordentrabajos', 'action' => 'add')); ?> 
					<?php echo $this->Html->link(__('Lista Ordenes de Trabajo'), array('controller' => 'ordentrabajos', 'action' => 'index')); ?> 
					<?php echo $this->Html->link(__('Nueva Venta'), array('controller' => 'ventas', 'action' => 'add')); ?> 
					<?php echo $this->Html->link(__('Lista Ventas'), array('controller' => 'ventas', 'action' => 'index')); ?> 

					<?php echo $this->Html->link(__('Nuevo Detalle Venta'), array('controller' => 'detalleventas', 'action' => 'add')); ?> 
					<?php echo $this->Html->link(__('Lista Detalle Ventas'), array('controller' => 'detalleventas', 'action' => 'index')); ?>					
				</div>		
				<div style="width:100%;margin-bottom:20px">
					<?php echo $this->Html->link(__('Nueva Marca'), array('controller' => 'marcas','action' => 'add')); ?>
					<?php echo $this->Html->link(__('Lista Marcas'), array('controller' => 'marcas', 'action' => 'index')); ?>

					<?php echo $this->Html->link(__('Nuevo Modelo'), array('controller' => 'modelos', 'action' => 'add')); ?> 	
					<?php echo $this->Html->link(__('Lista Modelos'), array('controller' => 'modelos', 'action' => 'index')); ?> 
					
					<?php echo $this->Html->link(__('Nuevo Proveedor'), array('controller' => 'proveedores','action' => 'add')); ?>
					<?php echo $this->Html->link(__('Lista Proveedores'), array('controller' => 'proveedores','action' => 'index')); ?>

					<?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'usuarios','action' => 'add')); ?>
					<?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'usuarios','action' => 'index')); ?>
				</div>
				<div style="width:100%;">
					<?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'productos', 'action' => 'add')); ?> 
					<?php echo $this->Html->link(__('Lista Productos'), array('controller' => 'productos', 'action' => 'index'));  ?> 	
					<?php echo $this->Html->link(__('Nueva Compra'), array('controller' => 'compras', 'action' => 'add')); ?> 
					<?php echo $this->Html->link(__('Lista Compras'), array('controller' => 'compras', 'action' => 'index')); ?> 

					<?php echo $this->Html->link(__('Nuevo Detalle Compra'), array('controller' => 'detallecompras','action' => 'add')); ?>
					<?php echo $this->Html->link(__('Lista Detalle Compras'), array('controller' => 'detallecompras','action' => 'index')); ?>

					<?php echo $this->Html->link(__('Nueva Falla'), array('controller' => 'fallas','action' => 'add')); ?>
					<?php echo $this->Html->link(__('Lista Fallas'), array('controller' => 'fallas','action' => 'index')); ?>
				</div>
			</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<!--<?php echo $this->element('sql_dump'); ?>-->
</body>
</html>
