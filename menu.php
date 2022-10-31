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
    <title>Menu</title>
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
                        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Menu</label>
                            <input type="text" name="id_menu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">--Pilih Kategori--</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Snack">Snack</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Stock(porsi)</label>
                            <input type="number" name="stock" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control">
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
                    <h3>Daftar Menu</h3>
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>ID Menu</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Stock(porsi)</th>
                                <th>Harga(porsi)</th>
                                <th>Metode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM menu ORDER BY id_menu ASC";
                            $cek = mysqli_query($koneksi, $sql);
                            $no = 1;
                            while ($data = mysqli_fetch_array($cek)) {

                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['id_menu'] ?></td>
                                    <td><?= $data['kategori'] ?></td>
                                    <td><?= $data['nama_menu'] ?></td>
                                    <td><?= $data['jumlah_menu'] ?></td>
                                    <td><?= $data['harga'] ?></td>
                                    <td>
                                        <a href="menu_edit.php?id=<?= $data['id_menu'] ?>" class="btn btn-warning"> Edit </a>
                                        <a href="menu.php?page=hapus&id=<?= $data['id_menu'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
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
    $id = $_POST['id_menu'];
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['stock'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO menu (id_menu,kategori,nama_menu,jumlah_menu,harga) 
    VALUES ('$id','$kategori','$nama','$jumlah','$harga')";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Ditambahkan'); 
	window.location.href='menu.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Ditambahkan');
	window.location.href='menu.php'</script>";
    }
}


//Pengujian jika Hapus di klik
if (isset($_GET['page'])) {
    if ($_GET['page'] == "hapus") {
        $ID = $_GET['id'];
        $query = "delete from menu WHERE id_menu='$ID' ";
        // cek perintah
        if (mysqli_query($koneksi, $query)) {
            // pesan apabila hapus berhasil
            echo "<script>alert('Data berhasil dihapus'); window.location.href='menu.php'</script>";
        } else {
            // pesan apabila hapus gagal
            echo "<script>alert('Data gagal dihapus, cek data Transaksi'); window.location.href='menu.php'</script>";
        }
    }
}
?>