<?php
// koneksi db
require_once("koneksi.php");

// tangkap input
$nama_mata_kuliah = $_POST['nama_mata_kuliah'];
$kode_mata_kuliah = $_POST['kode_mata_kuliah'];
$sks = $_POST['sks'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['slide']['name']);
$path = "";

if(move_uploaded_file($_FILES['slide']['tmp_name'], $target_file)){
    $path = $target_file;
}

// query insert
$sql = "INSERT INTO matakuliah(namamatakuliah, kodematakuliah, sks, slide_kuliah)
        VALUES('$nama_mata_kuliah', '$kode_mata_kuliah', '$sks', '$path')";

// jalankan query
if(mysqli_query($conn, $sql)){
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>