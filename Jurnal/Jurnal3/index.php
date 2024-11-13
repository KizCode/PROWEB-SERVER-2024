<?php
session_start();

// Inisialisasi array barang jika belum ada di session
if (!isset($_SESSION['barang'])) {
    $_SESSION['barang'] = [
        ['id' => 1, 'nama' => 'Pulpen', 'kategori' => 'Alat Tulis', 'harga' => 2000],
        ['id' => 2, 'nama' => 'Buku Tulis', 'kategori' => 'Alat Tulis', 'harga' => 5000],
        ['id' => 3, 'nama' => 'Penggaris', 'kategori' => 'Alat Tulis', 'harga' => 1500],
    ];
}

// Fungsi untuk mencari barang berdasarkan ID
function cariBarangBerdasarkanId($id) {
    foreach ($_SESSION['barang'] as $key => $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null; // Jika tidak ditemukan
}

// Menangani penambahan, pengeditan, penghapusan, dan pemesanan barang
if (isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        // Tambah barang baru
        $newItem = [
            'id' => count($_SESSION['barang']) + 1,
            'nama' => $_POST['nama'],
            'kategori' => $_POST['kategori'],
            'harga' => $_POST['harga']
        ];
        $_SESSION['barang'][] = $newIt;
    } elseif ($_POST['action'] === 'edit') {
        // Edit barang yang ada
        foreach ($_SESSION['barang'] as &$item) {
            if ($item['id'] == $_POST['id']) {
                $item['nama'] = $_POST['nama'];
                $item['kategori'] = $_POST['kategori'];
                $item['harga'] = $_POST['harga'];
                break;
            }
        }
    } elseif ($_POST['action'] === 'delete') {
        // Hapus barang berdasarkan ID
        foreach ($_SESSION['barang'] as $key => $item) {
            if ($item['id'] == $_POST['id']) {
                unset($_SESSION['barang'][$key]);
                break;
            }
        }
        $_SESSION['barang'] = array_values($_SESSION['barang']); // Reindex array setelah penghapusan
    }
}

// Menangani proses pemesanan
$totalHarga = 0;
$listPesanan = [];

if (isset($_POST['pesan'])) {
    $idBarangPesan = explode(",", $_POST['id_barang']); // Pisahkan ID barang yang dipesan
    foreach ($idBarangPesan as $id) {
        $barang = cariBarangBerdasarkanId(trim($id)); // Cari barang berdasarkan ID
        if ($barang) {
            $listPesanan[] = $barang['nama'];
            $totalHarga += $barang['harga'];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Barang Toko dan Pemesanan</title>
</head>
<body>
    <h1> Project Barang  </h1>
    <h2>Daftar Barang</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['barang'] as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['nama'] ?></td>
            <td><?= $item['kategori'] ?></td>
            <td><?= $item['harga'] ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="hidden" name="action" value="editForm">
                    <button type="submit">Edit</button>
                </form>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Barang Baru</h2>
    <form method="post">
        <input type="hidden" name="action" value="add">
        <label>Nama Barang:</label>
        <input type="text" name="nama" required><br>
        <label>Kategori Barang:</label>
        <input type="text" name="kategori" required><br>
        <label>Harga Barang:</label>
        <input type="number" name="harga" required><br>
        <button type="submit">Tambah</button>
    </form>

    <?php if (isset($_POST['action']) && $_POST['action'] === 'editForm'):
        $editItem = cariBarangBerdasarkanId($_POST['id']); ?>
        <h2>Edit Barang</h2>
        <form method="post">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?= $editItem['id'] ?>">
            <label>Nama Barang:</label>
            <input type="text" name="nama" value="<?= $editItem['nama'] ?>" required><br>
            <label>Kategori Barang:</label>
            <input type="text" name="kategori" value="<?= $editItem['kategori'] ?>" required><br>
            <label>Harga Barang:</label>
            <input type="number" name="harga" value="<?= $editItem['harga'] ?>" required><br>
            <button type="submit">Simpan Perubahan</button>
        </form>
    <?php endif; ?>
</body>
</html>