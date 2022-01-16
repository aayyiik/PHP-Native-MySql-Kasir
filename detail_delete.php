<?php
include 'koneksi.php';
session_start();

$id = $_GET['id'];

$pesan = $_SESSION['pesan'];
// print_r($pesan);

//berfungsi untuk mengambil data secara spesifik
$k = array_filter($pesan, function($var) use ($id){
    return ($var['id_domba']==$id);
});
// print_r($k);

foreach ($k as $key => $value){
    unset($_SESSION['pesan'][$key]);
}

$_SESSION['pesan'] = array_values($_SESSION['pesan']);

header('location:detail_pemesanan.php');
?>