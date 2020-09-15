<?php 
include "koneksi.php";

if (isset($_POST['signup'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$confirm_pass = $_POST['confirm_password'];

	$usersql = mysqli_query($koneksi, "SELECT max(id_user) AS maxCode FROM tb_user");
	$iduser = mysqli_fetch_array($usersql);
	$id = $iduser['maxCode'];
	$nO = (int) substr($id, 3, 4);
	$nO++; 
	$idus = "USE";
	$id_user = $idus . sprintf("%04s", $nO);

	$rolesql = mysqli_query($koneksi, "SELECT max(id_roles) AS maxCode FROM tb_roles");
	$role = mysqli_fetch_array($rolesql);
	$idrol = $role['maxCode'];
	$nOrol = (int) substr($idrol, 3, 4);
	$nOrol++; 
	$irol = "TOL";
	$id_roles = $irol . sprintf("%04s", $nOrol);

	if ($pass == $confirm_pass) {
		$sqlinsert = mysqli_query($koneksi, "INSERT INTO tb_user(id_user,username,password,confirm_password,status) VALUES('".$id_user."','".$user."','".$pass."','".$confirm_pass."','active')");
		$sqlrol = mysqli_query($koneksi, "INSERT INTO tb_roles(id_roles, id_user, id_jabatan) VALUES('".$id_roles."','".$id_user."','JBT01')");
		if ($sqlinsert && $sqlrol) {
			echo "<script>
			alert('Data user berhasil dibuat silahkan login');
			document.location.href = 'sign_in.php';
			</script>";
		}else{
			echo "<script>
			alert('Data user gagal dibuat silahkan ulangi');
			document.location.href = 'sign_up.php';
			</script>";
		}
	}else if($pass != $confirm_pass){
		echo "<script>
		alert('Password dan Confirmasi Password harus sama');
		document.location.href = 'sign_up.php';
		</script>";
	}
}
?>