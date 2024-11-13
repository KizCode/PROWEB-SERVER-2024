<?php

require_once("koneksi.php");

$nama_mata_kuliah = $_POST["nama_mata_kuliah"];
$dosen = $_POST["dosen"];
$sks = $_POST["sks"];

$sql =  "INSERT INTO mata_kuliah (nama_mata_kuliah, dosen, sks)
        VALUES  ('$nama_mata_kuliah', '$dosen', '$sks')";

if(mysqli_query($conn, $sql)){
    header("location: read_data.php");
}

