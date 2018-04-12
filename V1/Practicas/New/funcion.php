<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'anerak');
define('DB_PASS', '');
define('DB_NAME', 'c9');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$consulta = "SELECT nombre, apellido, telefono FROM personas WHERE id=2;";
$rs = mysqli_query($db, $consulta);

$r = mysqli_fetch_array($rs);


$nombre = $r['nombre'];
$apellido = $r['apellido'];
$telefono = $r['telefono'];
$id = $_REQUEST['id'];

if ($_REQUEST['nombre']!=''){

$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$telefono = $_REQUEST['telefono'];

$actualizar = "UPDATE `personas` SET nombre='$nombre', apellido='$apellido', telefono='$telefono' WHERE id='$id';";

$a = mysqli_query($db, $actualizar);
$ok = "Registro actualizado";
}

?>