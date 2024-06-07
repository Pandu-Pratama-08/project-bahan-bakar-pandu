<?php
// sediakan kotak pembungkus yang akan digunakan(sesuai dengan fitur)
class DataBahanBakar {
    private $HargaSSuper;
    private $HargaSVPower;
    private $HargaSVPowerDiesel;
    private $HargaSVPowerNitro;
    
    public $jenisYangDipilih;
    public $totalLiter;
    
    protected $pajak;
    protected $totalPembayaran;
    

    function __construct(){
        $this->pajak=0.1;
    }

    public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro) {
    $this->HargaSSuper = $valSSuper;
    $this->HargaSVPower = $valSVPower;
    $this->HargaSVPowerDiesel = $valSVPowerDiesel;
    $this->HargaSVPowerNitro = $valSVPowerNitro;
}

    public function getHarga(){
        $semuaDataSolar["SSuper"] = $this->HargaSSuper;
        $semuaDataSolar["SVPower"] = $this->HargaSVPower;
        $semuaDataSolar["SVPowerDiesel"] = $this->HargaSVPowerDiesel;
        $semuaDataSolar["SVPowerNitro"] = $this->HargaSVPowerNitro;
        
        return $semuaDataSolar;
    }
}

class Pembelian extends DataBahanBakar {
    public function totalHarga() {
       if (!isset($this->getHarga()[$this->jenisYangDipilih])) {
            echo "Jenis Bahan Bakar tidak valid.";
            return;
    }

    $hargaBahanBakar = $this->getHarga()[$this->jenisYangDipilih];
        $totalTanpaPajak = $hargaBahanBakar * $this->totalLiter;
        $this->totalTanpaPajak = $totalTanpaPajak ;
        $this->totalPembayaran = $totalTanpaPajak + ($this->totalTanpaPajak * $this->pajak);
    }
    public function cetakBukti() {
        echo "----------------------------------";
        echo "<br>";
        echo " Anda membeli Jenis Bahan Bakar : " . $this->jenisYangDipilih;
        echo "<br>";
        echo " Dengan Jumlah : " . $this->totalLiter . " Liter ";
        echo "<br>";
        echo " total yang harus anda bayar: " . number_format($this->totalPembayaran, 0, ',', '.');
        echo "<br>";
        echo "----------------------------------";
    }
}


?>