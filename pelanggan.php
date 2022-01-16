<?php
session_start();
include 'koneksi.php';


if(isset($_POST['tambahpelanggan'])){
 
    $id_kota = $_POST['id_kota'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $kodepos_pelanggan = $_POST['kodepos_pelanggan'];
    $status_pelanggan = 1;

    $insert1 = mysqli_query($conn, "INSERT INTO pelanggan (id_pelanggan,id_kota,nama_pelanggan,alamat_pelanggan,kodepos_pelanggan,status_pelanggan)
    VALUES (null,'$id_kota','$nama_pelanggan','$alamat_pelanggan','$kodepos_pelanggan','$status_pelanggan') ");

    if($insert1){
        header ("location:pelanggan.php");
    }else{
        error_reporting(E_ALL);
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
                                        <h6 class="dropdown-header"><?php echo $_SESSION['username'] ?></h6>
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
                                <h3>Pelanggan</h3>
                            
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pelanggan
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Table Pelanggan</h4>
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" >
                                   <i class="bi bi-plus"></i> Tambah Planggan
                                </button>
                            </div>
                            <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                             
                                    <tr>
                                            <th>ID Pelanggan</th>
                                            <th>Kota</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kodepos</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                        
                                    <?php
                                            $ambildatapelanggan = mysqli_query($conn,"SELECT * FROM pelanggan as a JOIN kota as b ON (a.id_kota=b.id_kota)
                                                                             ");
                                            while($data=mysqli_fetch_array($ambildatapelanggan)){ 
                                                $id_pelanggan = $data['id_pelanggan'];
                                                $nama_kota = $data['nama_kota'];
                                                $nama_pelanggan = $data['nama_pelanggan'];
                                                $alamat_pelanggan = $data['alamat_pelanggan'];
                                                $kodepos_pelanggan = $data['kodepos_pelanggan'];
                                                $status_pelanggan = $data['status_pelanggan'];
                                            ?>
                                        <tr>
                                            <td><?=$id_pelanggan;?></td>
                                            <td><?=$nama_kota;?></td>
                                            <td><?=$nama_pelanggan;?></td>
                                            <td><?=$alamat_pelanggan;?></td>
                                            <td><?=$kodepos_pelanggan;?></td>
                                            <td>
                                                <?php
                                                if($status_pelanggan==1){ ?>
                                                <span class="badge bg-light-success">Aktif</span>
                                                   
                                                <?php }else{ ?>
                                                    <span class="badge bg-light-danger">Tidak Aktif</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="pelanggan_edit.php?id=<?=$id_pelanggan;?>" type="button" class="btn btn-outline-warning">Edit</a>
                                                
                                                      
                                                <a href="pelanggan_delete.php?id=<?=$id_pelanggan;?>" type="button" class="btn btn-outline-danger">Delete</a>
                                                         
                                            </td>

                                        </tr>
                                          <?php
                                          };
                                          ?>
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

    <script src="assets/js/main.js"></script>
</body>

 <!-- The Modal -->
 <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pelanggan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" name="tambahpelanggan"></button>
      </div>

      <form action="pelanggan.php" method="post">

      <!-- Modal body -->
      <div class="modal-body">
      <select name="id_kota" class="form-control mt-4">
          <?php
          $getkota = mysqli_query($conn,"SELECT * FROM kota");
          while($kt=mysqli_fetch_array($getkota)){
            $id_kota = $kt['id_kota'];  $nama_kota=$kt['nama_kota'];
                 
          ?>
          <option value="<?=$id_kota;?>" ><?=$nama_kota?>  </option>
          <?php
          }
          ?>
      </select>

      <input type="text" name="nama_pelanggan" class="form-control mt-4" placeholder="nama pelanggan">
      <input type="text" name="alamat_pelanggan" class="form-control mt-4" placeholder="alamat_pelanggan">
      <input type="integer" name="kodepos_pelanggan" class="form-control mt-4" placeholder="kodepos_pelanggan">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="tambahpelanggan" class="btn btn-info" value="tambahdata" >Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
        
      

      </form>
    </div>
  </div>
</div>

</html>