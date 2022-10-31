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
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            <center><h3>Laporan</h3></center>
        </div>

        <div class="card-body">

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Id Transaksi</th>
                        <th>Menu</th>
                        <th>Terjual(porsi)</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from transaksi JOIN menu ON transaksi.id_menu = menu.id_menu");
                    while ($d = mysqli_fetch_array(($data))) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?php echo $d['id_transaksi']; ?></td>
                            <td><?php echo $d['nama_menu']; ?></td>
                            <td><?php echo $d['jumlah_beli']; ?></td>
                            <td><?php echo $d['tgl_transaksi']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
    <br><br>
    <center><button onclick="window.print()">Print</button></center>
    <script>
        window.print();
    </script>
</body>

</html>