<?php
include 'koneksi.php';
require_once 'create_table.php';


$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch data from mahasiswa and mata_kuliah based on search
$sql = "SELECT mahasiswa.nama, mahasiswa.nim, mahasiswa.jurusan, mahasiswa.angkatan,
        GROUP_CONCAT(mata_kuliah.nama_mk SEPARATOR ', ') AS mata_kuliah
        FROM mahasiswa
        LEFT JOIN krs ON mahasiswa.id = krs.mahasiswa_id
        LEFT JOIN mata_kuliah ON krs.mata_kuliah_id = mata_kuliah.id
        -- WHERE mahasiswa.nama LIKE '%$search%' OR mahasiswa.nim LIKE '%$search%'
        GROUP BY mahasiswa.id";

$result = $conn->query($sql);

// if ($result) {
//     // Fetch all results as an associative array
//     $data = $result->fetch_all(MYSQLI_ASSOC);

//     // Print the array
//     print_r($data);
// } else {
//     echo "Query Error: " . $conn->error;
// }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa dan Mata Kuliah</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari nama atau NIM" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Cari</button>
    </form>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Mata Kuliah</th>
        </tr>
        <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['jurusan']}</td>
                        <td>{$row['angkatan']}</td>
                        <td>" . ($row['mata_kuliah'] ?: '-') . "</td>
                      </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
}
?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
