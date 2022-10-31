<?php
session_start();
include 'koneksi.php';
if($_SESSION['status']!="login" && $_SESSION['status']!="login_admin"){
    header("location:login_admin.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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

    <div class="container" style="margin-top:20px">
        <center>
            <font size="6">Edit Data</font>
        </center>

        <hr>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // ambil data berdasarkan id_transaksi		 
            $stid = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '$id'");

            while ($d = mysqli_fetch_array($stid)) {
        ?>

                <form action="" method="post">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">ID Transaksi</label>
                        <div class="col-md-6 col-sm-6">
                            <input readonly type="number" name="id_transaksi" class="form-control" value="<?= $d['id_transaksi'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Id Menu</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="id_menu" class="form-control" value="<?= $d['id_menu'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Id Pegawai</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="id_pegawai" class="form-control" value="<?= $d['id_pegawai'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Terjual</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" name="jumlah_beli" class="form-control" value="<?= $d['jumlah_beli'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="date" name="tgl_transaksi" class="form-control" value="<?= $d['tgl_transaksi'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="transaksi.php" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                </form>
        <?php }
        }  ?>
    </div>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id_transaksi'];
    $id_menu = $_POST['id_menu'];
    $id_pegawai = $_POST['id_pegawai'];
    $jumlah = $_POST['jumlah_beli'];
    $tgl = $_POST['tgl_transaksi'];


    // update data berdasarkan id_barang yg dikirimkan

    $query = "UPDATE transaksi SET id_menu='$id_menu', id_pegawai='$id_pegawai', jumlah_beli='$jumlah', 
    tgl_transaksi='$tgl' WHERE id_transaksi='$id'";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data berubah
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='transaksi.php'</script>";
    } else {
        // pesan jika data gagal diubah
        echo "<script>alert('Data Gagal diubah :('); window.location.href='transaksi.php'</script>";
    }
}
