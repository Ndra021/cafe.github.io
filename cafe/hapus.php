<?php
require "koneksi.php" ;
$hapus = $_GET['id'] ;

if(hapusdata($hapus) > 0){
    echo"     
    <script>
        alert('data berhasil dihapus') ;
        document.location.href='admin.php' ;
    </script>      
" ;
}
else{
    echo"     
    <script>
        alert('data tidak berhasil dihapus') ;
        document.location.href='admin.php' ;
    </script>      
" ;
}


?>