<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
include 'koneksi.php';
?>



<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Tambah Barang</h2>

    <form action="" method="post">
      <label class="block mb-2 font-medium text-gray-700">Nama Barang</label>
      <input type="text" name="nama_barang" required class="w-full border rounded p-2 mb-3">

      <label class="block mb-2 font-medium text-gray-700">Stok</label>
      <input type="number" name="stok" required class="w-full border rounded p-2 mb-3">

      <label class="block mb-2 font-medium text-gray-700">Harga</label>
      <input type="number" name="harga" required class="w-full border rounded p-2 mb-3">

      <label class="block mb-2 font-medium text-gray-700">Tanggal Expired</label>
      <input type="date" name="tanggal_expired" required class="w-full border rounded p-2 mb-4">

      <div class="flex justify-between">
        <a href="index.php" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Kembali</a>
        <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
      $nama = $_POST['nama_barang'];
      $stok = $_POST['stok'];
      $harga = $_POST['harga'];
      $expired = $_POST['tanggal_expired'];

      $sql = "INSERT INTO barang (nama_barang, stok, harga, tanggal_expired)
              VALUES ('$nama', '$stok', '$harga', '$expired')";
      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Barang berhasil ditambahkan!'); window.location='index.php';</script>";
      } else {
        echo "<p class='text-red-500 mt-3'>Gagal menambah barang!</p>";
      }
    }
    ?>
  </div>
</body>
</html>
