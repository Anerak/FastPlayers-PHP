<?php
include('./inc/header.php');
?>
<!-- Main -->
<main>
	<div class="container">
		<div class="row">
			<div class="columns twelve">
				<div class="row a description">
					<h1>FastPlayers</h1>
					<div class="three columns offset-by-one">
						<h3>¿Horarios complicados?</h3>
						<p class="b">Eso no debería ser un problema</p>
						<i class="far fa-clock l r"></i>
					</div>
					<div class="three columns offset-by-one">
						<h3>Elige tus horarios</h3>
						<p class="b">Solo debes indicar tu tiempo libre</p>
						<i class="fas fa-table l r"></i>
					</div>
					<div class="three columns offset-by-one">
						<h3>¡Diviértete!</h3>
						<p class="b">Encuentra más gamers que te acompañen y disfruta</p>
						<i class="fas fa-gamepad n r"></i>
					</div>
				</div>
				<div class="row m">
				<?php if (!(isset($_SESSION['idusers']))) {?>
					<div class="twelve columns a">
						<a href="register.php"><button class="button button-primary b o"><i class="fa fa-bolt"></i> Registrarse</button></a>
						<a href="login.php"><button class="button button-primary b o">Iniciar sesión <i class="fa fa-sign-in-alt"></i></button></a>
					</div>
				<?php } else {?>
					<div class="twelve columns a">
						<a href="search.php"><button class="button button-primary b o"><i class="fa fa-search"></i> · Buscar</button></a>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include('./inc/footer.php'); ?>