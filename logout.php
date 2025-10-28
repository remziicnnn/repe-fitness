<?php
ob_start();
session_start();// PHP oturumlarını başlatır
session_destroy(); //mevcut oturumu sonlandırır ve oturuma ait tüm verileri temizler.
ob_end_flush(); // çıktı tamponlamasını sonlandırarak biriktirilmiş çıktıyı tarayıcıya gönderir.

header("Location: index.php"); //kullanıcı oturumu sonlandırıldıktan sonra "index.php" sayfasına yönlendirilir.
exit();
?>