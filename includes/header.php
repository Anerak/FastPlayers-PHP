<?php
include('top.php');
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>FastPlayers</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/styles.min.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><img src="images/svg/fplogo.svg" class="logoimg"/>
						<a href="index.php">FastPlayers</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="search.php">Buscador</a>
							</li>
							<?php
							if (!isset($_SESSION['idusers'])) {
								echo "<li><a href='register.php' class='button special'>Registrarse</a></li>
								<li><a href='login.php' class='button special'>Iniciar sesión</a></li>";
							} else {
								echo "<li><a href='account.php' class='special'> " . $_SESSION['nickname'] . "</a></li><li><a href='logout.php' class='button special'>Desconectarse</a></li>";
							}
							?>
						</ul>
					</nav>
				</header>