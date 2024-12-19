<?php
// Koneksi database
include('koneksi.php');

// Cek jika ID buku dikirimkan untuk dihapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus buku
    $sql = "DELETE FROM books WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Buku berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>