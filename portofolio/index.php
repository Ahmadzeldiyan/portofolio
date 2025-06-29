<?php
// index.php (Versi Database)

// 1. Sertakan file koneksi database
require_once 'config.php';

// 2. Ambil data dari database untuk setiap bagian
// Mengambil data SKILLS
$skills_result = $mysqli->query("SELECT * FROM skills ORDER BY id");

// Mengambil data WORK EXPERIENCES
$work_exp_result = $mysqli->query("SELECT * FROM experiences WHERE type = 'work' ORDER BY id");

// Mengambil data ORGANIZATIONAL EXPERIENCES
$org_exp_result = $mysqli->query("SELECT * FROM experiences WHERE type = 'organization' ORDER BY id");

// Mengambil data WORKS (PROJECTS) untuk galeri
$works_result = $mysqli->query("SELECT id, slug, title, category, category_slug, image_url FROM projects ORDER BY id DESC");

// Mengambil data SERVICES
$services_result = $mysqli->query("SELECT * FROM services ORDER BY id");


// 3. Memuat template header
// Kita tidak lagi memuat data/content.php di sini
include 'templates/header-db.php'; // Kita akan buat header versi DB
?>

<section id="home" class="section">
    <div class="hero-section">
        <div class="hero-content">
            <span class="hero-number">01</span>
            <h1 class="hero-title">
                Kenalin, nama ku<br>
                Ahmad Zeldiyan
            </h1>
            <p class="hero-description">
                Seorang mahasiswa dan desainer digital dari Tanjung Pinang.<br>
                Saya mendalami Desain Grafis, Web, dan UI/UX<br>
                Aku juga seorang streamer part time :D
            </p>
            <a href="#contact"><button class="cta-button">Kenali aku</button></a>
        </div>
        <div class="hero-image">
            <div class="hero-photo" style="background-image: url('uploads/foto.jpeg');"></div>
        </div>
        <div class="hero-sidebar">
             <div class="hero-sidebar-item">
                <h4>UI/UX Designer</h4>
                <p>Seorang UI/UX designer<br>yang menguasai perangkat lunak design</p>
            </div>
            <div class="hero-sidebar-item">
                <h4>Video Editor</h4>
                <p>Saya ahli dalam menggunakan<br>alight motion, kinemaster dan capcut</p>
            </div>
            <div class="hero-sidebar-item">
                <h4>Web Designer</h4>
                <p>Total saya sudah membuat<br>6 Project website</p>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section">
    <div class="skills-container">
        <h2 class="section-title">My Skill Set</h2>
        <div class="skills-grid">
            <?php while($skill = $skills_result->fetch_assoc()): ?>
            <div class="skill-card">
                <div class="skill-icon"><i class="<?php echo htmlspecialchars($skill['icon_class']); ?>"></i></div>
                <h3 class="skill-title"><?php echo htmlspecialchars($skill['title']); ?></h3>
                <div class="skill-percentage" data-percentage="<?php echo $skill['percentage']; ?>">0%</div>
                <div class="progress-bar-container">
                    <div class="progress-bar"></div>
                </div>
                <p class="skill-description"><?php echo htmlspecialchars($skill['description']); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section id="experience" class="section">
    <div class="experience-container">
        <h2 class="section-title">Experience & Organization</h2>
        <div class="experience-grid">
            <div class="experience-column">
                <h3 class="experience-subtitle">Work Experience</h3>
                <?php while($exp = $work_exp_result->fetch_assoc()): ?>
                <div class="experience-item">
                    <div class="item-year"><?php echo htmlspecialchars($exp['year_range']); ?></div>
                    <h4 class="item-title"><?php echo htmlspecialchars($exp['title']); ?></h4>
                    <p class="item-description"><?php echo htmlspecialchars($exp['description']); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="experience-column">
                <h3 class="experience-subtitle">Organizational Experience</h3>
                <?php while($org = $org_exp_result->fetch_assoc()): ?>
                <div class="experience-item">
                    <div class="item-year"><?php echo htmlspecialchars($org['year_range']); ?></div>
                    <h4 class="item-title"><?php echo htmlspecialchars($org['title']); ?></h4>
                    <p class="item-description"><?php echo htmlspecialchars($org['description']); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<section id="work" class="section">
    <h1 class="works-section-title">My Recent Works</h1>
    <div class="gallery">
        <?php while($work = $works_result->fetch_assoc()): ?>
        <div class="gallery-item" data-category="<?php echo htmlspecialchars($work['category_slug']); ?>">
            <div class="image-container">
                <img src="<?php echo htmlspecialchars($work['image_url']); ?>" alt="<?php echo htmlspecialchars($work['title']); ?>" class="gallery-image">
                <div class="overlay">
                    <div class="overlay-content">
                        <h3><?php echo htmlspecialchars($work['title']); ?></h3>
                        <p><?php echo htmlspecialchars($work['category']); ?></p>
                        <a href="project.php?slug=<?php echo htmlspecialchars($work['slug']); ?>"><button class="view-btn">View Project</button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="filter-buttons">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="web">Web</button>
        <button class="filter-btn" data-filter="branding">Branding</button>
        <button class="filter-btn" data-filter="food">Food</button>
        <button class="filter-btn" data-filter="portrait">Portrait</button>
    </div>
</section>

<section id="contact" class="section">
    <div class="contact-section">
        <div class="contact-content">
            <div class="contact-map">
                <div class="map-placeholder">
                   <iframe src="https://maps.google.com/maps?q=tanjungpinang&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="contact-form-container">
                <h2 class="contact-title">Hire me</h2>
                <p class="contact-description">
                    Hubungi saya jika Anda tertarik untuk berkolaborasi dalam sebuah proyek, atau hanya untuk menyapa.
                </p>
                <div class="social-links">
                    <a href="https://github.com/Ahmadzeldiyan" target="_blank" class="social-icon" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://instagram.com/iyanzeldiyan_" target="_blank" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
                <form class="contact-form" method="POST" action="index.php#contact">
                    <input type="text" name="fullName" placeholder="Your Full Name" required>
                    <input type="email" name="email" placeholder="Your Email Address" required>
                    <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
                    <button type="submit" name="submit_form" class="submit-button">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section">
    <div class="services-container">
        <h2 class="section-title">Fee & Services</h2>
        <div class="services-grid">
            <?php while($service = $services_result->fetch_assoc()): ?>
            <div class="service-card">
                <h3 class="service-title"><?php echo htmlspecialchars($service['title']); ?></h3>
                <div class="service-price"><?php echo htmlspecialchars($service['price']); ?></div>
                <ul class="service-features">
                    <?php 
                        // Memecah string fitur menjadi array berdasarkan baris baru
                        $features = explode("\n", $service['features']);
                        foreach($features as $feature):
                    ?>
                    <li><?php echo htmlspecialchars(trim($feature)); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#contact" class="service-button">Pesan Sekarang</a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php
// Memuat footer
include 'templates/footer.php';
?>