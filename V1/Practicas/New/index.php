<?php
    include('funcion.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       

    </head>
    
    <body>
        <form method=post action="index.php">
        <input placeholder="Nombre" type="text" name="nombre" value="<?php echo $nombre;?>"/>
        <input placeholder="Apellido" type="text" name="apellido" value="<?php echo $apellido;?>"/>
        <input placeholder="Telefono" type="text" name="telefono" value ="<?php echo $telefono;?>"/>
        <input placeholder="ID" type="text" name="id"/>
        <input type="submit" value="Submit"/>
    </form>
    <p><?php $ok?></p>
    </body>
</html>

