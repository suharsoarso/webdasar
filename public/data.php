<?php 
	include 'koneksi.php'; //untuk memanggil file koneksi ke dalam file ini, agar file ini bisa terhubung ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="img/logo.png"> <!--logo untuk di dalam judul halaman web atau biasa disebut favicon-->
	<title>Halaman Data</title>
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
			<a href="form-tambah.php" class="btn-add">Tambah</a><hr>
			<table id="table-data" border="1" style="border-collapse:collapse;margin:1% 0;border:1px solid #999;" cellspacing="0" width="100%">
				<thead>
					<th>No</th>
					<th>Nama</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>Telepon</th>
					<th>Tanggal Input</th>
					<th>Pilihan</th>
				</thead>

				<tbody>

					<?php 
						$no 	= 1; //set variable untuk no urut, diawali dari no 1
						$select	= mysqli_query($koneksi, "SELECT * FROM tb_user"); //script untuk manggil data dari database
						if(mysqli_num_rows($select) > 0){
							while($rows = mysqli_fetch_array($select)){
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $rows['nama'] ?></td>
						<td><?php echo $rows['tanggal_lahir'] ?></td>
						<td><?php echo $rows['jenis_kelamin'] ?></td>
						<td><?php echo $rows['alamat'] ?></td>
						<td><?php echo $rows['email'] ?></td>
						<td><?php echo $rows['telepon'] ?></td>
						<td><?php echo $rows['tanggal_input'] ?></td>
						<td>
							<a href="form-edit.php?id=<?php echo $rows['id_user'] ?>" class="btn-edit">Edit</a> 
							<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="hapus.php?id=<?php echo $rows['id_user'] ?>" class="btn-delete">Hapus</a>
						</td>
					</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="9" style="text-align:center;color:#ff0000;">Tida ada ada</td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		<!----------------------------------------------------- END CONTENT ------------------------------------------------>

		<div class="footer">
				Copyright@2023, Sibatir. All Rights Reserved.
		</div>
		<!----------------------------------------------------- END FOOTER ------------------------------------------------>

	</div>
</body>
</html>