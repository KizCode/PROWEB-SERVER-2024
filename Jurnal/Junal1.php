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


<?php

$pilihan = 3   ;

// Tampilkan hasil
if($angka1 >= 0 && $angka2 >=0 && $angka1 < 10 && $angka2 <10) {
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
    echo "Angka tidak valid";
}

?>