<?php
include('navbar.php'); 
include('connection/books_config.php');

// Query untuk mengambil data buku
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Mengecek jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Menangkap data dari form dan melakukan escape untuk mencegah error SQL
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
  $pages = mysqli_real_escape_string($conn, $_POST['pages']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  // Menangani upload gambar cover buku
  if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
      $cover_image = $_FILES['cover_image']['name'];
      $target_dir = "../images/book/"; // Folder tujuan untuk gambar
      $target_file = $target_dir . basename($cover_image);
      
      // Memindahkan file gambar ke folder tujuan
      if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file)) {
          // Jika gambar berhasil diupload, lanjutkan proses
      } else {
          $cover_image = null; // Jika gagal upload gambar
      }
  } else {
      $cover_image = null; // Jika tidak ada gambar yang diupload
  }

  // Query untuk menambahkan data buku ke database
  $sql = "INSERT INTO books (title, isbn, author, category, synopsis, pages, location, cover_image, status) 
          VALUES ('$title', '$isbn', '$author', '$category', '$synopsis', '$pages', '$location', '$cover_image', '$status')";

  // Mengeksekusi query
  if ($conn->query($sql) === TRUE) {
      // Jika berhasil, redirect ke halaman manage_books.php
      header("Location: manage_books.php?success=true");
      exit(); // Jangan lupa keluar dari skrip setelah header
  } else {
      // Jika gagal, tampilkan pesan error
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Menutup koneksi
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MANAGEMENT PRODUCTS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/manage_books.css">
</head>

<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Library Book Data</h1>

    <!-- Tombol untuk membuka modal tambah buku -->
    <div class="d-flex justify-content-end mb-3">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
        <i class="fas fa-plus"></i> Tambah Buku
      </button>
    </div>

    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addBookModalLabel">Tambah Buku Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Form tambah buku -->
            <form method="post" enctype="multipart/form-data">
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="title" class="form-label">Judul Buku</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="title" name="title" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="isbn" class="form-label">ISBN</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="author" class="form-label">Penulis</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="author" name="author" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="category" class="form-label">Kategori</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="category" name="category" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="synopsis" class="form-label">Sinopsis</label>
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="pages" class="form-label">Jumlah Halaman</label>
                </div>
                <div class="col-md-8">
                  <input type="number" class="form-control" id="pages" name="pages" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="location" class="form-label">Lokasi</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="location" name="location" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="cover_image" class="form-label">Cover Buku</label>
                </div>
                <div class="col-md-8">
                  <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="status" class="form-label">Status</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control" id="status" name="status" required>
                    <option value="Available">Tersedia</option>
                    <option value="Not Available">Tidak Tersedia</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-success w-100">Tambah Buku</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Data Buku -->
    <?php if ($result->num_rows > 0): ?>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cover Image</th>
          <th>Title</th>
          <th>ISBN</th>
          <th>Author</th>
          <th>Category</th>
          <th>Synopsis</th>
          <th>Pages</th>
          <th>Location</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td>
            <?php if (!empty($row['cover_image'])): ?>
            <img src="../images/book/<?php echo $row['cover_image']; ?>" alt="Cover" class="cover-img">
            <?php else: ?>
            <img src="images/default_cover.png" alt="No Cover" class="cover-img">
            <?php endif; ?>
          </td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['isbn']; ?></td>
          <td><?php echo $row['author']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td><?php echo $row['synopsis']; ?></td>
          <td><?php echo $row['pages']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td>
            <div class="row">
              <!-- Edit Button -->
              <button class="btn btn-warning btn-sm" onclick="editFunction(<?php echo $row['id']; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <!-- Delete Button -->
              <button class="btn btn-danger btn-sm" onclick="deleteFunction(<?php echo $row['id']; ?>)">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-info text-center">No books found.</div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>