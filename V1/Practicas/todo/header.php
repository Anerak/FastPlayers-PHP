<?php 
session_start();
?>
<header>
       <div class="header">
           <nav class="navbar navbar-expand-lg navbar-dark indigo">
               <a class="navbar-brand" href="index.php"><img src="img/svg/FastPlayersSVG.svg" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-labe="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                       <li class="nav-item">
                           <a class="nav-link" href="gamelist.php">Lista de juegos</a>
                      </li>
                   </ul>
                <form class="form-inline">
                       <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                   </form>
                   <ul class="navbar-nav mr-auto p-2">
                       <li><a class="navbar-text white-text" href="account.php"><?php $nick ?></a></li>
                   </ul>
               </div>
            </nav>
       </div>
 </header>