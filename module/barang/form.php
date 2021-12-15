<?php

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $kategori_id = "";
    $nama_barang = "";
    $spesifikasi = "";
    $gambar = "";
    $stok = "";
    $harga = "";
    $status = "";
    $keterangan_gambar = "";
    $button = "Add";

    if ($barang_id) {
        $query = mysqli_query($db, "SELECT * FROM barang WHERE barang_id='$barang_id'");
        $row = mysqli_fetch_assoc($query);

        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $spesifikasi = $row['spesifikasi'];
        $gambar = $row['gambar'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $status = $row['status'];
        $button = "Update";

        $keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
        $gambar = "<img src='".BASE_URL."img/barang/$gambar' style='width: 200px; vertical-align: middle;' />";
    }

?>
<script src="<?= BASE_URL; ?>js/ckeditor/ckeditor.js"></script>
<form action="<?= BASE_URL."module/barang/action.php?barang_id=$barang_id";?>" method="POST"
    enctype="multipart/form-data">
    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                    $query = mysqli_query($db, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC"); 
                    while ($row = mysqli_fetch_assoc($query)) {
                        if($kategori_id == $row['kategori_id']){
                            echo " <option value='$row[kategori_id]' selected>$row[kategori]</option>";
                        } else {
                        echo " <option value='$row[kategori_id]'>$row[kategori]</option>";
                        }
                    }
                ?>
            </select>
        </span>
    </div>
    <div class="element-form">
        <label>Nama Barang</label>
        <span><input type="text" name="nama_barang" value="<?= $nama_barang;?>"></span>
    </div>
    <div style="margin-bottom:10px" ;>
        <label style="font-weight:bold" ;>Spesifikasi</label>
        <span><textarea name="spesifikasi" id="editor"><?= $spesifikasi;?></textarea></span>
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
        <label>Gambar Produk <?= $keterangan_gambar; ?></label>
        <span>
            <input type="file" name="file"><?= $gambar; ?>
        </span>
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

<script>
CKEDITOR.replace("editor");

// var roxyFileman = 'js/ckeditor/fileman/index.html';
// $(function() {
//     CKEDITOR.replace('editor', {
//         filebrowserBrowseUrl: roxyFileman,
//         filebrowserImageBrowseUrl: roxyFileman + '?type=image',
//         removeDialogTabs: 'link:upload;image:upload'
//     });
// });
</script>
