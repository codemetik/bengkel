<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$warna = $_POST['warna'];
	$jml_brg = $_POST['jumlah_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$keterangan = $_POST['keterangan'];
	$id_kategori = $_POST['id_kategori'];
	$id_supplier = $_POST['id_supplier'];

	$insert = mysqli_query($koneksi, "UPDATE tb_barang SET nama_barang = '".$nama_barang."', warna = '".$warna."', jumlah_barang = '".$jml_brg."' , harga_beli = '".$harga_beli."' , harga_jual = '".$harga_jual."' , keterangan = '".$keterangan."' WHERE id_barang = '".$id_barang."'");

	// $sqlk = mysqli_query($koneksi, "INSERT INTO tb_roles_kategori(id_barang, id_kategori) VALUES('".$id_barang."','".$id_kategori."')");
	// $sqlsp = mysqli_query($koneksi, "INSERT INTO tb_roles_supplier(id_barang, id_supplier) VALUES('".$id_barang."','".$id_supplier."')");

	$sqlk = mysqli_query($koneksi, "UPDATE tb_roles_kategori SET id_kategori = '".$id_kategori."' WHERE id_barang ='".$id_barang."'");
	$sqlsp = mysqli_query($koneksi, "UPDATE tb_roles_supplier SET id_supplier = '".$id_supplier."' WHERE id_barang = '".$id_barang."'");

	if ($insert && $sqlk && $sqlsp) {
		echo "<script>
		alert('Data Barang berhasil diUpdate');
		document.location.href = '../../../dashboard_operator.php?page=detail_barang';
		</script>";
	}else{
		echo "<script>
		alert('Data Barang gagal diUpdate');
		document.location.href = '../../../dashboard_operator.php?page=update_barang&id=".$id_barang."';
		</script>";
	}
}
?>