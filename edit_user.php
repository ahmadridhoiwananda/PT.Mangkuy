<?php
    if(isset($_GET['id'])){
        $id_user = $_GET['id'];
        $query = "SELECT * FROM user WHERE id_user=$id_user";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        ?>

        <form style="width: 500px; margin: 0 auto;" class="w3-padding w3-padding-32" action="" method="POST">
            <h1 class="w3-padding-16">EDIT USER</h1>

            <p>Username</p>
            <input type="text" name="nama" placeholder="Masukkan Nama" class="w3-input" value="<?php echo $row['nama'];?>">
            <p>Handpone</p>
            <input type="text" name="no_hp" placeholder="Nomor Handpone" class="w3-input" value="<?php echo $row['no_hp'];?>">
            <p>E-Mail</p>
            <input type="text" name="email" placeholder="Masukkan E-Mail" class="w3-input" value="<?php echo $row['email'];?>">
            <p>Password (Optional Jika Ingin Di ubah)</p>
            <input type="password" name="pass1" placeholder="••••••••••••" class="w3-input">
            <input type="password" name="pass2" placeholder="Ulangi Password" class="w3-input">
            <p>Status</p>
            <select name="status" class="w3-input">
                <option value="0" <?php if($row['status'] == 0) echo "selected"; ?>>Pelamar</option>
                <option value="1" <?php if($row['status'] == 1) echo "selected"; ?>>Perusahaan</option>
            </select>
            <br>
            <div class="w3-row">
                <input type="submit" name="edit_user" value="Simpan" class="w3-button w3-green w3-right">
            </div>
        </form>
    }
    <?php
        if (isset($_POST['edit_user'])) {
            $usern = mysqli_real_escape_string($conn,htmlspecialchars($_POST['nama']));
            $hp =  mysqli_real_escape_string($conn,htmlspecialchars($_POST['no_hp']));
            $email = mysqli_real_escape_string($conn,htmlspecialchars($_POST['email']));
            $passw = mysqli_real_escape_string($conn,$_POST['pass1']);
            $passw = password_hash($passw, PASSWORD_DEFAULT);
            $status = mysqli_real_escape_string($conn,htmlspecialchars($_POST['status']));
            $query = "INSERT INTO user (nama, no_hp, email, password, status) VALUES ('$usern', '$hp', '$email', '$passw', '$status')";
            if ($_POST['pass1'] == ""){
                $query = "UPDATE user SET nama='$usern', no_hp='$hp', email='$email', status='$status' WHERE id_user=".$_GET['id'];
            }
            if (!empty($_POST['nama'])) {
                $usern = $_POST['nama'];
                if (preg_match("/^[a-zA-Z \-\.\']*$/", $usern)) 
                    echo '';
                else
                    echo 'Your name is incorret';	
            }
            else {
                echo 'Name is required!<br>';
            }
            if (!empty($_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
                    echo ''; 
                else 
                    echo 'Your email is incorret';	   	
            }
            else {
                echo 'Email is required!<br>';
            }
            if (mysqli_query($conn, $query))
                echo "<script>alert('Berhasil Diperbarui!');
                        document.location.href='?halaman=list_pengguna'</script>";
            else 
                echo 'Register Failed.' . $query;   
            }
        }
?>