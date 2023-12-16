<?php

class Produk
{
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }


    public function getLabel()
    {
        return "$this->judul, $this->penulis, $this->penerbit";
    }
}

class cetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->getLabel()} | (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Produk("Naruto", "Mashasi Kishimoto", "Shonen Jump", 30000); // instance/ instansiasi/ buat objek

$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 25000); // objek di instansiasi

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

$infoProduk1 = new cetakInfoProduk();
echo $infoProduk1->cetak($produk2);
