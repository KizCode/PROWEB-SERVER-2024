<?php
// 1. Tulis koneksi Mysql
$host = "localhost";
$user = "root";
$pass = "";

$db = "webpro2024";
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} 
    echo "Koneksi berhasil";
?>