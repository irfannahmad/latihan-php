<?php
// koneksi database
require './functions.php';
$pemain = query("SELECT * FROM pemainemyu");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Pemain Emyu</h1>

    <table border="1" cellpadding="20" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Nopung</th>
            <th>Posisi</th>
            <th>Negara</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($pemain as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="../img/<?= $row["gambar"]; ?>" alt="Lindelof"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nopung"]; ?></td>
                <td><?= $row["posisi"]; ?></td>
                <td><?= $row["negara"]; ?></td>
                <td><a href="#">Edit</a></td>
                <td><a href="#">Hapus</a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>