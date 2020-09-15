<?php 
include "../koneksi.php";

if (isset($_GET['id']) && isset($_GET['idus'])) {
	$id = $_GET['id'];
	$idus = $_GET['idus'];
	$sql = mysqli_query($koneksi,"DELETE FROM tb_transaksi_penjualan WHERE id_penjualan = '".$id."' AND id_user = '".$idus."'");
	if ($sql) {
		header("location:../index.php");
	}else{
		echo "<script>
		alert('Maaf');
		document.location.href = '../index.php';
		</script>";
	}
}
?>