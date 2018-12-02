<?php
include('top.php');

$rdesde = $_REQUEST['desde'];
$rhasta = $_REQUEST['hasta'];

function processHorario ($desde, $hasta) {
	try {
		if (isset($_REQUEST['submit'])) {
			for ($f = 0; $f < 14; $f++ ) {
				$newdata = [
					($f < 7) ?
					'0' : '1' => [
						'desde' => (isset($desde[$f])) ?
						$desde[$f] : '-',
						'hasta' => (isset($hasta[$f])) ?
						$hasta[$f] : '-'
					]
				];
				$horarios[] = $newdata;
			}
			updateHorario($horarios);
		}
	} catch (Exception $e) {
		sendError($e);
	}
}

function updateHorario($horarios) {
	try {
		$horariojson = json_encode($horarios);
		$id = $_SESSION['idusers'];
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$sql = "UPDATE users SET horarios = '$horariojson' WHERE idusers = '$id'";
		$rs = mysqli_query($db, $sql);
		if ($rs) {
			$_SESSION['horarios'] = $horarios;
			header('Location: /account.php');
		} else {
			throw new Exception(0);
		}
	} catch (Exception $e) {
		sendError($e);
	} finally {
		$db->close();
	}
}

function sendError($e) {
	header('Location: edithorary.php?error=' . $e->getMessage());
}

if (processHorario($rdesde, $rhasta)) {
	header('Location: /account.php');
}
?>