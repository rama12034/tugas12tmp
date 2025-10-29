<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
include 'koneksi.php';
?>


<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id'"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Barang</h2>

    <form method="post">
      <label class="block mb-2 font-medium text-gray-700">Nama Barang</label>
      <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" class="w-full border rounded p-2 mb-3">

      <label class="block mb-2 font-medium text-gray-700">Stok</label>
      <input type="number" name="stok" value="<?= $data['stok'] ?>" class="w-full border rounded p-2 mb-3">

      <label class="block mb-2 font-medium text-gray-700">Harga</label>
      <input type="number" name="harga" value="<?= $data['harga'] ?>" class="w-full border rounded p-2 mb-3">

      <label class="block mb-2 font-medium text-gray-700">Tanggal Expired</label>
      <input type="date" name="tanggal_expired" value="<?= $data['tanggal_expired'] ?>" class="w-full border rounded p-2 mb-4">

      <div class="flex justify-between">
        <a href="index.php" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Kembali</a>
        <button type="submit" name="update" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
      </div>
    </form>

    <?php
    if (isset($_POST['update'])) {
      $nama = $_POST['nama_barang'];
      $stok = $_POST['stok'];
      $harga = $_POST['harga'];
      $expired = $_POST['tanggal_expired'];

      $sql = "UPDATE barang SET 
              nama_barang='$nama', stok='$stok', harga='$harga', tanggal_expired='$expired'
              WHERE id_barang='$id'";
      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
      } else {
        echo "<p class='text-red-500 mt-3'>Gagal update data!</p>";
      }
    }
    ?>
  </div>
</body>
</html>
