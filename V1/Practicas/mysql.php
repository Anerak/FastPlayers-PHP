<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'anerak');
define('DB_PASS', '');
define('DB_NAME', 'c9');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$db) {
    echo "Error al conectarse: <br>";
    echo mysqli_connect_errno() . "<br>";
    echo mysqli_connect_error();
    exit;
}

//$consulta = "UPDATE ciudades SET"
//$consulta = "INSERT INTO ciudades (ciudad) VALUES ('Pinamar');";

//$resultado = mysqli_query($db, $consulta);

//if ($resultado) {
//    echo "Ok";
//}

$consulta = "SELECT * FROM ciudades;";
$rs = mysqli_query($db, $consulta);

if ($rs) {
    while ($r = mysqli_fetch_array($rs)) {
        echo $r['ciudad'] . "<br>";
    }
}


?>