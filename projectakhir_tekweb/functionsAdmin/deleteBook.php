<?php
require_once('../koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM books WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, redirect kembali ke halaman daftar buku
        header("Location: ../admin/inputDataBuku.php");
        exit();
    } else {
        // Jika gagal, tampilkan error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID buku tidak ditemukan.";
}
?>
