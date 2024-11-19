<?php

session_start();
if(isset($_SESSION['user'])){
    echo "Halaman tidak bisa diakses";
    header("Location: form_login.php");
} else {
    echo "Selamat Datang" .$_SESSION['user']." ";
    echo 
}

require_once("koneksi.php");

$sql = "SELECT * FROM matakuliah";
$result = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($result)) {
    echo $data['namamatakuliah'] . "<br>";
    echo $data['sks']."<br>";
    echo $data['dosen'];
    echo "<br>";
}

?>
