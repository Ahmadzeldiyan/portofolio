<?php
require_once 'check_auth.php';
require_once '../config.php';

// Pastikan ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("DELETE FROM experiences WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    // Eksekusi query dan redirect
    if ($stmt->execute()) {
        header("Location: manage_experiences.php");
        exit;
    } else {
        echo "Error: Gagal menghapus data.";
    }
    $stmt->close();
} else {
    header("Location: manage_experiences.php");
    exit;
}
?>