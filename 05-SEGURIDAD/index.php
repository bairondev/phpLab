<?php
function printVar( $variable, $title = "" )
{
  $var = print_r( $variable, true );
   echo "<textarea id='cerrarVar' style='background-color:rgba(0, 0, 0, 0.84);color:rgb(18, 182, 201);box-shadow: 7px 11px 14px rgba(0, 0, 0, 0.4); border: 1px solid rgb(153, 153, 153);position:absolute;top:0;padding:20px;left:0;width:343px;height:30px;'>[$title] $var </textarea>";
}


// ob_start() funcion de PHP para solucionar los problemas con los header();
ob_start();

// Omitimos todo tipo de msn de error generados por PHP.
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

// Llamamo nuestros componentes.
require_once "models/model.php";
require_once "controllers/controller.php";
require_once "models/crud.php";

// Instanciamos el obj principal para cargar el template base.
$mvc = new MvcController();
$mvc -> template();


?>