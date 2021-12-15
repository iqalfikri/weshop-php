<?php
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
    if ($search) {
        $search_url = "&search=$search";
        $where = "WHERE banner LIKE'%$search%'";
    }
?>
<div id="frame-tambah">
    <div id="left">
        <form action="<?= BASE_URL."index.php"?>" method="GET">
            <input type="hidden" name="page" value="<?= $_GET["page"]; ?>" />
            <input type="hidden" name="module" value="<?= $_GET["module"]; ?>" />
            <input type="hidden" name="action" value="<?= $_GET["action"]; ?>" />
            <input type="text" name="search" value="<?= $search; ?>" placeholder="Cari banner ..." />
            <input type="submit" value="search" />
        </form>
    </div>
    <div id="right">
        <a class="tombol-action" href="<?= BASE_URL."index.php?page=my_profile&module=banner&action=form"; ?>">+ Tambah
            Banner</a>
    </div>
</div>

<?php
    
    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
    $data_per_halaman = 3;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;

    $queryBanner = mysqli_query($db, "SELECT * FROM banner $where ORDER BY banner_id DESC LIMIT $mulai_dari, $data_per_halaman");
        
    if(mysqli_num_rows($queryBanner) == 0)
    {
        echo "<h3>Saat ini belum ada banner di dalam database</h3>";
    }
    else
    {
        echo "<table class='table-list'>";
            
            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Banner</th>
                    <th class='kiri'>Link</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
                 </tr>";
                 $no=1 + $mulai_dari;
            while($rowBanner=mysqli_fetch_array($queryBanner))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowBanner[banner]</td>
                        <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
                        <td class='tengah'>$rowBanner[status]</td>
                        <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]"."'>Edit</a></td>
                     </tr>";
                
                $no++;
            }
            
        echo "</table>";
        $queryHitungBanner = mysqli_query($db, "SELECT * FROM banner $where");
            pagination($queryHitungBanner, $data_per_halaman, $pagination, "index.php?page=my_profile&module=banner&action=list$search_url");
    }
?>
