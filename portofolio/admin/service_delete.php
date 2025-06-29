<?php
require_once 'check_auth.php';
require_once '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("DELETE FROM services WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: manage_services.php");
        exit;
    } else {
        echo "Error: Gagal menghapus data.";
    }
    $stmt->close();
} else {
    header("Location: manage_services.php");
    exit;
}
?>