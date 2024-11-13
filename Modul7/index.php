<?php
include 'koneksi.php'; // Perbaiki: tambahkan titik koma di sini
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);
?>
    <a href="create.php"> Tambah Data </a>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <td>ID Produk</td>
                    <td>Nama Produk</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
            <?php
if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td><?php echo $row["nama"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td><?php echo $row["harga"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td><?php echo $row["stok"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td>
                            <!-- Tambahkan aksi di sini, misalnya edit atau delete -->
                            <a type="submit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a type="submit" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
            <?php
}
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>"; // Perbaiki: tampilkan hasil jika tidak ada data
}
?>
            </tbody>
        </table>
    </div>
</body>
</html>