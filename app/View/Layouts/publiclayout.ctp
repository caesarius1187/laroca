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

$cakeDescription = __d('cake_dev', 'Azul Refrigeracion');
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

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="background-green">
		background
	</div>
	<div class="page">
		<div class="home-page">
			<div class="sidebar">
				<?php 

					$homeimg = $this->Html->image('logo.png', array('alt' => 'edit',
																	'width' => '100'));
					echo $this->Html->link($homeimg  , array('controller'=>'webs','action' =>"index"), array('escape'=>false,'id' => "logo" ))
				;?>
				<ul>
					<li class="selected home">
						<?php echo $this->Html->link("Inicio", array('controller'=>'webs','action' =>"index" ))?>
					</li>
					<li class="about">
						<?php echo $this->Html->link("Empresa", array('controller'=>'webs','action' =>"search" ))?>
					</li>
					<!--<li class="projects">
						<?php echo $this->Html->link("Proyectos", array('controller'=>'webs','action' =>"projects" ))?>
					</li>
					<li class="blog">
						<?php echo $this->Html->link("Blog", array('controller'=>'webs','action' =>"blog" ))?>
					</li>-->
					<li class="contact">
						<?php echo $this->Html->link("Contacto", array('controller'=>'webs','action' =>"contact" ))?>
					</li>
					<li class="blog">
						<?php echo $this->Html->link("Iniciar", array('controller'=>'users','action' =>"login" ), array( 'target' => '_blank'))?>
					</li>	
				</ul>
				<div class="connect">
					<a href="http://freewebsitetemplates.com/go/facebook/" id="fb">facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">google+</a> <a href="http://freewebsitetemplates.com/go/youtube/" id="youtube">youtube</a>
				</div>
			</div>
			<div class="body">

						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					<div class="footer">
						<p>
							&#169; 2023 Origins Interior Architects
						</p>
						<ul>
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="about.html">About</a>
							</li>
							<li>
								<a href="projects.html">Projects</a>
							</li>
							<li>
								<a href="blog.html">Blog</a>
							</li>
							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>
			</div>
		</div>
	</div>
	
</body>
</html>
