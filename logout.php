<?php
session_start();
session_destroy();
session_unset();
$_SESSION = [];
	echo "<script>alert('Berhasil logout');
				document.location.href='index.php';
			</script>";
?>