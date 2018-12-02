<?php ob_start();
include('top.php');
if (isset($_SESSION['nickname'])) {
	$nick = $_SESSION['nickname'];
}?>
<!DOCTYPE html lang="es">
<html>
	<head>
		<title>FastPlayers</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/skeleton.css" />
		<link rel="stylesheet" href="../css/styles.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	</head>
	<body>
		<div id="container">
			<!-- Header -->
			<header>
				
					<div class="row">
						<div class="columns one offset-by-one logo">
							<a href="/"><i class="fab fa-foursquare k f r"></i></a>
						</div>
						<div class="columns one burguer h i">
							<div class="f"><i class="fas fa-bars"></i></div>
						</div>
						<nav>
							<div class="menu columns four offset-by-five">
								<div class="row">
									<ul class="c t">
										<div class="column one offset-by-one b g t">
											<a href="index.php" class="e"><i class="fa fa-home k r"></i></a>
										</div>
										<div class="column one offset-by-one b g t">
											<a href="search.php" class="e"><i class="fa fa-search k r"></i></a>
										</div>
									<?php if (!isset($_SESSION['idusers'])) {?>
										<div class="column one offset-by-two b g t">
											<a class="d e" href='login.php'>
												<button class="button button-primary"><i class="fa fa-sign-in-alt"></i> Iniciar Sesión</button>
											</a>
										</div>
										<div class="columns one offset-by-four b g t">
											<a href="register.php">
												<button class="button button-primary"><i class="fa fa-bolt"></i> Registrarse</button>
											</a>
										</div>
									<?php } else {?>
											<div class="column one offset-by-two b g t">
												<a href="account.php" class="e">
													<button class="button d r z"><?php echo $nick; ?></button>
												</a>
											</div>
											<div class="column one offset-by-three b g t">
												<a href="logout.php" class="d e">
													<button class="button button-primary">
														<i class="fa fa-sign-out-alt"></i><span>Desconectarse</span>
													</button>
												</a>
											</div>
									<?php }?>
									</ul>
								</div>
							</div>
						</nav>
					</div>
			</header>
		<!-- Header -->

				