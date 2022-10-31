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
            $stid = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$id'");

            while ($d = mysqli_fetch_array($stid)) {
        ?>

                <form action="" method="post">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">ID Menu</label>
                        <div class="col-md-6 col-sm-6">
                            <input readonly type="text" name="id_menu" class="form-control" value="<?= $d['id_menu'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label>
                        <div class="col-md-6 col-sm-6">
                            <select name="kategori" class="form-control" value="<?= $d['kategori'] ?>">
                                <option value="">--Pilih Kategori--</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Snack">Snack</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Menu</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="nama" class="form-control" value="<?= $d['nama_menu'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Stock</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="stock" class="form-control" value="<?= $d['jumlah_menu'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="harga" class="form-control" value="<?= $d['harga'] ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="menu.php" class="btn btn-warning">Kembali</a>
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
    $id = $_POST['id_menu'];
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['stock'];
    $harga = $_POST['harga'];


    // update data berdasarkan id_barang yg dikirimkan

    $query = "UPDATE menu SET kategori='$kategori', nama_menu='$nama', jumlah_menu='$jumlah', 
    harga='$harga' WHERE id_menu='$id'";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data berubah
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='menu.php'</script>";
    } else {
        // pesan jika data gagal diubah
        echo "<script>alert('Data Gagal diubah :('); window.location.href='menu.php'</script>";
    }
}
