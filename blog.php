<?php
require_once 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog - RePe Fitness</title>
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

    <div class="blog-container">
        <div class="blog-post" onmouseover="blogHover(this)" onmouseout="blogUnhover(this)">
            <h2 class="blog-title">Günlük Kalori İhtiyacı Hesaplama</h2>
            <p class="blog-date">10 Eylül 2023</p>
            <p class="blog-content">
                Günlük kalori ihtiyacı, kişinin yaşam tarzı, aktivite düzeyi, cinsiyeti, boyu, kilosu ve
                metabolizması gibi birbirinden farklı ve bağımsız bir çok faktöre bağlıdır. Bu faktörleri bir
                fonksiyondan geçirerek kişinin günlük kalori ihtiyacı ortalama olarak belirlenebilir.
            </p>
            <a href="kalori.php">Devamını oku</a>
        </div>
        <div class="blog-post" onmouseover="blogHover(this)" onmouseout="blogUnhover(this)">
            <h2 class="blog-title">Protein Tozu Nedir?</h2>
            <p class="blog-date">15 Eylül 2023</p>
            <p class="blog-content">
                Protein tozu, yüksek protein içeren popüler bir besin takviyesidir. Bu besin takviyeleri, ısı ve enzimler kullanılarak peynir altı suyu gibi besinlerden ayrıştırılan proteinden elde edilir.
            </p>
            <a href="protein.php">Devamını oku</a>
        </div>
        <div class="blog-post" onmouseover="blogHover(this)" onmouseout="blogUnhover(this)">
            <h2 class="blog-title">Vücut Yağ Oranı Hesaplama Formülü</h2>
            <p class="blog-date">20 Eylül 2023</p>
            <p class="blog-content">
                Vücut yağ oranı takibini yapmanın kolay bir yolunu arıyorsanız, vücut çevresi ölçümlerinize bağlı olarak yağ oranınızı öğrenebilirsiniz.
            </p>
            <a href="yağ.php">Devamını oku</a>
        </div>
    
    <div class="blog-post" onmouseover="blogHover(this)" onmouseout="blogUnhover(this)">
        <h2 class="blog-title">Progressive Overload Nedir? Nasıl Uygulanır?</h2>
        <p class="blog-date">15 Eylül 2023</p>
        <p class="blog-content">
            Progressive Overload dilimize, aşamalı aşırı yüklenme veya aşamalı yükleme olarak çevirebileceğimiz, zamana bağlı olarak 
            hareketlerde kullandığını ağırlıkların, tekrarların, set sayılarının arttırılmasıdır.
        </p>
        <a href="prograssive.php">Devamını oku</a>
    </div>
    
</div>
    <script>
        function blogHover(element) {
            element.style.backgroundColor = "#007BFF";
            element.style.transform = "scale(1.05)";
            element.style.transition = "all 0.3s";
            element.style.color = "#fff";
        }

        function blogUnhover(element) {
            element.style.backgroundColor = "#fff";
            element.style.transform = "scale(1)";
            element.style.color = "#000";
        }
    </script>
</body>
</html>