<?php
	session_start();

	if(!$_SESSION["validar"])
	{
		header("location:index.php?action=ingreso");
		exit();
	}
?>
<h2>Usuarios</h2>
<table>
	<tr>
		<td>Usuario</td>
		<td>Contraseña</td>
		<td>Correo</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
	<?php
		$verUsuarios = new MvcController();
		$verUsuarios->verUsuariosController();
		$verUsuarios-> eliminarUsuariosController();
	?>
</table>
<?php

	if( isset($_GET["action"]) )
	{
		if( $_GET["action"] == "cambio" )
		{
			echo "Cambio Exitoso";

		}else if( $_GET["action"] == "eliminado" )
		{
			echo "Usuario eliminado";
		}
	}

?>