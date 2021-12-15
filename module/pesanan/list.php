<?php
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
    if ($search) {
        $search_url = "&search=$search";
        $where = "WHERE user.nama LIKE'%$search%'";

    }
?>
<div id="frame-tambah">
    <div id="left">
        <form action="<?= BASE_URL."index.php"?>" method="GET">
            <input type="hidden" name="page" value="<?= $_GET["page"]; ?>" />
            <input type="hidden" name="module" value="<?= $_GET["module"]; ?>" />
            <input type="hidden" name="action" value="<?= $_GET["action"]; ?>" />
            <input type="text" name="search" value="<?= $search; ?>" placeholder="Cari pemesan ..." />
            <input type="submit" value="search" />
        </form>
    </div>
</div>
<?php
    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $data_per_halaman = 5;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;

    if ($level == "superadmin") { 
        $queryPesanan = mysqli_query($db, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id $where ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $mulai_dari, $data_per_halaman");
    } else {
        $queryPesanan = mysqli_query($db, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id  WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $mulai_dari, $data_per_halaman");
    }

        if (mysqli_num_rows($queryPesanan) == 0) {
            echo "<h3>Saat ini belum ada data pesanan</h3>";
        } else {

            echo "<table class='table-list'>
                            <tr class='baris-title'>
                                <th class='kiri'>Nomor Pesanan</th>
                                <th class='kiri'>Status</th>
                                <th class='kiri'>Nama</th>
                                <th class='tengah'>Action</th>
                            </tr>";

            $adminButton = "";
            while ($row = mysqli_fetch_assoc($queryPesanan)) {
                if ($level == 'superadmin') {
                    $adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
                }
                $status = $row['status'];
                echo "<tr>
                                <td class='kiri'>$row[pesanan_id]</td>
                                <td class='kiri'>$arrayStatusPesanan[$status]</td>
                                <td class='kiri'>$row[nama]</td>
                                <td class='tengah'>
                                        <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a><br>
                                        $adminButton
                                </td>
                            </tr>";
            }

            echo "</table>";
            
            $queryHitungPesanan = mysqli_query($db, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id $where");
            pagination($queryHitungPesanan, $data_per_halaman, $pagination, "index.php?page=my_profile&module=pesanan&action=list$search_url");
        }
    
