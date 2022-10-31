<?php
$koneksi = mysqli_connect("localhost","root","","zuandrewresto");

if(mysqli_connect_errno())
{
    echo "Gagal melakukan Koneksi ke MySQL : ". mysqli_connect_error();
}
elseif($koneksi){
    
}
?>