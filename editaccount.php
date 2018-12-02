<?php include('./inc/header.php');
$id = $_SESSION['idusers'];
function getDataPersonal($id) {
	try {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$sql = "SELECT steam_acc, para_jugar, imglink, horarios FROM users WHERE idusers = '$id';";
		$rs = mysqli_query($db, $sql);

		$r = mysqli_fetch_array($rs);

		if ($r) {
			if (!isset($_SESSION['steam_acc'])) {
				if (isset($r['steam_acc'])) {
				$_SESSION['steam_acc'] = $r['steam_acc'];
				}
			}
			if (!isset($_SESSION['para_jugar'])) {
				if (isset($r['para_jugar'])) {
					$_SESSION['para_jugar'] = $r['para_jugar'];
				}
			}
			if (isset($r['imglink'])) {
				$_SESSION['imglink'] = $r['imglink'];
			}
		}
	} catch (Exception $e) {
	} finally {
		$db->close();
	}
}


if ((isset($_SESSION['steam_acc'])) && (isset($_SESSION['imglink'])) && (isset($_SESSION['para_jugar']))) {
	$ok = true;
} else {
	getDataPersonal($id);
}

?>
<main>
	<div class="container">
		<div class="row">
			<div class="columns six offset-by-three">
				<div class="w">Editar datos</div>
				<form action="./inc/aprocess.php" method="POST">
					<label for="imagelink">Imagen de perfil</label>
					<input type="url" name="imagelink" placeholder="Imgur link https://i.imgur.com/AbCdE.jpg" class="u-full-width" value="<?php if (isset($_SESSION['imglink'])) {echo $_SESSION['imglink'];} ?>">
					<label for="steamaccount">Cuenta de Steam</label>
					<input type="url" name="steamaccount" placeholder="https://steamcommunity.com/id/gabelogannewell" class="u-full-width" value="<?php if (isset($_SESSION['steam_acc'])) {
						echo $_SESSION['steam_acc'];
					} ?>">
					<label for="lookingtoplay">Juego</label>
					<select name="lookingtoplay" class="u-full-width">
						<option value="0">Ninguno</option>
						<option value="24240" <?php if ($_SESSION['para_jugar'] === "24240") { echo "selected";} ?>>PAYDAY: The Heist</option>
						<option value="620" <?php if ($_SESSION['para_jugar'] === "620") {echo "selected";} ?>>Portal 2</option>
						<option value="105600" <?php if ($_SESSION['para_jugar'] === "105600") {echo "selected";} ?>>Terraria</option>
						<option disabled>Más juegos serán agregados</option>
					</select>
					<button class="button button-primary"><i class="fa fa-save v"></i> Guardar</button>
					<button type="reset" class="button button-primary">Deshacer <i class="fa fa-undo"></i></button>
				</form>
			</div>
		</div>
	</div>
</main>

<?php include('./inc/footer.php'); ?>