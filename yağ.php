<?php
require_once 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vücut Yağ Oranı - RePe Fitness</title>
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
            <h1><i class="fas fa-percentage"></i> Vücut Yağ Oranı Hesaplama</h1>
            
            <p>Vücut çevresi ölçümlerinize bağlı olarak yağ oranınızı öğrenebilirsiniz. Amerikan Diyabet Derneği tarafından doğrulanan vücut yağ oranı formülünü uygulayarak kendi vücut yağı takibinizi sağlayabilirsiniz.</p>

            <h2>Gerekli Ölçümler</h2>
            <ul>
                <li>Cinsiyet</li>
                <li>Boy</li>
                <li>Boyun çevresi (cm)</li>
                <li>Bel çevresi (cm)</li>
                <li>Kalça çevresi (cm) - kadın için</li>
            </ul>

            <div class="calculator">
                <h2><i class="fas fa-calculator"></i> Yağ Oranı Hesaplayıcı</h2>
                <div class="form-group">
                    <label><i class="fas fa-venus-mars"></i> Cinsiyet:</label>
                    <select id="gender">
                        <option value="male">Erkek</option>
                        <option value="female">Kadın</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-ruler-vertical"></i> Boy (cm):</label>
                    <input type="number" id="height" placeholder="örn: 175" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-weight"></i> Bel Çevresi (cm):</label>
                    <input type="number" id="waist" placeholder="örn: 85" required>
                </div>
                <div class="form-group" id="hipDiv" style="display:none;">
                    <label><i class="fas fa-weight"></i> Kalça Çevresi (cm):</label>
                    <input type="number" id="hip" placeholder="örn: 95">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-weight"></i> Boyun Çevresi (cm):</label>
                    <input type="number" id="neck" placeholder="örn: 38" required>
                </div>
                <button onclick="hesapla()" class="btn-login" style="width: 100%;">Hesapla</button>
                <div id="sonuc" class="result" style="display:none;"></div>
            </div>

            <h3>Önemli Notlar</h3>
            <p>Bu tür ölçümler her zaman kesin sonuç vermeyebilir, ancak vücut yağ oranı değişikliklerinizi izlemek için kullanabilirsiniz.</p>
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
        document.getElementById("gender").addEventListener("change", function() {
            document.getElementById("hipDiv").style.display = this.value === "female" ? "block" : "none";
        });

        function hesapla() {
            var g = document.getElementById("gender").value;
            var h = parseFloat(document.getElementById("height").value);
            var w = parseFloat(document.getElementById("waist").value);
            var n = parseFloat(document.getElementById("neck").value);
            var hi = parseFloat(document.getElementById("hip").value) || 0;
            var r;

            if(g == "male") {
                r = 495 / (1.0324 - 0.19077 * Math.log10(w - n) + 0.15456 * Math.log10(h)) - 450;
            } else {
                r = 495 / (1.29579 - 0.35004 * Math.log10(w + hi - n) + 0.22100 * Math.log10(h)) - 450;
            }

            document.getElementById("sonuc").innerHTML = "<i class='fas fa-percentage'></i> Vücut yağ oranınız: " + r.toFixed(2) + "%";
            document.getElementById("sonuc").style.display = "block";
        }
    </script>
</body>
</html>
