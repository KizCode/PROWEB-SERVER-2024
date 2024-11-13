<?php
include 'koneksi.php'; // Pastikan Anda menghubungkan ke database

// Memeriksa apakah ID ada dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data produk berdasarkan ID
    $sql = "SELECT * FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah data ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak valid.";
    exit();
}

// Memproses formulir saat dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyiapkan query SQL untuk memperbarui data
    $sql = "UPDATE produk SET nama = ?, harga = ?, stok = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $nama, $harga, $stok, $id);

    // Menjalankan query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke index.php dengan pesan sukses
        header("Location: index.php?message=Data berhasil diperbarui");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="POST" action="">
        <label for="nama">Nama Produk:</label>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" required><br>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required><br>

        <input type="submit" value="Update">
    </form>
    <a href="index.php">Kembali ke Daftar Produk</a>
</body>
</html>