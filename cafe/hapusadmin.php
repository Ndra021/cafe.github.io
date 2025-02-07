<?php
require "koneksi.php" ;
$id = $_GET['id'] ;
mysqli_query($koneksi,"DELETE FROM users WHERE id = $id") ;
header("Location:admin_user.php") ;



?>