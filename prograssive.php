<?php
require_once 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progressive Overload - RePe Fitness</title>
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
            <h1><i class="fas fa-chart-line"></i> Progressive Overload</h1>
            <img src="image/progressive_overload_1.jpg" alt="Progressive Overload" style="width: 100%; border-radius: 10px; margin: 20px 0;">
            
            <p>Progressive Overload, aşamalı aşırı yüklenme veya aşamalı yükleme olarak çevirebileceğimiz, zamana bağlı olarak hareketlerde kullandığınız ağırlıkların, tekrarların, set sayılarının arttırılmasıdır.</p>

            <h2><i class="fas fa-lightbulb"></i> Neden Önemli?</h2>
            <p>Antrenman yoğunluğunuzu arttırdıkça vücut da zamanla uyum sağlayacağı için sürekli bir artış söz konusu olacaktır. Bu durumda kas dokusunun gelişmesinde ve büyümesinde kas kütlesi artışına sebep olacaktır.</p>

            <div class="blog-post" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin: 20px 0;">
                <h3><i class="fas fa-arrow-up"></i> Doğrusal Yükleme</h3>
                <p>Bu yaklaşımda ağırlıklar, setler ve tekrarlar doğrusal oranda arttırılır. Kaslarınızda sürekli bir gerilim artışı olacağı için kas kazanımı da artış sağlar. Örneğin başlangıç seviyesinde düşük ağırlık ve yüksek tekrar ile başlamalısınız.</p>
            </div>

            <div class="blog-post" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin: 20px 0;">
                <h3><i class="fas fa-exchange-alt"></i> Ters Yükleme</h3>
                <p>Bu antrenman tarzında sürekli artış sağlamak yerine, ağırlığı bazı hafta arttırabilir veya düşürebilirsiniz. Vücuda dinlenmesi gereken süreyi tanımış olursunuz. Uzun vadede en iyi gelişimi elde edersiniz.</p>
            </div>

            <h3><i class="fas fa-check-circle"></i> Özet</h3>
            <p>Progressive Overload, kas gelişimi için en temel prensiplerden biridir. Antrenmanlarınızda sistematik olarak ağırlık, tekrar veya set sayınızı artırarak sürekli ilerleme kaydetmenizi sağlar. Bu strateji sayesinde kas kütlenizi ve gücünüzü artırabilirsiniz.</p>
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
