<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "productInCart.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location:' . 'login.php?access_denied');
    }
    //Esto valida que exista un método GET para AUMENTAR la cantidad de articulo de la lista
    if (isset($_GET['add_to_item']) || isset($_GET['less_to_item'])) {
        if (isset($_GET['add_to_item'])) {
            $_SESSION['cart'][$_GET['add_to_item'] - 1]->setCant($_SESSION['cart'][$_GET['add_to_item'] - 1]->getCant() + 1);
            header("location:" . "cart.php");
        } elseif ($_GET['less_to_item'] && $_SESSION['cart'][$_GET['less_to_item'] - 1]->getCant() < 2) {
            array_splice($_SESSION['cart'], $_GET['less_to_item'] - 1, 1);
            header("location:" . "cart.php");
        } else {
            $_SESSION['cart'][$_GET['less_to_item'] - 1]->setCant($_SESSION['cart'][$_GET['less_to_item'] - 1]->getCant() - 1);
            header("location:" . "cart.php");
        }
        //header("location:"."cart.php");//Tras borrar es necesario redirigir para que al recargar no siga eliminando objetos del carrito.
    }



    //Este IF valida que exista un método GET para ELIMINAR el articulo de la lista que se deseé.
    if (isset($_GET['delete_item'])) {
        array_splice($_SESSION['cart'], $_GET['delete_item'] - 1, 1); //array_splice elimina el dato de un array y reindexa el mismo array.
        header("location:" . "cart.php"); //Tras borrar es necesario redirigir para que al recargar no siga eliminado objetos del carrito.
    }
    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include "userHeader.php"; //Incluye el encabezado en la página
    ?>
    <section id="maxim_cart">
        <a href="userZone.php">
            <button id="go_shop">
                << Seguir Comprando</button>
        </a>
        <br />

        <?php
        $item = 1;
        $totalCount = 0;
        if (sizeof($_SESSION['cart']) === 0) {
            echo "<h2>Todavía no tienes ningún producto en tu cesta</h2>";
        } else {
            echo "<table>"
                . "<caption><b>Mi cesta</b></caption>"
                . "<thead><th></th><th>Producto</th><th>Precio/ud</th><th>Cantidad</th><th>Total</th></thead>"
                . "<tbody>";
            foreach ($_SESSION['cart'] as $cashProduct) {
                $totalPrice = $cashProduct->getPrice() * $cashProduct->getCant();
                echo "<tr>"
                    . "<td>" . $item . ".</td><td>" . $cashProduct->getName() . "</td><td>" . $cashProduct->getPrice() . "€</td><td>" . $cashProduct->getCant() . "</td><td>" . $totalPrice . "€</td>"
                    . "<td><a href='cart.php?less_to_item=" . $item . "'><img class='icon' src='Resources/icons/less_icon.png'/></a><a href='cart.php?add_to_item=" . $item
                    . "'><img class='icon' src='Resources/icons/more_icon.png'/></a></td>" //Estos botones añadirán o restaran cantidades al producto.
                    . "<td><a href='cart.php?delete_item=" . $item . "'><img class='icon' src='Resources/icons/rubbish_icon.png' /></a></td>" //Este boton eliminará el producto de la cesta
                    . "</tr>";
                $item++;
                $totalCount += $totalPrice;
                $_SESSION['check'] = $totalCount;
            }
            echo "</tbody><tfoot>"
                . "<td></td><td><b>TOTAL:</b></td><td></td><td></td><td id='total'><b>" . $totalCount . "€</b></td>"
                . "</tfoot></table>";
            $item = 1;
        }
        if (sizeof($_SESSION['cart']) !== 0) {
            include "./comprarAhora.php";
        }

        ?>
    </section>
</body>

</html>