<?php
session_start();

include 'koneksi.php';

$id = $_GET['id'];

    $result= mysqli_query($conn,"SELECT * FROM pemesanan as a 
        JOIN pelanggan as b ON (a.id_pelanggan=b.id_pelanggan)
        JOIN pegawai as c ON (a.id_pegawai=c.id_pegawai)
        JOIN kota as d ON (a.id_kota=d.id_kota)
        WHERE id_pemesanan='$id' ");


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
    <title>SHEEPSELL - Toko Penjualan Domba</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active" style="background-color: #9cd9ea;" >
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/ss.png"  alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu"  >
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>User</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="pegawai.php">Pegawai</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="pelanggan.php">Pelanggan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="domba.php" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Domba</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="pemesanan.php" class='sidebar-link'>
                                <i class="bi bi-cart-dash"></i>
                                <span>Pemesanan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="pembayaran.php" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="pengiriman.php" class='sidebar-link'>
                                <i class="bi bi-truck"></i>
                                <span>Pengiriman</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="kota.php" class='sidebar-link'>
                                <i class="bi bi-map"></i>
                                <span>Kota</span>
                            </a>
                        </li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <!-- Navbar -->

        <div id="main" class='layout-navbar'>
            <header class='mb-3' style="background-color: #9cd9ea;">
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                               
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                        <h4 class="mb-0 text-blue-600"><?php echo $_SESSION['username'] ?></h4>
                                            <p class="mb-0 text-sm text-gray-600">Pegawai</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Detail Pemesanan</h3>
                            
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ID : <?=$data['id_pemesanan']?> </h4>
                            </div>
                            <div class="card-body">
                               
                               
                            <div class="row">
                            <div class="col-md-4">
                             <h4> PEGAWAI </h4>
                                <strong>Pegawai : <?=$data['nama_pegawai']?></strong><br>
                                <strong>Alamat : <?=$data['alamat_pegawai']?></strong><br>
                                
                            </div> 
                            <div class="class col-md-4">
                                <h4>PEMESANAN</h4>
                                <strong>TGL dan Waktu : <?=$data['tgl_pesan']?></strong><br>
                                <strong>Total pemesanan : <?=$data['total_harga']?></strong><br>
                                <strong>Jenis Bayar : <?=$data['jenis_bayar']?></strong><br>
                                <strong>Status Pemesanan : <?php
                                     if($data['status_transaksi']==1){
                                        echo 'Belum Dikonfirmasi';
                                        }else{
                                        echo 'Sudah Dikonfirmasi';
                                        }
                                        ?>
                                </strong>
                            </div>

                            <div class="col-md-4">
                                <h4>PELANGGAN</h4>
                                    <strong>Nama Penerima: <?=$data['nama_penerima']?></strong><br>
                                    <strong>Alamat Penerima: <?=$data['alamat_penerima']?></strong><br>
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
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Berat Beli</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                      
                        <tbody>
                            
                           
                                <?php $ambil = mysqli_query($conn, "SELECT * FROM view_detail_pesan
                                            WHERE id_pemesanan='$id' " ); 
                           
                                 while($data=mysqli_fetch_array($ambil)){ 
                                    $id_domba = $data['id_domba'];
                                    $jml_pemesanan = $data['jml_pemesanan'];
                                    $harga = $data['harga'];
                                    $berat_beli = $data['berat_beli'];

                                   
                           ?>
                           
                            <tr>
                                <td><?=$id_domba;?></td>
                                <td><?=$jml_pemesanan;?></td>
                                <td><?=$harga;?></td>
                                <td><?=$berat_beli;?></td>
                                <td>
                                    <?=$harga*$jml_pemesanan;?>
                                </td>
                              
                            </tr>
                            <?php } ?>
                        </tbody>   
                                    
                        </table>                            

                        </div>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Chusna</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Ari</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>


