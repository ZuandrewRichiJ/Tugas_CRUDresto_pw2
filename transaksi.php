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
    <title>Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <form action="" method="post">
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_transaksi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Id Menu</label>
                            <input type="text" name="id_menu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Id Pegawai</label>
                            <input type="text" name="id_pegawai" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Terjual(porsi)</label>
                            <input type="number" name="jumlah_beli" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_transaksi" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <td class="td-actions"><a data-toggle="modal" data-target="#tambah" class="btn btn-info">Tambah Data</a></td>
            <!-- Awal Card Tabel -->
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    <h3>Daftar Transaksi</h3>
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>ID Transaksi</th>
                                <th>Id Menu</th>
                                <th>Id Pegawai</th>
                                <th>Terjual(porsi)</th>
                                <th>Tanggal</th>
                                <th>Metode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM transaksi ORDER BY id_transaksi ASC";
                            $cek = mysqli_query($koneksi, $sql);
                            $no = 1;
                            while ($data = mysqli_fetch_array($cek)) {

                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['id_transaksi'] ?></td>
                                    <td><?= $data['id_menu'] ?></td>
                                    <td><?= $data['id_pegawai'] ?></td>
                                    <td><?= $data['jumlah_beli'] ?></td>
                                    <td><?= $data['tgl_transaksi'] ?></td>
                                    <td>
                                        <a href="transaksi_edit.php?id=<?= $data['id_transaksi'] ?>" class="btn btn-warning"> Edit </a>
                                        <a href="transaksi.php?page=hapus&id=<?= $data['id_transaksi'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- Akhir Card Tabel -->
        </div>
    </div>
    <!-- for Modal -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<!-- Tambah Data -->
<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id_transaksi'];
    $id_menu = $_POST['id_menu'];
    $id_pegawai = $_POST['id_pegawai'];
    $jumlah = $_POST['jumlah_beli'];
    $tgl = $_POST['tgl_transaksi'];

    $query = "INSERT INTO transaksi (id_transaksi,id_menu,id_pegawai,jumlah_beli,tgl_transaksi) 
    VALUES ('$id','$id_menu','$id_pegawai','$jumlah','$tgl')";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Ditambahkan'); 
	window.location.href='transaksi.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Ditambahkan');
	window.location.href='transaksi.php'</script>";
    }
}


//Pengujian jika Hapus di klik
if (isset($_GET['page'])) {
    if ($_GET['page'] == "hapus") {
        $ID = $_GET['id'];
        $query = "delete from transaksi WHERE id_transaksi='$ID' ";
        // cek perintah
        if (mysqli_query($koneksi, $query)) {
            // pesan apabila hapus berhasil
            echo "<script>alert('Data berhasil dihapus'); window.location.href='transaksi.php'</script>";
        } else {
            // pesan apabila hapus gagal
            echo "<script>alert('Data gagal dihapus, cek data Transaksi'); window.location.href='transaksi.php'</script>";
        }
    }
}
?>