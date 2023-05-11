<?php 
	//script untuk hapus data
	include 'koneksi.php';
	if(isset($_GET['id'])){
		$delete = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = '".$_GET['id']."' ");
		if($delete){
			header('location:data.php');
		}
	}
?>