<?php
require '../functions.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM pemainemyu WHERE 
nama LIKE '%$keyword%' OR 
nopung LIKE '%$keyword%' OR
posisi LIKE '%$keyword%' OR
negara LIKE '%$keyword%'
";
$pemain = query($query);
?>

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