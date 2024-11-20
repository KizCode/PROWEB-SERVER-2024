<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="">
        <div>
            <form action="proses_input.php" method="post">
                <table>
                    <span>Nama : </span>
                    <tr>
                        <input type="text" name="nama">
                    </tr>
                    <span>Harga : </span>
                    <tr>
                        <input type="number" name="harga">
                    </tr>
                    <span>Stok : </span>
                    <tr>
                        <input type="number" name="stok">
                    </tr>
                </table>
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>
