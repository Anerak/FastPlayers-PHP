<?php
include('top.php');

if ($_SESSION['idusers']!= '') {
    header('Location: ../index.php'); 
    } else {
    $nickname = filter_var($_REQUEST['nickname'], FILTER_SANITIZE_URL);
    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $passw = md5($_REQUEST['passw'] . "2j5");

    $sql = "SELECT * FROM users WHERE email = '$email' OR nickname = '$nickname';";

    $rs = mysqli_query($db,$sql);
    $r = mysqli_fetch_array($rs);
    
    if ($r) {
        echo "Ya existe una cuenta registrada con ese email o nickname";
    } else {
        if ($nickname == $r['nickname']) {
            echo "Ese nick ya esta registrado";
        } else {
        $into = "INSERT INTO `users` (`email`,`passw`,`nickname`,`imglink`) VALUES ('$email','$passw','$nickname','img/svg/FastPlayersSVG.svg');";
        $reg = mysqli_query($db, $into);
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $rs = mysqli_query($db, $sql);
        $getid = mysqli_fetch_array($rs);
        $_SESSION['idusers'] = $getid['idusers'];
        $_SESSION['nickname'] = $getid['nickname'];
        $_SESSION['imglink'] = $getid['imglink'];
        header('Location: ../index.php');
            
        }
    } 
}
?>