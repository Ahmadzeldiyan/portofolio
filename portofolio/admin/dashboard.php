<?php
require_once 'check_auth.php'; // Panggil pengecek login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="admin-wrapper">
        
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
                <a href="../index.php" target="_blank">Lihat Website</a>
            </div>
            <ul class="sidebar-nav">
                <li><a href="manage_skills.php" target="content-frame" class="nav-link active">Kelola Skills</a></li>
                <li><a href="manage_experiences.php" target="content-frame" class="nav-link">Kelola Experience</a></li>
                <li><a href="manage_projects.php" target="content-frame" class="nav-link">Kelola Projects</a></li>
                <li><a href="manage_articles.php" target="content-frame" class="nav-link">Kelola Articles</a></li>
                <li><a href="manage_services.php" target="content-frame" class="nav-link">Kelola Services</a></li>
            </ul>
            <div class="sidebar-footer">
                <p>Login sebagai: <strong><?php echo htmlspecialchars($_SESSION['admin_username']); ?></strong></p>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </aside>

        <main class="admin-main-content">
            <iframe name="content-frame" src="manage_skills.php" class="content-frame"></iframe>
        </main>

    </div> <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    event.currentTarget.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>