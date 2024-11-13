<?php
include 'koneksi.php';

// SQL query to create the mahasiswa table
$sql1 = "CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    nim VARCHAR(20) UNIQUE,
    jurusan VARCHAR(50),
    angkatan INT(4)
)";

// SQL query to create the mata_kuliah table
$sql2 = "CREATE TABLE IF NOT EXISTS mata_kuliah (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) UNIQUE,
    nama_mk VARCHAR(100),
    sks INT(3)
)";

// SQL query to create the krs table
$sql3 = "CREATE TABLE IF NOT EXISTS krs (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT(11) UNSIGNED,
    mata_kuliah_id INT(11) UNSIGNED,
    semester INT,
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(id),
    FOREIGN KEY (mata_kuliah_id) REFERENCES mata_kuliah(id)
)";

// Execute each query and check for success or failure
if (mysqli_query($conn, $sql1)) {
    echo "Table mahasiswa created successfully<br>";
} else {
    echo "Error creating mahasiswa table: " . mysqli_error($conn) . "<br>";
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
