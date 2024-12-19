<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/summary.css" rel="stylesheet">
</head>

<body>
  <!-- Main Content -->
  <div class="container-fluid p-4" id="content">
    <h1 class="mb-4">Dashboard Admin</h1>

    <!-- Summary Cards -->
    <div class="row">
      <div class="col-md-3">
        <div class="card card-hover">
          <div class="card-body card-body-total_books">
            <h5 class="card-title">Total Books</h5>
            <p class="card-text">150 Buku</p>
          </div>
          <a href="manage_books.php" class="btn card-btn" style=" border-color: #4C1F7A">SEE DETAILS</a>
          <!-- Tombol di bawah card -->
        </div>
      </div>
      <div class=" col-md-3">
        <div class="card card-hover">
          <div class="card-body card-body-available_books">
            <h5 class="card-title">Available Books</h5>
            <p class="card-text">120 Buku</p>
          </div>
          <a href="book_statistics.php" class="btn card-btn" style="border-color: #2C7865;">SEE DETAILS</a>
          <!-- Tombol di bawah card -->
        </div>
      </div>
      <div class=" col-md-3">
        <div class="card card-hover">
          <div class="card-body card-body-borrowed_books">
            <h5 class="card-title">Borrowed Books</h5>
            <p class="card-text">30 Buku</p>
          </div>
          <a href="borrowing_history.php" class="btn card-btn" style="border-color: #A66E38;">SEE DETAILS</a>
          <!-- Tombol di bawah card -->
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-hover">
          <div class="card-body card-body-unpaid_fines">
            <h5 class="card-title">Unpaid Fines</h5>
            <p class="card-text">Rp 500,000</p>
          </div>
          <a href="fine_payment.php" class="btn card-btn" style="border-color: #A02334;">SEE DETAILS</a>
          <!-- Tombol di bawah card -->
        </div>
      </div>
    </div>

    <!-- Recent Activities -->
    <h2 class="mt-5 pt-4">Aktivitas Terbaru</h2>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>