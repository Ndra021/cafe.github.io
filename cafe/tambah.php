<?php

    require "koneksi.php" ;
    if(isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo"     
                <script>
                    alert('data berhasil ditambahkan') ;
                    document.location.href='admin.php' ;
                </script>      
            " ;
        }
        else{
            echo"     
            <script>
                alert('data  tidak berhasil ditambahkan') ;
                document.location.href='admin.php' ;
            </script>      
        " ;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;700&display=swap" rel="stylesheet">
    <title>Tambah Data</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 200px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 250px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        input[type="text"]::placeholder,
        input[type="number"]::placeholder {
            color: #999;
            font-style: italic;
        }

        .file-input {
            display: none;
            
        }

        .file-label {
            display: inline-block;
            padding: 10px 0;
            text-align: center;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 150px;
            transition: background-color 0.3s ease;
        }

        .file-label:hover {
            background-color: #555;
        }

        .file-name {
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            color: #666;
            font-style: italic;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Tambah Data</h2>
        <ul>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama">
            </li>
            <li>
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" placeholder="Masukkan harga">
            </li>
            <li>
                <label for="deskripsi">Deskripsi:</label>
                <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi">
            </li>
            <li>
                <label for="tipe">Tipe:</label>
                <input type="text" name="tipe" id="tipe" placeholder="Masukkan tipe">
            </li>
            <li>
                <input type="file" name="gambar" id="gambar" class="file-input">
                <label for="gambar" class="file-label">Pilih Gambar<span class="file-name"></span></label>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>

    <script>
        const fileInput = document.getElementById('gambar');
        const fileLabel = document.querySelector('.file-label');
        const fileName = document.querySelector('.file-name');

        fileInput.addEventListener('change', function() {
            const files = this.files;
            if (files.length > 0) {
                fileName.textContent = files[0].name;
            } else {
                fileName.textContent = '';
            }
        });

        fileLabel.addEventListener('click', function() {
            fileInput.click();
        });
    </script>
</body>
</html>