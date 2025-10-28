<?php
require_once 'database/connection.php';

// Basit bir admin kontrolü
$admin_username = "admin";
$admin_password = "admin123"; // Gerçek projede bu şifreyi güvenli bir şekilde hashleyip saklamalısınız

session_start();

// Admin girişi kontrolü
if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['admin_login'])) {
        if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
        } else {
            $error = "Hatalı kullanıcı adı veya şifre!";
        }
    }
}

// Kullanıcı silme işlemi
if (isset($_GET['delete_user']) && isset($_SESSION['admin_logged_in'])) {
    $userid = $connection->real_escape_string($_GET['delete_user']);
    $connection->query("DELETE FROM hesaplar WHERE userid = '$userid'");
    header("Location: admin.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 50px; }
        .table { background-color: white; }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!isset($_SESSION['admin_logged_in'])): ?>
            <!-- Admin Giriş Formu -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Admin Girişi</h3>
                        </div>
                        <div class="card-body">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label>Kullanıcı Adı:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Şifre:</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" name="admin_login" class="btn btn-primary">Giriş</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Kullanıcı Listesi -->
            <h2 class="mb-4">Kayıtlı Kullanıcılar</h2>
            <div class="mb-3">
                <a href="index.php" class="btn btn-secondary">Ana Sayfaya Dön</a>
                <a href="admin.php?logout=1" class="btn btn-danger">Çıkış Yap</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $connection->query("SELECT * FROM hesaplar ORDER BY userid");
                    while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['userid']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['surname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <a href="admin.php?delete_user=<?php echo $row['userid']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Bu kullanıcıyı silmek istediğinizden emin misiniz?')">
                                Sil
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 