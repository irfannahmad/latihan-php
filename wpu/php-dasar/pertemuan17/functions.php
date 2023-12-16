<?php
$conn = mysqli_connect("localhost", "root", "", "emyu");

function query($query)
{
    global $conn; // Mengakses variabel $conn yang didefinisikan di luar fungsi ini

    // Melakukan query ke database menggunakan koneksi $conn
    $result = mysqli_query($conn, $query);

    $rows = []; // Membuat array kosong untuk menampung hasil

    // Mengambil setiap baris hasil query dan menyimpannya dalam $rows sebagai array asosiatif
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; // Menambahkan setiap baris ke dalam array $rows
    }

    return $rows; // Mengembalikan array yang berisi hasil dari query
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
    // Mengambil informasi terkait file yang diunggah dari $_FILES superglobal
    // ["name"], ["size"], ["error"], ["tmp_name"] bawaan dari php, dari $_FILES
    $namaFile = $_FILES["gambar"]["name"]; // Nama asli dari file yang diunggah
    $ukuranFile = $_FILES["gambar"]["size"]; // Ukuran file yang diunggah dalam bytes
    $error = $_FILES["gambar"]["error"]; // Kode error, jika ada, yang terkait dengan proses pengunggahan
    $tmpName = $_FILES["gambar"]["tmp_name"]; // Lokasi sementara file yang diunggah pada server

    // Cek apakah tidak ada gambar yang diupload (error code 4 menunjukkan tidak ada file yang diunggah)
    if ($error === 4) {
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false; // Mengembalikan false karena tidak ada file yang diunggah
    }

    // Cek apakah yang diupload adalah gambar dengan memvalidasi ekstensi file
    $ekstensiGambarValid = ["jpg", "jpeg", "png"]; // Ekstensi gambar yang diperbolehkan
    $ekstensiGambar = explode('.', $namaFile); // Memisahkan nama file dengan ekstensi
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // Mengambil ekstensi dalam huruf kecil
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Yang anda upload bukan gambar');
        </script>";
    }

    // Cek jika ukurannya terlalu besar (1 MB = 1000000 bytes)
    if ($ukuranFile > 1000000) {
        echo "
        <script>
            alert('Ukuran gambar terlalu besar');
        </script>";
    }

    // Generate nama baru untuk file gambar menggunakan uniqid() untuk menghindari nama yang sama
    $namaFileBaru = uniqid(); // Membuat ID unik
    $namaFileBaru .= '.'; // Menambahkan tanda '.' untuk ekstensi file
    $namaFileBaru .= $ekstensiGambar; // Menambahkan ekstensi file ke nama baru

    // Pindahkan file gambar dari lokasi sementara ke direktori yang ditentukan
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru; // Mengembalikan nama file gambar baru untuk digunakan dalam fungsi tambah()
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

    // Ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nopung = htmlspecialchars($data["nopung"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $negara = htmlspecialchars($data["negara"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user memilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        // Jika tidak ada gambar baru yang diunggah, gunakan gambar yang lama
        $gambar = $gambarLama;
    } else {
        // Jika ada gambar baru yang diunggah, panggil fungsi upload() untuk memprosesnya
        $gambar = upload();
    }

    // Query update data pemainemyu berdasarkan ID yang diberikan
    $query = "UPDATE pemainemyu SET
        nama = '$nama', 
        nopung = '$nopung', 
        posisi = '$posisi', 
        negara = '$negara', 
        gambar = '$gambar'
        WHERE id = $id
        ";

    // Eksekusi query update menggunakan koneksi database
    mysqli_query($conn, $query);

    // Mengembalikan jumlah baris yang terpengaruh oleh operasi SQL terakhir
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

    // Ambil nilai username, password, dan password konfirmasi dari data yang diterima
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Periksa apakah konfirmasi password sesuai
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai!');
        </script>
        ";
        return false;
    }

    // Periksa apakah username sudah terdaftar dalam database
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Username sudah terdaftar!');
        </script>
        ";
        return false;
    }

    // Enkripsi password menggunakan password_hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke dalam database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
