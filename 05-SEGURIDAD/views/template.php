ç<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
	<style>
		body{
			background: #D3D3D3;
			color: #AEAEAE;
			font-family: "Arial";
		}
		header{
			background: #ffffff;
			padding: 20px;
			box-sizing: border-box;
		}
		h2, nav{
			display: inline-block;
			vertical-align: top;
		}
		h2{
			width: 20%;
		}
		nav{
			width: 78%;
			text-align: right;
		}
		nav a{
			color:#4EBAE5;
			font-size: 18px;
			text-align: center;
			padding: 20px;
			display: inline-block;
			vertical-align: top;
			width: auto;
		}
		section{
			background: white;
			padding: 20px;
			margin: 20px 0;
		}
	</style>
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