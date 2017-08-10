<?php

require_once "conexion.php";

class Datos extends Conexion {

//#)- Registrar Usuarios	| --------------------------------------------------------------------------------------#

	public function registroUsuarioModel ($datos, $tabla)
	{
		// prepare(); = le pasamos el query del SQL para realizar nuestra consulta.
		$stmt = Conexion::conectar()->prepare( "INSERT INTO $tabla (usuario, password, email)
			VALUES (:usuario, :password, :email)" );
		// bindParam(); = permite relacionar un campo especifico de la tabla.
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

		//  execute(); = Ejecuta las intruscciones anteriores, rertona true or false.
		if($stmt->execute()){
			return "success";
		} else {
			return "Error";
		}

		//  close(); = para cerrar de forma segura las conexiones
		$stmt->close();
	}

	//)- End |-------------------------------------------------------------------------------------------------------#

//#)- Login Usuarios		| --------------------------------------------------------------------------------------#

	public function loginUsuarios($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario");
		$stmt -> bindParam("usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetch();

		$stmt->close();
	}

	//)- End |-------------------------------------------------------------------------------------------------------#

//#)- Ver Usuarios		| --------------------------------------------------------------------------------------#

	public function verUsuarios($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	//)- End |--------------------------------------------------------------------------------------------------------#

//#)- Editar Usuarios		| --------------------------------------------------------------------------------------#

	public function editarUsuarios($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email  FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);
		$stmt -> execute();

		return $stmt->fetch();

		$stmt->close();
	}

	//)- End |--------------------------------------------------------------------------------------------------------#

//#)- Actualizar Usuarios	| --------------------------------------------------------------------------------------#

	public function actualizarUsuarios($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		printVar($stmt->execute(), "Modelo");

		if($stmt->execute()){
			return "success";
		} else {
			return "Error";
		}

		$stmt->close();
	}

	//)- End |--------------------------------------------------------------------------------------------------------#

//#)- Eliminar Usuarios	| --------------------------------------------------------------------------------------#

	public function eliminarUsuarios($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		} else {
			return "Error";
		}

		$stmt->close();
	}

	//)- End |-------------------------------------------------------------------------------------------------------#

//#)- Validar Intentos de Usuarios| --------------------------------------------------------------------------------------#

	public function validarIntentos($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");
		$stmt->bindParam(":intentos", $datos["intentosActual"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["userActual"], PDO::PARAM_STR);

		if( $stmt->execute() ){
			return "success";
		} else {
			return "Error";
		}

	}

	//)- End |--------------------------------------------------------------------------------------------------------------#
}

?>