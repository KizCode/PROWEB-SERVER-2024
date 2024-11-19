<?php
require_once "koneksi.php";

$nama = $_POST['username']; // Ganti 'username' dengan 'nama'
$password = $_POST['password'];

// Menggunakan prepared statement untuk keamanan
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $nama, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    session_start();
    $data = $result->fetch_assoc();
    $_SESSION['user'] = $data['username']; // Ganti 'username' dengan 'nama'
    header("Location: read_data.php");
} else {
    echo "Username atau Password salah";
}

$stmt->close();
$conn->close();
