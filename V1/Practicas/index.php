<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <form method=get action="index.php">
        <input placeholder="Email" type="text" name="email"/>
        <input placeholder="Password" type="password" name="password"/>
        <input type="submit" value="Submit"/>
    </form>
    </body>
</html>



<?php 
    include('funcion.php');
    
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    validateEmail($email);
    validatePassword($password);
    postLogin();
    //echo $_REQUEST['nombre'] . " va a vivir " . recibirNumero($edad) . " años.";
?>