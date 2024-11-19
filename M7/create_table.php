<?php
include 'koneksi.php';

$sql = "CREATE TABLE user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$sql2 = "CREATE TABLE IF NOT EXISTS mata_kuliah (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) UNIQUE,
    nama_mk VARCHAR(100),
    sks INT(3)
)";

$sql3 = "CREATE TABLE IF NOT EXISTS krs (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT(11) UNSIGNED,
    mata_kuliah_id INT(11) UNSIGNED,
    semester INT,
    FOREIGN KEY (mahasiswa_id) REFERENCES user(id),
    FOREIGN KEY (mata_kuliah_id) REFERENCES mata_kuliah(id)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table user created successfully<br>";
} else {
    echo "Error creating user table: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $sql2)) {
    echo "Table mata_kuliah created successfully<br>";
} else {
    echo "Error creating mata_kuliah table: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $sql3)) {
    echo "Table krs created successfully<br>";
} else {
    echo "Error creating krs table: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
