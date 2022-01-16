<?php   

session_start();
$_SESSION['pesan'] = [];

header('location:detail_pemesanan.php');
?>