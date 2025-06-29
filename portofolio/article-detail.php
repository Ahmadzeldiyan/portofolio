<?php
// /article-detail.php (Versi Database)

// 1. Hubungkan ke database dan header
require_once 'config.php';
require_once 'templates/header-db.php';

// 2. Ambil slug artikel dari URL
$article_slug = isset($_GET['slug']) ? $_GET['slug'] : '';
$article = null;

if ($article_slug) {
    // 3. Gunakan prepared statement untuk keamanan
    $stmt = $mysqli->prepare("SELECT * FROM articles WHERE slug = ?");
    $stmt->bind_param("s", $article_slug);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    }
    $stmt->close();
}

// 4. Jika artikel tidak ditemukan, tampilkan pesan error
if (!$article) {
    echo "<section class='page-header'><h1>Artikel Tidak Ditemukan</h1><p>Maaf, artikel yang Anda cari tidak ada.</p></section>";
    include 'templates/footer.php';
    exit();
}
?>

<style>
    .article-detail-container { max-width: 800px; margin: 0 auto; padding: 40px 20px; text-align: left; }
    .article-header-detail { margin-bottom: 40px; }
    .article-header-detail .article-category { display: inline-block; padding: 5px 12px; background-color: rgba(255, 68, 68, 0.1); color: #ff4444; border-radius: 15px; font-size: 14px; font-weight: bold; margin-bottom: 15px; }
    .article-header-detail h1 { font-size: 2.5rem; margin-bottom: 15px; line-height: 1.2; }
    .article-header-detail .article-meta { color: #888; font-size: 1rem; }
    .article-main-image { width: 100%; height: auto; border-radius: 10px; margin-bottom: 40px; }
    .article-body-content { font-size: 1.1rem; line-height: 1.7; color: #cccccc; }
    .article-body-content p, .article-body-content h3, .article-body-content ol { margin-bottom: 20px; }
    .article-body-content h3 { color: #fff; font-size: 1.5rem; }
    .article-body-content ol { padding-left: 20px; }
</style>

<div class="article-detail-container">
    <header class="article-header-detail">
        <span class="article-category"><?php echo htmlspecialchars($article['category']); ?></span>
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <div class="article-meta">
            Dipublikasikan pada <?php echo date('d F Y', strtotime($article['published_date'])); ?>
        </div>
    </header>

    <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="article-main-image">

    <div class="article-body-content">
        <?php echo $article['full_content']; // Tidak menggunakan htmlspecialchars agar tag <p>, <h3>, dll. bisa terbaca ?>
    </div>
    
    <a href="articles.php" style="color: #ff4444; margin-top: 40px; display: inline-block;">&larr; Kembali ke Daftar Artikel</a>
</div>

<?php
// Memuat footer
include 'templates/footer.php';
?>