<?php
require('../../fpdf182/mc_table1.php');
include "../../koneksi.php";
if (isset($_GET['idtrx'])) {

$pdf = new PDF_MC_Table('P','mm','A4');
$pdf->setTitle('E-POS BENGEL MOTOR');
$pdf->AddPage();
$pdf->Image('../../images/logo_em.png',20,20,30);

$sqlpen = mysqli_query($koneksi, "SELECT id_penjualan, id_transaksi, id_barang, x.id_user, nama_user, nama_barang, jumlah_barang,
CONCAT('Rp. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(subharga,0)) AS subharga, CONCAT('Rp. ',FORMAT(subtotal,0)) AS subtotal,
CONCAT('Rp. ',FORMAT(bayar,0)) AS bayar, CONCAT('Rp. ',FORMAT(kembali,0)) AS kembali, tgl_penjualan
FROM tb_penjualan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE id_transaksi = '".$_GET['idtrx']."' GROUP BY id_transaksi");
$trx = mysqli_fetch_array($sqlpen);

	$pdf->Cell(10,10,'',0,1);
    $pdf->SetFont('Times','',11);
    $pdf->SetWidths(Array(30,4,60));
    $pdf->Cell(45,6,'');
    $pdf->RowNoBorder(Array("NO Transaksi",": ",$trx['id_transaksi']));
    $pdf->Cell(45,6,'');
    $pdf->RowNoBorder(Array("ID User",": ",$trx['nama_user']));
    $pdf->Cell(45,6,'');
    $pdf->RowNoBorder(Array("TGL Transaksi",": ",$trx['tgl_penjualan']));

//memberikan space kebawah
$pdf->Cell(10,10,'',0,1);

$pdf->SetWidths(Array(35,35,35,35,35));
	$pdf->Cell(10,10,'');
	$pdf->RowC(Array('Id Barang ', 'Nama Barang', 'Jumlah','Harga','Sub Harga' ));

$sql = mysqli_query($koneksi, "SELECT id_penjualan, id_transaksi, id_barang, id_user, nama_barang, jumlah_barang,
CONCAT('Rp. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(subharga,0)) AS subharga, CONCAT('Rp. ',FORMAT(subtotal,0)) AS subtotal,
CONCAT('Rp. ',FORMAT(bayar,0)) AS bayar, CONCAT('Rp. ',FORMAT(kembali,0)) AS kembali, tgl_penjualan
FROM tb_penjualan WHERE id_transaksi = '".$_GET['idtrx']."' AND id_user = '".$trx['id_user']."'");
while ($dt = mysqli_fetch_array($sql)) {
	$array[] = array(
		'1' => $dt['id_barang'],
		'2' => $dt['nama_barang'],
		'3' => $dt['jumlah_barang'],
		'4' => $dt['harga'],
		'5' => $dt['subharga']
	);
}

$pdf->SetWidths(Array(35,35,35,35,35));

foreach ($array as $key) {
	$pdf->Cell(10,10,'');
	$pdf->Rowc(Array($key['1'], $key['2'],$key['3'],$key['4'],$key['5']));
}

$pdf->Cell(10,10,'');
$pdf->SetWidths(Array(140,35));
$pdf->Row(Array('Subtotal', $trx['subtotal']));
$pdf->Cell(10,10,'');
$pdf->Row(Array('bayar', $trx['bayar']));
$pdf->Cell(10,10,'');
$pdf->Row(Array('kembali', $trx['kembali']));


//tutup pdf
$pdf->Output();

}//tutup isset
?>
