<div class="page-container">
	<img src="../img/logo.png">
	<form action="/sigesazul/web/login" id="UserLoginForm" method="post" accept-charset="utf-8">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
		</div>
		<fieldset>
			<!--<input type="text" name="data[User][username]" class="username" placeholder="Usuario">-->
	        <!--<input type="password" name="data[User][password]" class="password" placeholder="Contraseña">-->
	        <input type="text" name="data[usuarios][username]" class="username" placeholder="Usuario">
	        <input type="password" name="data[usuarios][password]" class="password" placeholder="Contraseña">
	        <button type="submit">INGRESAR</button>
	        <div class="error"><span>+</span></div>
		</fieldset>
	</form>
</div>