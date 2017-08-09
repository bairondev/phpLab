<h2>Registro</h2>

<form method="post" onsubmit="return validarRegistro();">
	Usuario:
	<input id="usuarioR" type="text" name="usuario"  placeholder="Usuario" maxlength="10" required/>
	<br>
	<br>
	Contraseña:
	<input id="passwordR" type="password" name="password" maxlength="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener minimo 8 caracteres entre ellos número, Mayuscula  y Minusculas"  placeholder="Contraseña" required/>
	<br>
	<br>
	Correo:
	<input id="emailR" type="email" name="email" maxlength="30" placeholder="Correo" required/>
	<br>
	<br>
	<div class="terminos">
		<input id="terminosR" type="checkbox" name="terminos"> Acepto términos y condiciones.
	</div>
	<div class="msnForm"></div>
	<br>
	<input type="submit" value="Enviar">
</form>

<?php
	$registro = new MvcController();
	$registro -> registroUsuarioController();

	if (isset($_GET["action"]))
	{
		if($_GET["action"] == "ok"){
			echo "¡Registro Existoso!";
		}else if($_GET["action"] == "error")
		{
			echo "Error al realizar el Registro";
		}
	}
?>