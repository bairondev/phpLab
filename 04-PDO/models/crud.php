<?php

require_once "conexion.php";

class Datos extends Conexion {

	# Registro de usuarios
	# ----------------------------------------------------------------------------------

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

	}

	# Login Usuarios
	# ----------------------------------------------------------------------------------

	public function loginUsuarios($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla");
		$stmt -> bindParam("usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetch();
	}

	# Ver Usuarios
	# ----------------------------------------------------------------------------------

	public function verUsuarios($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();

		return $stmt->fetchAll();
	}

}
?>