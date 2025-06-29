<?php
require_once 'check_auth.php';
require_once '../config.php';

// Pastikan request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua data dari form
    $id = $_POST['id'];
    $type = $_POST['type'];
    $year_range = $_POST['year_range'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Jika ID kosong, berarti ini data baru (INSERT)
    if (empty($id)) {
        $stmt = $mysqli->prepare("INSERT INTO experiences (type, year_range, title, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $type, $year_range, $title, $description);
    } else { // Jika ID ada, berarti edit data lama (UPDATE)
        $stmt = $mysqli->prepare("UPDATE experiences SET type = ?, year_range = ?, title = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $type, $year_range, $title, $description, $id);
    }

    // Eksekusi query dan redirect
    if ($stmt->execute()) {
        header("Location: manage_experiences.php");
        exit;
    } else {
        // Jika ada error, tampilkan
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Jika bukan POST, redirect ke halaman manage
    header("Location: manage_experiences.php");
    exit;
}
?>