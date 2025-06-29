<?php
// /project.php (Versi Database - LENGKAP & BENAR)

// 1. Sertakan file koneksi dan header
require_once 'config.php';
include 'templates/header-db.php'; // Pastikan menggunakan header-db.php

// 2. Ambil slug dari URL (misal: project.php?slug=lego-batman)
$project_slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Inisialisasi variabel $project
$project = null;

if ($project_slug) {
    // 3. Gunakan PREPARED STATEMENT untuk keamanan
    // Siapkan query SQL untuk mengambil data proyek berdasarkan slug
    $stmt = $mysqli->prepare("SELECT * FROM projects WHERE slug = ?");
    
    // Periksa jika prepare berhasil
    if ($stmt) {
        $stmt->bind_param("s", $project_slug); // "s" berarti tipenya adalah string
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Jika data ditemukan, simpan ke dalam variabel $project
            $project = $result->fetch_assoc();
        }
        $stmt->close();
    }
}

// 4. Periksa apakah proyek ditemukan. Jika tidak, tampilkan pesan error.
if (!$project) {
    echo "<section class='page-header'><h1>Proyek Tidak Ditemukan</h1><p>Maaf, proyek yang Anda cari tidak ada. Silakan kembali ke <a href='index.php#work'>halaman utama</a>.</p></section>";
    include 'templates/footer.php';
    exit(); // Hentikan eksekusi script
}

// --- Mulai Tampilkan Konten ---
?>

<section class="page-header">
    <div class="page-header-container">
        <h1><?php echo htmlspecialchars($project['title']); ?></h1>
        <p class="subtitle"><?php echo htmlspecialchars($project['subtitle']); ?></p>
    </div>
</section>

<section class="project-detail-section">
    <div class="project-detail-container">

        <div class="project-main-content">
            <h2>Project Overview</h2>
            <p><?php echo nl2br(htmlspecialchars($project['overview'])); ?></p>

            <h2>Project Gallery</h2>
            <div class="project-gallery-grid">
                <?php
                // Karena di database kita simpan sebagai teks dipisah koma, kita ubah jadi array
                $gallery_images = explode(',', $project['gallery_images']);
                foreach ($gallery_images as $image_url):
                    // trim() untuk menghapus spasi jika ada
                    $trimmed_url = trim($image_url);
                    if (!empty($trimmed_url)):
                ?>
                    <img src="<?php echo htmlspecialchars($trimmed_url); ?>" alt="Gambar galeri untuk <?php echo htmlspecialchars($project['title']); ?>">
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>

            <h2>Technical Details</h2>
            <h3>Technologies Used</h3>
            <div class="tech-tags">
                <?php
                // Lakukan hal yang sama untuk tech tags
                $tech_tags = explode(',', $project['tech_tags']);
                foreach ($tech_tags as $tag):
                    $trimmed_tag = trim($tag);
                    if (!empty($trimmed_tag)):
                ?>
                    <span><?php echo htmlspecialchars($trimmed_tag); ?></span>
                <?php
                    endif;
                endforeach;
                ?>
            </div>

            <h3>Challenges & Solutions</h3>
            <p><?php echo nl2br(htmlspecialchars($project['challenges'])); ?></p>

            <h3>Results & Impact</h3>
            <p><?php echo nl2br(htmlspecialchars($project['results'])); ?></p>
        </div>

        <aside class="project-sidebar">
            <div class="project-info-card">
                <h4>Project Information</h4>
                <ul>
                    <li><strong>Client:</strong> <?php echo htmlspecialchars($project['client']); ?></li>
                    <li><strong>Role:</strong> <?php echo htmlspecialchars($project['role']); ?></li>
                    <li><strong>Timeline:</strong> <?php echo htmlspecialchars($project['timeline']); ?></li>
                    <li><strong>Status:</strong> <span class="status-completed"><?php echo htmlspecialchars($project['status']); ?></span></li>
                </ul>
            </div>

            <div class="related-projects-card">
                <h4>Related Projects</h4>
                <?php
                // Logika untuk menampilkan 2 proyek lain secara acak
                $related_stmt = $mysqli->prepare("SELECT slug, title, role FROM projects WHERE slug != ? ORDER BY RAND() LIMIT 2");
                if ($related_stmt) {
                    $related_stmt->bind_param("s", $project_slug);
                    $related_stmt->execute();
                    $related_result = $related_stmt->get_result();
                    while ($related_project = $related_result->fetch_assoc()) {
                        echo '<a href="project.php?slug='.htmlspecialchars($related_project['slug']).'" class="related-project-link">';
                        echo '<p>'.htmlspecialchars($related_project['title']).'</p>';
                        echo '<span>'.htmlspecialchars($related_project['role']).'</span>';
                        echo '</a>';
                    }
                    $related_stmt->close();
                }
                ?>
            </div>
        </aside>

    </div>
</section>

<?php
// Memuat footer
include 'templates/footer.php';
?>