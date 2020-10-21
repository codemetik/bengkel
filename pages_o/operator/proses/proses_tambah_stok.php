<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_barang = $_POST['id_barang'];
	$jml_tambah_stok = $_POST['jml_tambah_stok'];

	$sql = mysqli_query($koneksi, "UPDATE tb_barang SET jumlah_barang = jumlah_barang + '".$jml_tambah_stok."' WHERE id_barang = '".$id_barang."'");

	if ($sql) {
		echo "<script>
		alert('Stok Barang berhasil ditambah');
		document.location.href = '../../../dashboard_operator.php?page=detail_barang';
		</script>";
	}else{
		echo "<script>
		alert('Stok Barang gagal ditambah');
		document.location.href = '../../../dashboard_operator.php?page=detail_barang';
		</script>";
	}
}
?>