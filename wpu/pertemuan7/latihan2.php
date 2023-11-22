<?php
// cek apakah tidak ada data di $_GET
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["nopung"])
) {
    // redirect
    header("Location: ./latihan1.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemain Emyu</title>
</head>

<body>
    <ul>
        <li><img src="../img/<?= $_GET["gambar"]; ?>"></li>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["nopung"]; ?></li>
    </ul>

    <a href="./latihan1.php">Kembali</a>
</body>

</html>