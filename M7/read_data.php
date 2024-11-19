<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: form_login.php");
    exit(); // Tambahkan exit setelah header redirect
} else {
    echo "Selamat Datang " . $_SESSION['user'] . " ";
}

require_once("koneksi.php");

$sql = "SELECT * FROM mata_kuliah";
$result = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($result)) {
    echo $data['nama_mk'] . "<br>";
    echo $data['sks'] . "<br>";
    // echo $data['username'] . "<br>";
}

mysqli_close($conn);
