<?php
include('top.php');

$imglink = filter_var($_REQUEST['imglink'], FILTER_SANITIZE_URL);
$steamacc = filter_var($_REQUEST['steam_acc'], FILTER_SANITIZE_URL);
$gname = filter_var($_REQUEST['juego'], FILTER_SANITIZE_STRING);
$gname2 = filter_var($_REQUEST['juego2'], FILTER_SANITIZE_STRING);
$gname3 = filter_var($_REQUEST['juego3'], FILTER_SANITIZE_STRING);

    if ($imglink == '') {
        $imglink = null;
    }
    
    if ($steamacc == '') {
        $steamacc = null;
    }
    
    if ($gname == '') {
        $gname = null;
    }
    
    if ($gname2 == '') {
        $gname2 = null;
    }
    
    if ($gname3 == '') {
        $gname3 = null;
    }
    
$consultardatos = "SELECT * FROM `users` WHERE idusers = ". $_SESSION['idusers'] . ";";
$rs = mysqli_query($db, $consultardatos);

$fetchdatos = mysqli_fetch_array($rs);
    
    if ($imglink != $fetchdatos['imglink']) {
            $changeimg = "UPDATE `users` SET imglink = '$imglink' WHERE idusers = ". $_SESSION['idusers'] ." ;";
            $rschangeimg = mysqli_query($db,$changeimg);
        }
    
    if ($steamacc != $fetchdatos['steam_acc']) {
        $changesta = "UPDATE `users` SET steam_acc = '$steamacc' WHERE idusers = " . $_SESSION['idusers'] . " ;";
        $rschangesta = mysqli_query($db,$changesta);
    }
    
    if ($gname == null) {
        $changegame = "UPDATE `users` SET idjuegos = null WHERE idusers = " . $_SESSION['idusers'] . ";";
        $rschangegame = mysqli_query($db,$changegame);
    } else {
        $lookgame = "SELECT * FROM juegos WHERE game_name LIKE '%$gname%';";
        $rs = mysqli_query($db,$lookgame);
        $r = mysqli_fetch_array($rs);
        
        if ($r) {
            $changegame = "UPDATE `users` SET idjuegos = ". $r['idjuegos'] ." WHERE idusers = " . $_SESSION['idusers'] . ";";
            $rschangegame = mysqli_query($db,$changegame);
        }
        
    }
    
    if ($gname2 == null) {
        $changegame = "UPDATE `users` SET para_jugar = null WHERE idusers = " . $_SESSION['idusers'] . ";";
        $rschangegame = mysqli_query($db,$changegame);
    } else {
        $lookgame = "SELECT * FROM juegos WHERE game_name LIKE '%$gname2%';";
        $rs = mysqli_query($db,$lookgame);
        $r = mysqli_fetch_array($rs);
        
        if ($r) {
            $changegame = "UPDATE `users` SET para_jugar = ". $r['idjuegos'] ." WHERE idusers = " . $_SESSION['idusers'] . ";";
            $rschangegame = mysqli_query($db,$changegame);
        }
        
    }
    
    if ($gname3 == null) {
        $changegame = "UPDATE `users` SET own_game = null WHERE idusers = " . $_SESSION['idusers'] . ";";
        $rschangegame = mysqli_query($db,$changegame);
    } else {
        $lookgame = "SELECT * FROM juegos WHERE game_name LIKE '%$gname3%';";
        $rs = mysqli_query($db,$lookgame);
        $r = mysqli_fetch_array($rs);
        
        if ($r) {
            $changegame = "UPDATE `users` SET own_game = ". $r['idjuegos'] ." WHERE idusers = " . $_SESSION['idusers'] . ";";
            $rschangegame = mysqli_query($db,$changegame);
        }
        
    }
    
    header('Location: ../account.php');

?>