<?php
require_once 'database/connection.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RePe Fitness - Modern Fitness Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="assets/modern-style.css">
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
	
	<div class="fit-container">
		<img class="fit-image" src="image/anasayfa.jpg" alt="Fitness Image">
		<div class="fit-text">
			<h2>Hazırsan <br> Başlayalım!</h2>
			<p style="margin-top: 15px; color: #666;">Hedeflerinize ulaşmak için doğru yerde olduğunuzdan emin olun</p>
		</div>
	</div>
