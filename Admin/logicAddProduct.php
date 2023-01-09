<?php 
session_start();
include "../ConnectionDB/connectDB.php";

if ((isset($_POST['name'])) && (isset($_POST['brand'])) && (isset($_POST['price'])) && (isset($_POST['description'])) && (isset($_POST['subcategory']))) {
    $conn = new ConnectDB();
    $conn->addProduct($_POST['name'],$_POST['price'],$_POST['brand'],$_POST['description'], $_POST['subcategory']);
    header("location:". "addProducts.php");

}else {
    echo $_POST['name']."<br/>".$_POST['brand']."<br/>".$_POST['subcategory']."<br/>".$_POST['price']."<br/>".$_POST['description']."<br/>";
}

?>