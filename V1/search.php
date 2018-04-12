<?php
include('includes/top.php');
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
                    <div class="col-10">
                        <div class="row">
                            <div class="col-md-3 col-sm-1"><h3>Buscar</h3></div>
                            <div class="col-md-1 col-sm-0"></div>
                            <div class="col-md-4 col-sm-3">
                                <form method=get action="search.php">
                                    <input class="search-box" type="text" name="search" placeholder="Ingrese la búsqueda" required/>
                                    <select name="type-search">
                                        <option value="juego">Juego</option>
                                        <option value="user">Usuario</option>
                                    </select>
                                    <input type="submit" id="send"/>
                                </form>
                            </div>
                        </div>
                    <div class="col-1"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php
                    if (isset($_GET['search'])) {
                            $gamesearch = $_GET['search'];
                        if ($_GET['type-search'] == 'juego') {
                            $dbgame = "SELECT * FROM `juegos` WHERE game_name LIKE '%$gamesearch%' ;";
                            
                            $dbrs = mysqli_query($db,$dbgame);
                            $r = mysqli_fetch_array($dbrs);
                            $gameid = $r['idjuegos'];
                            $sql = "SELECT * FROM `users` WHERE idjuegos = '$gameid' ;";
                            // echo $sql;
                            $rs2 = mysqli_query($db,$sql);
                            if ($rs2){
                                while ($row = mysqli_fetch_assoc($rs2)) {
                                    echo "<a href='profile.php?idusers=". $row['idusers']."'> ". $row['nickname'] ." </a>";
                            } 
                                
                            } else {
                                echo "no hay resultados.";
                            }
                        }
                        
                        
                        $usersearch = $_GET['search'];
                        if ($_GET['type-search'] == 'user') {
                            $dbuser = "SELECT * FROM `users` WHERE nickname LIKE '%$usersearch%' ;";
                            $dbrs = mysqli_query($db,$dbuser);
                            $r = mysqli_fetch_array($dbrs);
                            $username = $r['nickname'];
                            $sql = "SELECT * FROM `users` WHERE nickname = '$username' ;";
                            // echo $sql;
                            $rs2 = mysqli_query($db,$sql);
                            if ($rs2){
                                while ($row = mysqli_fetch_assoc($rs2)) {
                                    echo "<a href='profile.php?idusers=". $row['idusers']."'> ". $row['nickname'] ." </a>";
                            } 
                                
                            } else {
                                echo "no hay resultados.";
                            }
                        }
                    }
                    
                    ?>
                </div>
                <div class="col-md-2"></div>
            </div>

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
