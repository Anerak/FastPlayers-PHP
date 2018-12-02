<?php 
function searchNick($n) {
	if (($n !== "") && (isset($n))) {
		if (strlen($n) <= 14) {
			try {
				$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$sql = "SELECT idusers, nickname, horarios, para_jugar FROM users WHERE nickname LIKE '%$n%';";
				$rs = mysqli_query($db, $sql);
				if ($rs) {
					printTable($rs);
				} else {
					throw new Exception(1);
				}
			} catch (Exception $e) {
				
			} finally {
				$db->close();
			}
		} else {

		}
	} else {}
}

function searchGame($g) {
	try {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (($g !== '0')) {
			$sql = "SELECT idusers, nickname, horarios, para_jugar FROM users WHERE para_jugar = '$g';";
		} else {
			$sql = "SELECT idusers, nickname, horarios, para_jugar FROM users;";
			echo $sql;
		}
		$rs = mysqli_query($db, $sql);
		if ($rs) {
			printTable($rs);
		} else {
			throw new Exception(1);
		}
	} catch (Exception $e) {
		sendError($e);
	} finally {
		$db->close();
	}
}

function searchBoth($n, $g) {
	try {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$sql = "SELECT idusers, nickname, horarios, para_jugar FROM users WHERE nickname LIKE '%$n%' AND para_jugar = '$g'";
		$rs = mysqli_query($db, $sql);
		if ($rs) {
			printTable($rs);
		} else {
			throw new Exception(1);
		}
	} catch (Exception $e) {
		sendError($e);
	} finally {
		$db->close();
	}
}

function printTable($datos) {
	try {
		if ($datos) { ?>
			<table class="u-full-width">
				<thead>
					<th>Nickname</th>
					<th>D</th>
					<th>L</th>
					<th>M</th>
					<th>X</th>
					<th>J</th>
					<th>V</th>
					<th>S</th>
				</thead>
				<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($datos)) {
				$id = $row['idusers'];
				if ($id === 0 || null) {
					throw new Exception(1);
				}
				$nickname = $row['nickname'];
				$jugar = $row['para_jugar'];
				$horarios = json_decode($row['horarios'], true);
				?>
				<tr>
					<td><a class="e r" href="profile.php?id=<?php echo $id; ?>"><i class="fa fa-user"></i> <?php echo $nickname;?></a></td>
					<?php for ($f = 0; $f < 7; $f++) { ?>
						<td>
							<?php if ((isset($horarios[$f][0]['desde'])) && ($horarios[$f][0]['desde'] !== ":") && ($horarios[$f][0]['desde'] !== "")) {
								echo $horarios[$f][0]['desde']; } else {
									echo "-";
								}?>
						</td>
					<?php }?>
				</tr>
				<tr>
					<td> 
						<?php switch ($jugar) {
							case '24240':
								echo "<i class='fas fa-gamepad'></i> PAYDAY: The Heist";
								break;
							case '620':
								echo "<i class='fas fa-gamepad'></i> Portal 2";
								break;
							case '105600':
								echo "<i class='fas fa-gamepad'></i> Terraria";
								break;
							default:
								echo "<i class='fa fa-times'></i> ";
								break;
						}?>
					</td>
					<?php for ($f = 0; $f < 7; $f++) { ?>
						<td>
							<?php if ((isset($horarios[$f][0]['hasta'])) && ($horarios[$f][0]['hasta'] !== ":") && ($horarios[$f][0]['hasta'] !== "")) {
								echo $horarios[$f][0]['hasta']; } else {
									echo "-";
								}?>
						</td>
					<?php }?>
				</tr>
				<?php } ?>
				</tbody>
			</table>
			<?php
		} else {
			throw new Exception(1);
		}
	} catch (Exception $e) {
		sendError($e);
	}
}

function sendError($e) {
	header('Location: /search.php?error=' . $e->getMessage());
}

try {
	if (isset($_REQUEST['ok'])) {
		if ((isset($_REQUEST['n'])) && ($_REQUEST['g'] !== '0')) {
			$n = $_REQUEST['n'];
			$g = $_REQUEST['g'];
			searchBoth($n, $g);
		} else {
			if (isset($_REQUEST['n'])) {
				$n = $_REQUEST['n'];
				searchNick($n);
			} else {
				if (isset($_REQUEST['g'])) {
					$g = $_REQUEST['g'];
					searchGame($g);
				} else {
					throw new Exception(0);
				}
			}
		}
	}
		
} catch (Exception $e) {
	sendError($e);
}


 ?>