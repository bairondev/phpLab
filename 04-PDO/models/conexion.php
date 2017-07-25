<?php 
/**
* 
*/

class Conexion
{
	
	public function conectar ( )
	{
		$conexion = new PDO("mysql:host=localhost;dbname=cursophp","root","root");
		return $conexion;
	}
} 
 ?>