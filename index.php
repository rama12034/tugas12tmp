
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  
  <!-- AdminLTE 3 CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  
  <!-- Optional: Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
<style>
  .btn-logout-smaller {
     position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 6px 6px;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .btn-logout-smaller:hover {
    background-color: #c82333;
    transform: scale(1.05);
  }
</style>



</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
          
        </li>
        
      </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Data Barang</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-box"></i>
                <p>Data Barang</p>
                    <a href="logout.php" class="btn btn-danger btn-logout-smaller">Out
  <i class="fas fa-sign-out-alt"></i>
</a>

              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper p-4">
      <div class="content-header">
        <h1 class="m-0 text-dark">Data Barang</h1>
        
      </div>

      <!-- Isi Tabel -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <a href="tambah.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Barang</a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'koneksi.php';
                $query = mysqli_query($conn, "SELECT * FROM barang");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<tr>
                          <td>{$row['id_barang']}</td>
                          <td>{$row['nama_barang']}</td>
                          <td>{$row['harga']}</td>
                          <td>{$row['stok']}</td>
                          <td>
                            <a href='ubah.php?id={$row['id_barang']}' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></a>
                            <a href='hapus.php?id={$row['id_barang']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
                          </td>
                        </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- Script AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>


</html>
