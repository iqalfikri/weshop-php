<?php
    require_once "function/koneksi.php";
    require_once "function/helper.php";
    
    session_start();
    $page = isset($_GET['page']) ? $_GET['page'] : false ;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false ;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);
 
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
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/banner.css">

    <script src="<?= BASE_URL; ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= BASE_URL; ?>js/slidesjs/source/jquery.slides.min.js"></script>
    <script>
    $(function() {
        $('#slides').slidesjs({
            height: 350,
            play: {
                auto: true,
                interval: 3000
            },
            navigation: false
        });
    });
    </script>
</head>

<body>
    <div id="container">
        <div id="header">
            <a href="<?= BASE_URL;?>index.php">
                <img src="<?= BASE_URL;?>img/logo.png" alt="">
            </a>

            <div id="menu">
                <div id="user">
                    <?php
                        if ($user_id) {
                            echo "Hi <b>$nama</b>, 
                            <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                            <a href='".BASE_URL."logout.php'>Logout</a>";
                        } else {
                            echo "<a href='". BASE_URL."index.php?page=login'>Login</a>";
                            echo "<a href='". BASE_URL."index.php?page=register'>Register</a>";
                        }
                    ?>
                </div>
                <a href="<?= BASE_URL;?>index.php?page=keranjang" id="button-keranjang">
                    <img src="<?= BASE_URL;?>img/cart.png">
                    <?php
                        if($totalBarang != 0) {
                            echo"<span class='total-barang'>$totalBarang</span>";
                        }
                    ?>
                </a>
            </div>
        </div>
        <div id="content">
            <?php 
                    $filename = "$page.php";
                    if (file_exists($filename)) {
                        include_once($filename);
                    } else {
                        include_once("main.php");
                    }
                ?>
        </div>
        <div id="footer">
            <p>Copyright iqal 2021</p>
        </div>
    </div>
</body>

</html>
