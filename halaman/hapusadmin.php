<?php	
	
	include '../function.php';
	$id = $_GET['id'];
	
	$sql = mysqli_query($koneksi,"DELETE FROM user where iduser='$id'");

	header('location:dataadmin.php?notif=Berhasil menghapus data!');

?>