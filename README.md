# 🏋️ RePe Fitness

<div align="center">

![RePe Fitness](https://img.shields.io/badge/RePe-Fitness-purple?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)



 • [Kurulum](#-kurulum) • [Kullanım](#-kullanım) • [Ekran Görüntüleri](#-ekran-görüntüleri)

</div>

## 🎯 Hakkında

RePe Fitness, kullanıcıların fitness hedeflerine ulaşmalarına yardımcı olan kapsamlı bir web platformudur. Modern tasarımı, kullanıcı dostu arayüzü ve güçlü özellikleriyle hem yeni başlayanlara hem de deneyimli sporculara hitap eder.


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
git clone https://github.com/remziicnnn/repe-fitness.git
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


## 📸 Ekran Görüntüleri

### Ana Sayfa
<img width="1902" height="916" alt="image" src="https://github.com/user-attachments/assets/e365d8b3-2938-4805-b505-817f25e5e16f" />


### Program Oluşturma
<img width="1901" height="913" alt="image" src="https://github.com/user-attachments/assets/636054bb-3e2b-477e-8fe0-012d8aae54aa" />


### Egzersizler
<img width="1903" height="914" alt="image" src="https://github.com/user-attachments/assets/724eb5da-44c9-4e4d-9eb3-541f2deecb0f" />


---



</div>

