<?php require_once 'database/connection.php'; // Veritabanı bağlantısı


// $_GET dizisi aracılığıyla alınan "page" ve "sonuc" parametrelerini kontrol eder. 
// Eğer varsa, bu değerleri alır, yoksa boş bir değer atanır.
if(isset($_GET['page'])){
	$page = $connection->real_escape_string(trim($_GET['page']));
} else {
	$page = "";
}
if(isset($_GET['sonuc'])){
	$sonuc = $connection->real_escape_string(trim($_GET['sonuc']));
} else {
	$sonuc = "";
}
?>

<!DOCTYPE html>
<html>
<head> 
	
	<title>Profil Ekranı</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	
	<?php if($girissorgu == "1"){ ?> 

		<div class="container-fluid" style="margin-top: 50px;">
			<div class="row justify-content-center">
				<div class="col-11 bg-light" style="border-radius: 10px;">
					<div class="row" style="margin-bottom: 50px;">
						<div class="col-12 bg-dark" style="border-radius: 50px;">
							<ul class="nav justify-content-center" style="margin-top: 5px; margin-bottom: 5px;">
								<li class="nav-item">
									<a class="nav-link text-white" href="profile.php?page=1"><b>Profil Bilgileri</b></a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-white" href="profile.php?page=2"><b>Şifre Değiştir</b></a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-white" href="profile.php?page=3"><b>Programlarım</b></a>
								</li>
                                <li class="nav-item">
									<a class="nav-link text-white" href="index.php"><b>Geri Dön</b></a>
								</li>
                                <li class="nav-item">
									<a class="nav-link text-white" href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                    </svg>
                                    </a>
								</li>
							</ul>
						</div>
					</div>
					



					<?php 
					switch ($page) { //"page" parametresine göre farklı sayfa içeriklerini gösterir. Menüde profil bilgileri, 
						// şifre değiştirme ve çıkış seçenekleri bulunmaktadır.
						//page" parametresi 1 ise kullanıcının profil bilgilerini gösterir.
						//"page" parametresi 2 ise kullanıcının şifre değiştirme formunu ve sonuçlarını gösterir.
						//"page" parametresi belirtilmemiş veya geçersiz bir değer ise varsayılan olarak profil bilgilerini gösterir.
						case '1': ?> 
					

						<div class="col-12">
							<h3 class="text-center">Profil Bilgileri</h3>
							<hr>
							<div class="row">
								<div class="col-12">
									<p><b>Ad Soyad:</b> <?=$a_ad;?> <?=$a_soyad;?></p>
									<p><b>Email Adresi:</b> <?=$a_email;?></p>
								</div>
							</div>
						</div>

						<?php	
						break;
						
						case '2':
						?>

						<div class="col-12">
							<h3 class="text-center">Şifre Değiştir</h3>
							<hr>
							<?php if($sonuc == "1"){
								echo '<div class="alert alert-success" role="alert">Şifreniz başarıyla değiştirildi.</div>';
								echo '<meta http-equiv="refresh" content="5;URL=profile.php?page=2">';
							} elseif ($sonuc == "2"){
								echo '<div class="alert alert-warning" role="alert">Eski şifreniz doğru değil.</div>';
							} elseif ($sonuc == "3"){
								echo '<div class="alert alert-warning" role="alert">Yeni şifreleriniz birbiriyle uyuşmuyor.</div>';
							} elseif ($sonuc == "4"){
								echo '<div class="alert alert-danger" role="alert">Boş bıraktığınız alanlar var!</div>';
							}?>
							<div class="row justify-content-center">
								<div class="col-6">
									<form action="profile.php?page=2" method="POST">
										<div class="form-group">
											<label>Eski Şifreniz:</label>
											<input type="password" class="form-control" name="eskisifre">
										</div>
										<div class="form-group">
											<label>Yeni Şifreniz:</label>
											<input type="password" class="form-control" name="yenisifre">
										</div>
										<div class="form-group">
											<label>Yeni Şifreniz Tekrar:</label>
											<input type="password" class="form-control" name="yenisifretekrar">
										</div>
										<div class="form-group">
											<a title="Değiştir" type="button" class="btn btn-dark btn-block text-" data-toggle="modal" data-target="#exampleModal">
												<b class="text-white">Şifreyi Değiştir</b>
											</a>

											<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Değişiklik yapmak istediğinizden emin misiniz?</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															Yaptığınız bu değişiklik geri döndürülemez. Emin misiniz?
														</div>
														<div class="modal-footer">
															<a title="Geri Dön" type="button" class="btn btn-secondary" data-dismiss="modal">Geri Dön</a>
															<button type="submit" name="sifredegistir" class="btn btn-warning">Eminim, Şifremi Değiştir.</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

						<?php
						break;
						
						case '3':
						// Kullanıcının programlarını getir
						$stmt = $connection->prepare("SELECT * FROM programlar WHERE userid = ? ORDER BY id DESC");
						$stmt->bind_param("i", $a_id);
						$stmt->execute();
						$programs_result = $stmt->get_result();
						?>
						
						<div class="col-12">
							<h3 class="text-center">Programlarım</h3>
							<hr>
							<a href="program.php" class="btn btn-dark mb-3"><i class="fas fa-plus"></i> Yeni Program Ekle</a>
							
							<?php if ($programs_result->num_rows > 0): ?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<thead class="thead-dark">
											<tr>
												<th>Egzersiz Adı</th>
												<th>Set Sayısı</th>
												<th>Tekrar Sayısı</th>
												<th>Eklenme Tarihi</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($program = $programs_result->fetch_assoc()): ?>
												<tr>
													<td><?php echo htmlspecialchars($program['egzersiz_adi']); ?></td>
													<td><?php echo $program['set_sayisi']; ?></td>
													<td><?php echo $program['tekrar_sayisi']; ?></td>
													<td><?php echo date('d.m.Y', strtotime($program['created_at'])); ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							<?php else: ?>
								<div class="alert alert-info">
									<p>Henüz programınız yok. <a href="program.php">Yeni program eklemek için tıklayın.</a></p>
								</div>
							<?php endif; ?>
							<?php $stmt->close(); ?>
						</div>
						
						<?php
						break;

						

						default:
						?>

						<div class="col-12">
							<h3 class="text-center">Profil Bilgileri</h3>
							<hr>
							<div class="row">
								<div class="col-12">
									<p><b>Ad Soyad:</b> <?=$a_ad;?> <?=$a_soyad;?></p>
									<p><b>Email Adresi:</b> <?=$a_email;?></p>
								</div>
							</div>
						</div>

						<?php
						break;
					} ?>

				</div>
			</div>
		</div>

	<?php } ?>
