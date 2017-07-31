<h2>Usuarios</h2>
<table>
	<tr>
		<td>ID</td>
		<td>Usuario</td>
		<td>Contraseña</td>
		<td>Correo</td>
	</tr>
	<?php 
	$verUsuarios = new MvcController();
	$verUsuarios->verUsuariosController();

	?>
</table>