<?php
require_once 'check_auth.php';
require_once '../config.php';

$skill = [
    'id' => '', 'icon_class' => '', 'title' => '', 'percentage' => '', 'description' => ''
];
$page_title = 'Tambah Skill Baru';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM skills WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $skill = $result->fetch_assoc();
        $page_title = 'Edit Skill';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $page_title; ?></title>
     <style>
        /* ... (copy style dari dashboard.php atau buat file css terpisah) ... */
    </style>
</head>
<body>
    <header class="header">
        <h1><?php echo $page_title; ?></h1>
        <a href="manage_skills.php">Kembali</a>
    </header>
    <div class="container">
        <form action="skill_save.php" method="post">
            <input type="hidden" name="id" value="<?php echo $skill['id']; ?>">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($skill['title']); ?>" required>
            </div>
            <div class="form-group">
                <label>Kelas Ikon (contoh: fa-solid fa-code)</label>
                <input type="text" name="icon_class" value="<?php echo htmlspecialchars($skill['icon_class']); ?>">
            </div>
            <div class="form-group">
                <label>Persentase</label>
                <input type="number" name="percentage" value="<?php echo htmlspecialchars($skill['percentage']); ?>" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" rows="5"><?php echo htmlspecialchars($skill['description']); ?></textarea>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>