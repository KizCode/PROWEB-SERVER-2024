<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        include 'code.php';
        function displayArray($array, $title) {
            echo "<h2>$title</h2>";
            echo "<ul>";
            foreach ($array as $item) {
                foreach ($item as $name => $price) {
                    echo "<li>$name: Rp " . number_format($price, 0, ',', '.') . "</li>";
                }
            }
            echo "</ul>";
        }
        
        displayArray($makanan, "Daftar Makanan");
        displayArray($minuman, "Daftar Minuman");
        ?>
    </div>
    <div>
    <form action="code.php" method="post">
        <h2>Pesan Makanan</h2>
        <table>
            <tr>
                <td>
                    <span>Nama Makanan</span>
                </td>
                <td>
                    <input type="text" name="makanan">
                </td>
            </tr>
            <tr>
                <td>
                    <span>Jumlah Makanan</span>
                </td>
                <td>
                    <input type="number" name="jumlah_makanan">
                </td>
            </tr>
            <tr>
                <td>
                    <span>Nama Minuman</span>
                </td>
                <td>
                    <input type="text" name="minuman">
                </td>
            </tr>
            <tr>
                <td>
                    <span>Jumlah Minuman</span>
                </td>
                <td>
                    <input type="number" name="jumlah_minuman">
                </td>
            </tr>
        </table>
        <input type="submit" value="Pesan">
    </form>
    </div>
</body>
</html>