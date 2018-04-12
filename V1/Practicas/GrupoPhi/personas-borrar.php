<?php 
// *****************************************************************************
// Nombre: personas-borrar.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("includes/conexion.php");

$sql = "DELETE FROM personas WHERE id = " . $_GET["id"];
$rs = mysqli_query($db, $sql);

header('Location: personas-lista.php');

?>