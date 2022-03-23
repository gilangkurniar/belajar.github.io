<?php

//konek ke db
$koneksi = mysqli_connect('localhost','root','','logindb');

// ===============================================================

//login
if (isset($_POST['login'])){

$username = $_POST['username'];
$password = md5($_POST['password']); //password sebelum hash

// cek data db
$cekdb = mysqli_query($koneksi, "SELECT * FROM user where username='$username' and password='$password'");
$row = mysqli_fetch_array($cekdb);

// cek username
if (mysqli_num_rows($cekdb)===1){

	// cek password
	// $row = mysqli_fetch_assoc($cekdb);
	// if(password_verify($password, $row['password'])){

			// hidupkan session
			$_SESSION['onid'] = $row ['iduser'];
			$_SESSION['onusername'] = $row['username'];
			$_SESSION['onnama'] = $row['nama'];
			$_SESSION['onemail'] = $row['email'];

			//jika password match
			header('location:halaman/dashboard.php');
			} else {
			header('location:index.php?error=Username atau password salah!');
			}
		}

// ===============================================================
	
// tambah data admin
if (isset($_POST['tambah'])){

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password']; //password sebelum hash

// enkripsi password
$epass = md5($password);

$insert = mysqli_query($koneksi, "INSERT INTO user (nama,email,username,password) values ('$nama','$email','$username','$epass')");

if($insert){
	// jika berhasil menambahkan
	header('location:tambahadmin.php?notif=Berhasil menambahkan data!');
	} else {
		// jika gagal
	header('location:tambahadmin.php?notif=Gagal menambahkan data!');
	}
}

// ===============================================================

// edit data admin

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = mysqli_query($koneksi, "SELECT * FROM user where iduser='$id'");
$hasil = mysqli_fetch_array($sql);

if (isset($_POST['ubah'])){

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];

$edit = mysqli_query($koneksi,"UPDATE user SET nama = '$nama', email = '$email', username = '$username' where iduser ='$id'");

if($edit){
	//jika berhasil mengubah
	header('location:dataadmin.php?notif=Berhasil mengubah data!');
	} else {
		//jika gagal
	header('location:dataadmin.php?error=Gagal mengubah data!');
	}
}

// ===============================================================

// ubah password
if (isset($_POST['ubahpass'])){

// enkripsi inputan password lama
$passlama = md5($_POST['passlama']);

$id = $_POST['id'];

// uji jika password lama sesuai
$cek = mysqli_query($koneksi,"SELECT * FROM user where iduser='$id' and password='$passlama'");
$data = mysqli_fetch_array($cek);

// jika data ditemukan maka password sesuai
if ($data){

	// uji apakah pass baru dan konfirmasi pass sesuai
	$passbaru = $_POST['passbaru'];
	$konfirmpass = $_POST['konfirmpass'];

	if ($passbaru == $konfirmpass){
		//proses ganti password // enkripsi password yg baru
		$passok = md5($konfirmpass);
		$ubah = mysqli_query($koneksi,"UPDATE user SET password = '$passok' where iduser='$data[iduser]' ");
		if ($ubah){
			header('location:dataadmin.php?notif=Berhasil mengubah password!');
		} else {
			header('location:dataadmin.php?error=Gagal mengubah password!');
		}
	} else {
			header('location:dataadmin.php?error=Gagal mengubah password!');
		} 
} else {
			header('location:dataadmin.php?error=Tidak ada data yang sesuai!');
		}
}

// ===============================================================

?>