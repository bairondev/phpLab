<?php
function printVar( $variable, $title = "" )
{
  $var = print_r( $variable, true );
  echo "<pre style='background-color:#f1f1f3;color:#339c9a; border: dashed thin #42c2c0;'><strong>[$title]</strong> $var</pre>";
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