<?php
session_start();

require_once '../db/conn.php';

$username = $_POST["username"];
$p = md5($_POST["password"]);

$sql = "select * from tb_user where username='".$username."' and password='".$p."' limit 1";
$result = mysqli_query ($conn, $sql);
$jumlah = mysqli_num_rows($result);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION["login"] = TRUE;
		$_SESSION["id"]=$row["id"];
		$_SESSION["nama_user"]=$row["nama_user"];
        $_SESSION["username"]=$row["username"];
		$_SESSION["password"]=$row["password"];
	

		header("Location: ../index.php?page=dashboard");
		
	}else {
		echo '<body>';
		echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
		echo "<script>
			Swal.fire({
			icon: 'error',
			title: 'Username/Password Salah!',
			showConfirmButton: false,
			timer: 1500
			}).then(function() {
				window.location='../index.php'
			})
			</script>";
		echo '</body>';
	}
?>

