<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/admin_dashboard.css">
</head>

<body>
  <!-- Sidebar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ADMIN LIBRARY MANAGEMENT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inputDataBuku.php">Manage Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Book Statistics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Borrowing History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Fine Payment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container-fluid p-4" id="content">
    <h1 class="mb-4">Dashboard Admin</h1>

    <!-- Summary Cards -->
    <div class="row">
      <div class="col-md-3">
        <div class="card text-white mb-3">
          <div class="card-body bg-primary">
            <h5 class="card-title">Total Buku</h5>
            <p class="card-text">150 Buku</p>
          </div>
          <!-- Tambahin button untuk add books -->
      
          <a href="inputDataBuku.php" class="card-footer border-primary text-center btn" style="color: black;">Tambahkan Buku</a>
          
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-success text-white mb-3">
          <div class="card-body">
            <h5 class="card-title">Buku Tersedia</h5>
            <p class="card-text">120 Buku</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-danger text-white mb-3">
          <div class="card-body">
            <h5 class="card-title">Buku Dipinjam</h5>
            <p class="card-text">30 Buku</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-warning text-dark mb-3">
          <div class="card-body">
            <h5 class="card-title">Denda Belum Dibayar</h5>
            <p class="card-text">Rp 500,000</p>
          </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Recent Activities -->
    <h2 class="mt-5">Aktivitas Terbaru</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nama Peminjam</th>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>Algoritma Pemrograman</td>
          <td>01-12-2024</td>
          <td><span class="badge bg-success">Dikembalikan</span></td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>Pemrograman Python</td>
          <td>02-12-2024</td>
          <td><span class="badge bg-danger">Terlambat</span></td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>