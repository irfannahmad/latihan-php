<?php
// koneksi ke DBMS
require './functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$pemain = query("SELECT * FROM pemainemyu WHERE id = $id")[0];

// apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pemain</title>
</head>

<body>
    <h1>Ubah Data Pemain</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pemain["id"]; ?>">
        <ul>
            <li>
                <label for=" nama">Masukkan Nama Pemain : </label>
                <input type="text" name="nama" id="nama" value="<?= $pemain["nama"]; ?>">
            </li>
            <li>
                <label for="nopung">Masukkan Nopung Pemain : </label>
                <input type="text" name="nopung" id="nopung" value="<?= $pemain["nopung"]; ?>">
            </li>
            <li>
                <label for="posisi">Masukkan Posisi Pemain : </label>
                <input type="text" name="posisi" id="posisi" value="<?= $pemain["posisi"]; ?>">
            </li>
            <li>
                <label for="negara">Masukkan Negara Pemain : </label>
                <input type="text" name="negara" id="negara" value="<?= $pemain["negara"]; ?>">
            </li>
            <li>
                <label for="gambar">Masukkan Gambar Pemain : </label>
                <input type="text" name="gambar" id="gambar" value="<?= $pemain["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>