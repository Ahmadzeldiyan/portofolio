<?php
require_once 'check_auth.php';
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $icon_class = $_POST['icon_class'];
    $percentage = $_POST['percentage'];
    $description = $_POST['description'];

    if (empty($id)) {
        // Proses INSERT (Tambah data baru)
        $stmt = $mysqli->prepare("INSERT INTO skills (title, icon_class, percentage, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $title, $icon_class, $percentage, $description);
    } else {
        // Proses UPDATE (Edit data lama)
        $stmt = $mysqli->prepare("UPDATE skills SET title = ?, icon_class = ?, percentage = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssisi", $title, $icon_class, $percentage, $description, $id);
    }

    if ($stmt->execute()) {
        header("Location: manage_skills.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>