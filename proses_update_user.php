<?php 
include "koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$nama_user = $_POST['nama_user'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];

	$sql = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."', password = '".$password."', confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."' WHERE id_user = '".$id_user."'");

	if ($sql) {
		echo "<script>
		alert('Data User berhasil diupdate');
		document.location.href = 'logout.php';
		</script>";
	}else{
		echo "<script>
		alert('Data User gagal diupdate');
		document.location.href = 'logout.php';
		</script>";
	}
}
?>