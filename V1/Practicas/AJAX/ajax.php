<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'anerak');
    define('DB_PASS', '');
    define('DB_NAME', 'c9');

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $id = $_REQUEST['id_usuario'];
    $sql = "SELECT nombre,apellido,email FROM personas WHERE id = '$id';";
    
    
    $rs = mysqli_query($db,$sql);
    
    
    $rs2 = mysqli_fetch_array($rs);
    
    
    $respuesta = $rs2['nombre'] . " " . $rs2['apellido'];
    $remail = $rs2['email'];
    
    
    echo $respuesta;
    
    echo "<br /><input type='text' id='email' value='$remail'><input type='button' id='mailupd'>";
    
    
?>