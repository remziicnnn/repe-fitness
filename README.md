# 🏋️ RePe Fitness

<div align="center">

![RePe Fitness](https://img.shields.io/badge/RePe-Fitness-purple?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

**Modern ve kullanıcı dostu fitness platformu**

[Özellikler](#-özellikler) • [Kurulum](#-kurulum) • [Kullanım](#-kullanım) • [Ekran Görüntüleri](#-ekran-görüntüleri)

</div>

---

## 📋 İçindekiler

- [Hakkında](#-hakkında)
- [Özellikler](#-özellikler)
- [Teknolojiler](#-teknolojiler)
- [Kurulum](#-kurulum)
- [Veritabanı Yapısı](#-veritabanı-yapısı)
- [Kullanım](#-kullanım)
- [Güvenlik](#-güvenlik)
- [Katkıda Bulunma](#-katkıda-bulunma)

---

## 🎯 Hakkında

RePe Fitness, kullanıcıların fitness hedeflerine ulaşmalarına yardımcı olan kapsamlı bir web platformudur. Modern tasarımı, kullanıcı dostu arayüzü ve güçlü özellikleriyle hem yeni başlayanlara hem de deneyimli sporculara hitap eder.

### ✨ Neden RePe Fitness?

- 🎨 **Modern Tasarım**: Gradient renkler ve smooth animasyonlarla zenginleştirilmiş arayüz
- 📱 **Responsive**: Tüm cihazlarda mükemmel çalışma
- 🔒 **Güvenli**: Bcrypt hash ile şifre güvenliği
- 💾 **Veritabanı Destekli**: Programlarınız kalıcı olarak saklanır
- 🧮 **Hesap Makineleri**: Kalori ve vücut yağ oranı hesaplayıcıları
- 📝 **Kişisel Programlar**: Kendi antrenman programınızı oluşturun

---

## 🚀 Özellikler

### 👤 Kullanıcı Yönetimi
- ✅ Güvenli kayıt ve giriş sistemi
- 🔐 Bcrypt hash ile şifre koruması
- 📧 Email doğrulama
- 👨‍💼 Kullanıcı profili yönetimi

### 💪 Egzersizler
- 🎯 Kategori bazlı egzersizler
- 🖼️ Görsel açıklamalar
- 🔍 Kolay gezinme
- 📂 Biceps, Triceps, Omuz, Sırt, Bacak kategorileri

### 📅 Program Oluşturma
- ➕ Kişisel program oluşturma
- 💾 Veritabanında saklama
- 🗑️ Program silme
- 📊 Detaylı program görüntüleme

### 📊 Hesap Makineleri
- 🔥 **Günlük Kalori İhtiyacı**: BMI'ye göre kalori hesaplama
- 📏 **Vücut Yağ Oranı**: Amerikan Diyabet Derneği formülü ile hesaplama

### 📚 Blog ve İçerik
- 📖 Egzersiz içerikleri
- 💊 Comparison Overview: Protein tozu bilgileri
- 📈 Progressive Overload teknikleri
- 🎓 Fitness ipuçları

---

## 🛠️ Teknolojiler

- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript
- **Libraries**: Font Awesome Icons
- **Security**: Bcrypt, Prepared Statements
- **Server**: Apache (XAMPP)

---

## 📦 Kurulum

### Gereksinimler

- PHP 7.4 veya üzeri
- MySQL 5.7 veya üzeri
- Apache Web Server
- XAMPP (önerilen)

### Adım 1: Dosyaları İndirin

```bash
git clone https://github.com/KULLANICI_ADINIZ/repe-fitness.git
cd repe-fitness
```

### Adım 2: XAMPP'ı Başlatın

1. XAMPP Control Panel'i açın
2. Apache'yi başlatın
3. MySQL'i başlatın

### Adım 3: Projeyi Kopyalayın

Projeyi `C:\xampp\htdocs\` klasörüne kopyalayın

### Adım 4: Veritabanı Oluşturun

1. Tarayıcınızda `http://localhost/phpmyadmin` adresini açın
2. Sol menüden "Yeni" butonuna tıklayın
3. Veritabanı adı: `hesaplar`
4. "Oluştur" butonuna tıklayın

### Adım 5: Tabloları Oluşturun

#### hesaplar Tablosu

```sql
CREATE TABLE IF NOT EXISTS `hesaplar` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

#### programlar Tablosu

```sql
CREATE TABLE IF NOT EXISTS `programlar` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `userid` INT(11) NOT NULL,
  `egzersiz_adi` VARCHAR(255) NOT NULL,
  `set_sayisi` INT NOT NULL,
  `tekrar_sayisi` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`userid`) REFERENCES `hesaplar`(`userid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Adım 6: Yapılandırma

`database/connection.php` dosyasını düzenleyin (gerekirse):

```php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "hesaplar";
```

### Adım 7: Projeyi Çalıştırın

Tarayıcınızda `http://localhost/proje1` adresini açın.

---

## 🗄️ Veritabanı Yapısı

### hesaplar Tablosu
Kullanıcı bilgilerini saklar.

| Sütun | Tip | Açıklama |
|-------|-----|----------|
| userid | INT(11) | Benzersiz kullanıcı ID (Primary Key) |
| name | VARCHAR(100) | Kullanıcı adı |
| surname | VARCHAR(100) | Kullanıcı soyadı |
| email | VARCHAR(100) | Email adresi (Unique) |
| password | VARCHAR(255) | Bcrypt hash şifre |

### programlar Tablosu
Kullanıcı programlarını saklar.

| Sütun | Tip | Açıklama |
|-------|-----|----------|
| id | INT | Benzersiz program ID (Primary Key) |
| userid | INT(11) | Foreign Key (hesaplar) |
| egzersiz_adi | VARCHAR(255) | Egzersiz adı |
| set_sayisi | INT | Set sayısı |
| tekrar_sayisi | INT | Tekrar sayısı |
| created_at | TIMESTAMP | Oluşturulma tarihi |

---

## 💻 Kullanım

### Yeni Kullanıcı Kaydı

1. Ana sayfadan "Giriş Yap" butonuna tıklayın
2. "Kayıt Ol" bağlantısına tıklayın
3. Gerekli bilgileri doldurun
4. Kayıt işlemini tamamlayın

### Program Oluşturma

1. Giriş yapın
2. "Program Oluştur" menüsüne gidin
3. Egzersiz adı, set ve tekrar sayılarını girin
4. "Kaydet" butonuna tıklayın
5. Programlarınız "Programlarım" bölümünde görüntülenir

### Kalori Hesaplama

1. Blog sayfasından "Günlük Kalori İhtiyacı" yazısına tıklayın
2. Gerekli bilgileri girin (kilo, boy, yaş, cinsiyet, aktivite)
3. "Hesapla" butonuna tıklayın
4. Günlük kalori ihtiyacınızı görün

### Vücut Yağ Oranı Hesaplama

1. Blog sayfasından "Vücut Yağ Oranı" yazısına tıklayın
2. Gerekli ölçümleri girin
3. "Hesapla" butonuna tıklayın
4. Vücut yağ oranınızı görün

---

## 🔒 Güvenlik Özellikleri

- ✅ **Bcrypt Hash**: Tüm şifreler bcrypt ile hashlenir
- ✅ **Prepared Statements**: SQL injection koruması
- ✅ **Input Validation**: Kullanıcı girişleri doğrulanır
- ✅ **XSS Protection**: `htmlspecialchars()` ile koruma
- ✅ **Session Management**: Güvenli oturum yönetimi
- ✅ **Email Validation**: Email format doğrulaması

---

## 📸 Ekran Görüntüleri

### Ana Sayfa
Modern ve çekici gradient tasarım ile hoş geldiniz.

### Program Oluşturma
Kişisel antrenman programınızı kolayca oluşturun ve yönetin.

### Egzersizler
Kategori bazlı egzersizler ile antrenmanınızı planlayın.

---

## 🤝 Katkıda Bulunma

Katkılarınızı bekliyoruz! Lütfen şu adımları takip edin:

1. Fork edin
2. Feature branch oluşturun (`git checkout -b feature/AmazingFeature`)
3. Commit edin (`git commit -m 'Add some AmazingFeature'`)
4. Branch'inizi push edin (`git push origin feature/AmazingFeature`)
5. Pull Request açın

---

## 📝 Lisans

Bu proje MIT lisansı altında lisanslanmıştır.

---

## 👨‍💻 Geliştirici

**RePe Fitness Team**

- 💼 [GitHub Profili](https://github.com/KULLANICI_ADINIZ)
- 📧 Email: contact@repefitness.com

---

## 🙏 Teşekkürler

- [Font Awesome](https://fontawesome.com/) - İkonlar için
- [MySQL](https://www.mysql.com/) - Veritabanı için
- [PHP](https://www.php.net/) - Backend için

---

<div align="center">

**⭐ Bu projeyi beğendiyseniz yıldız vermeyi unutmayın! ⭐**

Made with ❤️ by RePe Fitness Team

</div>

