<?php
require "koneksi.php" ;
session_start() ;
function login($username, $password)
{
    global $koneksi;

    // Escape string untuk mencegah SQL Injection
    $username = $username;
    $password = $password;

    // Query untuk mendapatkan data user berdasarkan username
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Memverifikasi password
        if ($password == $row['password']) {
            // Login berhasil

            // Set session login
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect ke halaman sesuai peran
            if ($row['role'] === 'admin') {
                header("Location: admin.php");
            } elseif ($row['role'] === 'user') {
                header("Location: index.php");
            }
            exit;
        }
    }

    // Jika login gagal
    return false;
}

if(isset($_POST['submit'])){
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    if (login($username, $password)) {
        // Login berhasil
        echo "Login berhasil!";
    } else {
        // Login gagal
        echo "Login gagal! Periksa kembali username dan password Anda.";
    }
}



?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 5px;
      width: 300px;
    }

    .login-container h2 {
      text-align: center;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .login-container button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    .login-container button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
      <input type="text" name="username" placeholder="Username" >
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>
