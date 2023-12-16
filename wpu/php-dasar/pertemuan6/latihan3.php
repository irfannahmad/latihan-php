<?php
$emyu = [
    [
        "nama" => "lindelof",
        "nopung" => 2,
        "posisi" => "bek",
        "negara" => "swedia",
        "gambar" => "lindelof.jpg"
    ],
    [
        "nama" => "amrabat",
        "nopung" => 4,
        "posisi" => "gelandang",
        "negara" => "maroko",
        "gambar" => "amrabat.jpg"
    ],
    [
        "nama" => "maguire",
        "nopung" => 5,
        "posisi" => "bek",
        "negara" => "inggris",
        "gambar" => "maguire.jpg"
    ],
    [
        "nama" => "martinez",
        "nopung" => 6,
        "posisi" => "bek",
        "negara" => "argentina",
        "gambar" => "martinez.jpg"
    ],
    [
        "nama" => "mount",
        "nopung" => 7,
        "posisi" => "gelandang",
        "negara" => "inggris",
        "gambar" => "mount.jpg"
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemain Emyu</title>
</head>

<body>
    <?php foreach ($emyu as $mu) : ?>
        <ul>
            <li>Foto :
                <img src="../img/<?= $mu["gambar"]; ?>" alt="">
            </li>
            <li>Nama : <?= $mu["nama"]; ?></li>
            <li>Nomor Punggung : <?= $mu["nopung"]; ?></li>
            <li>Posisi : <?= $mu["posisi"]; ?></li>
            <li>Negara Asal : <?= $mu["negara"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>