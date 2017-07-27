<?php
$registro = new MvcController();
$registro -> registroUsuarioController();

if (isset($_GET["action"])) 
{
	if($_GET["action"] == "ok"){

		echo "¡Registro Existoso!";
	}
}
?>
<h2>Registro</h2>

<form method="post">
	Usuario:
	<input type="text" name="usuario"  placeholder="Usuario" required/> 
	<br>
	<br>
	Contraseña:
	<input type="password" name="password"  placeholder="Contraseña" required/> 
	<br>
	<br>
	Correo:
	<input type="email" name="email"  placeholder="Correo" required/> 
	<br>
	<br>
	<input type="submit" value="Enviar">
</form>