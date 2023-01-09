<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "ConnectionDB/connectDB.php";
    
    
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $validate = new connectDB();

    if ($validate->validateUser($name,$pass)) {
        session_start();
        $_SESSION['username'] = $name;
        $_SESSION['role'] = $validate->getRole($name);
        header('location:'.'userZone.php?login');
    }else {
        header('location:'.'login.php?login_fail');
    }

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>