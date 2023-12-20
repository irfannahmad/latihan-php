<?php
// define("NAMA", "Irfan");
// echo NAMA;
// echo "<br>";

// const UMUR = 21;
// echo UMUR;

// define tidak bisa dimasukkan dalam class OOP, harus diluar class
// sedangkan const bisa dimasukkan ke dalam class

// class Coba
// {
//     const NAMA = "Irfan";
// }

// echo Coba::NAMA;

// echo __FILE__;

function coba()
{
    return __FUNCTION__;
}

echo coba(); // coba

class Coba
{
    public $class = __CLASS__;
}

$obj = new Coba;
echo $obj->class; // Coba
