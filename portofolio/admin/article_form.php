<?php
require_once 'check_auth.php';
require_once '../config.php';

// Inisialisasi variabel artikel kosong
$article = [
    'id' => '', 'slug' => '', 'title' => '', 'category' => '', 'image_url' => '', 
    'published_date' => date('Y-m-d'), 'excerpt' => '', 'full_content' => ''
];
$page_title = 'Tambah Artikel Baru';

// Jika mode edit, ambil data dari database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
        $page_title = 'Edit Artikel';
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
        .form-container { max-width: 900px; margin: 20px auto; background: #2c2c2c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); }
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
            display: none; /* Semua konten tab disembunyikan */
        }
        .tab-content.active {
            display: block; /* Hanya konten tab aktif yang ditampilkan */
        }
        
        /* --- Style untuk Form di dalam Tab --- */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-group { margin-bottom: 20px; }
        .full-width { grid-column: 1 / -1; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #ccc; }
        input[type="text"], input[type="date"], input[type="file"], textarea { width: 100%; padding: 12px; background-color: #3a3a3a; border: 1px solid #555; border-radius: 5px; box-sizing: border-box; color: #e0e0e0; }
        textarea { resize: vertical; min-height: 120px; }
        .form-buttons { margin-top: 30px; }
        .form-buttons button { background: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .form-buttons a { display: inline-block; margin-left: 10px; color: #ccc; text-decoration: none; }
        .current-image { max-width: 200px; height: auto; display: block; margin-top: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><?php echo $page_title; ?></h1>

            <div class="tab-buttons">
                <button type="button" class="tab-button active" onclick="openTab(event, 'tab-utama')">Info Utama</button>
                <button type="button" class="tab-button" onclick="openTab(event, 'tab-konten')">Konten Artikel</button>
            </div>

            <form action="article_save.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">

                <div id="tab-utama" class="tab-content active">
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Judul Artikel</label>
                            <input type="text" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Slug (URL unik)</label>
                            <input type="text" name="slug" value="<?php echo htmlspecialchars($article['slug']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="category" value="<?php echo htmlspecialchars($article['category']); ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Publikasi</label>
                            <input type="date" name="published_date" value="<?php echo htmlspecialchars($article['published_date']); ?>" required>
                        </div>
                    </div>
                </div>

                <div id="tab-konten" class="tab-content">
                    <div class="form-group">
                        <label>Gambar Utama Artikel</label>
                        <?php if (!empty($article['image_url'])): ?>
                            <p><small>Gambar Saat Ini:</small></p>
                            <img src="../<?php echo htmlspecialchars($article['image_url']); ?>" alt="Current Image" class="current-image">
                            <small>Upload file baru untuk mengganti.</small>
                        <?php endif; ?>
                        <input type="file" name="main_image" style="margin-top:10px;">
                        <input type="hidden" name="existing_main_image" value="<?php echo htmlspecialchars($article['image_url']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Kutipan / Ringkasan (Excerpt)</label>
                        <textarea name="excerpt" rows="5"><?php echo htmlspecialchars($article['excerpt']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Isi Lengkap Artikel (Full Content)</label>
                        <textarea name="full_content" rows="15"><?php echo htmlspecialchars($article['full_content']); ?></textarea>
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit">Simpan Artikel</button>
                    <a href="manage_articles.php">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab-button");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>