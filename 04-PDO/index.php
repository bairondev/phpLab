<?php

require_once "models/model.php";
require_once "controllers/controller.php";
require_once "models/crud.php";

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

$mvc = new MvcController();
$mvc -> template();


?>