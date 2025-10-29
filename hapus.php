<?php
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");
echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
?>
