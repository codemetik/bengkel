<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$nama_user = $_POST['nama_user'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$id_jabatan = $_POST['id_jabatan'];


	if ($password == $confirm_password) {

		// $sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, username, password, confirm_password, nama_user, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir,status) VALUES('".$id_user."','".$username."','".$password."','".$confirm_password."','".$nama_user."','".$alamat."','".$jenis_kelamin."','".$tempat_lahir."','".$tanggal_lahir."','Active')");

		// $sqlrol = mysqli_query($koneksi, "INSERT INTO tb_roles(id_roles, id_user, id_jabatan) VALUES('".$id_roles."','".$id_user."','".$id_jabatan."')");

		$sql = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."', password = '".$password."', confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', alamat = '".$alamat."', jenis_kelamin = '".$jenis_kelamin."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."' WHERE id_user = '".$id_user."'");

		$sqlrol = mysqli_query($koneksi, "UPDATE tb_roles SET id_user = '".$id_user."', id_jabatan = '".$id_jabatan."' WHERE id_user = '".$id_user."'");

		if ($sql && $sqlrol) {
			echo "<script>
			alert('Data User berhasil disimpan');
			document.location.href = '../../../dashboard_owner.php?page=data_user';
			</script>";
		}else{
			echo "<script>
			alert('Data User gagal disimpan');
			document.location.href = '../../../dashboard_owner.php?page=data_user';
			</script>";
		}
	
	}else if($password != $confirm_password){
		echo "<script>
		alert('Password dan Confirmasi Password harus sama');
		document.location.href = '../../../dashboard_owner.php?page=data_user';
		</script>";
	}

	
}
?>