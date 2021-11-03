<?php
require_once "function/helper.php";

$page = isset($_GET['page']) ? $_GET['page'] : false ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weshop Productly | Gadget & Elektronik</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL; ?>img/weshop_icon.svg" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
</head>

<body>
    <div id="container">
        <div id="header">
            <a href="<?= BASE_URL;?>index.php">
                <img src="<?= BASE_URL;?>img/logo.png" alt="">
            </a>

            <div id="menu">
                <div id="user">
                    <a href="<?= BASE_URL; ?>index.php?page=login">Login</a>
                    <a href="<?= BASE_URL; ?>index.php?page=register">Register</a>
                </div>
                <a href="<?= BASE_URL;?>index.php?page=keranjang" id="button-keranjang">
                    <img src="<?= BASE_URL;?>img/cart.png" alt="">
                </a>
            </div>
        </div>
        <div id="content">
            <?php 
                    $filename = "$page.php";
                    if (file_exists($filename)) {
                        include_once($filename);
                    } else {
                        echo "Halaman tidak ditemukan";
                    }
                ?>
        </div>
        <div id="footer">
            <p>Copyright iqal 2021</p>
        </div>
    </div>
</body>

</html>
