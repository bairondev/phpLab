<?php
/**
* Clase para el controlador global
*/
class MvcController
{
	# Llamada a la plantilla
	# ----------------------------------------------------------------------------------

	public function template ()
	{
		include 'views/template.php';
	}

	# Intereacción del Usuario
	# ----------------------------------------------------------------------------------

	public function enlacesPaginasController(){


		if(isset($_GET["action"])){
			$linkController = $_GET["action"];
		} else{
			$linkController = "index";
		}

		$respuesta = EnlacesPaginas::enlacesPaginasModel( $linkController );

		include $respuesta;

	}

	# Registro de Usuarios
	# ----------------------------------------------------------------------------------

	public function registroUsuarioController()
	{

		if(isset($_POST["usuario"]))
		{
			$datosController = array(
					'usuario' 	=>	$_POST["usuario"] ,
					'password' 	=> 	$_POST["password"],
					'email' 		=> 	$_POST["email"]
				 );

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			// echo $respuesta;

			// printVar($respuesta , "Respuesta");

			if($respuesta == "success")
			{
				header("location:index.php?action=ok");
			}else{
				header ("location:registro.php");
			}
		}
	}

	# Login de Usuarios
	# ----------------------------------------------------------------------------------

	public function loginUsuariosController ()
	{
		if(isset($_POST["usuario"]))
		{
			$datosController = array(
					'usuario' 	=>	$_POST["usuario"] ,
					'password' 	=> 	$_POST["password"]
				 );

			$respuesta = Datos::loginUsuarios($datosController, "usuarios");


			// printVar($respuesta["usuario"] , "Respuesta");

			if($respuesta["usuario"] == $_POST['usuario'] && $respuesta["password"] == $_POST['password'])
			{
				//  Inicializamos la var Seccion para acceder al contenido.
				session_start();
				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");
			}else{
				header ("location:index.php?action=fallo");
			}
		}
	}

	# Consultar Usuarios
	# ----------------------------------------------------------------------------------

	public function verUsuariosController ()
	{
		$respuesta = Datos::verUsuarios("usuarios");
		//  Iteramos el arreglo con los datos
		foreach ($respuesta as $usuario => $value) {
			echo "<tr>";
			echo "<td>".$value["usuario"]."</td>";
			echo "<td>".$value["password"]."</td>";
			echo "<td>".$value["email"]."</td>";
			echo "<td> <a href='index.php?action=editar&id=".$value["id"]."'>Editar</a></td>";
			echo "<td> <a href='#'>Eliminar</a></td>";
			echo "</tr>";
		}

		// printVar($respuesta, "Ver Usuarios");
	}

	# Editar Usuarios
	# ----------------------------------------------------------------------------------

	public function editarUsuariosController ()
	{
		$datos = $_GET['id'];
		$respuesta = Datos::editarUsuarios($datos, "usuarios");
		// Creamos los campos para cargar la info del usuario.
		echo "<input type='hidden' value='".$respuesta['id']."' name='idEditar'/>";
		echo "Usuario: <br> <input type='text' name='usuarioEditar'  value='".$respuesta['usuario']."'/><br>";
		echo "Password: <br> <input type='text' name='passwordEditar'  value='".$respuesta['password']."'/><br>";
		echo "Email: <br> <input type='text' name='emailEditar'  value='".$respuesta['email']."'/><br>";
		echo "<br> <input type='submit' value='Actualizar Datos'>";


		printVar($respuesta, "Información Usuario");
	}

	# Actualizar Usuarios
	# ----------------------------------------------------------------------------------

	public function actualizarUsuariosController ()
	{

		if (isset($_POST['usuarioEditar'])) {
			$datosController = array(
					'id' 		=>	$_POST["idEditar"] ,
					'usuario' 	=>	$_POST["usuarioEditar"] ,
					'password' 	=> 	$_POST["passwordEditar"],
					'email' 		=> 	$_POST["emailEditar"]
				 );
		}

		$respuesta = Datos::actualizarUsuarios($datosController, "usuarios");
		
		if($respuesta == "success")
			{
				header("location:index.php?action=cambio");
			}else{
				echo "Error al actualizar Dato";
			}

	}

}
?>