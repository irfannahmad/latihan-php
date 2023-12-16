<?php
$conn = mysqli_connect("localhost", "root", "", "emyu");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($_POST["nama"]);
    $nopung = htmlspecialchars($_POST["nopung"]);
    $posisi = htmlspecialchars($_POST["posisi"]);
    $negara = htmlspecialchars($_POST["negara"]);
    $gambar = htmlspecialchars($_POST["gambar"]);

    // query insert data
    $query = "INSERT INTO pemainemyu VALUES ('','$nama', '$nopung', '$posisi', '$negara', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pemainemyu WHERE id = $id");

    return mysqli_affected_rows($conn);
}
