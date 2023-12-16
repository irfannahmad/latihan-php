<?php
// variabel scope / lingkup variabel
// $x = 10;

// function tampilX()
// {
//     global $x; // mencari variable diluar function
//     echo $x;
// }

// tampilX();
// echo "<br>";

// variable superglobals
// variabel global milik php
// merupakan array associative

// var_dump($_GET);
// echo "<br>";
// var_dump($_POST);
// echo "<br>";
// var_dump($_SERVER);
// echo "<br>";

// $_GET["nama"] = "Irfan";
// $_GET["nim"] = 2105040008;
// var_dump($_GET);

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
    <title>GET</title>
</head>

<body>
    <!-- GET -->
    <ul>
        <?php foreach ($emyu as $mu) : ?>
            <li>
                <a href="./latihan2.php?nama=<?= $mu["nama"]; ?>&nopung=<?= $mu["nopung"]; ?>&gambar=<?= $mu["gambar"]; ?>">
                    <?= $mu["nama"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>