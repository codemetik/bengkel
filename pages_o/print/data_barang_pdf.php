<?php
require('../../fpdf182/mc_table1.php');
include "../../koneksi.php";

$pdf = new PDF_MC_Table('P','mm','A4');
$pdf->setTitle('E-POS BENGEL MOTOR');
$pdf->AddPage();



//memberikan space kebawah
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',14);

$pdf->SetWidths(Array(170));
$pdf->Cell(10,10,'');
$pdf->RowNoBorderC(Array('E-POS BENGEL MOTOR' ));

$pdf->SetFont('Times','',11);
$pdf->SetWidths(Array(170));
$pdf->Cell(10,10,'');
$pdf->RowNoBorderC(Array('Data Barang' ));

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',8);
$pdf->SetWidths(Array(20,27,17,10,17,17,17,17,17,17));
	$pdf->Cell(10,10,'');
	$pdf->RowC(Array('ID Barang ', 'Nama Brg', 'Warna','Stok','Hrg Beli','Hrg Jual','Ket','Suppl','Kateg','Tgl Barang'));

$sql = mysqli_query($koneksi, "SELECT * FROM table_barang GROUP BY id_barang DESC");
while ($dt = mysqli_fetch_array($sql)) {
	$array[] = array(
		'id_barang' => $dt['id_barang'],
		'nama_barang' => $dt['nama_barang'],
		'warna' => $dt['warna'],
		'jumlah_barang' => $dt['jumlah_barang'],
		'harga_beli' => $dt['harga_beli'],
		'harga_jual' => $dt['harga_jual'],
		'keterangan' => $dt['keterangan'],
		'nama_supplier' => $dt['nama_supplier'],
		'nama_kategori' => $dt['nama_kategori'],
		'tgl_barang' => $dt['tgl_barang']
	);
}

$pdf->SetWidths(Array(20,27,17,10,17,17,17,17,17,17));
$pdf->SetFont('Times','',8);
foreach ($array as $key) {
	$pdf->Cell(10,10,'');
	$pdf->Row(Array($key['id_barang'],$key['nama_barang'],$key['warna'],$key['jumlah_barang'],rupiah($key['harga_beli']),rupiah($key['harga_jual']),$key['keterangan'],$key['nama_supplier'],$key['nama_kategori'],$key['tgl_barang']));
}



//tutup pdf
$pdf->Output();

?>
