<?php
// buat_password.php

// Password yang ingin kita gunakan
$password_polos = 'admin123';

// Membuat hash yang aman menggunakan algoritma default PHP
$hash_baru = password_hash($password_polos, PASSWORD_DEFAULT);

echo "<h1>Password Hash Baru Anda</h1>";
echo "<p>Password asli: " . htmlspecialchars($password_polos) . "</p>";
echo "<p><strong>Salin seluruh kode hash di bawah ini:</strong></p>";
echo "<pre style='background:#eee; padding:10px; font-size:16px;'>" . htmlspecialchars($hash_baru) . "</pre>";

?>