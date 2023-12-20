<?php

// mengakses property dan method tanpa melakukan instance

// class ContohStatic
// {
//     public static $angka = 1;

//     public static function hello()
//     {
//         return "Hello " . self::$angka . " kali";
//     }
// }

// echo ContohStatic::$angka; // jika ada keyword static pada property atau method bisa langsung akses tanpa instance, dengan cara memanggil classnya diikuti dengan titik dua 2X
// echo "<br>";
// echo ContohStatic::hello();
// echo "<hr>";
// echo ContohStatic::hello();

class Contoh
{
    public static $angka = 1;

    public function hello()
    {
        return "Hello " . self::$angka++ . " kali <br>";
    }
}

$obj = new Contoh;
echo $obj->hello();
echo $obj->hello();
echo $obj->hello();
echo "<hr>";
$obj2 = new Contoh;
echo $obj2->hello();
echo $obj2->hello();
echo $obj2->hello();
// Hasil
// Hello 1 kali
// Hello 1 kali
// Hello 1 kali
// Hello 1 kali
// Hello 1 kali
// Hello 1 kali

// Hasil jika menggunakan static keyword, nilai static akan tetap meski object di instance berulang kali
// Hello 1 kali
// Hello 2 kali
// Hello 3 kali
// Hello 4 kali
// Hello 5 kali
// Hello 6 kali