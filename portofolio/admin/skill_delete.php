<?php
require_once 'check_auth.php';
require_once '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("DELETE FROM skills WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: manage_skills.php");
        exit;
    } else {
        echo "Error: Gagal menghapus data.";
    }
}
?>