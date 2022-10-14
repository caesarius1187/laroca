<div class="page-container">
	
	<?php echo $this->Html->image('logo_login.png', array('alt' => 'In Memoriam', 'width' => '350')); ?>
	<form action="users/login" controller="users" id="UserLoginForm" method="post" accept-charset="utf-8">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
		</div>
		<fieldset>
			<input type="text" name="data[User][username]" class="username" placeholder="Usuario">
	        <input type="password" name="data[User][password]" class="password" placeholder="Contraseña">
	        <button type="submit">INGRESARss</button>
	        <div class="error"><span>+</span></div>
		</fieldset>
	</form>
</div>




