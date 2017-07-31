<?php
function printVar( $variable, $title = "" )
{
  $var = print_r( $variable, true );
  echo "<script> function cerrarVar(){ document.getElementById('cerrarVar').style.display = 'none';}</script>";
  // echo "<pre id='cerrarVar' style='background-color:#262626;color:#469997; border: dashed thin #fff;position:absolute;top:0;padding:20px;'><a href='#' onclick='cerrarVar()' style='position:relative;top:-8px;right:13px;color:#fff;border:1px solid #fff;padding:5px 10px;text-decoration:none'>x</a><div style='max-height:500px;overflow-y:scroll;padding:0 20px;'><strong>[$title]</strong> $var</div></pre>";
   echo "<textarea id='cerrarVar' style='background-color:rgba(0, 0, 0, 0.84);color:rgb(18, 182, 201);box-shadow: 7px 11px 14px rgba(0, 0, 0, 0.4); border: 1px solid rgb(153, 153, 153);position:absolute;top:0;padding:20px;left:0;width:343px;height:350px;'>[$title] $var </textarea>";
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