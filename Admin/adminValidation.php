<?php 
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] !== "admin") {
        header('location: ' . '../userZone.php');
    }
} else {
    header('location: ' . '../login.php?access_denied');
}

?>