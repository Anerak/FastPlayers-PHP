<?php
include('top.php');

$gname = $_REQUEST['game_name'];

    if (!$gname) {
        $sql = "UPDATE `users` SET idjuegos = '0' WHERE idusers = " . $_SESSION['idusers'] . " ;";
        $rs = mysqli_query($db,$sql);
    } else {
        $searchgame = "SELECT * FROM juegos WHERE game_name LIKE '%$gname%' ;";
        $rs = mysqli_query($db,$searchgame);
        $r = mysqli_fetch_array($rs);
        
        if ($r) {
            $sql = "UPDATE users SET idjuegos = ". $r['idjuegos'] ." WHERE idusers = " . $_SESSION['idusers'] . " ;";
            $rs = mysqli_query($db,$sql);
        }
    }
header('Location: ../account.php');
?>