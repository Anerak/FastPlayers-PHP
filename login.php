<?php include('./inc/header.php');
if (isset($_SESSION['idusers'])) {
	header('Location: /');
} ?>
<!-- Main -->
<main>
	<div class="container">
		<form action="./inc/lprocess.php" method="POST">
			<div class="row a">
				<h1 id="response">
				<?php if (isset($_GET['error'])) {
					switch ($_GET['error']) {
						case 1:
							echo 'Email no registrado';
							break;
						case 2:
							echo 'Contraseña con caracteres inválidos';
							break;
						case 3:
							echo 'Contraseña con cantidad de caracteres inválida';
							break;
						case 4:
							echo 'Contraseña inválida';
							break;
						case 5:
							echo 'Falta el email';
							break;
						case 6:
							echo 'Falta la contraseña';
							break;
						case 7:
							echo 'Error al iniciar sesión';
							break;
						default:
							echo 'Hubo un error inesperado';
							break;
					}
					?>
					 <i class="far fa-frown s"></i>
				<?php } else {?>
					Es bueno verte de nuevo <i class="far fa-smile r"></i>
				<?php } ?>
				</h1>
				
				<div class="six columns offset-by-three">
					<label for="email">E-mail</label>
					<input type="email" placeholder="example@mail.com" id="email" name="email" class="u-full-width" required>
				</div>
			</div>
			<div class="row a">
				<div class="six columns offset-by-three">
					<label for="password">Contraseña</label>
					<input type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="passw" name="passw" class="u-full-width" pattern="[A-Za-z,0-9]{6,15}" maxlength="15" required>
				</div>
			</div>
			<div class="row a">
				<div class="four columns offset-by-four">
					<input type="submit" name="submit" class="button button-primary u-full-width" value="Iniciar sesión">
				</div>
			</div>
			<div class="row">
				<div class="two columns offset-by-five">
					<a href="/register.php" class="a e s"><p>¿No tienes una cuenta? <i class="far fa-frown"></i></p></a>
				</div>
			</div>
		</form>
	</div>
</main>
<?php include('./inc/footer.php'); ?>