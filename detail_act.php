<?php
session_start();

include 'koneksi.php';


if(isset($_POST['id_domba'])){

    $id_domba = $_POST['id_domba'];
    $jml_pemesanan = $_POST['jml_pemesanan'];

    $data = mysqli_query($conn, "SELECT * FROM domba WHERE id_domba='$id_domba' ");
    
    $db = mysqli_fetch_assoc($data);

    $getdomba = [
        'id_domba' => $db['id_domba'],
        'harga' => $db['harga'],
        'jml_pemesanan' => $jml_pemesanan,
        'berat_beli' => 50
    ];

    $_SESSION['pesan'][]=$getdomba;

    ksort($_SESSION['pesan']);

    header('location:detail_pemesanan.php');



}

?>