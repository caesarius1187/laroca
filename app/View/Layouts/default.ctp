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

$cakeDescription = __d('cake_dev', 'In Memorian');
?>
<!DOCTYPE html>
<html>

<head>
	<script type="text/javascript">
		var serverLayoutURL = "/inmemorian";
	</script>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->script('jquery');
	echo $this->Html->script('jquery-ui');
	echo $this->Html->script('jquery.dataTables');
	echo $this->Html->script('menu');
	echo $this->Html->script('chosen.jquery');
	echo $this->Html->css('cake.generic');
	echo $this->Html->css('demo_table');
	echo $this->Html->css('md_buttons');
	echo $this->Html->css('popin');
	echo $this->Html->css('chosen');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>

<body>
	<div id="container">
		<script>

		</script>
		<div id="header">
			<!--<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>-->
			<?php echo $this->Html->image('logo_header.png', array('alt' => 'Azul Refrigeracion', 'height' => '60')); ?>
			<!--<div style="height:60px; width:200px"><h1>INMEMORIAN</h1></div>-->

			<?php if ($this->Session->read('Auth.User.username')) { ?>

				<!--<div style="float:right;">-->
				<div style="float:right; margin: 42px 5px 0 0;">
					<?php echo 'Bienvenido ' . $this->Session->read('Auth.User.username') . '!'; ?>
					<?php echo $this->Html->link(
						"Salir",
						array(
							'controller' => 'users',
							'action' => 'logout',
						)
					); 	?>
				</div>
			<?php } ?>

			<div id='cssmenu'>
				<ul>
					<li class='active has-sub'><a href='#'><span>Clientes</span></a>
						<ul>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Lista de Clientes",
									array(
										'controller' => 'clientes',
										'action' => 'index',
									)
								);
								?>
							</li>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Tipo de Clientes",
									array(
										'controller' => 'tipoclientes',
										'action' => 'index',
									)
								);
								?>
							</li>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Lista Ordenes de Trabajo",
									array(
										'controller' => 'ordentrabajos',
										'action' => 'index',
									)
								);
								?>
							</li>
							<li class='has-sub' style="display:none ">
								<?php
								echo $this->Html->link(
									"Mano de Obra",
									array(
										'controller' => 'manodeobras',
										'action' => 'index',
									)
								);
								?>
							</li>
						</ul>
					</li>

					<li class='active has-sub'><a href='#'><span>Productos</span></a>
						<ul>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Lista de Productos",
									array(
										'controller' => 'productos',
										'action' => 'index',
									)
								);
								?>
							</li>
						</ul>
					</li>

					<li class='active has-sub'><a href='#'><span>Egresos</span></a>
						<ul>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Lista de Egresos",
									array(
										'controller' => 'compras',
										'action' => 'index',
									)
								);
								?>
							</li>
						</ul>
					</li>

					<li class='active has-sub'><a href='#'><span>Ventas</span></a>
						<ul>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Lista de Ventas",
									array(
										'controller' => 'ventas',
										'action' => 'index',
									)
								);
								?>
							</li>
						</ul>
					</li>

					<li class='active has-sub'><a href='#'><span>Usuarios</span></a>
						<ul>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Usuarios",
									array(
										'controller' => 'users',
										'action' => 'index',
									)
								);
								?>
							</li>
						</ul>
					</li>
					<li class='active has-sub'><a href='#'><span>Cajas</span></a>
						<ul>
							<li class='has-sub'>
								<?php
								echo $this->Html->link(
									"Lista de Cajas",
									array(
										'controller' => 'cajas',
										'action' => 'index',
									)
								);
								?>
							</li>
						</ul>
					</li>

				</ul>
			</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

	</div>

</body>

</html>