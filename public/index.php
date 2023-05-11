<?php 
	include 'koneksi.php'; //untuk memanggil file koneksi ke dalam file ini, agar file ini bisa terhubung ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="img/lognew.jpg"> <!--logo untuk di dalam judul halaman web atau biasa disebut favicon-->
	<title>Halaman Utama</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> <!--untuk memanggil file css external, agar file ini bisa dimodifikasi di css itu-->
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="logo">
			SIBATIR
			</div>
			<nav>
				<ul>
					<a href="index.php"><li>Beranda</li></a>
					<a href="data.php"><li>Data Pengungsi</li></a>
				</ul>
			</nav>
		</div>
		<!----------------------------------------------------- END HEADER ------------------------------------------------>

		<div class="content">
			<center>
				<img src="img/sea.jpg" width="50%">
				<h3 style="color:#F0F8FF;">Selamat Datang di Sistem Manajemen Bencana Terpadu Masyarakat Pesisir</h3>
			</center>
		</div>
		<!----------------------------------------------------- END CONTENT ------------------------------------------------>

		<div class="footer">
			Copyright@2023, Sibatir. All Rights Reserved.
		</div>
		<!----------------------------------------------------- END FOOTER ------------------------------------------------>

	</div>
</body>
</html>