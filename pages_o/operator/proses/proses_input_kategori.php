<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_kategori = $_POST['id_kategori'];
	$nama_kategori = $_POST['nama_kategori'];

	$insert = mysqli_query($koneksi, "INSERT INTO tb_kategori(id_kategori, nama_kategori) VALUES('".$id_kategori."','".$nama_kategori."')");

	if ($insert) {
		echo "<script>
		alert('Data Kategori berhasil diinput');
		document.location.href = '../../../dashboard_operator.php?page=lihat_supplier_kategori';
		</script>";
	}else{
		echo "<script>
		alert('Data Kategori gagal diinput');
		document.location.href = '../../../dashboard_operator.php?page=tambah_kategori';
		</script>";
	}
}
?>