<!DOCTYPE html>
<?php
session_start();

include "adminValidation.php";
include "adminHeader.php"; ?>

<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>CREAR NUEVO PRODUCTO</h2>

    <table>
        <tr>
            <form action="addProducts.php" method="GET">
                <td>Familia del producto</td>
                <td><select name="family" required>
                        <?php include "getCategorized.php";
                        getFamilies();
                        ?>
                    </select>
                </td>
                <td><input type="submit" value="Seleccionar" /></td>
            </form>
        </tr>
        <tr>
            <form action="addProducts.php" method="GET">
                <td>Categoría</td>
                <td><select name="category" required>
                        <?php getCategories(1)  ?>
                    </select>
                </td>
                <td><input type="submit" value="Seleccionar" /></td>
            </form>
        </tr>
        <tr>
            <form action="addProducts.php" method="GET">
                <td>Subcategoría</td>
                <td><select name="subcategory" required>
                        <?php getSubcategories() ?>
                    </select></td>
                <td><input type="submit" value="Seleccionar" /></td>
            </form>
        </tr>

        <form action="logicAddProduct.php" method="POST">
            <tr>
                <td>Nombre del Producto</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Marca del Producto</td> 
                <td><input type="text" name="brand" required></td>
            </tr>
            <tr>
                <td>CAT</td> 
                <td> <?php subcatSelected() ?> </td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="number" step="any" name="price" required></td>
            </tr>
            <tr>
                <td>Descripción del Producto</td>
                <td><textarea type="text" name="description" placeholder="Description..." required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right;"><input type="submit" value="Añadir Producto"></td>
            </tr>

    </table>
    </form>
</body>

</html>