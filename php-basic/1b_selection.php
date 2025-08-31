<?php
declare(strict_types=1);

/**
 * 1b — Instruksi Pemilihan (If/Else + Switch)
 */

// ========== Kasus 1: If / Else ==========
$score = 74; // ubah untuk uji

if ($score >= 85 && $score <= 100) {
    $grade = "A";
} elseif ($score >= 75) {
    $grade = "B";
} elseif ($score >= 65) {
    $grade = "C";
} elseif ($score >= 50) {
    $grade = "D";
} elseif ($score >= 0) {
    $grade = "E";
} else {
    $grade = "-";
}
$status = ($score >= 65) ? "LULUS" : "TIDAK LULUS";

// ========== Kasus 2: Switch ==========
$code = "TI-D4"; // ubah untuk uji
switch ($code) {
    case "TI-D3": $program = "Teknik Informatika (D3)"; break;
    case "TI-D4": $program = "Teknik Informatika (D4)"; break;
    case "MI-D3": $program = "Manajemen Informatika (D3)"; break;
    case "TK-D3": $program = "Teknik Komputer (D3)"; break;
    case "TK-D4": $program = "Teknik Komputer (D4)"; break;
    case "KA-D3": $program = "Komputerisasi Akuntansi (D3)"; break;
    default: $program = "Kode prodi tidak dikenali";
}

echo "<h2>=== 1b — If/Else (Skor → Grade & Status) ===</h2>";
echo "Skor   : $score<br>";
echo "Grade  : $grade<br>";
echo "Status : $status<br><br>";

echo "<h2>=== 1b — Switch (Kode Prodi → Nama) ===</h2>";
echo "Kode    : $code<br>";
echo "Program : $program<br>";
