<?php

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "";
    $spesifikasi = "";
    $stok = "";
    $harga = "";
    $status = "";
    $button = "Add";

    // if ($kategori_id) {
    //     $queryKategori = mysqli_query($db, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
    //     $row = mysqli_fetch_assoc($queryKategori);

    //     $kategori = $row['kategori'];
    //     $status = $row['status'];
    //     $button = "Update";
    // }

?>
<form action="<?= BASE_URL."module/barang/action.php?barang_id=$barang_id";?>" method="POST"
    enctype="multipart/form-data">
    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                    $query = mysqli_query($db, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC"); 
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo " <option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                ?>
            </select>
        </span>
    </div>
    <div class="element-form">
        <label>Nama Barang</label>
        <span><input type="text" name="nama_barang" value="<?= $nama_barang;?>"></span>
    </div>
    <div class="element-form">
        <label>Spesifikasi</label>
        <span><textarea name="spesifikasi"><?= $spesifikasi;?></textarea></span>
    </div>
    <div class="element-form">
        <label>Stok</label>
        <span><input type="text" name="stok" value="<?= $stok;?>"></span>
    </div>
    <div class="element-form">
        <label>Harga</label>
        <span><input type="text" name="harga" value="<?= $harga;?>"></span>
    </div>
    <div class="element-form">
        <label>Gambar Produk</label>
        <span><input type="file" name="file"></span>
    </div>
    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if($status == "on") {echo "checked='true'";}?>>On
            <input type="radio" name="status" value="off" <?php if($status == "off") {echo "checked='true'";}?>>Off
        </span>
    </div>
    <div class="element-form">
        <span><input type="submit" name="button" value="<?= $button;?>"></span>
    </div>
</form>
