<?php
declare(strict_types=1);

/**
 * 1c — Instruksi Pengulangan (For + While + Foreach)
 */

// Kasus 1: For (tabel perkalian)
$n = 5;

echo "<h2>=== 1c — For (Tabel Perkalian $n) ===</h2>";
for ($i = 1; $i <= 10; $i++) {
    echo "$i × $n = " . ($i * $n) . "<br>";
}
echo "<br>";

// Kasus 2: While (jumlah deret 1..N)
$n = 4;
$sum = 0;
$i = 1;

echo "<h2>=== 1c — While (Jumlah 1..$n) ===</h2>";
while ($i <= $n) {
    $sum += $i;
    echo ($i < $n) ? "$i + " : "$i = ";
    $i++;
}
echo "$sum<br><br>";

// Kasus 3: Foreach (daftar produk)
$products = [
    ["sku" => "BKU-001", "name" => "Buku Tulis", "price" => 12000],
    ["sku" => "PLP-002", "name" => "Pulpen",     "price" => 6000],
    ["sku" => "SPD-003", "name" => "Spidol",     "price" => 14000],
];

$total = 0;
echo "<h2>=== 1c — Foreach (Daftar Produk) ===</h2>";
foreach ($products as $p) {
    echo $p['sku'] . " - " . $p['name'] . " : Rp " . number_format($p['price'], 0, ',', '.') . "<br>";
    $total += $p['price'];
}
echo "Total Harga: Rp " . number_format($total, 0, ',', '.') . "<br>";
