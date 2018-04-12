<?php
include('top.php');
//Convertir datos en variables
$dia = filter_var($_REQUEST['dia'], FILTER_SANITIZE_STRING);
$hdesde = $_REQUEST['hora_desde'];
$hhasta = $_REQUEST['hora_hasta'];
$onlineid = $_SESSION['idusers'];

//Si los valores estan vacíos, se borrará el día
if (($hdesde == '') || ($hhasta == '')) {
	$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '$dia';";
	$rs = mysqli_query($db, $sql);
} else {
//Si hay información, se buscaran en la base de datos
	$check = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '$dia';";
	$rs = mysqli_query($db, $check);
	$r = mysqli_fetch_array($rs);
//Si no estan en la base de datos, se procedera a insertarlos
	if (!$r) {
		$sql = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '$dia', '$hdesde', '$hhasta');";
		$rs = mysqli_query($db,$sql);
		
	} else {
//Si ya existen, se actualizan
		$sql = "UPDATE `horarios` SET hora_desde = '$hdesde', hora_hasta = '$hhasta' WHERE idusers = '$onlineid' AND dia = '$dia';";
		$rs = mysqli_query($db,$sql);
	}
}

header('Location: ../account.php');

?>