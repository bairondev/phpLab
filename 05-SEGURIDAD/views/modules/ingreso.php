<h2>Ingreso</h2>

<form method="post" onsubmit="return validarIngreso()">
	Usuario:
	<input  id="usuarioI" type="text" name="usuario"  placeholder="Usuario" maxlength="10" required/>
	<br>
	<br>
	Contraseña:
	<input id="passwordI"  type="password" name="password"  placeholder="Contraseña" maxlength="10" required/>
	<br>
	<br>
	<div class="msnForm"></div>
	<input type="submit" value="Ingresar">
</form>

<?php
$ingreso = new MvcController();
$ingreso -> loginUsuariosController();

if (isset($_GET["action"]))
{
	if($_GET["action"] == "fallo"){
		echo "Usuario y contraseña incorrectos";
	}
	if($_GET["action"] == "fallo2"){
		echo "Lo sentimos acaba de abusar del número de intentos, favor llenar el siguiente captcha";
	}
}

?>

