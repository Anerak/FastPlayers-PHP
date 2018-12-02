<?php
include('./inc/header.php');

if (isset($_SESSION['idusers'])) {
	header('Location: /');
}
?>
<!-- Main -->
<main>
	<div class="container">
		<form method="POST" id="lform" action="./inc/rprocess.php">
			<div class="row">
				<h1 id="response">
				<?php if (isset($_GET['error'])) {
					switch ($_GET['error']) {
						case 1:
						echo 'Email no registrado';
							break;
						case 2:
							echo 'Nickname ya registrado';
							break;
						case 3:
							echo 'Nickname con caracteres inválidos';
							break;
						case 4:
							echo 'Nickname con cantidad inválida de caracteres';
							break;
						case 5:
							echo 'Contraseña con caracteres inválidos';
							break;
						case 6:
							echo 'Contraseña con cantidad inválida de caracteres';
							break;
						case 7:
							echo 'Error al insertar información en la base de datos';
							break;
						case 8:
							echo 'Error al iniciar sesión';
							break;
						case 9;
							echo 'Email vacío';
							break;
						case 10:
							echo 'Nickname vacío';
							break;
						case 11:
							echo 'Contraseña vacía';
							break;
						case 12:
							echo 'Error en el proceso de registro';
							break;
						case 13:
							echo 'Error insertando información';
							break;
						default:
							echo 'Hubo un error inesperado';
							break;
					}
					?>
					 <i class="far fa-frown s"></i>
				<?php } else { ?>
					¿Listo para empezar?
				<?php } ?>
				</h1>
				<div class="six columns offset-by-three">
					<label for="email">E-mail</label>
					<input type="email" placeholder="example@mail.com" id="email" name="email" class="u-full-width" required>
				</div>
			</div>
			<div class="row a">
				<div class="three columns offset-by-three">
					<label for="nickname">Nickname</label>
					<input type="text" placeholder="5 a 14 caracteres" id="nickname" name="nickname" class="u-full-width" pattern="[A-Za-z,0-9]{5,14}" maxlength="14" required>
				</div>
				<div class="three columns">
					<label for="password">Contraseña</label>
					<input type="password" placeholder="6 a 15 caracteres" id="passw" name="passw" class="u-full-width" pattern="[A-Za-z,0-9]{6,15}" maxlength="15" required>
				</div>
			</div>
			<div class="row a">
				<p>Solo caracteres alfanuméricos</p>
				<div class="four columns offset-by-four">
					<input type="submit" id="submit" name="submit" class="button button-primary u-full-width" value="Registrarse">
				</div>
			</div>
			<div class="row">
				<div class="two columns offset-by-five">
					<a href="/login.php" class="a e s"><p>¿Ya tienes una cuenta? <i class="far fa-smile"></i></p></a>
				</div>
			</div>
		</form>
	</div>
</main>
<?php include('./inc/footer.php'); ?>