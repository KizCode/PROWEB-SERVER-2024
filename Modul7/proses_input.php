<?php
include 'koneksi.php'; // Pastikan Anda menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyiapkan query SQL untuk memasukkan data
    $sql = "INSERT INTO produk (nama, harga, stok) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Mengikat parameter
    mysqli_stmt_bind_param($stmt, "sii", $nama, $harga, $stok);

    // Menjalankan query
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?message=Data berhasil disimpan");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Menutup statement dan koneksi
    mysqli_stmt_close($stmt);
}

// Menutup koneksi
mysqli_close($conn);
