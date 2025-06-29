<?php
// /config.php

// --- PENGATURAN KONEKSI DATABASE ---
$db_host = 'localhost';     // Host database, biasanya 'localhost'
$db_user = 'root';          // Username default untuk XAMPP
$db_pass = '';              // Password default untuk XAMPP adalah kosong
$db_name = 'portfolio_db';  // Nama database Anda

// --- BUAT KONEKSI DATABASE DENGAN PENGECEKAN ERROR ---
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Hentikan script jika ada error SQL
try {
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    // Set charset agar tidak ada masalah dengan karakter aneh
    $mysqli->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Jika koneksi gagal, tampilkan pesan yang jelas dan hentikan script
    // Jangan tampilkan detail error ke publik di website production
    die('Koneksi ke database gagal. Periksa kembali pengaturan di config.php. Error: ' . $e->getMessage());
}
?>