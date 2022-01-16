<?php
session_start();

include 'koneksi.php';

// print_r($_SESSION);
$sum = 0;
$sum1 = 0;
if(isset($_SESSION['pesan'])){
    foreach ($_SESSION['pesan'] as $key => $value){
        $sum += $value['harga']*$value['jml_pemesanan'];
        $sum1 += $value['berat_beli']*$value['jml_pemesanan'];
    }
}

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
                                        <h6 class="dropdown-header">Hello, <?php echo $_SESSION['username'] ?></h6>
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
                                <h4 class="card-title">Keranjang</h4>
                            </div>
                            <div class="card-body">

                            <div class="col-md-3 mb-1">
                                               
                                            <form action="detail_act.php" method="post" class="form-inline">
                                               
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                                            <select class="form-select" name="id_domba" id="inputGroupSelect01">
                                                            <option selected="">Pilih Domba</option>
                                                            <?php 
                                                            $getdomba = mysqli_query($conn,"SELECT * FROM domba as a JOIN jenis_domba as b ON (a.id_jenis=b.id_jenis) ");
                                                            while ($data=mysqli_fetch_array($getdomba)){ ?>
                                                                <option value="<?=$data['id_domba']?>">
                                                                <?=$data['jenis_domba']?> - 
                                                                <?php if($data['jenis_kelamin']==1) {?>
                                                                    <span>Jantan</span>
                                                                <?php }else{ ?>
                                                                    <span>Betina</span>
                                                                <?php } ?>
                                                                <?=$data['harga']?></option>
                                                                <?php } ?>
                                                                
                                                        </select>
                                                        
                                                    </div>
                                                        <div class="input-group">
                                                                <input type="number" name="jml_pemesanan" class="form-control" placeholder="jumlah">
                                                                
                                                                <span class="input-group-btn" for="inputGroupSelect01">
                                                                    <button class="btn btn-primary" type="submit" ><i class="bi bi-basket">Tambah</i></button>
                                                            
                                                                </span>

                                                            </div>
                                                          
                                                        
                                                    </div>
                                            </form>

                                                        
                                                <p><a href="detail_reset.php" type="button" class="btn btn-warning "><i class="bi-arrow-counterclockwise">Reset Pesanan</i></a></p>
                                                        

                                     
                                            <?php 
                                       
                                       if(!empty($_SESSION['pesan'])){
                                           ?>
                                              <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Berat beli</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                           <?php 
                                           foreach($_SESSION['pesan'] as $key => $value){
                                            ?>
                                               <tbody>
                                                <tr>
                                                    <td><?=$value['id_domba']?></td>
                                                    <td>Rp.<?=number_format($value['harga'])?></td>
                                                    <td><?=$value['jml_pemesanan']?></td>
                                                    <td><?=$value['berat_beli']=$value['berat_beli']*$value['jml_pemesanan']?></td>
                                                    <td><a href="detail_delete.php?id=<?=$value['id_domba']?>" class="bi bi-x-square-fill"></i></a></td>
                                                </tr>
                                                </tbody>
                                                <?php
                                           }
                                        ?>
                                                <tfoot>
                                                <form action="pemesanan_act.php" method="POST">
                                           
                                                <tr>
                                                    <th colspan="4"> Total </th>
                                                 
                                                    <th>Rp.<?=number_format($sum)?></th>
                                                    <input type="hidden" name="total_harga" value="<?=$sum?>">
                                                </tr>  
                                                <input type="hidden" name="total_harga" value="<?=$sum?>" > 
                                        </tfoot>
                                       
                                 </table>

                                <div class="card-header">
                                    <h4 class="card-title">Data Pemesan</h4>
                                </div>
                                
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">

                                    <!-- id pemesanan sementara -->
                                        <!-- <label for="basicInput">ID pemesanan</label> -->
                                        <!-- <input type="text" name="id_pemesanan" class="form-control" id="basicInput" placeholder="Nama Penerima"> -->
                                    </div>
                                    <div class="form-group">
                                                            <label for="helperText">Pegawai</label>
                                                            <select class="form-select" name="id_pegawai" id="inputGroupSelect01">
                                                            <option selected="">Pilih pegawai</option>
                                                            <?php 
                                                            $getpegawai= mysqli_query($conn,"SELECT * FROM pegawai");
                                                            while ($data=mysqli_fetch_array($getpegawai)){ ?>
                                                                <option value="<?=$data['id_pegawai']?>"><?=$data['nama_pegawai']?></option>
                                                                <?php } ?>
                                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="basicInput">Nama Penerima</label>
                                        <input type="text" name="nama_penerima" class="form-control" id="basicInput" placeholder="Nama Penerima">
                                    </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Alamat Penerima</label>
                                        <input type="text" name="alamat_penerima" class="form-control" id="helpInputTop" placeholder="Alamat">
                                    </div>

                                    <div class="form-group">
                                                            <label for="helperText">Kota</label>
                                                            <select class="form-select" name="id_kota" id="inputGroupSelect01">
                                                            <option selected="">Pilih Kota</option>
                                                            <?php 
                                                            $getkota= mysqli_query($conn,"SELECT * FROM kota");
                                                            while ($data=mysqli_fetch_array($getkota)){ ?>
                                                                <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                                                <?php } ?>
                                                            </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="helperText">Kodepos</label>
                                        <input type="text" name="kodepos_penerima" id="helperText" class="form-control" placeholder="kodepos">
                                    </div>


                                </div>
                        
                                <div class="col-md-6">
                                <div class="form-group">
                                                            <label for="helperText">Pelanggan</label>
                                                            <select class="form-select" name="id_pelanggan" id="inputGroupSelect01">
                                                            <option selected="">Pilih pelanggan</option>
                                                            <?php 
                                                            $getpelanggan= mysqli_query($conn,"SELECT * FROM pelanggan");
                                                            while ($data=mysqli_fetch_array($getpelanggan)){ ?>
                                                                <option value="<?=$data['id_pelanggan']?>"><?=$data['nama_pelanggan']?></option>
                                                                <?php } ?>
                                                            </select>
                                    </div>


                                 

                                    <fieldset class="form-group">
                                        <label for="helperText">Jasa Kurir</label>
                                        <select class="form-select" name="jasa_kurir" id="basicSelect">
                                                        <option value="SSExpress">SS Express</option>
                                                        <option value="SicepatExpress">Sicepat</option>
                                        </select>
                                    </fieldset>

                                 

                                    <fieldset class="form-group">
                                        <label for="helperText">Layanan Kurir</label>
                                            <select class="form-select" name="layanan_kurir" id="basicSelect">
                                                        <option value="Reguler">Reguler 3-4 Hari</option>
                                                        <option value="Kilat">Kilat 1-2 Hari</option>
                                        </select>
                                    </fieldset>


                                    <fieldset class="form-group">
                                    <label for="helperText">Jenis bayar</label>
                                        <select class="form-select" name="jenis_bayar" id="basicSelect">
                                                        <option value="Tunai">Tunai</option>
                                                        <option value="BNI">Debit</option>
                                        </select>
                                    </fieldset>

                                    <div class="form-group">
                                        <label for="helperText">Ongkos kirim</label>
                                        <input type="text" name="ongkos_kirim" class="form-control" id="helperText">
   
                                    </div>

                                  
                                </div>
                                  
                             
                                    <div>
                                    <button type ="submit"class="btn btn-success"><i class="bi bi-cart-plus">CHECKOUT</i></button>
                                </div>
                                </form>
                                        
                             
                                <?php
                                       }else{ ?>

                                    <span class="badge bg-light-danger">Keranjang masih kosong</span>
                                    <?php
                                       }
                                       ?>
                           
                                       
                            </div>    
                            
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

    <script src="assets/js/main.js"></script>
</body>

</html>