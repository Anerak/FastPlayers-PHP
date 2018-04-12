<?php
include('includes/top.php');
unset($_SESSION);
session_destroy();
header('Location: ../index.php');
?>