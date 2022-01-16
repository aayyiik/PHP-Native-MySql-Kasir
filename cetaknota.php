<?php
session_start();

include 'koneksi.php';

$id = $_GET['id'];

    $result= mysqli_query($conn,"SELECT * FROM pembayaran as a 
        JOIN pemesanan as b ON (a.id_pemesanan=b.id_pemesanan)
        JOIN pegawai as c ON (a.id_pegawai=c.id_pegawai)
        WHERE id_pembayaran='$id' ");


if(mysqli_num_rows($result) == 0){
  
    //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda 
    echo 'gagal';
    
   }else{
   
    //jika data ditemukan, maka membuat variabel $data
    $data = mysqli_fetch_assoc($result); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
   
   };




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian - SS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

        <!-- Navbar -->

   
            
            <div id="main-content">

                        <div class="row">
           
                       
                
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                            <h1 style="text-align: center;">SHEEPSELL<h1>
                            <p style="text-align: center;">Domba Berkualitas, SHEEPSELL punya</p>
                                <h4 class="card-title">ID : <?=$data['id_pembayaran']?> </h4>
                            </div>
                            <div class="card-body">
                            
                           
                               
                            <div class="row">
                            <div class="col-md-4">
                             <h4> PEGAWAI </h4>
                                <strong>Pegawai : <?=$data['nama_pegawai']?></strong><br>
                                <strong>Alamat : <?=$data['alamat_pegawai']?></strong><br>
                                
                            </div> 
                            <div class="class col-md-4">
                                <h4>PEMBAYARAN</h4>
                                <strong>TGL dan Waktu : <?=$data['tgl_pembayaran']?></strong><br>
                                <strong>Total Pembayaran : <?=$data['total_pembayaran']?></strong><br>
                                <strong>Jenis Bayar : <?=$data['jenis_bayar']?></strong><br>
                                <strong>Status Bayar : <?php
                                     if($data['status_pembayaran']==0){
                                        echo 'Berhasil';
                                        }else{
                                        echo 'Berhasil, silahkan proses kirim';
                                        }
                                        ?>
                                </strong>
                            </div>

                            <div class="col-md-4">
                                <h4>Rincian Pengiriman</h4>
                                    <strong>Nama Penerima: <?=$data['nama_penerima']?></strong><br>
                                    <strong>Alamat Penerima: <?=$data['alamat_penerima']?></strong><br>
                                    <strong>Jasa Kurir: <?=$data['jasa_kurir']?></strong><br>
                                    <strong>Layanan Kurir: <?=$data['layanan_kurir']?></strong><br>
                                    <strong>Ongkos Kirim: <?=$data['ongkos_kirim']?></strong><br>
                                </div>
                            </div>

                            <div class="card-header">
                            <h4 class="card-title">Detail Pemesanan</h4>
                            </div>
                           
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                       
                                    <th>ID Domba</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Berat Beli</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                      
                        <tbody>
                            
                            <?php $ambil = mysqli_query($conn, "SELECT * FROM detail_pemesanan as a 
                                            JOIN domba as b ON (a.id_domba=b.id_domba)
                                            JOIN pembayaran as c ON (a.id_pemesanan = c.id_pemesanan)
                                            WHERE id_pembayaran='$id' " ); 
                           
                                 while($data=mysqli_fetch_array($ambil)){ 
                                    $id_domba = $data['id_domba'];
                                    $jml_pemesanan = $data['jml_pemesanan'];
                                    $harga = $data['harga'];
                                    $berat_beli = $data['berat_beli'];

                                   
                           ?>
                            <tr>
                                <td><?=$id_domba;?></td>
                                <td><?=$harga;?></td>
                                <td><?=$jml_pemesanan;?></td>
                                <td><?=$berat_beli;?></td>
                                <td><?=$harga*$jml_pemesanan;?></td>
                              
                            </tr>
                            <?php } ?>
                        </tbody>   
                                    
                        </table>  

                      
                        <div class="card-body col-md-4 offset-md-4 py-4">
               
                          <p style="text-align: center;">TERIMA KASIH TELAH MENGUNJUNGI SHEEPSELL</p>
                          <p style="text-align: center;">KAMI TUNGGU ORDERAN NYA KEMBALI</p>
                          <p style="text-align: center;">Salam Kami, SHEEPSELL Group</p>
                        </div>
                        <script>
                                window.print();
                            </script>
                               
                        </div>
                    </section>
               
            </div>
                                 </div>
            </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
 
</body>

</html>


