<?php

require_once("koneksi.php");

$sql = "SELECT * FROM matakuliah";
$result = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($result)) {
    echo $data['namamatakuliah'] . "<br>";
    echo $data['sks']."<br>";
    echo $data['dosen'];
    echo "<br>";
}

?>
