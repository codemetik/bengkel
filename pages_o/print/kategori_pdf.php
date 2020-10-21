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
$pdf->RowNoBorderC(Array('Data Kategori' ));

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',11);
$pdf->SetWidths(Array(85,85));
	$pdf->Cell(10,10,'');
	$pdf->RowC(Array('ID kategori', 'Nama kategori'));

$sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori GROUP BY id_kategori DESC");
while ($dt = mysqli_fetch_array($sql)) {
	$array[] = array(
		'id_kategori' => $dt['id_kategori'],
		'nama_kategori' => $dt['nama_kategori']
	);
}

$pdf->SetWidths(Array(85,85));
$pdf->SetFont('Times','',11);
foreach ($array as $key) {
	$pdf->Cell(10,10,'');
	$pdf->Row(Array($key['id_kategori'], $key['nama_kategori']));
}



//tutup pdf
$pdf->Output();

?>
