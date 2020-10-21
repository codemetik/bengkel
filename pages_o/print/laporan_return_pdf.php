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
$pdf->RowNoBorderC(Array('Data Return Barang' ));



$sql = mysqli_query($koneksi, "SELECT id_return, id_transaksi, x.id_barang, x.id_user, nama_barang, jumlah_brg_return, harga_jual, jumlah_brg_return * harga_jual AS sub FROM tb_return X INNER JOIN tb_barang Y ON y.id_barang = x.id_barang");
while ($dt = mysqli_fetch_array($sql)) {
	$array[] = array(
		'id_return' => $dt['id_return'],
		'id_trx' => $dt['id_transaksi'],
		'id_barang' => $dt['id_barang'],
		'id_user' => $dt['id_user'],
		'nama_barang' => $dt['nama_barang'],
		'jumlah_brg_return' => $dt['jumlah_brg_return'],
		'harga_jual' => $dt['harga_jual'],
		'sub' => $dt['sub']
	);
}

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',8);
$pdf->SetWidths(Array(15,20,20,20,50,12,25,25));
	$pdf->Cell(5,10,'');
	$pdf->RowC(Array('ID Return','ID Trx ', 'ID Barang','ID User','Nama Brg', 'Jml Return',' Harga Jual','Sub'));

$pdf->SetWidths(Array(15,20,20,20,50,12,25,25));
$pdf->SetFont('Times','',8);
foreach ($array as $key) {
	$pdf->Cell(5,10,'');
	$pdf->Row(Array($key['id_return'],$key['id_trx'],$key['id_barang'],$key['id_user'],$key['nama_barang'],$key['jumlah_brg_return'],rupiah($key['harga_jual']),rupiah($key['sub'])));
}



//tutup pdf
$pdf->Output();

?>
