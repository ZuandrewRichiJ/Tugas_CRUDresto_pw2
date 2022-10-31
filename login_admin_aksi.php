<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "select * from admin where username ='$username' and pw_admin ='$password'");
$cek = mysqli_num_rows($data);

if($cek >0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login_admin";
    header("location:index.php");
}else{
    header("location:login_admin.php?pesan=gagal");
}

?>