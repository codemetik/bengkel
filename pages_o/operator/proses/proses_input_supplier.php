<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$no_telp_supplier = $_POST['no_telp_supplier'];

	$insert = mysqli_query($koneksi, "INSERT INTO tb_supplier(id_supplier, nama_supplier, alamat_supplier, no_telp_supplier) VALUES('".$id_supplier."','".$nama_supplier."','".$alamat_supplier."','".$no_telp_supplier."')");

	if ($insert) {
		echo "<script>
		alert('Data Supplier berhasil diinput');
		document.location.href = '../../../dashboard_operator.php?page=lihat_supplier_kategori';
		</script>";
	}else{
		echo "<script>
		alert('Data Supplier gagal diinput');
		document.location.href = '../../../dashboard_operator.php?page=tambah_supplier';
		</script>";
	}
}
?>