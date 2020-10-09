<?php 
include "../koneksi.php";
if (isset($_POST['simpan'])) {
	$id_trx = $_POST['id_transaksi'];
	$id_barang = $_POST['id_barang'];
	$id_user = $_POST['id_user'];
	$nama_barang = $_POST['nama_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];

	$count = count($id_trx);

	for ($i=0; $i < $count; $i++) { 
		
		$sql = mysqli_query($koneksi, "INSERT INTO tb_return(id_transaksi, id_barang, id_user, jumlah_brg_return) VALUES('".$id_trx[$i]."','".$id_barang[$i]."','".$id_user[$i]."','".$jumlah_barang[$i]."')");

		$del = mysqli_query($koneksi, "DELETE FROM tb_penjualan WHERE id_transaksi = '".$id_trx[$i]."'");

		if ($sql && $del) {
			echo "<script>
			alert('Data berhasil direturn');
			document.location.href = '../?page=lap_stok_barang';
			</script>";
		}else{
			echo "<script>
			alert('Data gagal direturn');
			document.location.href = '../?page=lap_stok_barang';
			</script>";
		}
	}
}
?>