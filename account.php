<?php
include('./inc/header.php');
if (isset($_SESSION['idusers'])) {
	$id = $_SESSION['idusers'];
} else {
	header('Location: login.php');
}

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

			if (isset($r['horarios'])) {
				$_SESSION['horarios'] = json_decode($r['horarios'], true);
			}
		}
	} catch (Exception $e) {
	} finally {
		$db->close();
	}
}

if ((isset($_SESSION['steam_acc'])) && (isset($_SESSION['para_jugar'])) && (isset($_SESSION['imglink'])) && (isset($_SESSION['horarios']))) {
	$ok = true;
} else {
	getDataPersonal($id);
}

?>

<main>
	<div class="container g t">
		<div class="row">
			<div class="four columns offset-by-half">
			<?php if ((isset($_SESSION['imglink'])) && ($_SESSION['imglink'] !== "")) {?>
					<img src="<?php echo $_SESSION['imglink'];?>" class="profileimg">
					<a href="editaccount.php"><i class="fa fa-edit"></i> Cambiar imagen</a>
			<?php } else { ?>
				<a href="./editaccount.php" class="e r"><i class="fa fa-image n r"></i>
				<br>
				Elegir imagen <i class="fa fa-edit"></i></a>
			<?php } ?>
			</div>
			<div class="four columns offset-by-one">
				<h1 class="w"><i class="fa fa-user"></i> <?php echo $_SESSION['nickname']?></i></h1>
				<p>
				<?php if ((isset($_SESSION['steam_acc'])) && ($_SESSION['steam_acc'] !== "")) {?>
					<a href="<?php $_SESSION['steam_acc']; ?>" class="r" target="blank"><i class="fab fa-steam b"></i> <?php echo $_SESSION['steam_acc']; ?></a> <a href="./editaccount.php"><i class="fa fa-edit r"></i></a>
				<?php } else { ?>
					<a href="./editaccount.php" class="r">Ingresar cuenta de Steam <i class="fa fa-edit"></i></a>
				<?php } ?>
				</p>
				
			</div>
			<div class="two columns">
				<div>
					<?php if ((isset($_SESSION['para_jugar'])) && ($_SESSION['para_jugar'] !== "0")) {?>
						<a href="https://store.steampowered.com/app/<?php echo $_SESSION['para_jugar']; ?>" target="blank"><img class="lookingtoplay" src="http://cdn.akamai.steamstatic.com/steam/apps/<?php echo $_SESSION['para_jugar'];?>/header.jpg"></a>
							<a href="./editaccount.php" class="r">Cambiar juego <i class="fa fa-edit"></i></a>
						
						
					<?php  } else {?>
							<a href="./editaccount.php" class="e r"><i class="fa fa-cookie-bite n r"></i>
							<br>
							Elegir juego <i class="fa fa-edit"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<hr>
		<div class="row ov">
			<div class="twelve columns">
				<table class="u-full-width">
					<thead>
						<tr>
							<th><a href="/edithorario.php" class="r e">Editar <i class="fa fa-edit"></i></a></th>
							<th>D</th>
							<th>L</th>
							<th>M</th>
							<th>X</th>
							<th>J</th>
							<th>V</th>
							<th>S</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Desde</td>
							<?php for ($x = 0; $x < 7; $x++) { ?>
								<td><?php if (isset($_SESSION['horarios'])) {
									if (($_SESSION['horarios'][$x][0]['desde'] !== ":") && ($_SESSION['horarios'][$x][0]['desde'] !== "")) {
										echo $_SESSION['horarios'][$x][0]['desde'];
									} else {
										echo "-";
									}
								} else {
									echo "-";
								}
								?></td>
							<?php } ?>
						</tr>
						<tr>
							<td>Hasta</td>
							<?php for ($x = 0; $x < 7; $x++){?>
								<td><?php if (isset($_SESSION['horarios'])) {
									if (($_SESSION['horarios'][$x][0]['hasta'] !== ":") && ($_SESSION['horarios'][$x][0]['hasta'] !== "")) {
										echo $_SESSION['horarios'][$x][0]['hasta'];
									} else {
									echo "-";
									}
								} else {
									echo "-";
								}
								?></td>
							<?php }?>
						</tr>

						<tr>
							<td>Desde</td>
							<?php for ($x = 7; $x < 14; $x++) {?>
								<td><?php if (isset($_SESSION['horarios'])) {
									if (($_SESSION['horarios'][$x][1]['desde'] !== ":") && ($_SESSION['horarios'][$x][1]['desde'] !== "")) {
										echo $_SESSION['horarios'][$x][1]['desde'];
									} else {
									echo "-"; }
								} else {
									echo "-";
								}?></td>
							<?php } ?>
						</tr>
						<tr>
							<td>Hasta</td>
							<?php for ($x = 7; $x < 14; $x++) { ?>
								<td><?php if (isset($_SESSION['horarios'])) {
									if (($_SESSION['horarios'][$x][1]['hasta'] !== ":") && ($_SESSION['horarios'][$x][1]['hasta'] !== "")) {
											echo $_SESSION['horarios'][$x][1]['hasta'];
										} else {
											echo "-";
										}
									} else {
										echo "-";
									}
								?></td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php include('./inc/footer.php'); ?>