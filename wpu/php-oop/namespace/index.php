<?php
require_once './App/init.php';

// $produk1 = new Komik("Naruto", "Mashasi Kishimoto", "Shonen Jump", 30000, 100);

// $produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 25000, 50);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);
// echo $cetakProduk->cetak();

use App\Produk\User as ProdukUser;
use App\Service\User as ServiceUser;

new ProdukUser();
echo "<br>";
new ServiceUser();
