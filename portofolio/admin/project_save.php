<?php
require_once 'check_auth.php';
require_once '../config.php';

// Fungsi untuk menghandle upload satu file (tidak berubah)
function handle_upload($file_input_name, $existing_file_path = '') {
    if (!isset($_FILES[$file_input_name]) || $_FILES[$file_input_name]['error'] != UPLOAD_ERR_OK) {
        return $existing_file_path;
    }

    // Jika file baru diupload, hapus file lama (jika ada)
    if (!empty($existing_file_path) && file_exists('../' . $existing_file_path)) {
        unlink('../' . $existing_file_path);
    }

    $target_dir = "../uploads/";
    $new_filename = uniqid() . '-' . basename($_FILES[$file_input_name]["name"]);
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
        return 'uploads/' . $new_filename;
    } else {
        return $existing_file_path;
    }
}

// Fungsi untuk menghandle upload galeri (logika baru)
function handle_gallery_management($file_input_name, $images_to_delete = [], $existing_files_str = '') {
    $target_dir = "../uploads/";
    $final_paths = [];
    
    // 1. Ambil daftar gambar yang sudah ada
    $existing_paths = !empty($existing_files_str) ? explode(',', $existing_files_str) : [];

    // 2. Hapus gambar yang ditandai untuk dihapus
    foreach ($images_to_delete as $path_to_delete) {
        // Hapus file fisik dari server
        if (file_exists('../' . $path_to_delete)) {
            unlink('../' . $path_to_delete);
        }
        // Hapus dari daftar gambar yang ada
        $key = array_search($path_to_delete, $existing_paths);
        if ($key !== false) {
            unset($existing_paths[$key]);
        }
    }
    // Set path yang tersisa ke array final
    $final_paths = array_values($existing_paths); // Re-index array

    // 3. Proses upload file baru
    if (isset($_FILES[$file_input_name]) && is_array($_FILES[$file_input_name]['name'])) {
        $file_count = count($_FILES[$file_input_name]['name']);
        for ($i = 0; $i < $file_count; $i++) {
            if ($_FILES[$file_input_name]['error'][$i] == UPLOAD_ERR_OK) {
                $new_filename = uniqid() . '-' . basename($_FILES[$file_input_name]["name"][$i]);
                $target_file = $target_dir . $new_filename;

                if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"][$i], $target_file)) {
                    // Tambahkan path file baru ke array final
                    $final_paths[] = 'uploads/' . $new_filename;
                }
            }
        }
    }
    
    // 4. Kembalikan sebagai string yang dipisah koma
    return implode(',', $final_paths);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data teks dari form (tidak berubah)
    $id = $_POST['id'];
    $slug = $_POST['slug'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $category_slug = $_POST['category_slug'];
    $subtitle = $_POST['subtitle'];
    $overview = $_POST['overview'];
    $tech_tags = $_POST['tech_tags'];
    $challenges = $_POST['challenges'];
    $results = $_POST['results'];
    $client = $_POST['client'];
    $role = $_POST['role'];
    $timeline = $_POST['timeline'];
    $status = $_POST['status'];

    // Proses upload file (logika baru)
    $main_image_path = handle_upload('main_image', $_POST['existing_main_image']);
    
    // Ambil daftar gambar yang akan dihapus dari checkbox
    $delete_gallery = isset($_POST['delete_gallery']) ? $_POST['delete_gallery'] : [];
    
    // Dapatkan path galeri yang sudah diperbarui (setelah menghapus dan menambah)
    $project_id_for_gallery = !empty($id) ? $id : 0;
    $existing_gallery_str = '';
    if($project_id_for_gallery > 0){
        $res = $mysqli->query("SELECT gallery_images FROM projects WHERE id = $project_id_for_gallery");
        $row = $res->fetch_assoc();
        $existing_gallery_str = $row['gallery_images'];
    }
    
    $gallery_images_paths = handle_gallery_management('gallery_images', $delete_gallery, $existing_gallery_str);

    // Sisanya sama seperti sebelumnya
    if (empty($id)) {
        // Mode INSERT
        $sql = "INSERT INTO projects (slug, title, category, category_slug, image_url, subtitle, overview, gallery_images, tech_tags, challenges, results, client, role, timeline, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssssssssssss", $slug, $title, $category, $category_slug, $main_image_path, $subtitle, $overview, $gallery_images_paths, $tech_tags, $challenges, $results, $client, $role, $timeline, $status);
    } else {
        // Mode UPDATE
        $sql = "UPDATE projects SET slug=?, title=?, category=?, category_slug=?, image_url=?, subtitle=?, overview=?, gallery_images=?, tech_tags=?, challenges=?, results=?, client=?, role=?, timeline=?, status=? WHERE id=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssssssssssssi", $slug, $title, $category, $category_slug, $main_image_path, $subtitle, $overview, $gallery_images_paths, $tech_tags, $challenges, $results, $client, $role, $timeline, $status, $id);
    }

    if ($stmt->execute()) {
        header("Location: manage_projects.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>