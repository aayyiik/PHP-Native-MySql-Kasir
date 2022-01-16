<?php
session_start();

include 'koneksi.php';
include 'cek.php';

$result1 = mysqli_query($conn, "SELECT * FROM domba");
$result2 = mysqli_query($conn, "SELECT * FROM pegawai");
$result3 = mysqli_query($conn, "SELECT * FROM pelanggan");
$result4 = mysqli_query($conn, "SELECT * FROM pemesanan");
$result5 = mysqli_query($conn, "SELECT * FROM pembayaran");
$result6 = mysqli_query($conn, "SELECT * FROM pengiriman");

$jmldomba = mysqli_num_rows($result1);
$jmlpegawai = mysqli_num_rows($result2);
$jmlpelanggan = mysqli_num_rows($result3);
$jmlpemesanan = mysqli_num_rows($result4);
$jmlpembayaran = mysqli_num_rows($result5);
$jmlpengiriman = mysqli_num_rows($result6);



$tgl = date("Y-m-d");
$query = mysqli_query($conn, "SELECT uangmasuk('$tgl') AS 'Uangmasuk'");

$data = mysqli_fetch_assoc($query);
$uang=$data['Uangmasuk'];


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
                            <a href="index.html"><img src="assets/images/logo/ss.png" alt="SHEEPSELL" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu" style="background-color: #9cd9ea;" >
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
                                <i class="bi bi-server"></i>
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
                    <ul class="menu">
                    <li class="sidebar-title">=====================</li>
                        <li class="sidebar-item  ">
                        <a href="logout.php" class='sidebar-link'>
                            <i class="bi bi-code-slash"></i>
                                <span>Logout</span>
                        </a>
                        </li>
                
                    </ul>
                </div>

                
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                
            </div>
            
        </div>

        <!-- Navbar -->

        <div id="main" class='layout-navbar'>
            <div id="main-content">

            <div class="page-heading">
                <h3>
                   Selamat Datang dan Bekerja, <?php echo $_SESSION['username'] ?>
                </h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                <i class="bi bi-server ">
                                                    
                                                </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="text-muted">Domba</h5>
                                                <h4 class="font-extrabold mb-0"><?=number_format($jmldomba,0,",",",");?></h4>
                                             
                                            </div>
                                        </div>
                                  
                                        <br><a href="domba.php" class="text-center"><h6 class="text-muted font-semibold">View Detail</h6></a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="text-muted">Pegawai</h5>
                                            <?php
                                            $selectsql="CALL jmlpegawai()";
                                            $selectresult = mysqli_query($conn, $selectsql);
                                            if(mysqli_num_rows($selectresult)>0){
                                                if($data=mysqli_fetch_array($selectresult)){ 
                                                ?>
                                            
                                                <h4 class="font-extrabold mb-0"><?php echo $data['jml'];?></h4> 
                                               
                                            </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <br><a href="pegawai.php" class="text-center"><h6 class="text-muted font-semibold">View Detail</h6></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                <i class="bi bi-emoji-smile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="text-muted">Pelanggan</h5>
                                                <h4 class="font-extrabold mb-0"><?=number_format($jmlpelanggan,0,",",",");?></h4>
                                            </div>
                                        </div>
                                        <br><a href="pelanggan.php" class="text-center"><h6 class="text-muted font-semibold">View Detail</h6></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                <i class="bi bi-cart4"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="text-muted ">Pemesanan</h5></a>
                                                <h4 class="font-extrabold mb-0"><?=number_format($jmlpemesanan,0,",",",");?></h4>
                                            </div>
                                          
                                        </div>
                                        <br><a href="domba.php" class="text-center"><h6 class="text-muted font-semibold">View Detail</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-lg-9 col-md-6">
                                <div class="card">
                                    
                                    <div class="card-body" style="position: relative;">
                                    <img src="assets/images/logo.png" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                <i class="bi bi-cash"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="text-muted ">Pembayaran</h5></a>
                                                <h4 class="font-extrabold mb-0"><?=number_format($jmlpembayaran,0,",",",");?></h4>
                                            </div>
                                          
                                        </div>
                                        <br><a href="pembayaran.php" class="text-center"><h6 class="text-muted font-semibold">View Detail</h6></a>
                                    </div>
                                </div>

                              
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                <i class="bi bi-truck"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="text-muted ">Pengiriman</h5></a>
                                                <h4 class="font-extrabold mb-0"><?=number_format($jmlpengiriman,0,",",",");?></h4>
                                            </div>
                                          
                                        </div>
                                        <br><a href="pengiriman.php" class="text-center"><h6 class="text-muted font-semibold">View Detail</h6></a>
                                    </div>
                                </div>
                     
                            </div>
                    
                        
                        
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items">
                            
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">
                                         Pemasukkan hari ini
                                        </h5>
                                        <h4 class="text-muted mb-0">Rp. <?=number_format($uang);?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="card-content">
                                        <h4 class="card-title">Deskripsi Toko</h4>
                                    
                                    </div>
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item carousel-item-next carousel-item-start">
                                                <img src="assets/images/samples/architecture1.jpg" class="d-block w-100" alt="Image Architecture">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/images/samples/bg-mountain.jpg" class="d-block w-100" alt="Image Mountain">
                                            </div>
                                            <div class="carousel-item active carousel-item-start">
                                                <img src="assets/images/samples/jump.jpg" class="d-block w-100" alt="Image Jump">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            SHEEPSELL adalah toko jual beli domba di Surabaya, Indonesia. Toko kami menjamin
                                            kualitas domba. Melayani pembelian daerah Jawa-Bali.  
                                        </p>
                                       
				                    </div>
			                    </div>
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

    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>

  
</body>

</html>