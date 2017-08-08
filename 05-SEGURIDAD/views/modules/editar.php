<?php
	session_start();

	if(!$_SESSION["validar"])
	{
		header("location:index.php?action=ingreso");
		exit();
	}
?>

<h2>Editar Usuario</h2>
<br>

<form method="post" onsubmit="return validarEditar();">
<?php
$editar = new MvcController();
$editar -> editarUsuariosController();
$editar -> actualizarUsuariosController();

?>
</form>
