<?php

class Produk {
    public $judul,
           $penulis,
           $penerbit;
    protected $diskon = 0;
    private $harga;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit =  $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getHarga() {
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }

    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }
}

class Komik extends Produk {
    public $jmlHalaman;
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,  $jmlHalaman = 0) {
        parent::__construct( $judul, $penulis, $penerbit, $harga, $jmlHalaman );
        $this->jmlHalaman = $jmlHalaman;
    }
    public function getInfoProduk() {
        $str = "Komik : ". parent::getInfoProduk() ."- {$this->jmlHalaman} halaman.";
        return $str;
    }
}

class Game extends Produk {
    public $waktuMain;
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,  $waktuMain = 0) {
        parent::__construct( $judul, $penulis, $penerbit, $harga, $waktuMain );
        $this->waktuMain = $waktuMain;
    }
    public function getInfoProduk() {
        $str = "Game : ". parent::getInfoProduk() ."~ {$this->waktuMain} jam.";
        return $str;
    }
}

class CetakInfoProduk {
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
$produk1->setDiskon(25);
echo $produk2->getHarga();

?>
