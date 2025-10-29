<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $_SESSION['user'] = $username;
    header("location:index.php");
  } else {
    echo "<script>alert('Username atau Password salah!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .hover-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    .login-box {
      max-width: 360px;
      margin: auto;
      padding-top: 80px;
    }
  </style>
</head>
<body class="bg-light">

  <div class="login-box">
    <div class="card card-outline card-primary hover-card">
      <div class="card-header text-center">
        <a href="#" class="h2"><b>Login</b></a>
      </div>
      <div class="card-body">
        <form method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">
          Belum punya akun? <a href="register.php">Daftar</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
</body>
</html>