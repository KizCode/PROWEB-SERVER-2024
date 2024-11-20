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
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyiapkan query SQL untuk memperbarui data
    $sql = "UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $nama_produk, $harga, $stok, $id);

    // Menjalankan query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke index.php dengan pesan sukses
        header("Location: read_data.php?message=Data berhasil diperbarui");
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
        <table>
            <tr>
                <td><label for="nama">Nama Produk:</label></td>
                <td><input type="text" name="nama_produk" id="nama" value="<?php echo htmlspecialchars($row['nama_produk']); ?>" required><br></td>
            </tr>
            <tr>
                <td><label for="harga">Harga:</label></td>
                <td><input type="number" name="harga" id="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" required><br></td> 
            </tr>
            <tr>
                <td><label for="stok">Stok:</label></td>
                <td><input type="number" name="stok" id="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required><br></td>
            </tr>
        </table>
        <input type="submit" value="Update">
    </form>
    <a href="read_data.php">Kembali ke Daftar Produk</a>
</body>
</html>