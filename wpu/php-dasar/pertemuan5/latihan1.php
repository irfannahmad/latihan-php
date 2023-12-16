<?php
// array
// variabel yang bisa menampung banyak nilai
// elemen(isi array) boleh memiliki tipe data yang berbeda
// pasangan antara key dan value
// key-nya adalah index, yang dimulai dari 0

// membuat array cara lama
$hari = array("Senin", "Selasa", "Rabu");

// membuat array cara baru
$bulan = ["Januari", "Februauri", "Maret"];

$arr1 = [123, "tulisan", false];

// menampilkan array
// var_dump
// print_r
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

// menampilkan 1 elemen pada array
echo $arr1[1]; // tulisan

// menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "Kamis";
echo "<br>";
var_dump($hari);
