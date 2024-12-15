<?php
require_once('../koneksi.php');


if (isset($_POST['update_book'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isbn = $_POST['isbn'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $sinopsis = $_POST['sinopsis'];
    $page = $_POST['page'];
    $location = $_POST['location'];
    $status = $_POST['status'];

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $targetDir = "../uploads/";
        $fileName = basename($_FILES['cover']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Validasi file
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array(strtolower($fileType), ['jpg', 'png', 'jpeg'])) {
            if (move_uploaded_file($_FILES['cover']['tmp_name'], $targetFilePath)) {
                // Update data buku termasuk cover
                $query = "UPDATE books SET 
                            title = '$judul', 
                            isbn = '$isbn', 
                            author = '$penulis', 
                            category = '$kategori', 
                            synopsis = '$sinopsis', 
                            pages = '$page', 
                            location = '$location', 
                            status = '$status', 
                            cover = '$fileName' 
                          WHERE id = $id";
            } else {
                echo "Gagal mengupload cover buku.";
                exit;
            }
        } else {
            echo "Format file tidak valid.";
            exit;
        }
    } else {
        $query = "UPDATE books SET 
                    title = '$judul', 
                    isbn = '$isbn', 
                    author = '$penulis', 
                    category = '$kategori', 
                    synopsis = '$sinopsis', 
                    pages = '$page', 
                    location = '$location', 
                    status = '$status' 
                  WHERE id = $id";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: ../admin/inputDataBuku.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
