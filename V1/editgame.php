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
                    <div class="col-md-3 col-xs-4"></div>
                    <div class="col-md-6 col-xs-8">
                        <h3>¿A qué deseas jugar?</h3>
                        <div class="row justify-content-center">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-6" id="fhorario">
                            <form class="md-form" method=POST action="includes/modgame.php">
                                <div class="row">
                                    <div class="col">
                                        <!--<label class="label active" name="game_name">Nombre del Juego</label>-->
                                        <input type="text" name="game_name" placeholder="Nombre del juego"/>
                                    </div>
                                </div>
                                <div class="row">
                                <button class="btn green" type=submit>Guardar</button>
                                </div>
                            </form>
                            
                            </div>
                            <div class="col-md-2 col-xs-1"></div>
                        </div>
                    </div>
                    <div class="col-xs-0"></div>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $("#fhorario").on("click", function(){
                $(".items input").clone().insertAfter(".items");
                
            });
            
        </script>
    
    <!--Custom JS-->
    <script type="text/javascript" src="../js/edithorario.js"></script>
</body>

</html>
