<?php
// array numerik
$mahasiswa = [
    [
        "Irfan",
        "2105040008",
        "Teknik Informatika",
        "irfan@unimma.ac.id"
    ],
    [
        "Ahmad",
        "2105040009",
        "Teknik Informatika",
        "ahmad@unimma.ac.id"
    ],
    [
        "Hidayat",
        "21050400010",
        "Teknik Informatika",
        "hidayat@unimma.ac.id"
    ],

];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <ul>
        <!-- <?php foreach ($mahasiswa as $mhs) : ?>
            <li><?= $mhs; ?></li>
            <?php endforeach; ?> -->

        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>NPM : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email : <?= $mhs[3]; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>