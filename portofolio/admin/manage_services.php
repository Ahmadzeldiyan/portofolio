<?php
require_once 'check_auth.php';
require_once '../config.php';

// Ambil semua data services dari database
$result = $mysqli->query("SELECT * FROM services ORDER BY id");
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
        <h1>Manage Services</h1>
        <a href="service_form.php" class="add-new">Tambah Layanan Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td class="actions">
                        <a href="service_form.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="service_delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Anda yakin ingin menghapus layanan ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>