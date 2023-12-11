<?php
require './functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) { // Ini memeriksa jumlah baris yang dikembalikan oleh query. Jika ada satu baris yang cocok dengan nama pengguna yang dimasukkan, maka langkah selanjutnya dilakukan.
        // cek password
        $row = mysqli_fetch_assoc($result); // Kode ini mengambil baris hasil query ke dalam bentuk array asosiatif.
        if (password_verify($password, $row["password"])) {
            header("Location: ./index.php");
            exit;
        } // Ini memeriksa apakah password yang dimasukkan oleh pengguna cocok dengan password yang telah di-hash dalam database. Fungsi password_verify() membandingkan password yang dimasukkan dengan hash password yang ada dalam database. Jika cocok, pengguna akan diarahkan ke halaman index.php dengan menggunakan fungsi header().
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Halaman Login</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>