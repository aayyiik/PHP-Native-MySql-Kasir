<?php
session_start();
include 'koneksi.php';
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id_domba
$result = mysqli_query($conn, "SELECT * FROM pegawai as a JOIN kota as b ON (a.id_kota=b.id_kota)
JOIN jabatan as c ON (a.id_jabatan = c.id_jabatan) WHERE id_pegawai='$id'");
if(mysqli_num_rows($result) == 0){
  
    //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda 
    echo 'gagal';
    
   }else{
   
    //jika data ditemukan, maka membuat variabel $data
    $data = mysqli_fetch_assoc($result); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
   
   };

?>

<?php

include 'koneksi.php';
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $id_kota = $_POST['id_kota'];
    $id_jabatan = $_POST['id_jabatan'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $alamat_pegawai = $_POST['alamat_pegawai'];
    $kodepos_pegawai = $_POST['kodepos_pegawai'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status_pegawai = $_POST['status_pegawai'];

    $update = mysqli_query($conn, "UPDATE pegawai SET id_pegawai='$id', id_kota='$id_kota', id_jabatan='$id_jabatan',
                            nama_pegawai='$nama_pegawai', alamat_pegawai='$alamat_pegawai', kodepos_pegawai='$kodepos_pegawai', username='$username', password='$password', status_pegawai='$status_pegawai'
                            WHERE id_pegawai='$id'");

 
    //jika query update sukses
    if($update){
  
    echo 'Data berhasil di simpan! ';  //Pesan jika proses simpan sukses
    header("location:pegawai.php"); //membuat Link untuk kembali ke halaman edit
    
   }else{ 
    error_log( "This code has errors!" );
   //Pesan jika proses simpan gagal
    //membuat Link untuk kembali ke halaman edit
    
   };
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
                                <h3>Pegawai</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Pegawai
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Pegawai</h4>
                               
                            </div>
                            
                            <div class="card-body col-md-4 offset-md-4 py-4">
                          
                            <div class="row">
                                <div class="col-md-12">
                                
                                    
                                <form action="pegawai_edit.php" method="post">
                  
                                    <div class="form-group">
                                        <label for="disabledInput">ID Pegawai</label>
                                        <input type="text" name="id" class="form-control" id="disabledInput"
                                      
                                             value="<?=$id;?>" readonly >  
                                    </div>

                                    <div class="form-group">
                                        <label for="helperText">username</label>
                                        <input type="text" name="username" id="helperText" class="form-control" value="<?=$data['username']?>" placeholder="Name">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="helperText">Password</label>
                                        <input type="text" name="password" id="helperText" class="form-control" value="<?=$data['password']?>" placeholder="Name" readonly>
                                        
                                    </div>

                                        <label for="helpInputTop">Kota</label>
                                             <fieldset class="form-group">
                                                    <select class="form-select" name="id_kota" id="basicSelect">
                                                    <?php
                                                        $getkota = mysqli_query($conn,"SELECT * FROM kota");
                                                        while($kt=mysqli_fetch_array($getkota)){
                                                            $id_kota = $kt['id_kota'];  $nama_kota=$kt['nama_kota'];
                                                                
                                                        ?>
                                                        <option value="<?=$id_kota;?>" ><?=$nama_kota;?>  </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </fieldset>
                                                <p><small class="text-muted">Update kota*.</small>
                                                </p>

                                        <label for="helpInputTop">Jabatan</label>
                                             <fieldset class="form-group">
                                                    <select class="form-select" name="id_jabatan" id="basicSelect">
                                                    <?php
                                                        $getjabatan = mysqli_query($conn,"SELECT * FROM jabatan");
                                                        while($jb=mysqli_fetch_array($getjabatan)){
                                                            $id_jabatan = $jb['id_jabatan'];  $nama_jabatan=$jb['nama_jabatan'];
                                                                
                                                        ?>
                                                        <option value="<?=$id_jabatan;?>" ><?=$nama_jabatan;?>  </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </fieldset>
                                                <p><small class="text-muted">Update jabatan*.</small>
                                                </p>       

                                    <div class="form-group">
                                        <label for="helperText">Nama</label>
                                        <input type="text" name="nama_pegawai" id="helperText" class="form-control" value="<?=$data['nama_pegawai']?>" placeholder="Name">
                                        
                                    </div>
                               
                                
                                    <div class="form-group">
                                        <label for="helperText">Alamat pegawai</label>
                                        <input type="text" name="alamat_pegawai" id="helperText" class="form-control" value="<?=$data['alamat_pegawai']?>" placeholder="Name">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="helperText">Kodepos Pegawai</label>
                                        <input type="text" name="kodepos_pegawai" id="helperText" class="form-control" value="<?=$data['kodepos_pegawai']?>" placeholder="Name">
                                        
                                    </div>

                                   
                                        <div>
                                        <input type="submit" name="update" class="btn btn-warning rounded-pill"></a>
                                        </div>                
                                   
                                  
                                </div>
                                </form>
                                
                            </div>
                            </div>

                        </div>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Saugi</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    

    <script src="assets/js/main.js"></script>
</body>
</html>