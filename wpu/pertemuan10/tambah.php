<?php
// koneksi ke DBMS
require './functions.php';

// apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // ambil data dari tiap elemen dalam form
    $nama = $_POST["nama"];
    $nopung = $_POST["nopung"];
    $posisi = $_POST["posisi"];
    $negara = $_POST["negara"];
    $gambar = $_POST["gambar"];

    // query insert data
    $query = "INSERT INTO pemainemyu VALUES ('','$nama', '$nopung', '$posisi', '$negara', '$gambar')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil ditambahkan atau tidak


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pemain</title>
</head>

<body>
    <h1>Tambah Data Pemain</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Masukkan Nama Pemain : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="nopung">Masukkan Nopung Pemain : </label>
                <input type="text" name="nopung" id="nopung">
            </li>
            <li>
                <label for="posisi">Masukkan Posisi Pemain : </label>
                <input type="text" name="posisi" id="posisi">
            </li>
            <li>
                <label for="negara">Masukkan Negara Pemain : </label>
                <input type="text" name="negara" id="negara">
            </li>
            <li>
                <label for="gambar">Masukkan Gambar Pemain : </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>