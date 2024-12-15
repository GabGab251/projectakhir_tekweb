<?php

require_once('../koneksi.php');

// Cek apakah form telah disubmit
if (isset($_POST['add_book'])) {
    // Mengambil data dari form
    $judul = $_POST['judul'];
    $isbn = $_POST['isbn'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $sinopsis = $_POST['sinopsis'];
    $page = $_POST['page'];
    $location = $_POST['location'];
    $status = $_POST['status'];

    // Cek apakah file gambar ada
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        // Tentukan folder tujuan untuk menyimpan gambar
        $targetDir = "../uploads/";
        $fileName = basename($_FILES['cover']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Cek apakah file adalah gambar
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array(strtolower($fileType), ['jpg', 'png', 'jpeg'])) {
            // Pindahkan file ke folder tujuan
            if (move_uploaded_file($_FILES['cover']['tmp_name'], $targetFilePath)) {
                // Jika berhasil di-upload, simpan nama gambar ke database
                $query = "INSERT INTO books (title, isbn, author, category, synopsis, pages, location, status, cover) 
                          VALUES ('$judul', '$isbn', '$penulis', '$kategori', '$sinopsis', '$page', '$location', '$status', '$fileName')";
                
                // Eksekusi query dan cek hasilnya
                if (mysqli_query($conn, $query)) {
                    // Jika berhasil, redirect ke halaman inputDataBuku.php
                    header("Location: ../admin/inputDataBuku.php");
                    exit();
                } else {
                    // Jika query gagal
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Gambar gagal di-upload.";
            }
        } else {
            echo "Hanya file gambar (JPG, PNG, JPEG) yang diperbolehkan.";
        }
    } else {
        echo "Silakan pilih gambar untuk di-upload.";
    }
}
?>
