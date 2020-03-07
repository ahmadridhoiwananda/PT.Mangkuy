<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_mangkuy';

$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
    die('Connection error' . mysqli_connect_error());
}
?>