<?php
session_start();

$destinatary = "aaron_soak@hotmail.com";

$usename = $_SESSION['username'];
$message = $_POST['message'];
$header = "Contact from phpStore";
$subject = "Contacto";

if(mail('aaron_soak@hotmail.com','prueba',$message)) {
    echo "email succesfully";
}else {
    echo "error";
}

//header("location:". "userZone.php");

?>