</body>
</html>
<?php 
if(isset($_POST['sifredegistir'])){
	$eskisifre = htmlspecialchars(trim($_POST['eskisifre']));
	$yenisifre = htmlspecialchars(trim($_POST['yenisifre']));
	$yenisifretekrar = htmlspecialchars(trim($_POST['yenisifretekrar']));

	if($eskisifre == "" OR $yenisifre == "" OR $yenisifretekrar == "" OR $eskisifre == " " OR $yenisifre == " " OR $yenisifretekrar == " " OR $eskisifre == "	" OR $yenisifre == "	" OR $yenisifretekrar == "	"){

		header("Location: profile.php?page=2&sonuc=4");
		exit();

	} else {

		// Verify old password
		if(password_verify($eskisifre, $a_sifre)){

			if($yenisifre == $yenisifretekrar){

				// Hash the new password
				$hashed_new_password = password_hash($yenisifre, PASSWORD_BCRYPT);
				$stmt = $connection->prepare("UPDATE hesaplar SET password=? WHERE userid=?");
				$stmt->bind_param("ss", $hashed_new_password, $a_id);
				$stmt->execute();
				$stmt->close();
				
				header("Location: profile.php?page=2&sonuc=1");
				exit();

			} else {
				header("Location: profile.php?page=2&sonuc=3");
				exit();
			}

		} else {
			header("Location: profile.php?page=2&sonuc=2");
			exit();
		}

	}
}

?>