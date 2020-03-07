<form style="width: 500px; margin: 0 auto;" class="w3-padding w3-padding-32" action="" method="POST">
    <h1 class="w3-padding-16">LOGIN</h1>

    <p>Nama Pengguna</p>
    <input type="text" name="nama" placeholder="Masukkan Nama" class="w3-input">
    <p>Password</p>
    <input type="password" name="pass1" placeholder="••••••••••••" class="w3-input">
    <br>
    <div class="w3-row">
        <input type="submit" name="login" value="Sign In" class="w3-button w3-green w3-right">
        <div class="w3-left">
            <p class="text-muted">Lupa Password ??
            <br>
            <p class="text-muted">Tidak punya akun ??
            <a href="?halaman=register">Register</a>
            </p>
        </div>
    </div>
</form>

<?php
if  (isset($_POST['login'])){

    $nama = $_POST['nama'];
    $nama = mysqli_real_escape_string($conn,htmlspecialchars($_POST['nama']));
    $passw = mysqli_real_escape_string($conn,$_POST['pass1']);
    $passw = password_hash($passw, PASSWORD_DEFAULT);
    $query = "SELECT nama, password, status, id_user FROM user WHERE nama = '$nama'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)===1){
        $hasil = mysqli_fetch_assoc($result);
        if (password_verify($_POST['pass1'], $hasil['password'])){
        	if($result > 0) {
	  			session_start();
                  $_SESSION['login'] = $nama;
                  $_SESSION['status'] = $hasil['status'];
                  $_SESSION['id_user'] = $hasil['id_user'];
                  if ($hasil['status'] == 0){
                    echo "<script>alert('Berhasil Masuk!');
                      document.location.href='user_pelamar.php'</script>";
                  }
                  elseif ($hasil['status'] == 1) {
                    echo "<script>alert('Berhasil Masuk!');
                      document.location.href='user_perusahaan.php'</script>";
                  }
                  else {
                    echo "<script>alert('Berhasil Masuk!');
                      document.location.href='user_admin.php'</script>";
                  }
	  		} else {
	  			echo "<script>alert('Username/Password Tidak Cocok!')</script>";
	  		}
    	} else {
    		echo "<script>alert('Username/Password Tidak Cocok!')</script>";
    	}
	}
}	
?>