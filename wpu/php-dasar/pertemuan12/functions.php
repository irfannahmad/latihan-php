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
    $nama = htmlspecialchars($data["nama"]);
    $nopung = htmlspecialchars($data["nopung"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $negara = htmlspecialchars($data["negara"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "INSERT INTO pemainemyu VALUES (
        '', '$nama', '$nopung', '$posisi', '$negara', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pemainemyu WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nopung = htmlspecialchars($data["nopung"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $negara = htmlspecialchars($data["negara"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query update data
    $query = "UPDATE pemainemyu SET
        nama = '$nama', 
        nopung = '$nopung', 
        posisi = '$posisi', 
        negara = '$negara', 
        gambar = '$gambar'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM pemainemyu WHERE 
    nama LIKE '%$keyword%' OR 
    nopung LIKE '%$keyword%' OR
    posisi LIKE '%$keyword%' OR
    negara LIKE '%$keyword%'
    ";

    return query($query);
}
