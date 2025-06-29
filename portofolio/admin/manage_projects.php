<?php
require_once 'check_auth.php';
require_once '../config.php';

// Ambil data proyek yang penting untuk ditampilkan di daftar
$result = $mysqli->query("SELECT id, slug, title, category, image_url FROM projects ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Manage Projects</title>
    <link rel="stylesheet" href="admin_style.css">
    <style>
        .container { padding: 20px; }
        h1 { margin-bottom: 20px; }
        .add-new { display: inline-block; margin-bottom: 20px; background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: middle; }
        th { background: #f2f2f2; }
        td img { max-width: 120px; height: auto; border-radius: 4px; }
        .actions a { margin-right: 10px; text-decoration: none; }
        .actions a.edit { color: #007bff; }
        .actions a.delete { color: #dc3545; }
    </style>
</head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="admin_style.css"> 
</head>
<body>
    <div class="container">
        <h1>Manage Projects</h1>
        <a href="project_form.php" class="add-new">Tambah Proyek Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <?php if(!empty($row['image_url']) && file_exists('../' . $row['image_url'])): ?>
                            <img src="../<?php echo htmlspecialchars($row['image_url']); ?>" alt="Project Image">
                        <?php else: ?>
                            <small>Tidak ada gambar</small>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['slug']); ?></td>
                    <td class="actions">
                        <a href="project_form.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="project_delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Anda yakin ingin menghapus proyek ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>