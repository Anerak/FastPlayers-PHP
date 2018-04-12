<?php
	include('includes/header.php');

	if (!isset($_SESSION['idusers'])) {
		header('Location: index.php');
	} else {
		$onlineid = $_SESSION['idusers'];
		$cargardatos = "SELECT * FROM `users` WHERE idusers = '$onlineid';";
		$rs = mysqli_query($db,$cargardatos);
		$datars = mysqli_fetch_array($rs);
		
		if ($datars['idjuegos'] != null) {
			$getgname = "SELECT * FROM `juegos` WHERE idjuegos = " . $datars['idjuegos'] . " ;";
			$rsgname = mysqli_query($db, $getgname);
			$gname = mysqli_fetch_array($rsgname);
		}
		if ($datars['para_jugar'] != null) {
			$getgname = "SELECT * FROM `juegos` WHERE idjuegos = " . $datars['para_jugar'] . " ;";
			$rsgname = mysqli_query($db, $getgname);
			$gname2 = mysqli_fetch_array($rsgname);
		}
		if ($datars['own_game'] != null) {
			$getgname = "SELECT * FROM `juegos` WHERE idjuegos = " . $datars['own_game'] . " ;";
			$rsgname = mysqli_query($db, $getgname);
			$gname3 = mysqli_fetch_array($rsgname);
		}
	}

?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header class="dcenter">
							<h2>Editar cuenta</h2>
							<p>¿Quieres borrar algo? Deja el espacio vacío</p>
							<br />
						</header>
						<section>
								<form method="post" action="includes/modaccount.php">
									<div class="row uniform 50%">
										<div class="12u$">
											<h3 class="dright">Imagen de perfil</h3>
											<input type="text" name="imglink" id="imglink" placeholder="Ej: https://i.imgur.com/PC8iVhk.png" value="<?php echo $datars['imglink'];?>" />
										</div>
										<div class="12u$">
											<h3 class="dleft">Perfil de Steam</h3>
											<input type="text" name="steam_acc" id="steam_acc" placeholder="Ej: https://steamcommunity.com/id/gabelogannewell" value="<?php echo $datars['steam_acc'];?>" />
										</div>
										<div class="12u$">
											<h3 class="dright">Deseando jugar...</h3>
											<input type="text" name="juego" id="juego" placeholder="Ej: Terraria" value="<?php echo $gname['game_name'];?>" />
											<input type="text" name="juego2" id="juego2" placeholder="(opcional)" value="<?php echo $gname2['game_name'];?>" />
											<input type="text" name="juego3" id="juego3" placeholder="(opcional)" value="<?php echo $gname3['game_name'];?>" />
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Guardar" class="special" /></li>
												<li><input type="reset" value="Reiniciar campos" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
					</div>
				</section>

			
<!-- INCLUDE FOOTER-->
			<?php 
			include('includes/footer.php');
			?>