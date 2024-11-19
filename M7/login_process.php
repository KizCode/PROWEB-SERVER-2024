<?php
require_once "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT *
        FROM user
        WHERE username = '$username'
        AND password = '$password'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    session_start();
    $data = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $data['username'];
    $_SESSION['akses'] = $data['akses'];
    header("Location: read_data.php");
} else {
    echo "Username atau Password salah";
}
