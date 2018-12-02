<?php
include('top.php');
if (isset($_SESSION['idusers'])) {
	header('Location: /');
}
$rmail = $_REQUEST['email'];
$rnick = $_REQUEST['nickname'];
$rpass = $_REQUEST['passw'];

function registerProcess ($email, $nick, $passw) {
	try {
		if (emailProcess($email)) {
			if (nickProcess($nick)) {
				if (passProcess($passw)) {
					$passw = password_hash($passw, PASSWORD_BCRYPT);
					if (insertData($email, $nick, $passw)) {
						header('Location: /');
					}
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
				throw new Exception(1);
			} else {
				return true;
			}

			$db->close();
		}
	} catch (Exception $e) {
		sendError($e);
	}
}

function nickProcess($nick) {
	try {
		if ((strlen($nick) >= 5) && (strlen($nick) <= 14)) {
			if (!preg_match('/[^A-Za-z0-9]/', $nick)) {
				$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$sql = "SELECT idusers, nickname FROM users WHERE nickname = '$nick';";
				$rs = mysqli_query($db, $sql);
				$r = mysqli_fetch_array($rs);
				if ($nick === $r['nickname']) {
					throw new Exception(2);
					//Nick ya registrado
				} else {
					return true;
				}
				$db->close();
			} else {
				throw new Exception(3);
				//Nickname con caracteres inválidos
			}
		} else {
			throw new Exception(4);
			//Nickname con cantidad de inválida de caracteres
		}
	} catch (Exception $e) {
		sendError($e);
	}
}

function passProcess($passw) {
	try {
		if ((strlen($passw) >= 6) && (strlen($passw) <= 15)) {
			if (!preg_match('/[^A-Za-z0-9]/', $passw)) {
				return true;
			} else {
				throw new Exception (5);
				//Contraseña inválida
			}
		} else {
			throw new Exception(6);
			//Contraseña con cantidad inválida de caracteres
		}
	} catch (Exception $e) {
		sendError($e);
	}	
}

function insertData($email, $nick, $passw) {
	try {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$sql = "INSERT INTO users (email, nickname, passw) VALUES ('$email', '$nick', '$passw');";
		$rs = mysqli_query($db, $sql);

		if ($rs) {
			$lastid = mysqli_insert_id($db);
			if (is_numeric($lastid)){
				$_SESSION['idusers'] = $lastid;
				$_SESSION['nickname'] = $nick;
				return true;
			} else {
				throw new Exception(8);
				//Error al iniciar sesión
			}
		} else {
			throw new Exception(7);
			//Error al registrar información en la base de datos
		}
		$db->close();
	} catch (Exception $e) {
		sendError($e);
	}
	
}

function sendError($error) {
	header('Location: /register.php?error=' . $error->getMessage());
}

try {
	if (isset($_REQUEST['email'])) {
		if (isset($_REQUEST['nickname'])) {
			if (isset($_REQUEST['passw'])) {
				if (registerProcess($rmail, $rnick, $rpass)) {
					header('Location: /');
				}
			} else {
				throw new Exception(11);
				//Password
			}
		} else {
			throw new Exception(10);
			//Nickname
		}
	} else {
		throw new Exception(9);
		//Email
	}
} catch (Exception $e) {
	sendError($e);
}

?>
