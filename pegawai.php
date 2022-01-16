<?php
session_start();

include 'koneksi.php';

if(isset($_POST['tambahpegawai'])){
 
    $id_kota = $_POST['id_kota'];
    $id_jabatan = $_POST['id_jabatan'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $alamat_pegawai = $_POST['alamat_pegawai'];
    $kodepos_pegawai = $_POST['kodepos_pegawai'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status_pegawai = 1;

    $insert1 = mysqli_query($conn, "INSERT INTO pegawai (id_pegawai,id_kota,id_jabatan,nama_pegawai,alamat_pegawai,kodepos_pegawai,username,password,status_pegawai)
    VALUES (null,'$id_kota','$id_jabatan','$nama_pegawai','$alamat_pegawai','$kodepos_pegawai','$username','$password','$status_pegawai') ");

    if($insert1){
        header ("location:pegawai.php");
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
                                <h3>Pegawai</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pegawai
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pegawai</h4>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" >
                                   <i class="bi bi-plus"></i> Tambah Pegawai
                                </button>
                            </div>
                            <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    <tr>
                                            <th>ID Pegawai</th>
                                            <th>Kota</th>
                                            <th>Jabatan</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kodepos</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            <th>Aktif/Deaktif</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                        
                                    <?php
                                            $ambildatapegawai = mysqli_query($conn,"SELECT * FROM pegawai as a JOIN kota as b ON (a.id_kota=b.id_kota)
                                                                            JOIN jabatan as c ON (a.id_jabatan = c.id_jabatan) ");
                                            while($data=mysqli_fetch_array($ambildatapegawai)){ 
                                                $id_pegawai = $data['id_pegawai'];
                                                $nama_kota = $data['nama_kota'];
                                                $nama_jabatan = $data['nama_jabatan'];
                                                $nama_pegawai = $data['nama_pegawai'];
                                                $alamat_pegawai = $data['alamat_pegawai'];
                                                $kodepos_pegawai = $data['kodepos_pegawai'];
                                               
                                                $status_pegawai = $data['status_pegawai'];
                                            ?>
                                        <tr>
                                            <td><?=$id_pegawai;?></td>
                                            <td><?=$nama_kota;?></td>
                                            <td><?=$nama_jabatan;?></td>
                                            <td><?=$nama_pegawai;?></td>
                                            <td><?=$alamat_pegawai;?></td>
                                            <td><?=$kodepos_pegawai;?></td>
                                            <td>
                                                <?php
                                                if($status_pegawai==1){?>
                                                <span class="badge bg-light-success">Aktif</span>
                                                   
                                               <?php }else{ ?>
                                                <span class="badge bg-light-danger">Libur</span>
                                                <?php
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <a href="pegawai_edit.php?id=<?=$id_pegawai;?>" type="button" class="btn btn-outline-warning">Edit</a>
                                                
                                                      
                                                <a href="pegawai_delete.php?id=<?=$id_pegawai;?>" type="button" class="btn btn-outline-danger">Delete</a>
                                                         
                                            </td>

                                            <td>
                                                <?php if($status_pegawai==1){ ?> 
                                                <a href="deaktif.php?id=<?=$id_pegawai;?>" type="button"><i class="bi bi-toggle-off"></i></a>
                                                <?php }else{ ?>
                                                      
                                                <a href="aktif.php?id=<?=$id_pegawai;?>" type="button"><i class="bi bi-toggle-on"></i></a>
                                                 <?php 
                                                } 
                                                 
                                                 ?>     
                                            </td>
                                        </tr>
                                          <?php
                                          }
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
        <h4 class="modal-title">Tambah Pegawai</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" name="tambahpegawai"></button>
      </div>

      <form action="pegawai.php" method="post">

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

      <select name="id_jabatan" class="form-control mt-4">
          <?php
          $getjabatan = mysqli_query($conn,"SELECT * FROM jabatan");
          while($jb=mysqli_fetch_array($getjabatan)){
            $id_jabatan = $jb['id_jabatan'];  $nama_jabatan=$jb['nama_jabatan'];
                 
          ?>
          <option value="<?=$id_jabatan;?>" ><?=$nama_jabatan?>  </option>
          <?php
          }
          ?>
          </select>
      <input type="text" name="nama_pegawai" class="form-control mt-4" placeholder="nama pegawai">
      <input type="text" name="alamat_pegawai" class="form-control mt-4" placeholder="alamat_pegawai">
      <input type="text" name="kodepos_pegawai" class="form-control mt-4" placeholder="kodepos_pegawai">
      <input type="text" name="username" class="form-control mt-4" placeholder="username">
      <input type="text" name="password" class="form-control mt-4" placeholder="password">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="tambahpegawai" class="btn btn-info" value="tambahdata" >Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
        
      

      </form>
    </div>
  </div>
</div>

</html>