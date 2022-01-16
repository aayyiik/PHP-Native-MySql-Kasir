<?php
//jika sudah login

if(isset($_SESSION['username'])){
    
}else{
    header('location:login.php');
}
?>