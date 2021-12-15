<?php 
    require_once "../../function/koneksi.php";
    require_once "../../function/helper.php";

    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : "";

    $nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : false;
    $kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : false;
    $spesifikasi = isset($_POST['spesifikasi']) ? $_POST['spesifikasi'] : false;
    $status = isset($_POST['status']) ? $_POST['status'] : false;
    $harga = isset($_POST['harga']) ? $_POST['harga'] : false;
    $stok = isset($_POST['stok']) ? $_POST['stok'] : false;
    $update_gambar = "";
    
    if (!empty($_FILES["file"]["name"])) {
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../img/barang/".$nama_file);

        $update_gambar = ", gambar='$nama_file'";
    }

    if ($button == "Add") {
        $query = mysqli_query($db, "INSERT INTO barang (kategori_id, nama_barang, spesifikasi, gambar, harga, stok, status) VALUES('$kategori_id','$nama_barang','$spesifikasi', '$nama_file','$harga', '$stok','$status')");
        if (!$query) {
            die("Query gagal dijalankan: " . mysqli_errno($db) .
                " - " . mysqli_error($db));
        }
        
    } else if ($button == "Update") {
       mysqli_query($db, "UPDATE barang SET kategori_id='$kategori_id',nama_barang='$nama_barang',spesifikasi='$spesifikasi',harga='$harga',stok='$stok',status='$status'$update_gambar  WHERE barang_id='$barang_id'");
       
    } else if ($button = "Delete") {
        mysqli_query($db, "DELETE FROM barang WHERE barang_id='$barang_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
?>
