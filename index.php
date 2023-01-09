   <?php
    session_start();
    if (isset($_session['username'])) {
        header('location: ' . 'userZone.php');
    } else {
        header('location: ' . 'login.php');
    }
    ?>
   