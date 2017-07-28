<?php
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