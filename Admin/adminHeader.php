
<header id="admin">
        <h1>Zona Admin'</h1>
        <div id="cart">
            <?php echo "Hola ".$_SESSION['username']."<br/>";  ?>
            <a href="../cart.php"><img class="icon purchase" title="Ir a tu cesta" src="../Resources/icons/purchase_icon.png" /></a>
            <?php if ($_SESSION['role'] === "admin") {
            echo "<a href='adminMenu.php'><img class='icon' title='Administrador' src='../Resources/icons/admin_icon.png' /></a>";
        }
        ?>
            <a href="../login.php?logout"><img class="icon" title="Cerrar sesión" src="../Resources/icons/logout_icon.png" /></a>

            <?php
            
            if(isset($_SESSION['cart'])){
                $itemNum = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $itemNum += $item->getCant();
                }
            }else {
                $itemNum = 0;
            } 
            echo  "<p>".$itemNum ." artículos en la cesta</p>";
            ?>
            
        </div>
    </header>