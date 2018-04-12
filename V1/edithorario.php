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
                        <div class="row justify-content-center">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-6" id="fhorario">
                            <form class="md-form" method=POST action="includes/modhorario.php">
                                <select name="dia" class="dropdown" required>
                                    <option class="dropdown-item" value="1">Domingo</option>
                                    <option class="dropdown-item" value="2">Lunes</option>
                                    <option class="dropdown-item" value="3">Martes</option>
                                    <option class="dropdown-item" value="4">Miércoles</option>
                                    <option class="dropdown-item" value="5">Jueves</option>
                                    <option class="dropdown-item" value="6">Viernes</option>
                                    <option class="dropdown-item" value="7">Sábado</option>
                                </select>
                                <div class="row">
                                    <div class="col">
                                        <label class="label active" name="hora_desde">Hora desde</label>
                                        <input type="time" name="hora_desde"/>
                                    </div>
                                    <div class="col">
                                        <label class="label active" name="hora_hasta">Hora hasta</label>
                                        <input type="time" name="hora_hasta"/>
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
