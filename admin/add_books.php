<?php
include('../koneksi.php');;
include ('navbar.php'); 

// Cek jika form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Mengambil data dari form
$title = $_POST['title'];
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$category = $_POST['category'];
$synopsis = $_POST['synopsis'];
$pages = $_POST['pages'];
$cover_image = $_FILES['cover_image']['name']; // Gambar
$location = $_POST['location'];
$status = $_POST['status'];

// Menyimpan gambar di folder yang ditentukan
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);

// Query untuk menambahkan buku baru
$sql = "INSERT INTO books (title, isbn, author, category, synopsis, pages, cover_image, location, status)
VALUES ('$title', '$isbn', '$author', '$category', '$synopsis', $pages, '$cover_image', '$location', '$status')";

if (mysqli_query($conn, $sql)) {
echo "Buku berhasil ditambahkan!";
} else {
echo "Error: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="css/add_books.css">
</head>


<body>
  <div class="container">
    <h2 class="mb-4 text-center">TAMBAH BUKU BARU</h2>
    <form action="add_book.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul buku" required>
      </div>

      <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN buku" required>
      </div>

      <div class="mb-3">
        <label for="author" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Masukkan nama penulis" required>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Kategori</label>
        <input type="text" class="form-control" id="category" name="category" placeholder="Masukkan kategori buku"
          required>
      </div>

      <div class="mb-3">
        <label for="synopsis" class="form-label">Sinopsis</label>
        <textarea class="form-control" id="synopsis" name="synopsis" rows="3" placeholder="Masukkan sinopsis buku"
          required></textarea>
      </div>

      <div class="mb-3">
        <label for="pages" class="form-label">Jumlah Halaman</label>
        <input type="number" class="form-control" id="pages" name="pages" placeholder="Masukkan jumlah halaman"
          required>
      </div>

      <div class="mb-3">
        <label for="cover_image" class="form-label">Gambar Sampul</label>
        <input type="file" class="form-control" id="cover_image" name="cover_image" required>
      </div>

      <div class="mb-3">
        <label for="location" class="form-label">Lokasi Buku</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Contoh: Rak A1" required>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status Buku</label>
        <select class="form-select" id="status" name="status">
          <option value="Tersedia">Tersedia</option>
          <option value="Sedang Dipinjam">Sedang Dipinjam</option>
        </select>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-gradient">
          <i class="fas fa-plus-circle"></i> Tambah Buku
        </button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>