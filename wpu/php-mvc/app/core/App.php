<?php
class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL(); // memanggil method parseURL, berisi url apapun yang diketikkan

        // controller
        // localhost/latihan-php/wpu/php-mvc/public/home/index.php
        // $url[0] = home
        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];

            unset($url[0]); // menghilangkan controller home
        }

        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // method
        // localhost/latihan-php/wpu/php-mvc/public/home/index.php
        // $url[1] = index
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params); // mejalankan controller & method, serta kirimkan params jika ada
    }

    public function parseURL()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/"); // ambil url diisi dengan url-nya, dan menghapus tanda "/"
            $url = filter_var($url, FILTER_SANITIZE_URL); // membersihkan url dari karakter" aneh
            $url = explode("/", $url); // memecah url berdasarkan tanda "/"
            return $url;
        }
    }
}
