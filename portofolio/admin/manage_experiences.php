<?php
require_once 'check_auth.php';
require_once '../config.php';

// Ambil semua data experiences, diurutkan berdasarkan tipe
$result = $mysqli->query("SELECT * FROM experiences ORDER BY type, id DESC");
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
        <h1>Manage Experiences</h1>
        <a href="experience_form.php" class="add-new">Tambah Experience Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <span class="type-badge <?php echo ($row['type'] == 'work') ? 'type-work' : 'type-organization'; ?>">
                            <?php echo htmlspecialchars($row['type']); ?>
                        </span>
                    </td>
                    <td><?php echo htmlspecialchars($row['year_range']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td class="actions">
                        <a href="experience_form.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="experience_delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>