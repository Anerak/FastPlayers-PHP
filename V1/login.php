<?php
include('includes/top.php');
    if ($_SESSION['idusers'] != '') {
        header('Location: index.php');
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
                            <div class="col-md-3 col-sm-1"><h3>Iniciar sesión</h3></div>
                            <div class="col-md-1 col-sm-0"></div>
                            <div class="col-md-4 col-sm-3">
                                <form method=post action="includes/loguser.php">
                                    <input type="email" name="email" placeholder="E-mail" required/>
                                    <input type="password" name="passw" placeholder="Contraseña" required/>
                                    <input type="submit">
                                </form>
                            </div>
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