<?php
include('top.php');
if ($_REQUEST['user']!=''){
    //loguear usuario
    
    //si OK
    $_SESSION['user_id'] = 5;//el ID que trajimos de la base;
    
    // si no OK - lo comento para que no se ejecute para este ejemplo.
   // unset($_SESSION['user_id']);
}

include('header.php');
?>
<form>
    Usuario: <input type="text" name="user"/><br>
Pass:<input type="pasword" name="pass"/><br>
    <input type="submit" value="Submit"/>
</form>
<?
include('footer.php');
?>