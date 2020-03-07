<div class="container" style="min-height:400px">
<br>
<table class="w3-table-all" style="width: 1024px; margin: 0 auto">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query = "SELECT * FROM user WHERE NOT status=2";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {
        $no++;
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo $row['no_hp'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php 
                if($row['status'] == 0) echo "Pelamar";
                else echo "Perusahaan";
            ?></td>
            <td>
                <a href="?halaman=edit_user&id=<?php echo $row['id_user'];?>">Edit</a>
                <a href="?halaman=hapus_user&id=<?php echo $row['id_user'];?>">Hapus</a>
            </td>
        </tr>
        <?php
    }
?>
    </tbody>
</table>
<br>
</div>