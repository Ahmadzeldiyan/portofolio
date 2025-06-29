<?php
require_once 'check_auth.php';
require_once '../config.php';

function handle_article_upload($file_input_name, $existing_file_path = '') {
    if (!isset($_FILES[$file_input_name]) || $_FILES[$file_input_name]['error'] != UPLOAD_ERR_OK) {
        return $existing_file_path;
    }

    if (!empty($existing_file_path) && file_exists('../' . $existing_file_path)) {
        unlink('../' . $existing_file_path);
    }

    $target_dir = "../uploads/";
    $new_filename = 'article-' . uniqid() . '-' . basename($_FILES[$file_input_name]["name"]);
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
        return 'uploads/' . $new_filename;
    } else {
        return $existing_file_path;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $slug = $_POST['slug'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $published_date = $_POST['published_date'];
    $excerpt = $_POST['excerpt'];
    $full_content = $_POST['full_content'];

    // Proses upload gambar
    $image_url = handle_article_upload('main_image', $_POST['existing_main_image']);

    if (empty($id)) {
        // Mode INSERT
        $sql = "INSERT INTO articles (slug, title, category, image_url, published_date, excerpt, full_content) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssss", $slug, $title, $category, $image_url, $published_date, $excerpt, $full_content);
    } else {
        // Mode UPDATE
        $sql = "UPDATE articles SET slug=?, title=?, category=?, image_url=?, published_date=?, excerpt=?, full_content=? WHERE id=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssssi", $slug, $title, $category, $image_url, $published_date, $excerpt, $full_content, $id);
    }

    // Eksekusi dan redirect
    if ($stmt->execute()) {
        header("Location: manage_articles.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>