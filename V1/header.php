<?php 
include('top.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FastPlayers</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<header>
       <div class="header">
           <nav class="navbar navbar-expand-lg navbar-dark indigo">
               <a class="navbar-brand" href="index.php"><img src="img/svg/FastPlayersSVG.svg" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-labe="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="../index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                       <li class="nav-item">
                           <a class="nav-link" href="../search.php">Buscar</a>
                      </li>
                   </ul>
                   <!-- <form class="form-inline">-->
                       <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
                   <!--</form>-->
                   <ul class="navbar-nav mr-auto p-2">
                       <li>
                       <?php
                       if ($_SESSION['idusers'] == '') {
                           echo "<a class='navbar-text white-text' href='../register.php'>Registrarse </a><span class='white-text'>&nbsp; &nbsp; &nbsp;</span><a class='navbar-text white-text' href='../login.php'> Iniciar sesión";
                       } else {
                           $sql = "SELECT * FROM users WHERE idusers = '" . $_SESSION['idusers'] ."';";
                           $rs = mysqli_query($db, $sql);
                           $r = mysqli_fetch_array($rs);
                           echo "<a class='navbar-text white-text' href='../account.php'> " . $r['nickname'] . " </a><span class='navbar-text white-text'>&nbsp; &nbsp; &nbsp;</span><a class='navbar-text white-text' href='includes/logout.php'>Cerrar sesión</a>";
                       }
                       ?>
                       </a></li>
                   </ul>
               </div>
            </nav>
       </div>
 </header>