<?php 
    if ($user_id) {
        header("location: ".BASE_URL);
    }
?>

<div id="container-user-access">
    <form action="<?= BASE_URL;?>proses_register.php" method="POST">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false ;
        $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false ;
        $email = isset($_GET['email']) ? $_GET['email'] : false ;
        $phone = isset($_GET['phone']) ? $_GET['phone'] : false ;
        $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false ;

        if ($notif == "require") {
            echo"<div class='notif'>Maaf, kamu harus melengkapi form dibawah ini</div>";
        } else if ($notif == "password") {
            echo"<div class='notif'>Maaf, password yang kamu masukkan tidak sama</div>";
        } else if ($notif == "email") {
            echo"<div class='notif'>Maaf, email yang kamu masukkan sudah terdaftar</div>";
        }
    ?>
        <div class="element-form">
            <label for="nama_lengkap">Nama Lengkap</label>
            <span><input type="text" name="nama_lengkap" value="<?= $nama_lengkap?>"></span>
        </div>
        <div class="element-form">
            <label for="email">Email</label>
            <span><input type="email" name="email" value="<?= $email?>"></span>
        </div>
        <div class="element-form">
            <label for="phone">Nomor Telepon</label>
            <span><input type="text" name="phone" value="<?= $phone?>"></span>
        </div>
        <div class="element-form">
            <label for="alamat">Alamat</label>
            <span><textarea name="alamat"><?= $alamat?></textarea></span>
        </div>
        <div class="element-form">
            <label for="password">Password</label>
            <span><input type="password" name="password"></span>
        </div>
        <div class="element-form">
            <label for="password">Re-type Password</label>
            <span><input type="password" name="re_password"></span>
        </div>
        <div class="element-form">
            <span><input type="submit" value="register"></span>
        </div>
    </form>
</div>
