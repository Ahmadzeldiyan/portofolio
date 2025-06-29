<?php
require_once 'check_auth.php';
require_once '../config.php';

// Ambil semua data artikel dari database
$result = $mysqli->query("SELECT id, title, category, published_date, image_url FROM articles ORDER BY published_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="admin_style.css"> 
</head>
<body>
    <div class="container">
        <h1>Manage Articles</h1>
        <a href="article_form.php" class="add-new">Tambah Artikel Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal Publikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <?php if(!empty($row['image_url']) && file_exists('../' . $row['image_url'])): ?>
                            <img src="../<?php echo htmlspecialchars($row['image_url']); ?>" alt="Article Image">
                        <?php else: ?>
                            <small>Tidak ada gambar</small>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo date('d M Y', strtotime($row['published_date'])); ?></td>
                    <td class="actions">
                        <a href="article_form.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="article_delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>