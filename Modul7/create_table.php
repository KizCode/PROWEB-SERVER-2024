<?php
include 'koneksi.php';

$sql = "CREATE TABLE produk (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    harga INT(11) NOT NULL,
    stok INT(11) NOT NULL
)"; // Pastikan tidak ada koma setelah kolom terakhir

if (mysqli_query($conn, $sql)) {
    echo "Table produk created successfully<br>";
} else {
    echo "Error creating produk table: " . mysqli_error($conn) . "<br>";
}

// Menutup koneksi
mysqli_close($conn);
?>