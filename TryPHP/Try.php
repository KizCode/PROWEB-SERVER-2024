<?php

// $a = 10;
// $b = 20;

// $c = $a + $b;

// echo $c;  

// if ($a > $b) {
//     echo "a is greater than b";
// } else {
//     echo "b is greater than a";
// }

// $nilai = 80;


// // Fungsi untuk menentukan indeks nilai
// function hitungIndeks($nilai) {
//     if ($nilai >= 85) {
//         return 'A';
//     } elseif ($nilai >= 75) {
//         return 'B';
//     } elseif ($nilai >= 65) {
//         return 'C';
//     } elseif ($nilai >= 55) {
//         return 'D';
//     } else {
//         return 'E';
//     }
// }

// // Contoh penggunaan
// $nilaiSiswa = 80;
// $indeks = hitungIndeks($nilaiSiswa);

// echo "Nilai: $nilaiSiswa, Indeks: $indeks";

$nilai = 1;

// while ($nilai <= 10) {
//     echo $nilai . "<br>";
//     $nilai++;
// }


// for ($i = 1; $i <= 5; $i++) {
//     for ($j = 1; $j <= $i; $j++) {
//         echo "* ";
//     }
//     for ($k = 5; $k >= $i; $k--) {
//         echo "* ";
//     }
//     echo "<br>";
// }

// Membuat segitiga sama sisi
// $tinggi = 5; // Tinggi segitiga

// for ($i = 1; $i <= $tinggi; $i++) {
//     // Mencetak spasi
//     for ($j = 1; $j <= $tinggi - $i; $j++) {
//         echo "&nbsp;&nbsp;";
//     }
    
//     // Mencetak bintang
//     for ($k = 1; $k <= 2 * $i - 1; $k++) {
//         echo "*";
//     }
    
//     echo "<br>";
// }


// // Membuat segitiga angka 1 sampai 10
// $tinggi = 5; // Tinggi segitiga
// $angka = 1;

// for ($i = 1; $i <= $tinggi; $i++) {
//     // Mencetak spasi
//     for ($j = 1; $j <= $tinggi - $i; $j++) {
//         echo "&nbsp;&nbsp;";
//     }
    
//     // Mencetak angka
//     for ($k = 1; $k <= 2 * $i - 1; $k++) {
//         echo $angka;
//         $angka++;
//         if ($angka > 10) {
//             $angka = 1; // Reset angka ke 1 jika sudah mencapai 10
//         }
//     }
    
//     echo "<br>";    

// }


// // Membuat pola segitiga piramida
// $tinggi = 5; // Tinggi piramida

// for ($i = 1; $i <= $tinggi; $i++) {
//     // Mencetak spasi
//     for ($j = 1; $j <= $tinggi - $i; $j++) {
//         echo "&nbsp;&nbsp;";
//     }
    
//     // Mencetak bintang
//     for ($k = 1; $k <= 2 * $i - 1; $k++) {
//         echo "*";
//     }
    
//     echo "<br>";
// }


// $nama;

// $data = [
//     "nama" => "John Doe",
//     "umur" => 20,
//     "alamat" => "Jl. Imam Bonjol"
// ];

// Inisialisasi array untuk menyimpan angka-angka
$numbers = [];

// Meminta input angka dari user
while (true) {
    $input = readline("Masukkan angka (angka negatif untuk berhenti): ");

    // Konversi input ke float
    $number = floatval($input);

    // Cek apakah angka negatif
    if ($number < 0) {
        break;
    }

    // Tambahkan angka ke array
    $numbers[] = $number;
}

// Fungsi untuk menghitung rata-rata
function hitungRataRata($arr)
{
    if (count($arr) == 0) {
        return 0;
    }

    return array_sum($arr) / count($arr);
}

// Fungsi untuk menghitung penjumlahan
function hitungPenjumlahan($arr)
{
    return array_sum($arr);
}

// Fungsi untuk menampilkan hasil
function tampilkanHasil($pilihan, $numbers)
{
    switch ($pilihan) {
        case '1':
            $rataRata = hitungRataRata($numbers);
            echo "Rata-rata: " . number_format($rataRata, 2) . "\n";
            break;
        case '2':
            $jumlah = hitungPenjumlahan($numbers);
            echo "Penjumlahan: " . $jumlah . "\n";
            break;
        case '3':
            $rataRata = hitungRataRata($numbers);
            $jumlah = hitungPenjumlahan($numbers);
            echo "Rata-rata: " . number_format($rataRata, 2) . "\n";
            echo "Penjumlahan: " . $jumlah . "\n";
            break;
        default:
            echo "Pilihan tidak valid.\n";
            break;
    }
}



// Inisialisasi variabel
$numbers = [];

// Input angka
while (true) {
    $input = readline("Masukkan angka (angka negatif untuk berhenti): ");
    $number = floatval($input);

    if ($number < 0) {
        break;
    }

    $numbers[] = $number;
}

// Hitung rata-rata
$rataRata = (count($numbers) > 0) ? array_sum($numbers) / count($numbers) : 0;

// Hitung penjumlahan
$jumlah = array_sum($numbers);

// Tampilkan menu
echo "Pilih operasi:\n";
echo "1. Hitung rata-rata\n";
echo "2. Hitung penjumlahan\n";
echo "3. Hitung keduanya\n";

$pilihan = readline("Masukkan pilihan (1/2/3): ");

// Tampilkan hasil
switch ($pilihan) {
    case '1':
        echo "Rata-rata: " . number_format($rataRata, 2) . "\n";
        break;
    case '2':
        echo "Penjumlahan: " . $jumlah . "\n";
        break;
    case '3':
        echo "Rata-rata: " . number_format($rataRata, 2) . "\n";
        echo "Penjumlahan: " . $jumlah . "\n";
        break;
    default:
        echo "Pilihan tidak valid.\n";
        break;
}



// Daftar buah dan harganya
$daftarBuah = [
    'apel' => 5000,
    'jeruk' => 3000,
    'mangga' => 7000,
    'pisang' => 2000,
    'anggur' => 8000
];

// Fungsi untuk mengecek ketersediaan buah
function cekKetersediaanBuah($nama, $daftar) {
    return isset($daftar[strtolower($nama)]);
}

// Minta input nama buah
$namaBuah = strtolower(readline("Masukkan nama buah: "));

if (cekKetersediaanBuah($namaBuah, $daftarBuah)) {
    // Jika buah tersedia, minta input jumlah
    $jumlahBuah = intval(readline("Masukkan jumlah buah: "));
    
    // Hitung total harga
    $hargaSatuan = $daftarBuah[$namaBuah];
    $totalHarga = $hargaSatuan * $jumlahBuah;
    
    // Tampilkan hasil
    echo "Buah: " . ucfirst($namaBuah) . "\n";
    echo "Harga satuan: Rp " . number_format($hargaSatuan, 0, ',', '.') . "\n";
    echo "Jumlah: " . $jumlahBuah . "\n";
    echo "Total harga: Rp " . number_format($totalHarga, 0, ',', '.') . "\n";
} else {
    // Jika buah tidak tersedia
    echo "Maaf, buah " . ucfirst($namaBuah) . " tidak tersedia.\n";
}



?>