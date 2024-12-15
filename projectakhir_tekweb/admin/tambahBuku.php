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
    <nav class="navbar sticky-top bg-primary mb-3">
        <h1 class="mt-3 mb-3 ms-3 me-3 text-white"> Data Semua Buku Perpustakaan </h1>
    </nav>
    
    <div class="card-body ms-3 me-3">
            <div>
                <a href="inputDataBuku.php" class="btn btn-secondary">Kembali</a>
            </div>


            <form action="../functionsAdmin/addBook.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="container">
            <div class="mb-2">
                <label for="cover" class="col-form-label fw-bold">Cover Buku</label>
                <input type="file" class="form-control" name="cover" accept=".jpg, .png, .jpeg" required>
            </div>


                <div class="mb-2">
                    <label for="judul" class="col-form-label fw-bold">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required>
                </div>

                <div class="mb-2">
                    <label for="isbn" class="col-form-label fw-bold">ISBN</label>
                    <input type="text" class="form-control" name="isbn" placeholder="Masukkan ISBN buku" required>
                </div>

                <div class="mb-2">
                    <label for="penulis" class="col-form-label fw-bold">Penulis</label>
                    <input type="text" class="form-control" name="penulis" placeholder="Masukkan nama penulis">
                </div>

                <div class="mb-2">
                    <label for="kategori" class="col-form-label fw-bold">Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Masukkan Kategori" required>
                </div>

                <div class="mb-2">
                    <label for="sinopsis" class="col-form-label fw-bold">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" placeholder="Masukkan sinopsis buku" required></textarea>
                </div> 

                <div class="mb-2">
                    <label for="page" class="col-form-label fw-bold">Jumlah Halaman</label>
                    <input type="number" class="form-control" name="page" min="1" placeholder="Masukkan jumlah halaman" required>
                </div> 

                <div class="mb-2">
                    <label for="location" class="col-form-label fw-bold">Lokasi Buku</label>
                    <input type="text" class="form-control" name="location" placeholder="Masukkan lokasi buku" required>
                </div> 


                <!-- 1= tersedia 0=sedang dinjam-->
                <div class="mb-2">
                    <label for="status" class="col-form-label fw-bold">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" selected>Tersedia</option>
                        <option value="0">Sedang Dipinjam</option>
                    </select>
                </div>

            <div>
                <button type="submit" class="btn btn-primary" name="add_book">Simpan</button>
            </div>

        </form>
            
    </div>

<body>

