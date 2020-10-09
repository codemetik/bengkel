<?php 
session_start();
include "koneksi.php";

if (isset($_POST['sign'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sqluser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '".$user."' AND password = '".$pass."'");
	$users = mysqli_fetch_array($sqluser);
	$cekuser = mysqli_num_rows($sqluser);
	if ($cekuser > 0) {

		if ($users['status'] == 'active') {
			
		$rol = mysqli_query($koneksi, "SELECT * FROM tb_roles WHERE id_user = '".$users['id_user']."'");
		$cekrol = mysqli_fetch_array($rol);
		
		$sqljbtan = mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE id_jabatan = '".$cekrol['id_jabatan']."'");
		$dtjbtan = mysqli_fetch_array($sqljbtan);

		if ($cekrol['id_jabatan'] == 'JBT01') {		
			$jb1 = $dtjbtan['nama_jabatan'];
			$_SESSION['id_user'] = $users['id_user'];
			$_SESSION['nama_user'] = $users['nama_user'];
			$_SESSION['id_jabatan'] = $cekrol['id_jabatan'];
			$_SESSION['nama_jabatan'] = $dtjbtan['nama_jabatan'];
			echo "<script>
			alert('Anda Login sebagai $jb1');
			document.location.href = 'index.php';
			</script>";
		}else if($cekrol['id_jabatan'] == 'JBT02'){
			$jb1 = $dtjbtan['nama_jabatan'];
			$_SESSION['id_user'] = $users['id_user'];
			$_SESSION['nama_user'] = $users['nama_user'];
			$_SESSION['id_jabatan'] = $cekrol['id_jabatan'];
			$_SESSION['nama_jabatan'] = $dtjbtan['nama_jabatan'];
			echo "<script>
			alert('Anda Login sebagai $jb1');
			document.location.href = 'dashboard_owner.php';
			</script>";
		}else if($cekrol['id_jabatan'] == 'JBT03'){
			$jb1 = $dtjbtan['nama_jabatan'];
			$_SESSION['id_user'] = $users['id_user'];
			$_SESSION['nama_user'] = $users['nama_user'];
			$_SESSION['id_jabatan'] = $cekrol['id_jabatan'];
			$_SESSION['nama_jabatan'] = $dtjbtan['nama_jabatan'];
			echo "<script>
			alert('Anda Login sebagai $jb1');
			document.location.href = 'dashboard_operator.php';
			</script>";
		}

		}else if($users['status'] == 'non active'){
			echo "<script>
			alert('Maaf, Status user anda tidak aktif');
			document.location.href = 'sign_in.php';
			</script>";
		}
		
	}else{
		echo "<script>
		alert('Maaf, User tidak ada');
		document.location.href = 'sign_in.php';
		</script>";
	}
}
?>