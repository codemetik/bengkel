<?php 
include "../koneksi.php";

if (isset($_POST['simpan_trx'])) {

	if (!isset($_POST['id_penjualan'])) {
		echo "<script>
		alert('Barang dikeranjang belum ada. Harap isi terlebih dahulu!');
		document.location.href = '../index.php';
		</script>";
	}else{

	$id_penjualan = $_POST['id_penjualan'];
	$id_transaksi = $_POST['id_transaksi'];
	$id_barang = $_POST['id_barang'];
	$id_user = $_POST['id_user'];
	$nama_barang = $_POST['nama_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];
	$harga = $_POST['harga'];
	$subharga = $_POST['subharga'];
	$subtotal = $_POST['subtotal'];
	$bayar = $_POST['bayar'];
	$kembali = $_POST['kembali'];

	// date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
	// $tgl_penjualan = date('d-F-Y H:i:s');//Menampilkan Jam Sekarang

	date_default_timezone_set('Asia/Jakarta'); 
	$tgl_penjualan = date("Y-m-d h:i:s");

	$count = count($nama_barang);


	for ($i=0; $i < $count; $i++) { 
		
		$sql = mysqli_query($koneksi, "INSERT INTO tb_penjualan(id_penjualan, id_transaksi, id_barang, id_user, nama_barang, jumlah_barang, harga, subharga, subtotal, bayar, kembali, tgl_penjualan) VALUES('$id_penjualan[$i]', '$id_transaksi[$i]','$id_barang[$i]','$id_user[$i]','$nama_barang[$i]','$jumlah_barang[$i]','$harga[$i]','$subharga[$i]','$subtotal','$bayar','$kembali','$tgl_penjualan')");
		$del = mysqli_query($koneksi, "DELETE FROM tb_transaksi_penjualan WHERE id_user = '$id_user[$i]'");
		if ($sql) {
			echo "<script>
			alert('Data Penjualan berhasil disimpan');
			document.location.href = '../index.php';
			</script>";
		}
	}

	}

}
?>