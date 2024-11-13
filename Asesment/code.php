<?php
$makanan_list = [
    "pecel" => 10000,
    "nasi kuning" => 12000,
    "nasi goreng" => 15000,
    "spaghetti" => 20000
];

$minuman_list = [
    "air mineral" => 3000,
    "cendol" => 5000,
    "es kopi" => 7000,
    "ss teh" => 2500
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $makanan = strtolower($_POST['makanan']);
    $jumlah_makanan = $_POST['jumlah_makanan'];
    $minuman = strtolower($_POST['minuman']);
    $jumlah_minuman = $_POST['jumlah_minuman'];
    
    if (array_key_exists($makanan, $makanan_list) && array_key_exists($minuman, $minuman_list)) {
        // Hitung total harga
        $total_makanan = $makanan_list[$makanan] * $jumlah_makanan;
        $total_minuman = $minuman_list[$minuman] * $jumlah_minuman;
        $total_harga = $total_makanan + $total_minuman;
        echo "Makanan: " . $makanan . " Rp " . number_format($total_makanan, 0, ',', '.');
        echo "<br>Minuman: " . $minuman . " Rp " . number_format($total_minuman, 0, ',', '.');
        echo "<br>Total harga: Rp " . $total_harga;
    } else {
        echo "Makanan atau minuman tidak tersedia.";
    }
}
?>
