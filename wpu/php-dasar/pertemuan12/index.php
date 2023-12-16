<?php
// koneksi database
require './functions.php';
$pemain = query("SELECT * FROM pemainemyu ORDER BY id DESC"); // menampilkan data terbaru

// tombol cari diklik
if (isset($_POST["cari"])) {
    $pemain = cari($_POST["keyword"]);
}

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

    <a href="./tambah.php">Tambah Data Pemain</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="Cari..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>

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
                <td><img src="../img/<?= $row["gambar"]; ?>"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nopung"]; ?></td>
                <td><?= $row["posisi"]; ?></td>
                <td><?= $row["negara"]; ?></td>
                <td><a href="./ubah.php?id=<?= $row["id"]; ?>">Edit</a></td>
                <td><a href="./hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin akan menghapus?')">Hapus</a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>