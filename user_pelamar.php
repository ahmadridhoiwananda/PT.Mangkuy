<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['login'])){
    header('location:index.php');
}

$halaman = 'list_perusahaan';
if (isset($_GET['halaman'])){
    $halaman = $_GET['halaman'];
}

require_once('header.php');

require_once($halaman.'.php');

require_once('footer.php');
?>