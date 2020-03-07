<div class="w3-row w3-container w3-padding-16">
<?php
    $query = 'SELECT * FROM pekerjaan left join user on pekerjaan.id_user=user.id_user';
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
?>
</div>