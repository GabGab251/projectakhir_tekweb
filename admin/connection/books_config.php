<?php
// config.php
$host = "localhost";
$books = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "projek_tekweb"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $books, $password, $database);

// Cek koneksi
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
?>