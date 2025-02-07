<?php
require "koneksi.php" ;
$id = $_GET['id'] ;
mysqli_query($koneksi,"DELETE FROM penjualan WHERE id = $id") ;
header("Location:admin_penjualan.php") ;



?>