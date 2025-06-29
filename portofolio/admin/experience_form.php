<?php
require_once 'check_auth.php';
require_once '../config.php';

// Inisialisasi variabel
$experience = [
    'id' => '', 'type' => 'work', 'year_range' => '', 'title' => '', 'description' => ''
];
$page_title = 'Tambah Experience Baru';

// Jika ada ID di URL, berarti ini mode edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM experiences WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $experience = $result->fetch_assoc();
        $page_title = 'Edit Experience';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #1e1e1e; color: #e0e0e0; margin: 0; padding: 0; }
        .container { padding: 20px 30px; }
        .form-container { max-width: 800px; margin: 20px auto; background: #2c2c2c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); }
        h1 { font-size: 28px; font-weight: 600; color: #ffffff; margin-top: 0; margin-bottom: 25px; border-bottom: 1px solid #444; padding-bottom: 15px; }
        
        /* Style untuk Form */
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #ccc; }
        input[type="text"], select, textarea { 
            width: 100%; 
            padding: 12px; 
            background-color: #3a3a3a; 
            border: 1px solid #555; 
            border-radius: 5px; 
            box-sizing: border-box; 
            color: #e0e0e0; 
            font-size: 16px;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #ff4444;
        }
        textarea { 
            resize: vertical; 
            min-height: 120px; 
        }
        .form-buttons { 
            margin-top: 30px; 
        }
        .form-buttons button { 
            background: #28a745; 
            color: white; 
            padding: 12px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-weight: bold;
            font-size: 16px;
        }
        .form-buttons a { 
            display: inline-block; 
            margin-left: 10px; 
            color: #ccc; 
            text-decoration: none; 
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><?php echo $page_title; ?></h1>
            <form action="experience_save.php" method="post">
                <input type="hidden" name="id" value="<?php echo $experience['id']; ?>">
                
                <div class="form-group">
                    <label for="type">Tipe Experience</label>
                    <select id="type" name="type" required>
                        <option value="work" <?php if ($experience['type'] == 'work') echo 'selected'; ?>>Work Experience</option>
                        <option value="organization" <?php if ($experience['type'] == 'organization') echo 'selected'; ?>>Organizational Experience</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="year_range">Tahun (Contoh: 2023 - Present)</label>
                    <input type="text" id="year_range" name="year_range" value="<?php echo htmlspecialchars($experience['year_range']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($experience['title']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="5"><?php echo htmlspecialchars($experience['description']); ?></textarea>
                </div>

                <div class="form-buttons">
                    <button type="submit">Simpan Perubahan</button>
                    <a href="manage_experiences.php">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>