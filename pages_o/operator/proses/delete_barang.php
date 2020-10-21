<?php 
include "../../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang ='".$_GET['id']."'");

if ($sql) {
	echo "<script>
		alert('Data Barang berhasil dihapus');
		document.location.href = '../../../dashboard_operator.php?page=detail_barang';
		</script>";
}else{
	echo "<script>
		alert('Data Barang gagal dihaspus');
		document.location.href = '../../../dashboard_operator.php?page=detail_barang';
		</script>";
}
?>