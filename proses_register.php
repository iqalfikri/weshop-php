<?php
require_once "function/koneksi.php";
require_once "function/helper.php";

$level = "customer";
$status = "on";
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$password =$_POST['password'];
$re_password = $_POST['re_password'];

unset($_POST['password']);
unset($_POST['re_password']);
$dataForm = http_build_query($_POST);


$dbEmail = mysqli_query($db, "SELECT * FROM user WHERE email= '$email'");

if (empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)) {
    header("location:".BASE_URL."index.php?page=register&notif=require&$dataForm");
}elseif ($password != $re_password) {
    header("location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
}elseif (mysqli_num_rows($dbEmail) == 1) {
    header("location:".BASE_URL."index.php?page=register&notif=email&$dataForm");
}  else {
    $password = md5($password);
    $sql = "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                VALUES('$level','$nama_lengkap','$email','$alamat','$phone','$password','$status')";
    
    $query = mysqli_query($db, $sql);
    if (!$query) {
        die("Query gagal dijalankan: " . mysqli_errno($db) .
                    " - " . mysqli_error($db));
    } else {
        header("location:".BASE_URL."index.php?page=login");
    }
}
