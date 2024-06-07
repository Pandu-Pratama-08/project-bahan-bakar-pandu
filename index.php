<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga Dengan Konsep OOP</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="liter">Masukkan Jumlah Liter Pembelian : </label>
            <input type="number" name="liter" id ="liter" required>
        </div>
        <div style="display: flex;">
            <label for="jenis">Pilih Jenis Bahan Bakar</label>
            <select name="jenis" required>
                <option value="SSuper">Shell Super</option>
                <option value="SVPower">Shell SVPower</option>
                <option value="SVPowerDiesel">Shell SVPowerDiesel</option>
                <option value="SVPowerNitro">Shell SVPowerNitro</option>
            </select>

        </div>
        <button type="submit" name="beli">Beli</button>
    </form>

    <?php 
        // Panggil file nya
        require 'logic.php';
        // baru dibuka, langsung set harganya
        $logic = new Pembelian();
        $logic->setHarga(15420,16130,18310,16510);
        // Kalau Sudah fiks beli, jalankan 
        if(isset($_POST['beli'])) {
            // isi attribute public pada class Sesuai dengan isian formnya
            $logic->jenisYangDipilih = $_POST['jenis'];
            $logic->totalLiter = $_POST['liter'];
            // abis kirim nilai form, proses harganya
            $logic->totalHarga();
            // cetak hasilnya
            $logic->cetakBukti();
        }
    ?>
</body>
</html>