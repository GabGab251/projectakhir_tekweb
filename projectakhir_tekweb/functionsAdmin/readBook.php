<?php
    require_once('../koneksi.php');

    // Query untuk mengambil semua data buku
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    // Cek apakah ada data
    if ($result->num_rows > 0) {
        // Loop untuk menampilkan setiap buku dalam tabel
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";

            // cek apakah cover ada
            if (!empty($row['cover'])) {
                $path = '../uploads/' . $row['cover'];
                if (file_exists($path)) {
                    echo "<td><img src='" . htmlspecialchars($path) . "' alt='Cover Buku' height='250'></td>";
                } else {
                    echo "<td>Path gambar tidak ditemukan: " . htmlspecialchars($path) . "</td>";
                }
            } else {
                echo "<td>Tidak ada gambar</td>";
            }

            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
            echo "<td>" . htmlspecialchars($row['author']) . "</td>";
            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
            echo "<td>" . htmlspecialchars($row['synopsis']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pages']) . "</td>";
            echo "<td>" . htmlspecialchars($row['location']) . "</td>";
            echo "<td>" . ($row['status'] == 1 ? 'Tersedia' : 'Sedang Dipinjam') . "</td>";
            echo "<td>
                    <div>
                    <a href='editBuku.php?id=" . $row['id'] ." ' class='btn btn-warning'>Edit</a>
                    <a href='../functionsAdmin/deleteBook.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus buku ini?\")'>Hapus</a>
                    <div>
                </td>";
            echo "</tr>";
        }
    } else {
        // Tampilkan pesan jika tidak ada data
        echo "<tr><td colspan='11'>Data tidak ditemukan</td></tr>";
    }

?>

