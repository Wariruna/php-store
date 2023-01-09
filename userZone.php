<!DOCTYPE html>
<?php
include "ConnectionDB/connectDB.php";
include "productInCart.php";
session_start();

/**
 * VALIDACIONES
 */

 //Valida que exita una session con nombre de usuario almacenado en ella. Si no es así deniega el acceso.
if (!isset($_SESSION['username'])) {
    header('location:' . 'login.php?access_denied');
}

//Comprueba si el usuario acaba de iniciar sesión. Para crear un carrito en la session donde almacenar los productos.
if (isset($_GET['login'])) {
    $_SESSION['cart'] = [];
    $_SESSION['num'] = [];
}

//Aquí es donde habrá que validar el producto elegido si está repetido y añadirlo al array como objeto "productInCart"
if (isset($_POST['product'])) { 
    $nameProduct = $_POST['product'];
    $priceProduct = $_POST['price'];
    $cantProduct = $_POST['cant'];
    $item = new productInCart($nameProduct, $priceProduct, $cantProduct);
    $flag = false;
    foreach ($_SESSION['cart'] as $oldItem) {
        if ($oldItem->getname() == $nameProduct) {
            $oldItem->setCant($oldItem->getCant() + $cantProduct);
            $flag = true;
        }
    }
    if (!$flag) {
        array_push($_SESSION['cart'], $item);
    }
    header('location:' . 'userZone.php');
}
//----------------------------------------------------------------------------------------------------------------------------
/**
 * Conexxión con Base de Datos
 */
$conn = new connectDB();
$productos = $conn->getProducts();
//----------------------------------------------------------------------------------------------------------------------------
?>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Zone</title>
    <script type='text/javascript' async src='Resources/js.js'></script><!--Se puede usar en vez de async defer -->
</head>

<body>
    <?php include "userHeader.php"; ?>

    <section id="products_area">
        <?php
        $id = 0;
        foreach ($productos as $product) {
            echo
            "<section class='card'>"
                . "<h3 class='title'>"
                . $product['name']
                . "</h3>"
                . ""
                . "<div class='price'>"
                ."<b>Precio: ".$product['price']."€</b>"
                ."</div><div class='description'>"
                . $product['description']."</div>"
                . "<form method='POST' action='userZone.php'>"
                . "<input type='hidden' name='product' value='" . $product['name'] . "'/>"
                . "<input type='hidden' name='price' value='" . $product['price'] . "'/>"

                ."<div class='handler_cant' >"
                
                ."<img id='".$id."' class='icon less' src='Resources/icons/less_icon.png' />"
                
                ."<input id='".$id."' class='cant input' type='number' name='cant' min=1 value=1 />"
                
                ."<img id='".$id."' class='icon more' src='Resources/icons/more_icon.png' />"
                
                ."</div>"
                . "<button class='add_cart'>Añadir al Carrito</button>"
                . "</form>"
                . "</section>";
                $id++;
                
        }
       // echo "<script defer type='text/javascript' src='Resources/js.js'></script>";

        ?>
    <form action="contacto.php" method="POST">
    <button type="submit">Contacto</button>
    </form>
    </section>


</body>

</html>