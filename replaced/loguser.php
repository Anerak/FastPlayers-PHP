<?php
include('top.php');


if (isset($_SESSION['idusers'])) {
    
     //Si ya esta logeado, se redirige al index.php
    header('Location: ../index.php');
    
    
} else {
   //Si no esta logeado, se procede a comparar
    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $passw = md5($_REQUEST['passw'] . "2j5");

    $sql = "SELECT * FROM users WHERE email = '$email' AND '$passw';";
    $rs = mysqli_query($db,$sql);
    $getid = mysqli_fetch_array($rs);
    $comparepass = $getid['passw'];
    //Verificacion
    if ($passw == $comparepass) {
        $_SESSION['idusers'] = $getid['idusers'];
        $_SESSION['nickname'] = $getid['nickname'];
        $_SESSION['imglink'] = $getid['imglink'];
        $_SESSION['idjuegos'] = $getid['idjuegos'];
        header('Location: ../index.php');
    } else {
        
        echo "Datos invalidos";
    }
}
?>