<?php 
	error_reporting(0); //menyembunyikan error yang tidak penting
	include 'koneksi.php'; //untuk memanggil file koneksi ke dalam file ini, agar file ini bisa terhubung ke database

	if(isset($_GET['id'])){
		//ambil data user yang akan diedit berdasarkan id_user yang dikirim via id
		$ambil_data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$_GET['id']."' ");
		$row 		= mysqli_fetch_array($ambil_data);
		$id 		= $row['id_user'];
		$nama 		= $row['nama'];
		$tgl_lhr	= $row['tanggal_lahir'];
		$explode	= explode(" ", $tgl_lhr);
		$tgl 		= $explode[0];
		$bln 		= $explode[1];
		$thn 		= $explode[2];
		$jk			= $row['jenis_kelamin'];
		$telp		= $row['telepon'];
		$email		= $row['email'];
		$alamat		= $row['alamat'];
	}

	//script edit data
	if(isset($_POST['edit'])){
		$error = '';
		//variabel untuk menampung data yang diinput
		$nama 	= ucwords($_POST['nama']); //ucwords untuk mengubah huruf depan dari setiap kata menjadi kapital
		$tgl 	= $_POST['tgl'];
		$bln 	= $_POST['bln'];
		$thn 	= $_POST['thn'];
		$jk 	= $_POST['jk'];
		$email 	= $_POST['email'];
		$telp 	= $_POST['telp'];
		$alamat	= ucfirst($_POST['alamat']); //ucfirst untuk mengubah huruf depan dari setiap paragraf menjadi kapital

		if(!is_numeric($telp)){
			$error = '<div class="alert-error">Maaf, telepo harus angka!</div>';
		}else{
			$update= mysqli_query($koneksi, "UPDATE tb_user SET
							nama = '".$nama."',
							tanggal_lahir = '".$tgl." ".$bln." ".$thn."',
							jenis_kelamin = '".$jk."',
							alamat = '".$alamat."',
							email = '".$email."',
							telepon = '".$telp."',
							tanggal_input = null
							WHERE id_user = '".$_POST['id']."' ");
			if($update){
				header('location:data.php');
			}else{
				echo 'hmm'.mysqli_error($koneksi);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="img/logo.png"> <!--logo untuk di dalam judul halaman web atau biasa disebut favicon-->
	<title>Halaman Edit Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> <!--untuk memanggil file css external, agar file ini bisa dimodifikasi di css itu-->
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="logo">
				APP CRUD
			</div>
			<nav>
				<ul>
					<a href="index.php"><li>Beranda</li></a>
					<a href="data.php"><li>Data User</li></a>
				</ul>
			</nav>
		</div>
		<!----------------------------------------------------- END HEADER ------------------------------------------------>

		<div class="content">
			<a href="data.php" class="btn-delete">Kembali</a><hr>
			<br>
			<font style="font-size:18px;color:#666;">Silahkan edit data user di bawah ini.</font>
			<?php echo $error ?>
			<form action="" method="POST">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<table border="0" width="50%">
					<tr>
						<td width="29%" align="right" style="padding-right:1%;">Nama Lengkap</td>
						<td width="1%">:</td>
						<td width="70%"><input type="text" name="nama" placeholder="Masukan nama anda" value="<?php echo $nama ?>" ></td>
					</tr>

					<tr>
						<td align="right" style="padding-right:1%;">Tanggal Lahir</td>
						<td>:</td>
						<td>
						<select name="tgl">
							<option value="<?php echo $tgl ?>"><?php echo $tgl ?></option>
							<option>-Tgl-</option>
							<?php 
								for($tgl = 1; $tgl <= 31; $tgl++){
							?>
							<option value="<?php echo $tgl ?>"><?php echo $tgl ?></option>
							<?php } ?>
						</select>

						<select name="bln">
							<option value="<?php echo $bln ?>"><?php echo $bln ?></option>
							<option>-Bln-</option>
							<?php 
								$nama_bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
								foreach($nama_bulan as $no => $bulan){
							?>
							<option value="<?php echo $bulan ?>"><?php echo $bulan ?></option>
							<?php } ?>
						</select>

						<select name="thn">
							<option value="<?php echo $thn ?>"><?php echo $thn ?></option>
							<option>-Thn-</option>
							<?php 
								for($thn = 1980; $thn <= 2017; $thn++){
							?>
							<option value="<?php echo $thn ?>"><?php echo $thn ?></option>
							<?php } ?>
						</select>
						</td>
					</tr>

					<tr>
						<td align="right" style="padding-right:1%;">Jenis Kelamin</td>
						<td>:</td>
						<td>
						<select name="jk">
							<option value="<?php echo $jk ?>"><?php echo $jk ?></option>
							<option value="">-Pilih-</option>
							<option value="L">L</option>
							<option value="P">P</option>
						</select></td>
					</tr>

					<tr>
						<td align="right"style="padding-right:1%;">Telp. / Hp</td>
						<td>:</td>
						<td><input type="text" name="telp" value="<?php echo $telp ?>" placeholder="Masukan nomor anda"></td>
					</tr>


					<tr>
						<td align="right"style="padding-right:1%;">Email</td>
						<td>:</td>
						<td><input type="email" name="email" value="<?php echo $email ?>" placeholder="Masukan email anda"></td>
					</tr>

					<tr>
						<td align="right" valign="top" style="padding-right:1%;">Alamat</td>
						<td valign="top">:</td>
						<td>
							<textarea rows="5" cols="45" name="alamat"><?php echo $alamat ?></textarea>
						</td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="edit" value="SIMPAN DATA">
						</td>
					</tr>
				</table>
			</form>
		</div>
		<!----------------------------------------------------- END CONTENT ------------------------------------------------>

		<div class="footer">
				Copyright@2023, Sibatir. All Rights Reserved.
		</div>
		<!----------------------------------------------------- END FOOTER ------------------------------------------------>

	</div>
</body>
</html>