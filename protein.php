<?php
require_once 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protein Tozu - RePe Fitness</title>
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
                
                <?php if ($girissorgu == 1): ?>
                    <a href="profile.php" class="btn-primary"><i class="fas fa-user-circle"></i> Profilim</a>
                <?php else: ?>
                    <a href="login.php" class="login-link"><i class="fas fa-sign-in-alt"></i> Giriş Yap</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <div style="max-width: 1200px; margin: 20px auto; padding: 20px;">
        <a href="blog.php" class="back-link" style="display: inline-block; margin-bottom: 20px;">
            <i class="fas fa-arrow-left"></i> Geri Dön
        </a>

        <div class="blog-post">
            <h1><i class="fas fa-pills"></i> Protein Tozu Nedir?</h1>
            <img src="image/protein-tozu.jpg" alt="Protein Tozu" style="width: 100%; border-radius: 10px; margin: 20px 0;">
            
            <p>Protein tozu, yüksek protein içeren popüler bir besin takviyesidir. Bu besin takviyeleri, ısı ve enzimler kullanılarak peynir altı suyu gibi besinlerden ayrıştırılan proteinden elde edilir.</p>

            <h2><i class="fas fa-list"></i> Protein Tozu Çeşitleri</h2>
            <p><b>1. Peynir Altı Suyu (Whey):</b> Sporcular arasındaki en popüler protein tozu çeşitlerinden biridir. Tam bir protein deposudur ve insan vücudunun ihtiyaç duyduğu tüm amino asitleri içerir.</p>
            
            <p><b>2. Kazein:</b> Egzersizden sonra kaslardaki iyileşmeyi hızlandırabilen bir amino asit olan glutamin içerir. Vücut kazeini yavaş sindirdiği için gece kullanılması önerilir.</p>
            
            <p><b>3. Soya:</b> Vegan veya süt alerjisi olan kişiler için harika bir seçenektir. Soyada vücut için gerekli olan tüm amino asitler mevcuttur.</p>
            
            <p><b>4. Bezelye:</b> Bitkisel içeriklere sahip protein tozlarının çoğu, süt veya soya proteinlerine etkili bir alternatif sunar. L-arginin açısından zengindir.</p>
            
            <p><b>5. Kenevir:</b> Tam protein kaynaklarındandır. Veganlar ve süt alerjisi olanlar için iyi bir seçimdir.</p>

            <h2><i class="fas fa-check-circle"></i> Ne İşe Yarar?</h2>
            <p>Protein tozunun en temel işlevi, kilo vermeye ve kas kütlesinin geliştirmeye yardımcı olmaktır. Kaslarınızda oluşan mikro yırtılmalar iyileştikçe kaslarınız güçlenir ve kas kütleniz artar.</p>

            <h3><i class="fas fa-question-circle"></i> Nasıl Kullanılır?</h3>
            <p>Protein tozunu suyla karıştırabilir veya süt, Hindistan cevizi suyu gibi aromallarla lezzetlendirerek sağlıklı smoothieler hazırlayarak kullanabilirsiniz.</p>

            <h4><i class="fas fa-clock"></i> Ne Zaman Kullanmalı?</h4>
            <p>Antrenman sonrası en iyi zamandır. Antrenmanınızı tamamladıktan sonraki 30 dakika içinde soğuk su veya sütle karıştırılmış bir whey protein tozu tüketmek kan dolaşımınızı, yeni kas dokusu haline gelmek üzere olan amino asitlerle doldurarak iyileşmeyi başlatabilir.</p>
            
            <img src="image/protein-tozu2.jpg" alt="Protein Kullanımı" style="width: 100%; border-radius: 10px; margin: 20px 0;">
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
</body>
</html>
