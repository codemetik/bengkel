<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$warna = $_POST['warna'];
	$jml_brg = $_POST['jumlah_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$keterangan = $_POST['keterangan'];
	$id_kategori = $_POST['id_kategori'];
	$id_supplier = $_POST['id_supplier'];

	$insert = mysqli_query($koneksi, "INSERT INTO tb_barang(id_barang, nama_barang, warna, jumlah_barang, harga_beli, harga_jual, keterangan) VALUES('".$id_barang."','".$nama_barang."','".$warna."','".$jml_brg."','".$harga_beli."','".$harga_jual."','".$keterangan."')");

	$sqlk = mysqli_query($koneksi, "INSERT INTO tb_roles_kategori(id_barang, id_kategori) VALUES('".$id_barang."','".$id_kategori."')");
	$sqlsp = mysqli_query($koneksi, "INSERT INTO tb_roles_supplier(id_barang, id_supplier) VALUES('".$id_barang."','".$id_supplier."')");

	if ($insert && $sqlk && $sqlsp) {
		echo "<script>
		alert('Data Barang berhasil diinput');
		document.location.href = '../../../dashboard_operator.php?page=detail_barang';
		</script>";
	}else{
		echo "<script>
		alert('Data Barang gagal diinput');
		document.location.href = '../../../dashboard_operator.php?page=tambah_barang';
		</script>";
	}
}
?>