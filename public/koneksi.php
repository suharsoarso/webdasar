<?php 
	//script koneksi untuk menghubungkan antara website dengan database

	$host	 = 'localhost'; //host atau server yang digunakan
	$user	 = 'root'; //username dari host yang digunakan
	$pass	 = ''; //password dari host yang digunakan
	$db_name = 'public'; //nama database yang akan digunakan

	$koneksi = mysqli_connect($host,$user,$pass,$db_name) or die ('Gagal terhubung dengan database'); //script koneksi
?>