<form style="width: 500px; margin: 0 auto;" class="w3-padding w3-padding-32" action="" method="POST">
    <h1 class="w3-padding-16">TAMBAH PEKERJAAN</h1>

    <p>Pekerjaan</p>
    <input type="text" name="nama_pekerjaan" placeholder="Masukkan Pekerjaan"  class="w3-input">
    <p>Deadline</p>
    <input type="date" name="deadline_pekerjaan" placeholder="Masukkan Deadline" class="w3-input">
    <p>Skill</p>
    <input type="text" name="skill_pekerjaan" placeholder="Masukkan Skill" class="w3-input">
    <p>Deskripsi</p>
    <textarea name="deskripsi_pekerjaan" placeholder="Masukkan Deskripsi" class="w3-input"></textarea>
    <p>Jenis Pekerjaan</p>
    <select name="jenis_pekerjaan" class="w3-input">
        <?php
        $query = 'SELECT * FROM kategori_pekerjaan';
        $result = mysqli_query($conn, $query);
        while($row=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori']; ?></option>
            <?php
        }
        ?>
    </select>
    <br>
    <div class="w3-row">
        <input type="submit" name="tambah_pekerjaan" value="Tambah" class="w3-button w3-green w3-right">   
    </div>
</form>

<?php
if(isset($_POST['tambah_pekerjaan'])){
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $deadline_pekerjaan = $_POST['deadline_pekerjaan'];
    $skill_pekerjaan = $_POST['skill_pekerjaan'];
    $deskripsi_pekerjaan = $_POST['deskripsi_pekerjaan'];
    $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
    $query = "INSERT INTO pekerjaan(nama_pekerjaan, deadline_pekerjaan, skill_pekerjaan, deskripsi_pekerjaan, jenis_pekerjaan, id_user) 
    VALUES ('$nama_pekerjaan', '$deadline_pekerjaan', '$skill_pekerjaan', '$deskripsi_pekerjaan','$jenis_pekerjaan', ".$_SESSION['id_user'].")";
    $result = mysqli_query($conn, $query);

    if ($result)
        echo "<script>alert('Berhasil Menambahkan!');
                document.location.href='?halaman=list_pekerjaan'</script>";
    else 
        echo 'Tambah Pekerjaan Gagal.'; 
}
?>