<?php
include 'koneksi.php';

// Insert data into mahasiswa
$sql = "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan) VALUES
    ('Ahmad', '210001', 'Teknik Informatika', 2022),
    ('Budi', '210002', 'Teknik Mesin', 2022)";
$conn->query($sql);

// Insert data into mata_kuliah
$sql = "INSERT INTO mata_kuliah (kode_mk, nama_mk, sks) VALUES
    ('MK001', 'Matematika', 3),
    ('MK002', 'Fisika', 4)";
$conn->query($sql);

// Insert data into krs
$sql = "INSERT INTO krs (mahasiswa_id, mata_kuliah_id, semester) VALUES
    (1, 1, 1),
    (1, 2, 1),
    (2, 1, 1)";
$conn->query($sql);


echo "Data inserted successfully";

$conn->close();
