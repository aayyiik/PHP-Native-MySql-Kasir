
<?php
session_start();
include 'koneksi.php';
// Display selected user data based on id
// Getting id from url
$id= $_GET['id'];
 
// Fetech user data based on id_domba
$result = mysqli_query($conn, "SELECT * FROM pelanggan as a JOIN kota as b ON (a.id_kota=b.id_kota) WHERE id_pelanggan='$id'");
if(mysqli_num_rows($result) == 0){
  
    //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
    echo '<script>window.history.back()</script>';
    header ('location:pelanggan.php');
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
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $kodepos_pelanggan = $_POST['kodepos_pelanggan'];
    $status_pelanggan = $_POST['status_pelanggan'];

    $update = mysqli_query($conn, "UPDATE pelanggan SET id_pelanggan='$id', id_kota='$id_kota',
                            nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan'
                            , kodepos_pelanggan='$kodepos_pelanggan', status_pelanggan='$status_pelanggan' WHERE id_pelanggan='$id'");

 
    //jika query update sukses
    if($update){
  
    echo 'Data berhasil di simpan! ';  //Pesan jika proses simpan sukses
    header("location:pelanggan.php"); //membuat Link untuk kembali ke halaman edit
    
   }else{
    
    echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
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
                                <h3>Edit Kota</h3>
                       
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
                                <h4 class="card-title">Edit Pelanggan</h4>
                               
                            </div>
                            
                            <div class="card-body col-md-4 offset-md-4 py-4">
                          
                            <div class="row">
                                <div class="col-md-12">
                                
                                    
                                <form action="pelanggan_edit.php" method="post">
                  
                                    <div class="form-group">
                                        <label for="disabledInput">ID Pelanggan</label>
                                        <input type="text" name="id" class="form-control" id="disabledInput"
                                      
                                             value="<?=$id;?>" readonly>  
                                         
                                          
                                    </div>

                            
                                        <label for="helpInputTop">Provinsi</label>
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
                                           

                                    <div class="form-group">
                                        <label for="helperText">Nama Penerima</label>
                                        <input type="text" name="nama_pelanggan" id="helperText" class="form-control" value="<?=$data['nama_pelanggan']?>" placeholder="Nama Kota">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="helperText">Alamat Penerima</label>
                                        <input type="text" name="alamat_pelanggan" id="helperText" class="form-control" value="<?=$data['alamat_pelanggan']?>" placeholder="Nama Kota">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="helperText">Kodepos pelanggan</label>
                                        <input type="text" name="kodepos_pelanggan" id="helperText" class="form-control" value="<?=$data['kodepos_pelanggan']?>" placeholder="Nama Kota">
                                        
                                    </div>

                                    <label for="helpInputTop">Status pelanggan</label>
                                    <div class="form-check">
                                        <label><input type="radio" class="form-check-input" name="status_pelanggan" value=1 <?php if($data['status_pelanggan']==1) echo 'checked'?>>Aktif</label>
                                    </div>
                                    <div class="class form-check">
                                        <label><input type="radio" class="form-check-input" name="status_pelanggan" value=0 <?php if($data['status_pelanggan']==0) echo 'checked'?>>Tidak aktif</label>
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
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>
</html>