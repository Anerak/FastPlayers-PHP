<?php

//function recibirNumero($edad) {
//    $edad = $_REQUEST['edad'];
//    return $edad;
//}


$vemail = false;
$vpassword = false;
$ok = file_get_contents('ok.txt');
$bad = file_get_contents('bad.txt');

function validateEmail($email) {

   if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
        $vemail = true;
    }
}

function validatePassword($password) {

    if ($password == "ABC") {
        $vpassword = true;
    }

}

function postLogin() {
    if ($vemail && $vpassword) {
        echo $ok;
    } else {
        echo $bad;
    }
}
?>