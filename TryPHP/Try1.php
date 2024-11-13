<?php

// Tampilkan menu
echo "Pilih operasi:<br>";
echo "1. Hitung rata-rata<br>";
echo "2. Hitung penjumlahan<br>";
echo "3. Hitung keduanya<br>";

$angka1 = 10;
$angka2 = 20;

$jumlah = $angka1 + $angka2;
$rataRata = $jumlah/2;

?>

<form method="post" action="">
    <label for="angka1">Angka 1:</label>
    <input type="number" id="angka1" name="angka1" required><br><br>
    
    <label for="angka2">Angka 2:</label>
    <input type="number" id="angka2" name="angka2" required><br><br>
    
    <label for="pilihan">Pilih operasi:</label>
    <select id="pilihan" name="pilihan">
        <option value="1">1. Hitung rata-rata</option>
        <option value="2">2. Hitung penjumlahan</option>
        <option value="3">3. Hitung keduanya</option>
    </select><br><br>
    
    <input type="submit" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = isset($_POST['angka1']) ? floatval($_POST['angka1']) : 0;
    $angka2 = isset($_POST['angka2']) ? floatval($_POST['angka2']) : 0;
    $pilihan = isset($_POST['pilihan']) ? $_POST['pilihan'] : '';

    $jumlah = $angka1 + $angka2;
    $rataRata = $jumlah / 2;
}
?>


<?php

// Tampilkan hasil
if($angka1 >= 0 && $angka2 >=0) {
    if($pilihan == 1){
        echo "Rata-rata: " . $rataRata."<br>";
    }elseif ($pilihan == 2) {
        echo "Penjumlahan: " . $jumlah. "<br>";
    }elseif ($pilihan == 3){
        echo "Rata-rata: " . $rataRata . "<br>";
        echo "Penjumlahan: " . $jumlah . "<br>";
    }else{
        echo "Keluar";
    }      
}else{
    echo "Anka tidak valid";
}

// Daftar harga buah
$daftarHarga = [
    'apel' => 10000,
    'pisang' => 5000,
    'mangga' => 15000
];

// Fungsi untuk mengecek ketersediaan buah
function cekKetersediaan($namaBuah) {
    global $daftarHarga;
    return array_key_exists(strtolower($namaBuah), $daftarHarga);
}

// Fungsi untuk menghitung total harga
function hitungTotalHarga($namaBuah, $jumlah) {
    global $daftarHarga;
    $namaBuah = strtolower($namaBuah);
    if (cekKetersediaan($namaBuah)) {
        return $daftarHarga[$namaBuah] * $jumlah;
    }
    return false;
}

// Form untuk input buah
echo "<h2>Pembelian Buah</h2>";
echo "<form method='post' action=''>";
echo "<label for='namaBuah'>Nama Buah:</label>";
echo "<input type='text' id='namaBuah' name='namaBuah' required><br><br>";
echo "<label for='jumlahBuah'>Jumlah:</label>";
echo "<input type='number' id='jumlahBuah' name='jumlahBuah' min='1' required><br><br>";
echo "<input type='submit' value='Hitung Total'>";
echo "</form>";

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['namaBuah']) && isset($_POST['jumlahBuah'])) {
    $namaBuah = $_POST['namaBuah'];
    $jumlahBuah = intval($_POST['jumlahBuah']);

    if (cekKetersediaan($namaBuah)) {
        $totalHarga = hitungTotalHarga($namaBuah, $jumlahBuah);
        echo "<p>Total harga untuk $jumlahBuah $namaBuah adalah: Rp " . number_format($totalHarga, 0, ',', '.') . "</p>";
    } else {
        echo "<p>Maaf, $namaBuah tidak tersedia.</p>";
    }
}

?>