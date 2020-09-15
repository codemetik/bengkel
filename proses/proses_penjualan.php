<?php 
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$jml = $_POST['jumlah_barang'];
	$harga = $_POST['harga'];
	
	// $subtotal = $harga*$jml;

	$trxpsql = mysqli_query($koneksi, "SELECT max(id_penjualan) AS maxCode FROM tb_transaksi_penjualan");
	$idtrxp = mysqli_fetch_array($trxpsql);
	$idp = $idtrxp['maxCode'];
	$nO = (int) substr($idp, 3, 7);
	$nO++; 
	$idtrx = "TRX";
	$id_trxp = $idtrx . sprintf("%07s", $nO);

	$sqltrx = mysqli_query($koneksi,"INSERT INTO tb_transaksi_penjualan(id_penjualan, id_barang, id_user,nama_barang, jumlah_barang, harga) VALUES('$id_trxp','$id_barang','$id_user','$nama_barang','$jml','$harga')");
	if ($sqltrx) {
		header("location:../index.php");
	}else{
		echo "<script>
		alert('Maaf');
		document.location.href = '../index.php';
		</script>";
	}

}
?>