<div class="w3-row w3-container w3-padding-16" style="min-height:400px;">
<?php
    $query = 'SELECT * FROM pekerjaan left join user on pekerjaan.id_user=user.id_user WHERE pekerjaan.id_user='.$_SESSION['id_user'];
    if ($_SESSION['status'] == 2) {
        $query = 'SELECT * FROM pekerjaan left join user on pekerjaan.id_user=user.id_user';
    }
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_array($result)){
        ?>
        <div class="w3-col m4">

        <div class="w3-row w3-card-4 w3-margin">
            <header class="w3-container w3-blue">
            <h1><?php echo $row['nama_pekerjaan']; ?></h1>
            </header>

            <div class="w3-container">
            <p><?php echo $row['deskripsi_pekerjaan']; ?></p>
            <p><a href="?halaman=detail_pekerjaan&id=<?php echo $row['id_pekerjaan']; ?>">Selengkapnya</a></p>
            </div>

            <?php
                if($_SESSION['status'] == 1){
                    ?>
                    <div class="w3-container w3-margin-bottom">
                        <a href="?halaman=list_pekerjaan&id=<?php echo $row['id_pekerjaan'];?>">Hapus</a>
                    </div>
                    <?php
                }
            ?>

            <footer class="w3-container w3-blue">
            <h5><?php echo $row['nama']; ?></h5>
            </footer>
        </div>    
        </div>
        <?php
        }
    }else {
        echo ('<h1>Belum Ada List Pekerjaan</h1>');
    }

    if (isset($_GET['id'])){
        $query = "DELETE FROM pekerjaan WHERE id_pekerjaan=".$_GET['id'];
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Berhasil Menghapus Pekerjaan!');
                document.location.href='?halaman=list_pekerjaan'</script>";
        }
    }
?>
</div>