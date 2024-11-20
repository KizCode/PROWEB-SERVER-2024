<?php
include 'koneksi.php'; // Pastikan Anda menghubungkan ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menyiapkan query SQL untuk menghapus data
    $sql = "DELETE FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Mengikat parameter
    $stmt->bind_param("i", $id); // "i" menunjukkan bahwa parameter yang diikat adalah integer

    // Menjalankan query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke index.php dengan pesan sukses
        header("Location: index.php?message=Data berhasil dihapus");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();