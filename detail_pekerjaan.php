<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM pekerjaan left join user on pekerjaan.id_user=user.id_user WHERE id_pekerjaan=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <div style="width:1024px; margin:0 auto; min-height: 400px;">
        <div class="w3-row">
            <div class="w3-col m8">
                <h1><?php echo $row['nama_pekerjaan']; ?></h1>
                <p><?php echo $row['deskripsi_pekerjaan']; ?></p>
                <p><?php echo $row['nama']; ?></p>
            </div>
            <?php
            if (isset($_SESSION['login'])){
                if ($_SESSION['status'] == 1) {
            ?>
            <div class="w3-col m4">
                <h1>Daftar Pelamar</h1>
                <?php
                    $query = "SELECT lamaran_pekerjaan.pesan_lamaran, lamaran_pekerjaan.status, lamaran_pekerjaan.id_lamaran, user.nama, user.email, user.no_hp, user.id_user FROM lamaran_pekerjaan 
                        left join user on lamaran_pekerjaan.id_user=user.id_user
                        WHERE lamaran_pekerjaan.id_pekerjaan=$id";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="w3-card w3-padding">
                            <div class="w3-container w3-text-dark-grey w3-large"><b><?php echo $row['nama'];?></b></div>
                            <div class="w3-container w3-text-dark-grey">
                                <?php echo $row['no_hp'] . " | " . $row['email'];?>
                            </div>
                            <div class="w3-container w3-text-dark-grey"><?php echo $row['pesan_lamaran'];?></div>
                            <div class="w3-container w3-text-dark-grey">                               
                                <h5><?php 
                                    if($row['status'] == 0) echo "Belum di proses";
                                    else if($row['status'] == 1) echo "Telah di terima";
                                    else echo "Ditolak"; ?></h5>
                            </div>
                            <div class="w3-container w3-text-dark-grey">
                                <a href="?halaman=cv&id=<?php echo $row['id_user'];?>">Lihat CV</a>
                                <a href="?halaman=detail_pekerjaan&id=<?php echo $id;?>&status=1&id_lamaran=<?php echo $row['id_lamaran'];?>">Terima</a>
                                <a href="?halaman=detail_pekerjaan&id=<?php echo $id;?>&status=2&id_lamaran=<?php echo $row['id_lamaran'];?>">Tolak</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div> 
                <?php
            }
        } 
        ?>    
        </div>
        <?php
        if (isset($_SESSION['login'])){
            if ($_SESSION['status'] == 0) {
                ?>
                <button class='w3-button w3-green' onclick="document.getElementById('ajukan_lamaran').style.display = 'block'">Ajukan Lamaran</button><br><br>
                <?php
            }
        }
        ?>      
    </div>

    <div class="w3-modal" id="ajukan_lamaran">
        <div class="w3-modal-content" style="width: 500px; margin: auto">
            <div class="w3-padding">
            
            <form action="" method="post" class="w3-container">
                <h1 class="w3-padding-16">Ajukan Lamaran</h1>
                <p>Pesan Lamaran</p>
                <textarea name="pesan_lamaran" placeholder="Masukkan Deskripsi/Pesan Lamaran" class="w3-input"></textarea>
                <br>
                <div class="w3-row">
                    <input type="submit" name="ajukan_lamaran" value="Kirim Lamaran" class="w3-button w3-green w3-right">
                    <input type="button" onclick="document.getElementById('ajukan_lamaran').style.display = 'none'" value="Tutup" class="w3-button w3-red w3-right" style="margin-right: 10px">
                </div>
            </form>
            </div>
        </div>
    </div>

    <?php    
    if (isset($_POST['ajukan_lamaran'])) {
        $pesan_lamaran = $_POST['pesan_lamaran'];
        $query = "INSERT INTO lamaran_pekerjaan (pesan_lamaran, id_user, id_pekerjaan)
            VALUES ('$pesan_lamaran', ".$_SESSION['id_user'].", ".$_GET['id'].")";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Berhasil Mengirim Lamaran!');
                document.location.href='?halaman=detail_pekerjaan&id=".$_GET['id']."'</script>";
        }
    }
    if (isset($_GET['status']) && isset($_GET['id_lamaran'])){
        $status = $_GET['status'];
        $id_lamaran = $_GET['id_lamaran'];
        $query = "UPDATE lamaran_pekerjaan SET status=$status WHERE id_lamaran=$id_lamaran";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Berhasil Mengubah Status Lamaran!');
                document.location.href='?halaman=detail_pekerjaan&id=".$_GET['id']."'</script>";
        }
    }
}
?>