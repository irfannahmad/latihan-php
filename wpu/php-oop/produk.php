<?php

class Produk
{
    public $judul = "judul";
    public $penulis = "penulis";
    public $penerbit = "penerbit";
    public $harga = 0;

    public function getLabel()
    {
        // ($this) mengambil isi dari property diatas
        return "$this->penulis, $this->penerbit";
    }
}

// $produk1 = new Produk();
// $produk1->judul = "Naruto"; // menimpa
// var_dump($produk1);

// $produk2 = new Produk();
// $produk2->judul = "Uncharted"; // menimpa
// var_dump($produk2->judul);

$produk3 = new Produk(); // instance/ instansiasi/ buat objek
$produk3->judul = "Naruto";
$produk3->penulis = "Mashasi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;
// var_dump($produk3);

// echo "Komik : $produk3->judul";
// echo "<br>";
// echo $produk3->getLabel();

$produk4 = new Produk();
$produk4->judul = "Uncharted";
$produk4->penulis = "Neil Druckman";
$produk4->penerbit = "Sony Computer";
$produk4->harga = 25000;

echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
