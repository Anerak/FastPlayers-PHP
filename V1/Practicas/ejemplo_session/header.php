<!DOCTYPE html>
<html>
    <div>Logo y navegacion</div><br><br>
    
<?php
if ($_SESSION['user_id']==''){
    echo "<a href='login.php'>Ingresar</a>";
} else {
    echo "Bienvenido fulanito<Br>";
}
?>

<Br><br>