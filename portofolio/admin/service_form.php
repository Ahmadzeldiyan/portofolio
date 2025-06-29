<?php
require_once 'check_auth.php';
require_once '../config.php';

// Inisialisasi variabel layanan kosong
$service = [
    'id' => '', 'title' => '', 'price' => '', 'features' => ''
];
$page_title = 'Tambah Layanan Baru';

// Jika mode edit, ambil data dari database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
        $page_title = 'Edit Layanan';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="admin_style.css">
    <style>
        .container { padding: 20px; }
        .form-container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 5px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px; box-sizing: border-box; }
        textarea { resize: vertical; min-height: 150px; }
        button { background: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><?php echo $page_title; ?></h1>
            <form action="service_save.php" method="post">
                <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                
                <div class="form-group">
                    <label>Judul Layanan</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($service['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Harga (contoh: Mulai dari Rp 500.000)</label>
                    <input type="text" name="price" value="<?php echo htmlspecialchars($service['price']); ?>">
                </div>
                <div class="form-group">
                    <label>Fitur Layanan (satu fitur per baris)</label>
                    <textarea name="features" rows="8"><?php echo htmlspecialchars($service['features']); ?></textarea>
                </div>
                
                <button type="submit">Simpan Layanan</button>
                <a href="manage_services.php" style="margin-left: 10px;">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>