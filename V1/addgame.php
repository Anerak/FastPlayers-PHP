<?php
include('includes/top.php');

if ($_SESSION['idusers'] != '1') {
    header('Location:account.php');
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
                    <div class="col-10">
                        <div class="row">
                            <form method=post action="includes/addgame.php">
                                <input type="text" name="gname" placeholder="Nombre del juego" required/>
                                <input type="number" name="idgame" placeholder="ID del juego" required/>
                                <input type="submit">
                            </form>
                    </div>
                    <div class="col-1"></div>
                </div>
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
