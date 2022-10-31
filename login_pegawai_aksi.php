<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "select * from pegawai where id_pegawai ='$username' and pw_pegawai ='$password'");
$cek = mysqli_num_rows($data);

if($cek >0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:index.php");
}else{
    header("location:login_pegawai.php?pesan=gagal");
}

?>