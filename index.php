<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status'] != "login" && $_SESSION['status'] != "login_admin") {
    header("location:login_admin.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Welcome</h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>
            <a href="menu.php"><i class="fas fa-utensils"></i>Menu</a>
            <a href="pegawai.php"><i class="fas fa-address-book"></i>Pegawai</a>
            <a href="transaksi.php"><i class="fas fa-shopping-cart"></i>Transaksi</a>
            <a href="report.php" target="blank"><i class="fas fa-print"></i>Report</a>
            <a href="logout.php" onclick="return confirm('Log out Sekarang?')"><i class="fas fa-sign-out-alt"></i>Log out</a>
        </div>
    </nav>
    <div class="container"><br><br>
        <div class="content">
            <h2>Home</h2>
            <hr>
            <p>Welcome to the home page!</p>
        </div>
    </div>
    </div>
</body>

</html>