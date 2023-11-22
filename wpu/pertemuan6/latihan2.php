<!-- array associative -->
<!-- key-nya adalah string yang dibuat sendiri -->

<?php
$mahasiswa = [
    [
        "nama" => "Irfan",
        "nim" => 2105040008,
        "jurusan" => "Teknik Informatika",
        "email" => "irfan@unimma.ac.id",
        "gambar" => "hojlund.jpg"
    ],
    [
        "nama" => "Ahmad",
        "nim" => 2105040009,
        "jurusan" => "Teknik Informatika",
        "email" => "Ahmad@unimma.ac.id",
        "gambar" => "rashford.jpg"
        // "tugas" => [90, 80, 100]
    ]
];

// echo $mahasiswa["jurusan"];
// echo $mahasiswa[1]["email"];
// echo $mahasiswa[1]["tugas"][1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="../img/<?= $mhs["gambar"]; ?>">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NIM : <?= $mhs["nim"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>