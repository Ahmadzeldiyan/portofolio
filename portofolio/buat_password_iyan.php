<?php
// buat_password_iyan.php

$password_polos = 'iyan123';
$hash_baru = password_hash($password_polos, PASSWORD_DEFAULT);

echo "<h1>Gunakan Hash Ini untuk User 'iyan'</h1>";
echo "<p><strong>Salin seluruh kode hash di bawah ini:</strong></p>";
echo "<pre style='background:#eee; padding:10px; font-size:16px;'>" . htmlspecialchars($hash_baru) . "</pre>";
?>