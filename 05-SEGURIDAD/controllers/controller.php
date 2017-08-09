<?php
/**
* Clase para el controlador global
*/

class MvcController
{

//#)- Var Globales			| --------------------------------------------------------------------------------------#
	
	public $expName = '/^[a-zA-Z0-9]*$/';
	public $expPassword = '/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/';
	public $expMail = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';


	//)- End |----------------------------------------------------------------------------------------------------------------#

//#)- Llamada a la plantilla | ------------------------------------------------------------------------------------------#

	public function template ()
	{
		include 'views/template.php';
	}
	//)-  	End |------------------------------------------------------------------------------------------------------------#

//#)- Intereacción del Usuario | --------------------------------------------------------------------------------------#

	public function enlacesPaginasController()
	{

		if(isset($_GET["action"])){
			$linkController = $_GET["action"];
		} else{
			$linkController = "index";
		}

		$respuesta = EnlacesPaginas::enlacesPaginasModel( $linkController );

		include $respuesta;
	}
	//)-  	End |--------------------------------------------------------------------------------------------------------#

//#)- Registro de Usuarios | --------------------------------------------------------------------------------------#

	public function registroUsuarioController()
	{
		if(isset($_POST["usuario"]))
		{
			//  preg_macth(); = Realiza una comparación con una expresión regular.
			if (preg_match($this->expName, $_POST["usuario"]) && preg_match($this->expPassword, $_POST["password"]) && preg_match($this->expMail, $_POST["email"]))
			{

				// crypt(); = devolverá el hash de un string utilizando el algoritmo estándar basado en DES de Unix o algoritmos alternativos que puedan estar disponibles en el sistema.

				$encriptar = crypt($_POST["password"], '$2a$07$usesomesillystringforsalt$');

				$datosController = array(
						'usuario' 	=>	$_POST["usuario"] ,
						'password' 	=> 	$encriptar,
						'email' 		=> 	$_POST["email"]
					 );

				$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

				// printVar($respuesta , "Respuesta");

				if($respuesta == "success")
				{
					header("location:index.php?action=ok");
				}else{
					header ("location:registro.php");
				}
			}else{
				header("location:index.php?action=error");
			}
		}
	}
	//)-  	End |------------------------------------------------------------------------------------------------------------#

//#)- Login de Usuarios | ---------------------------------------------------------------------------------------------#

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
	//)-  	End |------------------------------------------------------------------------------------------------------------#

//#)- 	Ver Usuarios		| --------------------------------------------------------------------------------------#

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
			echo "<td> <a href='index.php?action=usuarios&idEliminar=".$value["id"]."'>Eliminar</a></td>";
			echo "</tr>";
		}

		// printVar($respuesta, "Ver Usuarios");
	}

	//)-  	End |------------------------------------------------------------------------------------------------------------#

//#)- Editar Usuarios 		|---------------------------------------------------------------------------------------#

	public function editarUsuariosController ()
	{
		$datos = $_GET['id'];
		$respuesta = Datos::editarUsuarios($datos, "usuarios");
		// Creamos los campos para cargar la info del usuario.
		echo "<input type='hidden' value='".$respuesta['id']."' name='idEditar'/>";
		echo "<input id='usuarioE' type='text' name='usuarioEditar'  maxlength='10' value='".$respuesta['usuario']."'/><br>";
		echo "<input id='passwordE' type='text' name='passwordEditar'  maxlength='10' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='La contraseña debe tener minimo 8 caracteres entre ellos número, Mayuscula  y Minusculas' value='".$respuesta['password']."'/><br>";
		echo "<input id='emailE' type='text' name='emailEditar'  maxlength='30' value='".$respuesta['email']."'/><br><br>";
		echo "<input type='submit' value='Actualizar Datos'>";
		echo "<div class='msnForm'></div>";
		echo "<a href='index.php?action=usuarios'> Cancelar </a>";
	}

	//)- End |----------------------------------------------------------------------------------------------------------------#

//#)- Actualizar Usuarios	| --------------------------------------------------------------------------------------#

	public function actualizarUsuariosController ()
	{
		if (preg_match($this->expName, $_POST["usuarioEditar"]) &&  preg_match($this->expPassword, $_POST["passwordEditar"]) && preg_match($this->expMail, $_POST["emailEditar"]))
		{
			if (isset($_POST['usuarioEditar'])) {

				$encriptar = crypt($_POST["passwordEditar"], '$2a$07$usesomesillystringforsalt$');
				
				$datos = array(
						'id' 		=>	$_POST["idEditar"] ,
						'usuario' 	=>	$_POST["usuarioEditar"] ,
						'password' 	=> 	$encriptar,
						'email' 		=> 	$_POST["emailEditar"]
					 );

				$respuesta = Datos::actualizarUsuarios($datos, "usuarios");

				if($respuesta == "success")
				{
					header("location:index.php?action=cambio");
				}else{
					echo "Error al actualizar Dato";
				}

			}
		}
	}


	//)-  	End |------------------------------------------------------------------------------------------------------------#

//#)- 	Eliminar Usuarios		| --------------------------------------------------------------------------------------#

	public function eliminarUsuariosController ()
	{
		if (isset($_GET['idEliminar'])) {
			$datos = $_GET['idEliminar'];

			$respuesta = Datos::eliminarUsuarios($datos, "usuarios");

			printVar($respuesta, "Eliminar 2");

			if($respuesta == "success")
			{
				header("location:index.php?action=eliminado");
			}else{
				echo "Error al actualizar Dato";
			}

		}
	}
	//)-  	End |------------------------------------------------------------------------------------------------------------#
}
?>