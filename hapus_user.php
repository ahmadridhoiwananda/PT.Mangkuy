<?php
    if (isset($_GET['id'])) {
        $id_user = $_GET['id'];
        $query = "DELETE FROM user 
                    left join pekerjaan on pekerjaan.id_user = user.id_user
                    left join lamaran on lamaran_pekerjaan.id_user = user.id_user
                    left join cv on cv.id_user = user.id_user
                    WHERE id_user=$id_user";
        if (mysqli_query($conn, $query)){
            echo "<script>alert('Berhasil Dihapus!');
                    document.location.href='?halaman=list_pengguna'</script>";
        }
    }
?>