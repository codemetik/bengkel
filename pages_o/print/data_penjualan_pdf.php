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
$pdf->RowNoBorderC(Array('Data Penjualan' ));

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',8);
$pdf->SetWidths(Array(20,20,50,10,20,20,20,20));
	$pdf->Cell(5,10,'');
	$pdf->RowC(Array('ID Penj','ID Barang ', 'Nama Brg', 'Stok','Harga /Pcs','Total','Tgl Barang','Tgl Penjualan'));

$sql = mysqli_query($koneksi, "SELECT id_penjualan, y.id_barang AS id, x.nama_barang AS nm, y.jumlah_barang AS pnj_brg, harga_jual,y.jumlah_barang * harga_jual AS sub, tgl_barang, tgl_penjualan FROM table_barang X INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang ORDER BY id_penjualan DESC");
while ($dt = mysqli_fetch_array($sql)) {
	$array[] = array(
		'id_pen' => $dt['id_penjualan'],
		'id' => $dt['id'],
		'nm' => $dt['nm'],
		'pnj_brg' => $dt['pnj_brg'],
		'harga_jual' => $dt['harga_jual'],
		'sub' => $dt['sub'],
		'tgl_barang' => $dt['tgl_barang'],
		'tgl_penjualan' => $dt['tgl_penjualan']
	);
}

$pdf->SetWidths(Array(20,20,50,10,20,20,20,20));
$pdf->SetFont('Times','',8);
foreach ($array as $key) {
	$pdf->Cell(5,10,'');
	$pdf->Row(Array($key['id_pen'],$key['id'],$key['nm'],$key['pnj_brg'],rupiah($key['harga_jual']),rupiah($key['sub']),$key['tgl_barang'],$key['tgl_penjualan']));
}



//tutup pdf
$pdf->Output();

?>
