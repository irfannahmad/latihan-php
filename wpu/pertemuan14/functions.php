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

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO pemainemyu VALUES (
        '', '$nama', '$nopung', '$posisi', '$negara', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang dipuload
    if ($error === 4) {
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    // cek yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Yang anda upload bukan gambar');
        </script>";
    }

    // cek jika ukurannya terlalu besar 
    if ($ukuranFile > 1000000) {
        echo "
        <script>
            alert('Ukuran gambar terlalu besar');
        </script>";
    }

    // lolos pengecekan, gambar siap upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user memilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

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

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai');
        </script>
        ";
        return false;
    }
}
