<?php
require_once 'database/connection.php'; //veritabanı bağlantı bilgilerini içeren dosya çağrılır.

if (isset($_GET['adim'])) {
    $adim = $connection->real_escape_string(trim($_GET['adim']));
} else {
    $adim = "";
}

if (isset($_GET['error'])) {
    $error = $connection->real_escape_string(trim($_GET['error']));
} else {
    $error = "";
}
if ($girissorgu == 1){
    header("Location: index.php");//Eğer kullanıcı oturumu zaten açıksa, "index.php" sayfasına yönlendirilir
    exit();
}
switch ($adim) {
    case "":
        ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/modern-style.css">
    <title>Kayıt Ol - RePe Fitness</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 0;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
        }
        
        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .register-header h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
        }
        
        .register-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        .register-body {
            padding: 40px 30px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 15px rgba(102, 126, 234, 0.2);
        }
        
        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .alert-box {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-danger {
            background: #fee;
            color: #c33;
        }
        
        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h2><i class="fas fa-user-plus"></i> Kayıt Ol</h2>
            <p>RePe Fitness'e katıl ve hedeflerine ulaş</p>
        </div>
        
        <div class="register-body">
            <?php if ($error == "1"): ?>
                <div class="alert-box alert-danger">
                    <i class="fas fa-exclamation-circle"></i> Email hesabı hatalı, kontrol ediniz.
                </div>
            <?php elseif ($error == "2"): ?>
                <div class="alert-box alert-danger">
                    <i class="fas fa-exclamation-circle"></i> Boş alan bırakmayınız.
                </div>
            <?php elseif ($error == "3"): ?>
                <div class="alert-box alert-danger">
                    <i class="fas fa-exclamation-circle"></i> Bu email adresi kullanılıyor.
                </div>
            <?php elseif ($error == "4"): ?>
                <div class="alert-box alert-danger">
                    <i class="fas fa-exclamation-circle"></i> Şifreleriniz birbiri ile uyuşmuyor.
                </div>
            <?php endif; ?>
            
            <form method="POST" action="register.php?adim=basarili">
                <div class="form-row">
                    <div class="form-group">
                        <label for="registerFirstName"><i class="fas fa-user"></i> Adınız</label>
                        <input type="text" name="ad" id="registerFirstName" placeholder="Adınız" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="registerLastName"><i class="fas fa-user"></i> Soyadınız</label>
                        <input type="text" name="soyad" id="registerLastName" placeholder="Soyadınız" autocomplete="off" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="registerEmail"><i class="fas fa-envelope"></i> Email Adresiniz</label>
                    <input type="email" name="email" id="registerEmail" placeholder="ornek@email.com" autocomplete="off" required>
                </div>
                
                <div class="form-group">
                    <label for="registerPassword"><i class="fas fa-lock"></i> Şifreniz</label>
                    <input type="password" name="sifre" id="registerPassword" placeholder="Şifreniz" autocomplete="off" required>
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword"><i class="fas fa-lock"></i> Şifrenizi Tekrar Giriniz</label>
                    <input type="password" name="sifretekrar" id="confirmPassword" placeholder="Şifreniz" autocomplete="off" required>
                </div>
                
                <button type="submit" name="kayitol" class="btn-register">
                    <i class="fas fa-user-plus"></i> Kayıt Ol
                </button>
            </form>
            
            <div class="login-link">
                Zaten bir hesabınız var mı? <a href="login.php">Giriş Yap</a>
            </div>
        </div>
    </div>
</body>
</html>

        <?php
        break;
    case 'basarili': 
        if (isset($_POST['kayitol'])) { //formdan gelen ad soyad email sifre bilgileri alınır ve güvenlik amacıyla silinir
            $ad = $connection->real_escape_string(htmlspecialchars($_POST['ad']));
            $soyad = $connection->real_escape_string(htmlspecialchars($_POST['soyad']));
            $email = $connection->real_escape_string(htmlspecialchars($_POST['email']));
            $sifre = $connection->real_escape_string(htmlspecialchars($_POST['sifre']));
            $sifretekrar = $connection->real_escape_string(htmlspecialchars($_POST['sifretekrar']));

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //e-posta adresinin geçerliliği kontrol edilir.
                if (empty($ad) || empty($soyad)) { //Ad ve soyad alanları boş ise, "error=2" parametresi ile bir hata sayfasına yönlendirilir.
                    header("Location: register.php?error=2");
                    exit();
                } else {
                    if ($sifre == $sifretekrar) {
                        $stmt = $connection->prepare("SELECT * FROM hesaplar WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {//Veritabanında e-posta adresi kontrol edilir. Eğer bu e-posta adresi zaten kayıtlı ise, "error=3" parametresi 
                            //ile bir hata sayfasına yönlendirilir. Aksi takdirde, yeni kullanıcı veritabanına eklenir.
                            header("Location: register.php?error=3");
                            exit();
                        } else {
                            // Hash the password before storing
                            $hashed_password = password_hash($sifre, PASSWORD_BCRYPT);
                            $stmt = $connection->prepare("INSERT INTO hesaplar (email, password, name, surname) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("ssss", $email, $hashed_password, $ad, $soyad);
                            $stmt->execute();
                            header("Location: login.php?kayittamamlandi=1");//Veritabanına kayıt işlemi yapılır ve kullanıcı "login.php" sayfasına yönlendirilir.
                            exit();
                        }
                        $stmt->close();
                    } else {
                        header("Location: register.php?error=4");
                        exit();
                    }
                }
            } else {
                header("Location: register.php?error=1");
                exit();
            }
        }
        break;
}
?>
