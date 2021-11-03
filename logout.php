<?php
    // session_start();

    // unset($_SESSION['user_id']);
    // unset($_SESSION['nama']);
    // unset($_SESSION['level']);
    
    // header("location: index.php");
    session_start();
$_SESSION = [];
session_unset();
session_destroy();
header("location: index.php");
exit;
?>
