<!DOCTYPE html>
<?php 
session_start();
include ("../productInCart.php");
include ("adminValidation.php");


?>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Zone</title>
</head>
<body>
    <?php include "adminHeader.php"; ?>
    <form action="addProducts.php" Method="GET">
    <button>Añadir Productos</button>
    </form>
</body>
</html>