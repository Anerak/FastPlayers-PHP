<?php
include('top.php');

$dia = $_REQUEST['dia'];
$hdesde = $_REQUEST['hora_desde'];
$hhasta = $_REQUEST['hora_hasta'];

if (($hdesde == '') || ($hhasta) == '') {
        $sql = "DELETE FROM `horarios` WHERE idusers = " . $_SESSION['idusers'] . " AND dia = '$dia';";
        $rs = mysqli_query($db,$sql);
    } else {
    $check = "SELECT * FROM horarios WHERE idusers = " . $_SESSION['idusers'] . " AND dia = '$dia';";
    $rs = mysqli_query($db, $check);
    $r = mysqli_fetch_array($rs);
    if (!$r) {
            $sql = "INSERT INTO `horarios` (`idusers`, `dia`,`hora_desde`,`hora_hasta`) VALUES (" . $_SESSION['idusers'] .",'$dia', '$hdesde', '$hhasta');";
            $rs = mysqli_query($db, $sql);
        } else {
            $sql = "UPDATE `horarios` SET hora_desde = '$hdesde', hora_hasta = '$hhasta' WHERE idusers = " . $_SESSION['idusers'] . " AND dia = '$dia' ;";
            $rs = mysqli_query($db, $sql);
    }
}
//die($sql);
header('Location: ../account.php');

// $contador = 0;
// if (isset($_REQUEST['dia'])){
//     foreach ($_REQUEST['dia'] as $k=>$v){
        
//     //  echo "insertar fecha $v y hora ".$_REQUEST['hora'][$contador]." en la base.<BR>";
//       $contador++;
//     }
    
// }
?>