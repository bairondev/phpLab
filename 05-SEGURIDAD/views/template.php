<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seguridad</title>
	<link rel="stylesheet" href="views/css/style.css">
</head>
<body>
<header>
	<h2>Logo</h2>
	<?php include "modules/nav.php" ?>
	</header>
<section>
<?php
	$mvc = new MvcController();
	$mvc -> enlacesPaginasController();
?>
</section>
<script src="views/js/validar.js"></script>
</body>
</html>