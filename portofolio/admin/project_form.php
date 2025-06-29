<?php
require_once 'check_auth.php';
require_once '../config.php';

// Inisialisasi variabel proyek kosong
$project = [
    'id' => '', 'slug' => '', 'title' => '', 'category' => '', 'category_slug' => '', 'image_url' => '', 'subtitle' => '',
    'overview' => '', 'gallery_images' => '', 'tech_tags' => '', 'challenges' => '', 'results' => '', 'client' => '',
    'role' => '', 'timeline' => '', 'status' => ''
];
$page_title = 'Tambah Proyek Baru';

// Jika mode edit, ambil data dari database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $project = $result->fetch_assoc();
        $page_title = 'Edit Proyek';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #1e1e1e; color: #e0e0e0; margin: 0; padding: 0; }
        .container { padding: 20px 30px; }
        .form-container { max-width: 1000px; margin: 20px auto; background: #2c2c2c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); }
        h1 { font-size: 28px; font-weight: 600; color: #ffffff; margin-top: 0; margin-bottom: 25px; border-bottom: 1px solid #444; padding-bottom: 15px; }
        
        /* --- Style untuk Tab --- */
        .tab-buttons {
            border-bottom: 2px solid #444;
            margin-bottom: 25px;
        }
        .tab-button {
            padding: 12px 20px;
            cursor: pointer;
            border: none;
            background-color: transparent;
            color: #ccc;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }
        .tab-button:hover {
            background-color: #3a3a3a;
        }
        .tab-button.active {
            color: #ff4444;
            border-bottom-color: #ff4444;
        }
        .tab-content {
            display: none; /* Semua konten tab disembunyikan secara default */
        }
        .tab-content.active {
            display: block; /* Hanya konten tab yang aktif yang ditampilkan */
        }
        
        /* --- Style untuk Form di dalam Tab --- */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-group { margin-bottom: 15px; }
        .full-width { grid-column: 1 / -1; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #ccc; }
        input[type="text"], input[type="file"], textarea, select { width: 100%; padding: 12px; background-color: #3a3a3a; border: 1px solid #555; border-radius: 5px; box-sizing: border-box; color: #e0e0e0; }
        textarea { resize: vertical; min-height: 90px; } /* Tinggi textarea diperkecil */
        .form-buttons { margin-top: 30px; }
        .form-buttons button { background: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .form-buttons a { display: inline-block; margin-left: 10px; color: #ccc; text-decoration: none; }
        
        /* Style untuk manajemen gambar */
        .current-image { max-width: 150px; height: auto; display: block; margin-top: 10px; border-radius: 5px; }
        .gallery-management-container { margin-top: 10px; padding: 15px; border: 1px solid #444; border-radius: 5px; }
        .gallery-grid { display: flex; flex-wrap: wrap; gap: 15px; }
        .gallery-item-admin { position: relative; }
        .gallery-item-admin img { width: 120px; height: 80px; object-fit: cover; border-radius: 4px; }
        .gallery-item-admin .delete-checkbox { position: absolute; top: 5px; right: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><?php echo $page_title; ?></h1>
            
            <div class="tab-buttons">
                <button type="button" class="tab-button active" onclick="openTab(event, 'tab-utama')">Info Utama</button>
                <button type="button" class="tab-button" onclick="openTab(event, 'tab-konten')">Detail Konten</button>
                <button type="button" class="tab-button" onclick="openTab(event, 'tab-galeri')">Galeri & Meta</button>
            </div>

            <form action="project_save.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $project['id']; ?>">

                <div id="tab-utama" class="tab-content active">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Judul Proyek</label>
                            <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Slug (URL unik)</label>
                            <input type="text" name="slug" value="<?php echo htmlspecialchars($project['slug']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="category" value="<?php echo htmlspecialchars($project['category']); ?>">
                        </div>
                        <div class="form-group">
                            <label>Category Slug</label>
                            <input type="text" name="category_slug" value="<?php echo htmlspecialchars($project['category_slug']); ?>">
                        </div>
                        <div class="form-group full-width">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" value="<?php echo htmlspecialchars($project['subtitle']); ?>">
                        </div>
                        <div class="form-group full-width">
                            <label>Gambar Utama Proyek</label>
                            <?php if (!empty($project['image_url'])): ?>
                                <img src="../<?php echo htmlspecialchars($project['image_url']); ?>" alt="Current Image" class="current-image">
                                <small>Upload file baru di bawah untuk mengganti.</small>
                            <?php endif; ?>
                            <input type="file" name="main_image" style="margin-top:10px;">
                            <input type="hidden" name="existing_main_image" value="<?php echo htmlspecialchars($project['image_url']); ?>">
                        </div>
                    </div>
                </div>

                <div id="tab-konten" class="tab-content">
                    <div class="form-group">
                        <label>Project Overview</label>
                        <textarea name="overview" rows="6"><?php echo htmlspecialchars($project['overview']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tantangan & Solusi</label>
                        <textarea name="challenges" rows="6"><?php echo htmlspecialchars($project['challenges']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hasil & Dampak</label>
                        <textarea name="results" rows="6"><?php echo htmlspecialchars($project['results']); ?></textarea>
                    </div>
                </div>

                <div id="tab-galeri" class="tab-content">
                     <div class="form-group full-width">
                        <label>Galeri Gambar Tambahan</label>
                        <div class="gallery-management-container">
                            <p><strong>Kelola Gambar Saat Ini:</strong> (centang untuk menghapus)</p>
                            <div class="gallery-grid">
                            <?php
                                if (!empty($project['gallery_images'])) {
                                    $gallery_images = explode(',', $project['gallery_images']);
                                    foreach ($gallery_images as $image_path) {
                                        $trimmed_path = trim($image_path);
                                        if (!empty($trimmed_path)) {
                                            echo '<div class="gallery-item-admin"><img src="../' . htmlspecialchars($trimmed_path) . '"><input type="checkbox" name="delete_gallery[]" value="' . htmlspecialchars($trimmed_path) . '" class="delete-checkbox"></div>';
                                        }
                                    }
                                } else { echo '<p><small>Belum ada gambar di galeri.</small></p>'; }
                            ?>
                            </div>
                            <hr style="margin: 20px 0; border-color: #444;">
                            <label for="new_gallery_images"><strong>Upload Gambar Baru ke Galeri:</strong></label>
                            <input type="file" id="new_gallery_images" name="gallery_images[]" multiple>
                        </div>
                    </div>
                    <div class="form-group full-width">
                        <label>Teknologi yang Digunakan (pisahkan dengan koma)</label>
                        <textarea name="tech_tags" rows="3"><?php echo htmlspecialchars($project['tech_tags']); ?></textarea>
                    </div>
                    <div class="form-grid">
                        <div class="form-group"><label>Klien</label><input type="text" name="client" value="<?php echo htmlspecialchars($project['client']); ?>"></div>
                        <div class="form-group"><label>Peran (Role)</label><input type="text" name="role" value="<?php echo htmlspecialchars($project['role']); ?>"></div>
                        <div class="form-group"><label>Timeline</label><input type="text" name="timeline" value="<?php echo htmlspecialchars($project['timeline']); ?>"></div>
                        <div class="form-group"><label>Status</label><input type="text" name="status" value="<?php echo htmlspecialchars($project['status']); ?>"></div>
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit">Simpan Proyek</button>
                    <a href="manage_projects.php">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            // Sembunyikan semua konten tab
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Hapus kelas 'active' dari semua tombol tab
            tablinks = document.getElementsByClassName("tab-button");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Tampilkan tab yang dipilih dan tandai tombolnya sebagai 'active'
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>