<?php
include 'koneksi.php';
$username = "adm";
$password = md5("admin12345");

mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
echo "Akun admin berhasil dibuat! Username: admin | Password: admin123";
?>
