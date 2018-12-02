<?php 
include('top.php');
	if (isset($_REQUEST['imagelink'])) {
		$image = $_REQUEST['imagelink'];
		if ($rimage === "") {
			$rimage = null;
		} else {
			$rimage = filter_var($_REQUEST['imagelink'], FILTER_SANITIZE_URL);
		}
	} else {
		$rimage = null;
	}
	if (isset($_REQUEST['steamaccount'])) {
		$rsacc = filter_var($_REQUEST['steamaccount'], FILTER_SANITIZE_URL);
	} else {
		$rsacc = null;
	}
	$rgame = $_REQUEST['lookingtoplay'];
	function saveData ($img, $account, $game) {
		try {
			if ($game === '0') {
				$game = null;
			}
			$id = $_SESSION['idusers'];
			$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$sql = "UPDATE users SET steam_acc = '$account', para_jugar = '$game', imglink = '$img' WHERE idusers = '$id'";
			$rs = mysqli_query($db, $sql);

			if ($rs) {
				$_SESSION['steam_acc'] = $account;
				$_SESSION['imglink'] = $img;
				$_SESSION['para_jugar'] = $game;
				header('Location: /account.php');
			}
		} catch (Exception $e) {
			
		} finally {
			$db->close();
		}
	}

saveData($rimage, $rsacc, $rgame);
 ?>