<?php

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] === "admin") {
        header('location: ' . 'adminMenu.php');
    } else {
        header('location: ' . '../userZone.php');
    }
} else {
    header('location: ' . '../login.php?access_denied');
}
?>