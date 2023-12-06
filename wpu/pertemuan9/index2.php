<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "emyu");

// ambil data / query data
$result = mysqli_query($conn, "SELECT * FROM pemainemyu");
// if (!$result) {
//     echo mysqli_error($conn);
// }

// ambil data dari object result (fetch)
// mysqli_fetch_row() // mengembalikan array numeric
// mysqli_fetch_assoc() // mengembalikan array asosiatif
// mysqli_fetch_array() // mengembalikan array numeric dan associative
// mysqli_fetch_object() 

// while ($mu = mysqli_fetch_assoc($result)) {
//     var_dump($mu);
// }



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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
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
        <?php endwhile; ?>
    </table>
</body>

</html>