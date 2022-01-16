<?php

// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($conn,"DELETE FROM pembayaran WHERE id_pembayaran='$id'");

$_SESSION['sukses'] = 'Alhamdulillah... Berhasil menambahkan data';
// mengalihkan halaman kembali ke index.php
header("location:pembayaran.php");
 
?>