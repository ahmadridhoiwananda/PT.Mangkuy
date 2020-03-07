<?php
require_once('connect.php');

$halaman = 'halaman_awal';
if (isset($_GET['halaman'])){
    $halaman = $_GET['halaman'];
}

require_once('header.php');

require_once($halaman.'.php');

require_once('footer.php');
?>