<?php

// Sintaks PHP
// standar output
// echo, print
// print_r
// var_dump

echo "<p>Irfan Ahmad</p>";
print "<p>Irfan Ahmad</p>";
print_r("<p>Irfan Ahmad</p><br>");
var_dump("Irfan Ahmad");

echo "<br>";
echo true;
echo "<br>";
// ""(petik dua lebih sakti)
echo "jum'at";

// penulisan sintaks php
// 1. php didalam html
// 2. html didalam php
?>
<!-- php didalam html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>

<body>
    <h1>Halo <?php echo "Irfan"; ?></h1>
</body>

</html>

<?php
// html didalam php
echo "<p>Hello World!!";

?>

<!-- variabel dan tipe data -->
<!-- variabel -->
<!-- tidak boleh diawali dengan angka, tapi boleh mengandung angka -->
<?php
$nama = "Irfan";

echo "<br>Halo nama saya $nama";
echo '<br>Halo nama saya $nama'; // tidak sama dengan petik dua
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello <?php echo $nama; ?></h1>
</body>

</html>

<!-- Operator -->
<!-- Operator Aritmatika -->
<!-- + -  / * % -->
<?php
$x = 10;
$y = 20;

echo $x + $y;
?>

<!-- penggabung string -->
<!-- menggunakan titik (.) -->

<?php
$firstName = "Irfan";
$lastName = "Hidayat";

echo "<br>";
echo $firstName . " " . $lastName;
echo "<br>";
?>

<!-- Assignment -->
<!-- =, +=, -=, *=, /=, %=, .= -->

<?php
$x = 1;
$x += 5;

echo $x; // 6 // ditimpa, akan menerima variable yang terakhir
echo "<br>";
?>

<!-- operator perbandingan -->
<!-- <, >, <=, >=, ==, != -->
<?php
var_dump(1 > 5); // bool(false)
echo "<br>";
var_dump(1 == "1"); // bool(true)
echo "<br>";
?>

<!-- identitas -->
<!-- ===, !== -->
<?php
var_dump(1 === "1"); // bool(false)
echo "<br>";
?>

<!-- logika -->
<!-- &&, ||, ! -->
<?php
$x = 30;

var_dump($x > 20 && $x % 2 == 0); // true
echo "<br>";
var_dump($x < 20 && $x % 2 == 0); // false
echo "<br>";
var_dump($x > 20 || $x % 2 == 0); // true
echo "<br>";
var_dump($x < 20 || $x % 2 == 0); // true
?>