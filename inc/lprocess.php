<?php 
include('top.php');
$rmail = $_REQUEST['email'];
$rpassw = $_REQUEST['passw'];


function loginProcess($email, $passw) {
	try {
		if (emailProcess($email)) {
			if (passProcess($passw)) {
				if (finalStep($email, $passw)) {
					header('Location: /');
				}
			}
		}
	} catch (Exception $e) {
		 sendError($e);
	}
}


function emailProcess($email) {
	try {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$sql = "SELECT idusers, email FROM users WHERE email = '$email';";
			$rs = mysqli_query($db, $sql);

			$r = mysqli_fetch_array($rs);

			if ($email === $r['email']) {
				return true;
			} else {
				throw new Exception(1);
			}

			$db->close();
		}
	} catch (Exception $e) {
		sendError($e);
	} finally {
		$db->close();
	}
}

function passProcess($passw) {
	try {
		if ((strlen($passw) >= 6) && (strlen($passw) <= 14)) {
			if (!preg_match('/[^A-Za-z0-9]/', $passw)) {
				return true;
			} else {
				throw new Exception(2);
			}
		} else {
			throw new Exception(3);
		}
	} catch (Exception $e) {
		sendError($e);
	}
}

function finalStep($email, $passw) {
	try {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$sql = "SELECT idusers, email, passw, nickname FROM users WHERE email = '$email';";
		$rs = mysqli_query($db, $sql);

		$r = mysqli_fetch_array($rs);

		if ($email === $r['email']) {
			if (password_verify($passw, $r['passw'])) {
				$_SESSION['idusers'] = $r['idusers'];
				$_SESSION['nickname'] = $r['nickname'];
				return true;
			} else {
				throw new Exception (4);
			}
		}

	} catch (Exception $e) {
		sendError($e);
	} finally {
		$db->close();
	}
}

function sendError($error) {
	header('Location: /login.php?error=' . $error->getMessage());
}

try {
	if (isset($_REQUEST['email'])) {
		if (isset($_REQUEST['passw'])) {
			if (loginProcess($rmail, $rpassw)) {
				header('Location: /');
			}
		} else {
			throw new Exception(6);
		}
	} else {
		throw new Exception(5);
	}
} catch (Exception $e) {
	sendError($e);
}


 ?>}
