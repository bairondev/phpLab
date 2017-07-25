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

	public function registroUsuarioController(){

		if(isset($_POST["usuario"]))
		{
			$datosController = array(
					'usuario' 	=>	$_POST["usuario"] ,
					'password' 	=> 	$_POST["password"],
					'email' 		=> 	$_POST["email"]
				 );

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			// echo $respuesta;

			if($respuesta == "success")
			{
				header("location:index.php?action=ingreso");
			}else{
				header ("location:registro.php");			
			}
		}
	}
}
?>