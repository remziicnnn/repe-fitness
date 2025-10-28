<?php
require_once 'database/connection.php';

// Giriş kontrolü
if ($girissorgu != 1) {
    header("Location: login.php");
    exit();
}

// Program kaydetme işlemi
if (isset($_POST['save_program'])) {
    $egzersiz_adi = $connection->real_escape_string(trim($_POST['egzersiz_adi']));
    $set_sayisi = intval($_POST['set_sayisi']);
    $tekrar_sayisi = intval($_POST['tekrar_sayisi']);
    
    if (!empty($egzersiz_adi) && $set_sayisi > 0 && $tekrar_sayisi > 0) {
        $stmt = $connection->prepare("INSERT INTO programlar (userid, egzersiz_adi, set_sayisi, tekrar_sayisi) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isii", $a_id, $egzersiz_adi, $set_sayisi, $tekrar_sayisi);
        $stmt->execute();
        $stmt->close();
        
        header("Location: program.php?success=1");
        exit();
    } else {
        $error = "Lütfen tüm alanları doldurun.";
    }
}

// Program silme işlemi
if (isset($_GET['delete'])) {
    $program_id = intval($_GET['delete']);
    $stmt = $connection->prepare("DELETE FROM programlar WHERE id = ? AND userid = ?");
    $stmt->bind_param("ii", $program_id, $a_id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: program.php?success=2");
    exit();
}

// Kullanıcının programlarını getir
$stmt = $connection->prepare("SELECT * FROM programlar WHERE userid = ? ORDER BY id DESC");
$stmt->bind_param("i", $a_id);
$stmt->execute();
$programs_result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Program Oluştur - RePe Fitness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="assets/modern-style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<img src="image/aslan.jpg" alt="RePe Fitness Logo">
				<h1 class="site-title">RePe Fitness</h1>
			</div>
			
			<nav>
				<a href="index.php"><i class="fas fa-home"></i> Ana Sayfa</a>
				<a href="egzersiz.php"><i class="fas fa-dumbbell"></i> Egzersizler</a>
				<a href="program.php"><i class="fas fa-calendar-check"></i> Program Oluştur</a>
				<a href="blog.php"><i class="fas fa-blog"></i> Blog</a>
				
				<?php
				if ($girissorgu == 1) {
					echo '<a href="profile.php" class="btn-primary"><i class="fas fa-user-circle"></i> Profilim</a>';
				} else {
					echo '<a href="login.php" class="login-link"><i class="fas fa-sign-in-alt"></i> Giriş Yap</a>';
				}
				?>
			</nav>
		</div>
	</header>

    <div style="max-width: 1200px; margin: 50px auto; padding: 20px;">
        <h1 style="text-align: center; color: #667eea; margin-bottom: 30px;"><i class="fas fa-calendar-check"></i> Program Oluştur</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <?php 
                if ($_GET['success'] == 1) echo "Program başarıyla kaydedildi!";
                if ($_GET['success'] == 2) echo "Program başarıyla silindi!";
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="program-form-container" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin-bottom: 30px;">
            <h2 style="color: #667eea; margin-bottom: 20px;"><i class="fas fa-plus-circle"></i> Yeni Egzersiz Ekle</h2>
            <form method="POST" action="program.php">
                <div class="form-group">
                    <label><i class="fas fa-dumbbell"></i> Egzersiz Adı:</label>
                    <input type="text" name="egzersiz_adi" class="form-control" required placeholder="örn: Bench Press">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-layer-group"></i> Set Sayısı:</label>
                    <input type="number" name="set_sayisi" class="form-control" required min="1" placeholder="örn: 3">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-redo"></i> Tekrar Sayısı:</label>
                    <input type="number" name="tekrar_sayisi" class="form-control" required min="1" placeholder="örn: 10">
                </div>
                <button type="submit" name="save_program" class="btn btn-primary btn-block" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px; border-radius: 10px; font-weight: 600; font-size: 1.1rem;">
                    <i class="fas fa-save"></i> Kaydet
                </button>
            </form>
        </div>
        
        <div class="program-table-container" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
            <h2 style="color: #667eea; margin-bottom: 20px;"><i class="fas fa-list"></i> Mevcut Programlarım</h2>
            
            <?php if ($programs_result->num_rows > 0): ?>
                <table class="program-table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                            <th style="padding: 15px; text-align: left;">Egzersiz Adı</th>
                            <th style="padding: 15px; text-align: center;">Set</th>
                            <th style="padding: 15px; text-align: center;">Tekrar</th>
                            <th style="padding: 15px; text-align: center;">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($program = $programs_result->fetch_assoc()): ?>
                            <tr style="border-bottom: 1px solid #e0e0e0;">
                                <td style="padding: 15px;"><?php echo htmlspecialchars($program['egzersiz_adi']); ?></td>
                                <td style="padding: 15px; text-align: center;"><?php echo $program['set_sayisi']; ?></td>
                                <td style="padding: 15px; text-align: center;"><?php echo $program['tekrar_sayisi']; ?></td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="program.php?delete=<?php echo $program['id']; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bu programı silmek istediğinizden emin misiniz?')"
                                       style="background: #e74c3c; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
                                        <i class="fas fa-trash"></i> Sil
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #888;">
                    <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 20px;"></i>
                    <p>Henüz programınız yok. Üstteki formdan egzersiz ekleyebilirsiniz.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>
