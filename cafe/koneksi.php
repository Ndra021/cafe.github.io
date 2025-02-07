<?php

    $koneksi = mysqli_connect("localhost","root","","rotio") ;


    function tambah($data){
        global $koneksi ;
        $nama = $data['nama'] ;
        $harga = $data['harga'] ;
        $deskripsi = $data['deskripsi'] ;
        $tipe = $data['tipe'] ;
        $gambar = tambahgambar() ;

        $query = "
            INSERT INTO roti 
            VALUES('','$nama',$harga,'$deskripsi','$gambar','$tipe')
        
        " ;
            mysqli_query($koneksi,$query) ;

        return mysqli_affected_rows($koneksi) ;
    }

   function ubahdata($data){
        global $koneksi ;
        $id = $data['id'] ;
        $gambarlama = $data['gambarlama'] ;
        $nama = $data['nama'] ;
        $harga = $data['harga'] ;
        $deskripsi = $data['deskripsi'] ;
        $tipe = $data['tipe'] ;
        $error = $_FILES['gambar']['error'] ;
        if($error > 0){
            $gambar = $gambarlama ;
        }
        else{
            $gambar = tambahgambar() ;
        }

        $query = "
        UPDATE roti SET
        nama = '$nama',
        harga = $harga,
        deskripsi = '$deskripsi',
        gambar = '$gambar',
        tipe = '$tipe'
        WHERE id = $id
    " ;


    mysqli_query($koneksi,$query) ;
        
 
    return mysqli_affected_rows($koneksi) ;
    }


    function tambahgambar(){
        $name = $_FILES['gambar']['name'] ;
        $tmp = $_FILES['gambar']['tmp_name'] ;
        $size = $_FILES['gambar']['size'] ;
        $error = $_FILES['gambar']['error'] ;

            if($error === 4){
                return false ;
            } 
            move_uploaded_file($tmp,"img/".$name) ;
    return $name;   
    }


    function hapusdata($id){
        global $koneksi ;
        mysqli_query($koneksi,"DELETE FROM roti WHERE id = $id") ;
    return mysqli_affected_rows($koneksi) ;
    }


    


?>

<?php
function penjualan($data){
     global $koneksi ;
    $nama_orang = $data['nama'] ;
    $email = $data['email'] ;
    $produk = $data['produk'] ;
    $jumlah = intval($data['jumlah']) ;
    $harga = intval($data['harga']) ;
    $total = $jumlah * $harga ;
    

    $query = "
        INSERT INTO penjualan 
        VALUES('','$nama_orang','$email','$produk',$jumlah,$total)
    " ;

    mysqli_query($koneksi,$query) ;
    return mysqli_affected_rows($koneksi) ;
}
?>
