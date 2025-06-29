<?php
require_once 'check_auth.php';
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $features = $_POST['features'];

    if (empty($id)) {
        // Mode INSERT
        $sql = "INSERT INTO services (title, price, features) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $title, $price, $features);
    } else {
        // Mode UPDATE
        $sql = "UPDATE services SET title = ?, price = ?, features = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssi", $title, $price, $features, $id);
    }

    // Eksekusi dan redirect
    if ($stmt->execute()) {
        header("Location: manage_services.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>