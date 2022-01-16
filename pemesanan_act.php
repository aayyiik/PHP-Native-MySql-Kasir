<?php

session_start();
include 'koneksi.php';

    $id_pegawai = $_POST['id_pegawai'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_kota = $_POST['id_kota'];
    $nama_penerima = $_POST['nama_penerima'];
    $alamat_penerima = $_POST['alamat_penerima'];
    $kodepos_penerima = $_POST['kodepos_penerima'];
    $jasa_kurir = $_POST['jasa_kurir'];
    $layanan_kurir = $_POST['layanan_kurir'];
    $tgl_pesan = date('Y-m-d H:i:s');
    $jenis_bayar = $_POST['jenis_bayar'];
    $ongkos_kirim = $_POST['ongkos_kirim'];
    $total_harga = $_POST['total_harga'];
    $status_transaksi = 1;

    //insert ke tabel pemesanna

    $insert = mysqli_query($conn, "INSERT INTO pemesanan (
         id_pemesanan, id_pegawai, id_pelanggan, id_kota, nama_penerima, alamat_penerima, 
         kodepos_penerima, jasa_kurir, layanan_kurir, tgl_pesan, jenis_bayar, ongkos_kirim, total_harga, status_transaksi)  
         VALUES (NULL,'$id_pegawai','$id_pelanggan','$id_kota','$nama_penerima','$alamat_penerima','$kodepos_penerima',
         '$jasa_kurir','$layanan_kurir','$tgl_pesan','$jenis_bayar','$ongkos_kirim','$total_harga','$status_transaksi') 
         ");

    //mendapatkan id pemesanan baru

    $id_pemesanan = mysqli_insert_id($conn);
  
    // //insert ke detail transaksi
    foreach ($_SESSION['pesan'] as $key => $value){
        
        $id_domba = $value['id_domba'];
        $jml_pemesanan = $value['jml_pemesanan'];
        $harga = $value['harga'];
        $berat_beli = $value['berat_beli'];

    mysqli_query($conn, "INSERT INTO detail_pemesanan 
        (id, id_pemesanan,id_domba,jml_pemesanan,harga,berat_beli) VALUES
                            (null,'$id_pemesanan','$id_domba','$jml_pemesanan','$harga','$berat_beli')");

    }

        header ("location:pemesanan.php");
 
?>