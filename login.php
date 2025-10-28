<?php

require_once 'database/connection.php';//veritabanı bağlantı bilgilerini içeren dosya çağrılır.

if (isset($_GET['adim'])) { // parametrelerin varlığı kontrol edilir. 
  // Eğer varsa, değerler alınır ve boşluklar temizlenir. Eğer yoksa,  değişkenlere boş bir string atanır.
    $adim = $connection->real_escape_string(trim($_GET['adim']));
} else {
    $adim = "";
}

if (isset($_GET['error'])) {
    $error = $connection->real_escape_string(trim($_GET['error']));
} else {
    $error = "";
}
if (isset($_GET['kayittamamlandi'])) {
  $kayittamamlandi = $connection->real_escape_string(trim($_GET['kayittamamlandi']));
} else {
  $kayittamamlandi = "";
}
// Kullanıcı zaten giriş yapmışsa ana sayfaya yönlendirir.
// html kodları
switch ($adim) {
    case "":
        if ($girissorgu == 1){
            header("Location: index.php");
            exit();
        }

        if ($error == "1") {
            echo 'Hata1';
        } elseif ($error == "2") {
            echo 'Hata2';
        }
        if ($kayittamamlandi == "1") { // kayıt olduğumuzda ekrana çıkan yazı
          echo '<script>alert("Kaydınız Başarıyla Tamamlandı Lütfen Giriş Yapınız.")</script>';
        }
        ?>
        
     
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="assets/modern-style.css">
  <title>Giriş Yap - RePe Fitness</title>
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    
    .login-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 0;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.3);
      overflow: hidden;
      max-width: 500px;
      width: 100%;
    }
    
    .login-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 40px 30px;
      text-align: center;
      color: white;
    }
    
    .login-header h2 {
      margin: 0;
      font-size: 2rem;
      font-weight: 700;
    }
    
    .login-header p {
      margin: 10px 0 0 0;
      opacity: 0.9;
    }
    
    .login-body {
      padding: 40px 30px;
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
    
    .btn-login {
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
    
    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
    }
    
    .register-link {
      text-align: center;
      margin-top: 20px;
      color: #666;
    }
    
    .register-link a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h2><i class="fas fa-sign-in-alt"></i> Giriş Yap</h2>
      <p>Hesabınıza giriş yapın ve programınıza devam edin</p>
    </div>
    
    <div class="login-body">
      <?php if (isset($error) && $error == "1"): ?>
        <div style="background: #fee; color: #c33; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
          <i class="fas fa-exclamation-circle"></i> Email veya şifre hatalı!
        </div>
      <?php endif; ?>
      
      <?php if (isset($error) && $error == "2"): ?>
        <div style="background: #fee; color: #c33; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
          <i class="fas fa-exclamation-circle"></i> Lütfen tüm alanları doldurun!
        </div>
      <?php endif; ?>
      
      <form action="login.php?adim=basarili" method="POST">
        <div class="form-group">
          <label for="loginEmail"><i class="fas fa-envelope"></i> Email Adresiniz</label>
          <input type="email" id="loginEmail" autocomplete="off" name="email" required>
        </div>
        
        <div class="form-group">
          <label for="loginPassword"><i class="fas fa-lock"></i> Şifreniz</label>
          <input type="password" id="loginPassword" autocomplete="off" name="password" required>
        </div>
        
        <button type="submit" class="btn-login" name="login">
          <i class="fas fa-sign-in-alt"></i> Giriş Yap
        </button>
      </form>
      
      <div class="register-link">
        Hesabınız yok mu? <a href="register.php">Kayıt Olun</a>
      </div>
    </div>
  </div>
</body>
</html>

        <?php

        break;

    case "basarili":
   
        if (isset($_POST['login'])) {//"login" adlı submit butonunun gönderilip gönderilmediği kontrol edilir.
            $email = $connection->real_escape_string(htmlspecialchars($_POST['email']));//Formdan gelen e-posta ve şifre verileri alınır ve güvenlik amacıyla temizlenir.
            $sifre = $connection->real_escape_string(htmlspecialchars($_POST['password']));

            if ($email == "" OR $sifre == "" OR $email == " ") {//E-posta veya şifre alanlarından biri boş ise veya sadece boşluk içeriyorsa,
              //"error=2" parametresi ile bir hata sayfasına yönlendirilir.
                header("Location: login.php?error=2");
                exit();
            } else {

              //e-posta adresinin geçerliliği kontrol edilir. Geçerli değilse, "error=1" parametresi ile bir hata sayfasına yönlendirilir.
              //Veritabanında kullanıcının e-posta ve şifresini kontrol eden bir sorgu yapılır. Sorgu başarılıysa ve kullanıcı bulunursa, oturum bilgileri
              // oluşturulur ve kullanıcı "index.php" sayfasına yönlendirilir. 
              //Eğer sorgu başarısız olursa, bir hata mesajı görüntülenir.
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $stmt = $connection->prepare("SELECT * FROM hesaplar WHERE email=?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        // Verify password using password_verify
                        if (password_verify($sifre, $user['password'])) {
                            $_SESSION['userid'] = $user['userid'];
                            $_SESSION['login'] = 5;
                            header("Location: index.php"); // index sayfasına git 
                            exit();
                        } else {
                            header("Location: login.php?error=1");
                            exit();
                        }
                    } else {
                        header("Location: login.php?error=1");
                        exit();
                    }

                } else {
                    header("Location: login.php?error=1");
                    exit();
                }
            }
        }
        break;
}

?>
