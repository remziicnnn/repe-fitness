<?php
require_once 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Günlük Kalori İhtiyacı - RePe Fitness</title>
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

    <div style="max-width: 1200px; margin: 20px auto; padding: 20px;">
        <a href="blog.php" class="back-link" style="display: inline-block; margin-bottom: 20px;">
            <i class="fas fa-arrow-left"></i> Geri Dön
        </a>

        <div class="blog-post">
            <h1><i class="fas fa-calculator"></i> Günlük Kalori İhtiyacı Hesaplama</h1>
            
            <div class="blog-post">
                <p>
                    Günlük kalori ihtiyacı, kişinin yaşam tarzı, aktivite düzeyi, cinsiyeti, boyu, kilosu ve
                    metabolizması gibi birbirinden farklı ve bağımsız bir çok faktöre bağlıdır. Bu faktörleri bir
                    fonksiyondan geçirerek kişinin günlük kalori ihtiyacı ortalama olarak belirlenebilir.
                </p>

                <div class="calculator">
                    <h2><i class="fas fa-calculator"></i> Hesaplayın</h2>
                    <div class="form-group">
                        <label><i class="fas fa-weight"></i> Kilo (kg):</label>
                        <input type="number" id="weight" placeholder="örn: 75" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-ruler-vertical"></i> Boy (cm):</label>
                        <input type="number" id="height" placeholder="örn: 175" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-birthday-cake"></i> Yaş:</label>
                        <input type="number" id="age" placeholder="örn: 25" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-venus-mars"></i> Cinsiyet:</label>
                        <select id="gender">
                            <option value="male">Erkek</option>
                            <option value="female">Kadın</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-running"></i> Aktivite:</label>
                        <select id="activity">
                            <option value="1.2">Oturarak Çalışan</option>
                            <option value="1.375">Az Aktif</option>
                            <option value="1.55">Orta Aktif</option>
                            <option value="1.725">Çok Aktif</option>
                        </select>
                    </div>
                    <button onclick="hesapla()" class="btn-login" style="width: 100%;">Hesapla</button>
                    <div id="sonuc" class="result" style="display:none;"></div>
                </div>

                <h2>Kalori İhtiyacı Nasıl Belirlenir?</h2>
                <p>Alınan enerjinin tamamı besinler yoluyla elde edilir. Yediğiniz yemeğin türü ve miktarı, ne kadar kalori alacağınızı belirler.</p>
                
                <h3>Beslenme İpuçları</h3>
                <ul>
                    <li><b>Kahvaltı Yapın:</b> Protein ve sağlıklı yağ içeren bir kahvaltı sizi uzun süre tok tutabilir.</li>
                    <li><b>Düzenli Yemek Yiyin:</b> Kalori ihtiyacınızı etkili şekilde karşılamaya yardımcı olur.</li>
                    <li><b>Meyve ve Sebze:</b> Besin değeri ve lif bakımından zengin, az kalorilidir.</li>
                </ul>

                <h3>Spor ve Kalori İlişkisi</h3>
                <p>Fiziksel aktivite arttıkça kalori ihtiyacı da artar. Ağırlığınız, egzersiz yoğunluğunuz ve antrenman süreniz kalori gereksinimini etkiler.</p>
            </div>
        </div>
    </div>

    <style>
        /* Remove hover effect on blog-post */
        .blog-post:hover::before {
            display: none !important;
        }
        .blog-post {
            cursor: default !important;
        }
    </style>
    <script>
        function hesapla() {
            var w = document.getElementById("weight").value;
            var h = document.getElementById("height").value;
            var a = document.getElementById("age").value;
            var g = document.getElementById("gender").value;
            var act = parseFloat(document.getElementById("activity").value);
            var bmr = g == "male" ? (88.362 + 13.397*w + 4.799*h - 5.677*a) : (447.593 + 9.247*w + 3.098*h - 4.330*a);
            var total = bmr * act;
            document.getElementById("sonuc").innerHTML = "<i class='fas fa-fire'></i> Günlük kalori ihtiyacınız: " + total.toFixed(0) + " kcal";
            document.getElementById("sonuc").style.display = "block";
        }
    </script>
</body>
</html>
