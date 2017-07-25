<?php 

require_once "conexion.php";

class Datos extends Conexion {

	# Registro de usuarios
	# ----------------------------------------------------------------------------------

	public function registroUsuarioModel ($datos, $tabla){
		$stmt = Conexion::conectar()->prepare( "INSERT INTO $tabla (usuario, password, email) 
			VALUES (:usuario, :password, :email)" );

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "success";
		} else {
			return "Error";
		}

	}

}
?>