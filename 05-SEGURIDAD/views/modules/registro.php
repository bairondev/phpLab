<h2>Registro</h2>

<form method="post" onsubmit="return validarRegistro();">
	Usuario:
	<input type="text" name="usuario"  placeholder="Usuario" />
	<br>
	<br>
	Contraseña:
	<input type="password" name="password"  placeholder="Contraseña" />
	<br>
	<br>
	Correo:
	<input type="email" name="email"  placeholder="Correo" />
	<br>
	<br>
	<input type="submit" value="Enviar">
</form>

<?php
$registro = new MvcController();
$registro -> registroUsuarioController();

if (isset($_GET["action"]))
{
	if($_GET["action"] == "ok"){
		echo "<script> </script>";
		echo "¡Registro Existoso!";
	}
}
?>