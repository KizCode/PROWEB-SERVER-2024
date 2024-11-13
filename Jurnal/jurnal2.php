
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Buku</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
        table {
            width: 50%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
// Array Asosiatif Buku
$buku = [
    ["judul" => "Berserk", "penulis" => "Miura Kentaro"],
    ["judul" => "Oswald", "penulis" => "Walt Disney"]
];

// Fungsi untuk menampilkan data buku
function tampilData($buku) {
    echo "<h3>Menampilkan Data Awal:</h3>";
    echo "<table><tr><th>Judul</th><th>Penulis</th></tr>";
    foreach ($buku as $data) {
        echo "<tr><td>{$data['judul']}</td><td>{$data['penulis']}</td></tr>";
    }
    echo "</table>";
}

// Fungsi untuk menambah data buku baru
function tambahBuku(&$buku, $judul, $penulis) {
    array_push($buku, ["judul" => $judul, "penulis" => $penulis]);
}

// Fungsi untuk mengedit data buku
function editBuku(&$buku, $index, $judul, $penulis) {
    if (isset($buku[$index])) {
        $buku[$index] = ["judul" => $judul, "penulis" => $penulis];
    }
}

// Fungsi untuk menghapus buku berdasarkan index
function hapusBuku(&$buku, $index) {
    if (isset($buku[$index])) {
        array_splice($buku, $index, 1);
    }
}

// Fungsi untuk mencari buku berdasarkan kata kunci
function cariBuku($buku, $keyword) {
    echo "<h3>Mencari Buku dengan kata kunci '{$keyword}':</h3>";
    echo "<table><tr><th>Judul</th><th>Penulis</th></tr>";
    foreach ($buku as $data) {
        if (stripos($data['judul'], $keyword) !== false || stripos($data['penulis'], $keyword) !== false) {
            echo "<tr><td>{$data['judul']}</td><td>{$data['penulis']}</td></tr>";
        }
    }
    echo "</table>";
}

// Menampilkan data awal
tampilData($buku);

// Menambah buku baru
tambahBuku($buku, "One Piece", "Eiichiro Oda");
echo "<h3>Menambah Buku Baru:</h3>";
tampilData($buku);

// Memperbarui buku dengan ID ke-2 (index 1)
editBuku($buku, 1, "Naruto", "Masashi Kishimoto");
echo "<h3>Memperbarui Buku dengan ID ke-2:</h3>";
tampilData($buku);

// Menghapus buku dengan ID ke-1 (index 0)
hapusBuku($buku, 1);
echo "<h3>Menghapus Buku dengan ID ke-1:</h3>";
tampilData($buku);

// Mencari buku dengan kata kunci "Naruto"
cariBuku($buku, "Naruto");
?>

</body>
</html>