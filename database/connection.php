<?php
// MySQL veritabanına bağlantı sağladığımız kısım 
//bağlantı kurulamazsa,  "Veritabanı Bağlantısı sağlanamadı" hata mesajıyla  işlem sonlandırılır.
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "hesaplar";

// mysqli kullanarak bağlantı oluşturma
$connection = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($connection->connect_error) {
    die("Veritabanı Bağlantısı sağlanamadı: " . $connection->connect_error);
}

// UTF-8 karakter setini ayarla
$connection->set_charset("utf8");

// Session başlat
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Oturumun var olup olmadığı ve kullanıcının giriş yapıp yapmadığı kontrol edilir.
// Eğer oturum varsa ve kullanıcı giriş yapmışsa, kullanıcı bilgileri veritabanından çekilerek ilgili değişkenlere atanır.
if (isset($_SESSION['login']) && $_SESSION['login'] == 5) {
    $userid = $connection->real_escape_string($_SESSION['userid']);
    $stmt = $connection->prepare("SELECT * FROM hesaplar WHERE userid=?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $uyesonuc = $stmt->get_result();
    $stmt->close();

    if ($uyesonuc && $uyesonuc->num_rows > 0) {
        $user = $uyesonuc->fetch_assoc();
        $a_id = intval($user['userid']);
        $a_ad = $connection->real_escape_string($user['name']);
        $a_soyad = $connection->real_escape_string($user['surname']);
        $a_email = $connection->real_escape_string($user['email']);
        $a_sifre = $user['password']; // Do not escape password hash
        $girissorgu = 1;
    } else {
        $girissorgu = 0;
    }
} else {
    $girissorgu = 0;
}

?>