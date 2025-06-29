<?php
// /articles.php (Versi Database)

// 1. Hubungkan ke database dan header
require_once 'config.php';
require_once 'templates/header-db.php';

// 2. Ambil semua data artikel dari tabel `articles`
$result = $mysqli->query("SELECT * FROM articles ORDER BY published_date DESC");
?>

<section class="page-header">
    <div class="page-header-container">
        <h1>My Articles</h1>
        <p class="subtitle">Wawasan tentang Desain, Teknologi, dan Proses Kreatif.</p>
    </div>
</section>

<section class="articles-section">
    <div class="articles-container">
        <div class="articles-grid">

            <?php while($article = $result->fetch_assoc()): ?>
            <article class="article-card">
                <a href="article-detail.php?slug=<?php echo htmlspecialchars($article['slug']); ?>" class="article-link">
                    <div class="article-image">
                        <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                    </div>
                    <div class="article-content">
                        <span class="article-category"><?php echo htmlspecialchars($article['category']); ?></span>
                        <h3 class="article-title"><?php echo htmlspecialchars($article['title']); ?></h3>
                        <p class="article-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                        <div class="article-meta">
                            <span><?php echo date('d F Y', strtotime($article['published_date'])); ?></span>
                        </div>
                    </div>
                </a>
            </article>
            <?php endwhile; ?>

        </div>
    </div>
</section>

<?php
// Memuat footer
include 'templates/footer.php';
?>