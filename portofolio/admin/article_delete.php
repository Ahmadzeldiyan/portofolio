<?php
require_once 'check_auth.php';
require_once '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Ambil path gambar sebelum menghapus data dari database
    $stmt_select = $mysqli->prepare("SELECT image_url FROM articles WHERE id = ?");
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    if($row = $result->fetch_assoc()){
        $image_path = $row['image_url'];
        // 2. Hapus file gambar dari server jika ada
        if (!empty($image_path) && file_exists('../' . $image_path)) {
            unlink('../' . $image_path);
        }
    }
    $stmt_select->close();

    // 3. Hapus data dari database
    $stmt_delete = $mysqli->prepare("DELETE FROM articles WHERE id = ?");
    $stmt_delete->bind_param("i", $id);
    
    if ($stmt_delete->execute()) {
        header("Location: manage_articles.php");
        exit;
    } else {
        echo "Error: Gagal menghapus data.";
    }
    $stmt_delete->close();
} else {
    header("Location: manage_articles.php");
    exit;
}
?>