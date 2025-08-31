<?php
declare(strict_types=1);

/**
 * 1a — Instruksi Berurutan (Sequential)
 * Kasus: Menghitung total belanja
 */

// Input contoh
$product = "Buku Tulis";
$price   = 25000;   // harga satuan
$qty     = 3;       // jumlah
$tax     = 11.0;    // pajak (%)

// Proses berurutan
$subtotal   = $price * $qty;
$taxAmount  = $subtotal * ($tax / 100);
$grandTotal = $subtotal + $taxAmount;

echo "<h2>=== 1a — Instruksi Berurutan ===</h2>";
echo "Produk     : $product<br>";
echo "Harga      : Rp " . number_format($price, 0, ',', '.') . "<br>";
echo "Qty        : $qty<br>";
echo "Subtotal   : Rp " . number_format($subtotal, 0, ',', '.') . "<br>";
echo "Pajak ($tax%) : Rp " . number_format($taxAmount, 0, ',', '.') . "<br>";
echo "Grand Total: Rp " . number_format($grandTotal, 0, ',', '.') . "<br>";
