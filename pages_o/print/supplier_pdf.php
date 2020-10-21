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
$pdf->RowNoBorderC(Array('Data Supplier' ));

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',11);
$pdf->SetWidths(Array(42.5,42.5,42.5,42.5));
	$pdf->Cell(10,10,'');
	$pdf->RowC(Array('ID Supplier ', 'Nama Supplier', 'Alamat Supplier','No Telp Supplier' ));

$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier GROUP BY id_supplier DESC");
while ($dt = mysqli_fetch_array($sql)) {
	$array[] = array(
		'id_supplier' => $dt['id_supplier'],
		'nama_supplier' => $dt['nama_supplier'],
		'alamat_supplier' => $dt['alamat_supplier'],
		'no_telp_supplier' => $dt['no_telp_supplier']
	);
}

$pdf->SetWidths(Array(42.5,42.5,42.5,42.5));
$pdf->SetFont('Times','',11);
foreach ($array as $key) {
	$pdf->Cell(10,10,'');
	$pdf->Row(Array($key['id_supplier'], $key['nama_supplier'],$key['alamat_supplier'],$key['no_telp_supplier']));
}



//tutup pdf
$pdf->Output();

?>
