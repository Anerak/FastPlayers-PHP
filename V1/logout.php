<?php
include('top.php');
$_SESSION['idusers'] = '';
session_destroy();
header('Location: ../index.php');

?>