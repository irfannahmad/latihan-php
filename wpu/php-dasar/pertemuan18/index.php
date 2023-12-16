<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
}

// koneksi database
require './functions.php';
// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM pemainemyu"));
$jumlahHalaman = floor($jumlahData / $jumlahDataPerHalaman); // floor() membulatkan ke bawah
if (isset($_GET["halaman"])) {
    $halamanAktif = $_GET["halaman"];
} else {
    $halamanAktif = 1;
}
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$pemain = query("SELECT * FROM pemainemyu LIMIT $awalData, $jumlahDataPerHalaman");

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

    <a href="./logout.php">Logout</a>
    <br><br>
    <a href="./tambah.php">Tambah Data Pemain</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="Cari..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>

    <!-- navigasi -->
    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>"><b><?= $i; ?></b></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>
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