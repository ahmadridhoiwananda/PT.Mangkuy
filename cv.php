<div class="w3-row w3-continer" style="min-height: 500px">
    <div class="w3-col m8">
        <div class="w3-container w3-padding w3-padding-32">
            <?php
                $query = "SELECT * FROM cv WHERE id_user=".$_SESSION['id_user'];
                if (isset($_GET['id'])) {
                    $query = "SELECT * FROM cv WHERE id_user=".$_GET['id'];
                }
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="w3-card w3-padding">
                        <div class="w3-container w3-text-dark-grey w3-large"><b><?php echo $row['keahlian'];?></b></div>
                        <div class="w3-container w3-text-dark-grey"><?php echo $row['deskripsi_cv'];?></div>
                    </div>
                    <?php
                    }
                }
                else {
                    ?>
                    <div class="w3-card w3-padding">
                        <div class="w3-container w3-center w3-text-dark-grey">Belum ada CV, harap menambahan terlebih dahulu</div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
    <div class="w3-col m4">
        <?php
            if (isset($_GET['id'])){
                $query = "SELECT * FROM user WHERE id_user=" . $_GET['id'];
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="w3-container">
                    <h1 class="w3-padding-16"><?php echo $row['nama'];?></h1>
                    <div class="w3-text-dark-grey">
                        No HP: <?php echo $row['no_hp'];?><br>
                        E-Mail: <?php echo $row['email'];?>
                    </div>
                </div>
                <?php
            }
            else {
        ?>
            <form action="" method="post" class="w3-container" enctype="multipart/form-data">
                <h1 class="w3-padding-16">Curriculum Vitae</h1>

                <p>Keahlian</p>
                <input type="text" name="keahlian" placeholder="Masukkan Keahlian"  class="w3-input">
                <p>Deskripsi</p>
                <textarea name="deskripsi" placeholder="Masukkan Deskripsi CV" class="w3-input"></textarea>
                <p>File CV</p>
                <input type="file" name="file_cv" placeholder="Masukkan File CV" class="w3-input">
                <br>
                <div class="w3-row">
                    <input type="submit" name="cv" value="Tambah" class="w3-button w3-green w3-right">
                </div>
            </form>
        <?php
            }   
        ?>
    </div>
</div>
<br>
<?php
    if (isset($_POST['cv'])) {
        $keahlian = $_POST['keahlian'];
        $deskripsi = $_POST['deskripsi'];
        $file_cv = date("YmdHis") . $_FILES['file_cv']['name'];
        $file_cv_temp = $_FILES['file_cv']['tmp_name'];
        $location = "assets/images/" . basename($file_cv);

        if (move_uploaded_file($file_cv_temp, $location)){
            $query = "INSERT INTO cv(keahlian, deskripsi_cv, file_cv, id_user) 
                    VALUES ('$keahlian', '$deskripsi', '$file_cv', ".$_SESSION['id_user'].")";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Berhasil Menambahkan CV!');
                    document.location.href='?halaman=cv'</script>";
            }
        }
    }
?>