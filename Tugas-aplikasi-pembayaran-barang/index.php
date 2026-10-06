<?php
$pembeli = "";
$barang = "";
$harga = 0;
$jumlah = 0;
$total = 0;
$diskon = 0;
$bayar = 0;
$eror = "";

$daftarBarang = [
    "sabun" => 50_000,
    "sampo" => 20_000,
    "pepsoden" => 30_000,
    "sikat gigi" => 70_000,
    "mie" => 25_000
];

if (isset($_POST["pembeli"], $_POST["barang"], $_POST["jumlah"])){
    $pembeli = $_POST["pembeli"];
    $barang = $_POST["barang"];
    $jumlah = (int) $_POST["jumlah"];
    

    if (isset($daftarBarang[$barang])) {
        $harga = $daftarBarang[$barang];
    } elseif ($jumlah < 1){
        $eror = "jumlah minimal 1";
    }

    $total = $harga * $jumlah;
    
    if ($total >= 500_000) {
        $diskon = $total * 20 / 100;
    }elseif ($total >= 250_000){
        $diskon = $total * 10 / 100;
    }

    $bayar = $total - $diskon;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">    
    <div class="" style="">
        <h1>Selamat datang di dalam kalulator anti boros</h1>

        <form action="index.php" method="POST" style="">
            <input type="text" name="pembeli" placeholder="masukan nama anda">

            <select name="barang" id="">
                <?php foreach ($daftarBarang as $nama => $hargaBarang): ?>
                    <option value="<?= htmlspecialchars($nama) ?>">
                        <?= htmlspecialchars($nama) ?> - Rp <?= number_format($hargaBarang, 0, ',', '.') ?>

                    </option>
                
                <?php endforeach?>
            </select>

            <input type="number" name="jumlah" placeholder="mauskan jumlah">
            <button type="submit">hitung</button>
            <button type="reset">reset</button>
        </form>
        
        <div class="">
            <p>nama pembeli : <?= htmlspecialchars($pembeli) ?></p>
            <p>nama barang : <?= htmlspecialchars($barang) ?></p>
            <p>harga baranag : Rp <?= number_format($harga, 0, ',', '.') ?></p>
            <p>jumlah barang : <?= $jumlah ?></p>
            <p>total pembelian : <?= number_format($total, 0, ',', '.') ?></p>
            <p>diskon : <?= number_format($diskon, 0, ',', '.') ?></p>
            <p>total yg di bayarkan : <?= number_format($bayar, 0, ',', '.') ?></p>
        </div>
    </div>
</div>
</body>
</html>