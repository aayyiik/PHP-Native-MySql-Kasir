<?php

session_start();
include 'koneksi.php';

//cek login
if(isset($_POST['login'])){ 
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cocokin dengan db ada atau tidak
    $cekdatabase = mysqli_query($conn, "SELECT * FROM pegawai WHERE username='$username' AND password='$password'");
    //hitung jumlah data
    $hitung =  mysqli_num_rows($cekdatabase);

    if(!$hitung){
        $_SESSION['error'] = 'Username dan Password salah';
    }else{
        session_start();
        // $_SESSION['pegawai']=$cekdatabase->fetch_assoc();
        $_SESSION['username']=$username;
       
        // $_SESSION['status']="login";
        header('location:dashboard.php');
     
    };
};

if(!isset($_SESSION['log'])){

}else{
    header('location:dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body class="brand" style="background-color: #4d4fd1;">
    <div id="auth">
        <div class="container">
           <div class="row justify-content-center">
                <div class="col-lg-5">
                   <div class="card shadow-lg border-0 rounded-lg mt-5" >
                   <?php 
            if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>
           <div class="alert alert-light-danger color-danger" role="alert"><i class="bi bi-file-excel"></i>
                <?=$_SESSION['error']?>
            </div>
            <?php
            }
            $_SESSION['error']= '';


            
            ?>

                        <!-- <div class="auth-logo">
                            <a href="index.html"><img src="assets/images/logo/s1.jpg" alt="Logo"></a>
                        </div> -->
                        <h1 class="auth-title">Selamat Datang Kembali, Admin!</h1>
                        <p class="auth-subtitle mb-5">Silahkan Login</p>

                        <form method="post">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                        
                            <div class="form-group col-md-4 offset-md-4 py-4" >
                                  <button class="btn btn-primary" name="login"> LOGIN </button>
                                            
                            </div>
                        </form>
                        
                    </div>
  

                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>