<?php
session_start();

include 'koneksi.php';
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

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active" style="background-color: #9cd9ea;" >
                <div class="sidebar-header" >
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
        <div id="main" class='layout-navbar'>
            <header class='mb-3' style="background-color:  #9cd9ea;">
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
                                            <p class="mb-0 text-sm text-body-600">Pegawai</p>
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
                                        <h6 class="dropdown-header">Hello,<?php echo $_SESSION['username'] ?>!</h6>
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
                                <h3>List Pembayaran</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pembayaran
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pembayaran</h4>
                                <!-- Button trigger modal -->
                            
                            </div>
                            <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    <tr>
                                            <th>ID Pembayaran</th>
                                            <th>ID Pemesanan</th>
                                            <th>Pegawai</th>
                                            <th>Tgl pembayaran</th>
                                            <th>Total pembayaran</th>
                                            <th>Status pembayaran</th>
                                            <th>Nama Bank</th>
                                            <th>Atas nama</th>
                                            <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                                $ambildatapembayaran = mysqli_query($conn,"SELECT * FROM pembayaran as a 
                                                JOIN pemesanan as b ON (a.id_pemesanan=b.id_pemesanan)
                                                JOIN pegawai as c ON (a.id_pegawai=c.id_pegawai)");

                                                while($data=mysqli_fetch_array($ambildatapembayaran)){ 
                                                    $id_pembayaran = $data['id_pembayaran'];
                                                    $id_pemesanan = $data['id_pemesanan'];
                                                    $nama_pegawai = $data['nama_pegawai'];
                                                    $tgl_pembayaran = $data['tgl_pembayaran'];
                                                    $total_pembayaran = $data['total_pembayaran'];
                                                    $status_pembayaran = $data['status_pembayaran'];
                                                    $nama_bank = $data['nama_bank'];
                                                    $atas_nama = $data['atas_nama'];
                                                    
                                            ?>
                                            <tr>
                                                    <td><?=$id_pembayaran;?></td>
                                                    <td><?=$id_pemesanan;?></td>
                                                    <td><?=$nama_pegawai;?></td>
                                                    <td><?=$tgl_pembayaran;?></td>
                                                    <td><?=$total_pembayaran;?></td>
                                                    <td>
                                                        <?php
                                                    if($status_pembayaran==0){ ?>
                    
                                                        <span class="badge bg-light-success">Berhasil</span>
                                                    <?php   }else{  ?>
                                                        <span class="badge bg-light-danger">Berhasil, silahkan proses kirim</span>
                                                        <?php
                                                        }
                                                        ?>

                                                        </td>
                                                    <td><?=$nama_bank;?></td>
                                                    <td><?=$atas_nama;?></td>
                                                    <td>
                                                    
                                                   
                                                    <?php if ($status_pembayaran==1): ?>
                                                        <a href="pengiriman_form.php?id=<?=$id_pembayaran;?>" type="button" class="btn btn-outline-warning">kirim</a>
                                                        
                                                        <a href="pembayaran_delete.php?id=<?=$id_pembayaran;?>" type="button" class="btn btn-outline-danger">delete</a>
                                                    
                                                       
                                                        <?php else: ?>
                                                            
                                                            
                                                            <a href="pembayaran_nota.php?id=<?=$id_pembayaran;?>" type="button" class="btn btn-outline-primary">Nota</a>
                                                        <a href="cetaknota.php?id=<?=$id_pembayaran;?>" type="button" class="btn btn-outline-secondary" target="_blank">Cetak</a></p>
                                                            <?php endif ?>
                                                    
                                                    <?php
                                                    };
                                                    ?>                                     
                                                  
                                                    </td>
                                            </tr>
                                            
                                </tbody>
                            </table>
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
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

 <!-- The Modal -->
 <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Domba Baru</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" name="tambahdomba"></button>
      </div>

      <form action="pembayaran.php" method="post">

      <!-- Modal body -->
      <div class="modal-body">
      <input type="text" name="id_pembayaran" class="form-control mt-4" placeholder="id domba">
      <select name="id_pemesanan" class="form-control mt-4">
          <?php
          $getpemesanan = mysqli_query($conn,"SELECT * FROM pemesanan");
          while($pm=mysqli_fetch_array($getpemesanan)){
            $id_pemesanan = $pm['id_pemesanan'];  
                 
          ?>
          <option value="<?=$id_pemesanan;?>">  </option>
          <?php
          }
          ?>
      </select>
      <input type="integer" name="jenis_kelamin" class="form-control mt-4" placeholder="jenis Kelamin">
      <input type="integer" name="harga" class="form-control mt-4" placeholder="Harga">
      <input type="integer" name="berat" class="form-control mt-4" placeholder="Berat">
      <input type="text" name="status_domba" class="form-control mt-4" placeholder="Status Domba">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="tambahdomba" class="btn btn-info" value="tambahdata" >Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
        
      

      </form>
    </div>
  </div>
</div>

</html>