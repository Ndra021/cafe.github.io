<?php 
require "koneksi.php" ;
$id = $_GET['id'] ;
$r = mysqli_query($koneksi,"SELECT * FROM roti") ; 
$roti = [] ;
$roti = mysqli_fetch_assoc($r) ;

    // Proses saat tombol "Beli" diklik
  if(isset($_POST['submit'])){
        if(penjualan($_POST) > 0){
            echo"     
                <script>
                    alert('data berhasil ditambahkan') ;
                    document.location.href='menu.php' ;
                </script>      
            " ;
        }
        else{
            echo"     
            <script>
                alert('data  tidak berhasil ditambahkan') ;
                document.location.href='penjualan.php' ;
            </script>      
        " ;
        }
    }





?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Pembelian Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pembelian Roti</h2>
        <form method="post" action="">
            <input type="hidden" name="harga" value="<?= $roti['harga'] ;?>">
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama"><br><br>
            <label for="email">Email :</label>
            <input type="text" id="email" name="email"><br><br>
            <label for="produk">Roti :</label>
            <input type="text" id="produk" name="produk" value=<?= $roti['nama'] ;?>><br><br>
            <label for="jumlah">Jumlah :</label>
            <input type="number" id="jumlah" name="jumlah"><br><br>
            <input type="submit" name="submit" value="Beli">
        </form>
    </div>
</body>
</html>
