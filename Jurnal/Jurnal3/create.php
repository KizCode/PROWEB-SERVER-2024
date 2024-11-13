<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = strtolower($_POST['nama']);
    $kategori = strtolower($_POST['kategori']);
    $minuman = strtolower($_POST['harga']);
}

$data = array(
    'nama' => $nama,
    'kategori' => $kategori,
    'harga' => $minuman
);










?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Kategori Barang</th>
        <th scope="col">Harga Barang</th>  
        <th scope="col">Aksi</th>
    </tr>
    <tr>
        <td><?php echo $id=1; $id++; ?></td>  
        <?php foreach ($data as $key => $value): ?>
            <td><?php echo $value; ?></td>
        <?php endforeach; ?>
        <td>
            <a href="#">Edit</a>
            <a href="#">Hapus</a>
        </td>
    </tr>
</table>


</body>
</html>

