<?php
// require './App/Produk/InfoProduk.php';
// require './App/Produk/Produk.php';
// require './App/Produk/Komik.php';
// require './App/Produk/Game.php';
// require './App/Produk/CetakInfoProduk.php';


spl_autoload_register(function ($class) {
    require_once './App/Produk/' . $class . '.php';
});
