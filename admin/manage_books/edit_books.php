<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar sticky-top bg-primary mb-3">
    <h1 class="mt-3 mb-3 ms-3 me-3 text-white"> Edit Buku </h1>
  </nav>
  <div class="container">
    <?php
      require_once('../koneksi.php');

      // Ambil ID buku dari URL
      $id = $_GET['id'];

      // Query untuk mengambil data buku berdasarkan ID
      $query = "SELECT * FROM books WHERE id = $id";
      $result = mysqli_query($conn, $query);
      $book = mysqli_fetch_assoc($result);

      if (!$book) {
          echo "<p>Buku tidak ditemukan!</p>";
          exit;
      }
    ?>

    <form action="../functionsAdmin/editBook.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

      <div class="mb-2">
        <label for="judul" class="col-form-label fw-bold">Judul Buku</label>
        <input type="text" class="form-control" name="judul" value="<?php echo $book['title']; ?>" required>
      </div>
      <div class="mb-2">
        <label for="isbn" class="col-form-label fw-bold">ISBN</label>
        <input type="text" class="form-control" name="isbn" value="<?php echo $book['isbn']; ?>" required>
      </div>
      <div class="mb-2">
        <label for="penulis" class="col-form-label fw-bold">Penulis</label>
        <input type="text" class="form-control" name="penulis" value="<?php echo $book['author']; ?>">
      </div>
      <div class="mb-2">
        <label for="kategori" class="col-form-label fw-bold">Kategori</label>
        <input type="text" class="form-control" name="kategori" value="<?php echo $book['category']; ?>" required>
      </div>
      <div class="mb-2">
        <label for="sinopsis" class="col-form-label fw-bold">Sinopsis</label>
        <textarea class="form-control" name="sinopsis" required><?php echo $book['synopsis']; ?></textarea>
      </div>
      <div class="mb-2">
        <label for="page" class="col-form-label fw-bold">Jumlah Halaman</label>
        <input type="number" class="form-control" name="page" value="<?php echo $book['pages']; ?>" required>
      </div>
      <div class="mb-2">
        <label for="location" class="col-form-label fw-bold">Lokasi Buku</label>
        <input type="text" class="form-control" name="location" value="<?php echo $book['location']; ?>" required>
      </div>
      <div class="mb-2">
        <label for="status" class="col-form-label fw-bold">Status</label>
        <select class="form-select" name="status" required>
          <option value="1" <?php echo $book['status'] == 1 ? 'selected' : ''; ?>>Tersedia</option>
          <option value="0" <?php echo $book['status'] == 0 ? 'selected' : ''; ?>>Sedang Dipinjam</option>
        </select>
      </div>
      <div class="mb-2">
        <label for="cover" class="col-form-label fw-bold">Cover Buku (Opsional)</label>
        <input type="file" class="form-control" name="cover" accept=".jpg, .png, .jpeg">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti cover.</small>
      </div>
      <button type="submit" class="btn btn-primary" name="update_book">Simpan Perubahan</button>
    </form>
  </div>
</body>

</html>