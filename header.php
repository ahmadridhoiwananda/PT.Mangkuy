<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $halaman; ?></title>
    <link rel="stylesheet" href="assets/css/w3.css">
</head>
<body>
<?php
if(isset($_SESSION['login'])){
    if($_SESSION['status']==0){
        ?>
        <div class="w3-bar w3-blue-grey w3-border w3-padding">
            <div class="w3-right">
                <a href="?halaman=list_perusahaan" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Lowongan</a>
                <a href="?halaman=cv" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">CV</a>
                <a href="?halaman=lihat_pengajuan" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Lihat Pengajuan</a>
                <div class="w3-dropdown-hover w3-padding w3-padding-8">
                    <div class="w3-right">
                        <button class="w3-button w3-aqua w3-padding-16"><?php echo $_SESSION['login']; ?></button>
                        <div class="w3-bar-item w3-blue-grey w3-right">
                            <img src="assets/images/user.png" width="36px">
                        </div>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="?halaman=logout" class="w3-bar-item w3-button">Keluar</a>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="w3-left">
                <div class="w3-bar-item w3-blue-grey">
                <img src="assets/images/logo.png" width="36px"></div>
                <div class="w3-bar-item w3-padding-16">MANGKUY</div>
            </div>
        </div>
        <div class="w3-row w3-container w3-light-blue w3-padding w3-padding-8">
            <div style="width: 1024px; margin: 0 auto;">
                <div class="w3-left">
                    <h1 class="w3-text-deep-purple w3-jumbo w3-center"><i>Mangkuy</i></h1><br>
                    <h3 class="w3-text-white w3-center">Hilangkan Keraguan Bergabung dengan Kami <br> dan <br> Mulailah Beraksi !!</h3><br><br>
                </div>
                <div class="w3-right">
                    <img class="w3-right" src="assets/images/work.svg" width="500px">
                </div>
            </div>
        </div>
        <?php
    }
    elseif($_SESSION['status']==1){
        ?>
        <div class="w3-bar w3-blue-grey w3-border w3-padding">
            <div class="w3-right">
                <a href="?halaman=list_pekerjaan" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Beranda</a>
                <a href="?halaman=tambah_pekerjaan" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Tambah Pekerjaan</a>
                <div class="w3-dropdown-hover w3-padding w3-padding-8">
                    <div class="w3-right">
                        <button class="w3-button w3-aqua w3-padding-16"><?php echo $_SESSION['login']; ?></button>
                        <div class="w3-bar-item w3-blue-grey w3-right">
                            <img src="assets/images/user.png" width="36px">
                        </div>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="?halaman=logout" class="w3-bar-item w3-button">Keluar</a>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="w3-left">
                <div class="w3-bar-item w3-blue-grey">
                <img src="assets/images/logo.png" width="36px"></div>
                <div class="w3-bar-item w3-padding-16">MANGKUY</div>
            </div>
        </div>
        <div class="w3-row w3-container w3-light-blue w3-padding w3-padding-8">
            <div style="width: 1024px; margin: 0 auto;">
                <div class="w3-left">
                    <h1 class="w3-text-deep-purple w3-jumbo w3-center"><i>Mangkuy</i></h1><br>
                    <h3 class="w3-text-white w3-center">Hilangkan Keraguan Bergabung dengan Kami <br> dan <br> Mulailah Beraksi !!</h3><br><br>
                </div>
                <div class="w3-right">
                    <img class="w3-right" src="assets/images/work.svg" width="500px">
                </div>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        <div class="w3-bar w3-blue-grey w3-border w3-padding">
            <div class="w3-right">
                <a href="?halaman=list_pengguna" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Aktivitas</a>
                <a href="?halaman=list_pekerjaan" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Daftar Pekerjaan</a>
                <div class="w3-dropdown-hover w3-padding">
                    <div class="w3-right">
                        <button class="w3-button w3-aqua w3-padding-16"><?php echo $_SESSION['login']; ?></button>
                        <div class="w3-bar-item w3-blue-grey w3-right">
                            <img src="assets/images/user.png" width="36px">
                        </div>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="?halaman=logout" class="w3-bar-item w3-button">Keluar</a>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="w3-left">
                <div class="w3-bar-item w3-blue-grey">
                <img src="assets/images/logo.png" width="36px"></div>
                <div class="w3-bar-item w3-padding-16">MANGKUY</div>
            </div>
        </div>
        <div class="w3-row w3-container w3-light-blue w3-padding w3-padding-8">
            <div style="width: 1024px; margin: 0 auto;">
                <div class="w3-left">
                    <h1 class="w3-text-deep-purple w3-jumbo w3-center"><i>Mangkuy</i></h1><br>
                    <h3 class="w3-text-white w3-center">Kami Bangga <br> dan <br> Anda pun Puas !!</h3><br><br>
                </div>
                <div class="w3-right">
                    <img class="w3-right" src="assets/images/work.svg" width="500px">
                </div>
            </div>
        </div>
        <?php
    }
?>
<?php
}
else {
?>
<div class="w3-bar w3-blue-grey w3-border w3-padding">
    <div class="w3-right">
        <a href="?halaman=halaman_awal" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Beranda</a>
        <a href="?halaman=perusahaan" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Perusahaan</a>
        <a href="?halaman=register" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Daftar</a>
        <a href="?halaman=login" class="w3-bar-item w3-button w3-blue-grey w3-padding-16">Masuk</a>
    </div>
    <div class="w3-left">
        <div class="w3-bar-item w3-blue-grey">
        <img src="assets/images/logo.png" width="36px"></div>
        <div class="w3-bar-item w3-padding-16">MANGKUY</div>
    </div>
</div>

<div class="w3-row w3-container w3-light-blue w3-padding w3-padding-8">
    <div style="width: 1024px; margin: 0 auto;">
        <div class="w3-left">
            <h1 class="w3-text-deep-purple w3-jumbo"><i>Mangkuy</i></h1>
            <h3 class="w3-text-white">Ingin Kerja ?? <br> Bergabunglah Bersama Kami <br> Untuk Meraih Mimpi</h3><br><br>
            <a href="?halaman=register"><div class="w3-button w3-round-xxlarge w3-white w3-bottombar w3-border-light-grey w3-large w3-padding-8">JOIN US NOW</div></a>
        </div>
        <div class="w3-right">
            <img class="w3-right" src="assets/images/work.svg" width="600px">
        </div>
    </div>
</div>
<?php
}
?>