<?php

// for ($i = 1;$i <= 100; $i++) {
//     if ($i % 2 == 0) {
//         echo $i . " adalah bilangan genap<br>";
//     } else {
//         echo $i . " adalah bilangan ganjil<br>";
//     }
// }

$data = ["Ardi", "Budi", "Coryl", "Dandy", "Eka", "Fadhil"];
$keyword = "eka";
$ketemu = false;

foreach ($data as $value) {
    if (strtolower($value) === strtolower($keyword)) {
        $ketemu = true;
        break;
    }
}

if ($ketemu) {
    echo "Ketemu <br>";
} else {
    echo "Tidak Ketemu <br>";
}
?>









