<?php
// /admin/login_process.php (VERSI NORMAL)

session_start();

$config_path = __DIR__ . '/../config.php';
if (!file_exists($config_path)) {
    die("Koneksi Error: file config.php tidak ditemukan.");
}
require_once $config_path;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, password FROM admins WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                session_regenerate_id();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $id;
                $_SESSION['admin_username'] = $username;
                header("Location: dashboard.php");
                exit;
            }
        }
        $stmt->close();
    }
}

header("Location: index.php?error=1");
exit;
?>