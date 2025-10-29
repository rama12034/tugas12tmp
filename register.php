<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($username) || empty($password)) {
    echo "<script>alert('Username dan Password wajib diisi!');</script>";
  } else {
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
      echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
      $password = md5($password);
      mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
      echo "<script>alert('Pendaftaran berhasil! Silakan login.');window.location='login.php';</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register | AdminLTE 4</title>
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
    .register-box {
      max-width: 360px;
      margin: auto;
      padding-top: 80px;
    }
  </style>
</head>
<body class="bg-light">

  <div class="register-box">
    <div class="card card-outline card-success hover-card">
      <div class="card-header text-center">
        <a href="#" class="h2"><b>Register</b></a>
      </div>
      <div class="card-body">
        <form method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required minlength="3">
            <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required minlength="6">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <button type="submit" name="register" class="btn btn-success w-100">Daftar</button>
        </form>
        <p class="mt-3 text-center">
          Sudah punya akun? <a href="login.php">Login</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
</body>
</html>