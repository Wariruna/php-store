<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form class="login" method="POST" action="validUser.php">
    <?php 
    session_start();
    if (isset($_GET['logout'])) {
        session_unset();
        echo '<p style="color:blue">Sessión cerrada correctamente</p>';
    }
        ?>
    <?php if (isset($_GET['login_fail'])) echo '<p style="color:red">El usuario o contraseña introducidos no existen</p>' ?>
    <?php if (isset($_GET['access_denied'])) echo '<p style="color:red">Acceso Restringido. Rellena las credenciales para acceder</p>' ?>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" autofocus/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td><input type="submit"  value="Entrar"/></td>
            </tr>
        </table>
    </form>






</body>

</html>