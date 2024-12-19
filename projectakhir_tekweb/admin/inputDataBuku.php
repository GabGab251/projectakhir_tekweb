<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Semua Buku Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/admin_dashboard.css">
  
</head>

<body>
    <!-- Header -->
    <nav class="navbar sticky-top bg-primary mb-3" style="width: 100%;">
        <div class="container-fluid">  <!-- Biar lebarny menyesuaikan -->
            <h1 class="mt-3 mb-3 ms-3 me-3 text-white"> Data Semua Buku Perpustakaan </h1>
        </div>
    </nav>
    
    
    <div class="ms-3 mb-3">
        <!-- Button buat tambah buku -->
        <a href="tambahBuku.php" class="btn btn-secondary">Tambah Buku</a>
        <a href="homeadmin_page.php" class="btn btn-primary">Kembali</a>

    </div>

    <div class="container mb-3 ms-3">
        <form action="your_search_page.php" method="GET" class="d-flex">
            <select name="search_by" class="form-select" required>
            <option value="judul">Judul Buku</option>
            <option value="isbn">ISBN</option>
            <option value="penulis">Penulis</option>
            <option value="kategori">Kategori</option>
            </select>
            <input type="text" class="form-control ms-2" name="search" placeholder="Masukkan kata kunci" required>
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>
    </div>
    
    
    <!-- Buat table data semua buku -->
    <div class="container mt-3 ms-3 me-3" style="width: auto;">
        <table class="table table-striped table-hover">
            <!-- Bikin Kolom -->
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cover Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">Jumlah Halaman</th>
                    <th scope="col">Lokasi Buku</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php include '../functionsAdmin/readBook.php'; ?>
            </tbody>
        </table>
    </div>

<body>