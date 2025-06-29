<?php
require_once 'check_auth.php';
require_once '../config.php';

// Ambil semua data skills dari database
$result = $mysqli->query("SELECT * FROM skills ORDER BY id");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="admin_style.css"> 
</head>
<body>
    <div class="container">
        <h1>Manage Skills</h1>
        <a href="skill_edit.php" class="add-new">Tambah Skill Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ikon</th>
                    <th>Judul</th>
                    <th>Persentase</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><i class="<?php echo htmlspecialchars($row['icon_class']); ?>"></i></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo $row['percentage']; ?>%</td>
                    <td class="actions">
                        <a href="skill_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="skill_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus skill ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>