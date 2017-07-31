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

			// echo $respuesta;

			// printVar($respuesta["usuario"] , "Respuesta");

			if($respuesta["usuario"] == $_POST['usuario'] && $respuesta["password"] == $_POST['password'])
			{
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

		foreach ($respuesta as $usuario => $value) {
			echo "<tr>";
			echo "<td>".$value["id"]."</td>";
			echo "<td>".$value["usuario"]."</td>";
			echo "<td>".$value["password"]."</td>";
			echo "<td>".$value["email"]."</td>";
			echo "</tr>";
		}

		// echo $respuesta;

		printVar($respuesta, "Ver Usuarios");
	}

}
?>