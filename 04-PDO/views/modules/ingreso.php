<h2>Ingreso</h2>

<form method="post">
	Usuario:
	<input type="text" name="usuario"  placeholder="Usuario" required/>
	<br>
	<br>
	Contraseña:
	<input type="password" name="password"  placeholder="Contraseña" required/>
	<br>
	<br>
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
}
?>