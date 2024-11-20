<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: form_login.php");
    exit(); // Tambahkan exit setelah header redirect
} else {
    echo "Selamat Datang " . $_SESSION['user'] . " ";
}

require_once("koneksi.php");

$sql = "SELECT * FROM produk";
$result = mysqli_query($conn, $sql);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div>
    <?php
    if( $_SESSION['user'] == 'admin'){
    ?>
    <a href="create.php"> Tambah Data </a>
    <?php
    }
    ?>
        <table border=1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</td>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        if( $_SESSION['role'] == 'admin' || 'user'){

        
        ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td><?php echo $row["nama_produk"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td><?php echo $row["harga"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td><?php echo $row["stok"]; ?></td> <!-- Perbaiki: tambahkan echo -->
                        <td>
                            <!-- Tambahkan aksi di sini, misalnya edit atau delete -->
                            <a type="submit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <?php 
                            if ( $_SESSION['role'] == 'admin') {
                            ?>
                            <a type="submit" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>

                    
            <?php
        }
}
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>"; // Perbaiki: tampilkan hasil jika tidak ada data
}

mysqli_close($conn);
