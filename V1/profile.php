<?php
include('includes/top.php');
if ($_SESSION['idusers'] == '') {
    header('Location: register.php');
} else {
    $sql = "SELECT * FROM `users` WHERE idusers = " . $_SESSION['idusers']. ";";
    $consultardatos = mysqli_query($db,$sql);
    $cargardatos = mysqli_fetch_array($consultardatos);
}

?>


<body>

    <div class="container-fluid">
        <?php
        include('includes/header.php');
        ?>

        <main>
            <div class="main" id="main">
                
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <?php
                        
                        if ($_SESSION['imglink'] = '') {
                            echo "<img src='img/svg/FastPlayersSVG.svg' class='imgprof' />";
                        } else {
                            echo "<img src='".$cargardatos['imglink']."' class='imgprof' />";
                        }
                        
                        ?>

                    </div>
                    <div class="col-3"><h2><?php
                    echo $_SESSION['nickname'];
                    ?></h2>
                        <div class="row">
                            <div class="col-md-8 col-sm-4 col-xs-2">
                            <?php
                            if ($cargardatos['steam_acc'] != '') {
                                echo "Steam: " . $cargardatos['steam_acc'] . " <i class='fa fa-edit' aria-hidden='true'></i>";
                            } else {
                                echo "<a href='editaccount.php'>Ingresar perfil de Steam <i class='fa fa-edit' aria-hidden='true'></i></a>";
                            }
                            ?></div>
                            <!--<div class="col-md-4 col-sm-1 col-xs-1">Presencia: </div>-->
                            <!--<div class="col-md-4 col-sm-1 col-xs-1">Respeto: </div>-->
                        </div>
                        <!--<div class="row">-->
                        <!--    <div class="col-md-8 col-sm-4">¿Usa trampas?</div>-->
                        <!--</div>-->
                    </div>
                    <div class="col-5">
                        <h3>Deseando jugar:</h3>
                        <div class="row justify-content-center">
                            <div class="accgimg">
                                <?php
                                $game = $cargardatos['idjuegos'];
                                if ($game != '0') {
                                    $sql = "SELECT * FROM `juegos` WHERE idjuegos = '$game';";
                                    $rs = mysqli_query($db,$sql);
                                    $gamedata = mysqli_fetch_array($rs);
                                    //$gimg = $gamedata['steam_img'];
                                    echo "<a href='".$gamedata['steam_link']."' target='_blank'><img src='".$gamedata['steam_img']."' class='imggame' /></a> &nbsp; <a href='editgame.php'>Cambiar juego <i class='fa fa-edit' aria-hidden='true'></i></a>";
                                } else {
                                    echo "<a href='editgame.php'>Elige un juego.<i class='fa fa-edit' aria-hidden='true'></i></a>";
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="row">
                            <div class="row table">
                                <div class="col col-sm-0"></div>
                                <div class="col day">Domingo</div>
                                <div class="col day">Lunes</div>
                                <div class="col day">Martes</div>
                                <div class="col day">Miércoles</div>
                                <div class="col day">Jueves</div>
                                <div class="col day">Viernes</div>
                                <div class="col day">Sábado</div>
                            </div>
                            <div class="row table">
                                <div class="col day">Hora desde</div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '1';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '2';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '3';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '4';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '5';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '6';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '7';";
                                $rs = mysqli_query($db, $sql);
                                $hdesde = mysqli_fetch_array($rs);
                                if ($hdesde['hora_desde'] != '') {
                                    echo $hdesde['hora_desde'];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                            </div>
                            <div class="row table">
                                <div class="col day">Hora hasta</div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '1';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '2';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '3';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '4';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '5';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '6';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                                <div class="col day"><?php
                                $sql = "SELECT * FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] ." AND dia = '7';";
                                $rs = mysqli_query($db, $sql);
                                $hhasta = mysqli_fetch_array($rs);
                                if ($hhasta['hora_hasta'] != '') {
                                    echo $hhasta[hora_hasta];
                                } else {
                                    echo "-";
                                }
                                ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </main>

        <?php
        include('includes/footer.php');
        ?>
    </div>




    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
