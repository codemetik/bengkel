<?php 

//input data dari halaman operator
$brgsql = mysqli_query($koneksi, "SELECT max(id_barang) AS maxCode FROM tb_barang");
$idbrg = mysqli_fetch_array($brgsql);
$idb = $idbrg['maxCode'];
$nObrg = (int) substr($idb, 3, 7);
$nObrg++; 
$idbr = "BRG";
$id_barang = $idbr . sprintf("%07s", $nObrg);

//input data dari halaman operator
$spsql = mysqli_query($koneksi, "SELECT max(id_supplier) AS maxCode FROM tb_supplier");
$idsp = mysqli_fetch_array($spsql);
$ids = $idsp['maxCode'];
$nOsp = (int) substr($ids, 3, 7);
$nOsp++; 
$idsup = "SPL";
$id_supplier = $idsup . sprintf("%07s", $nOsp);

//input data dari halaman operator
$ktsql = mysqli_query($koneksi, "SELECT max(id_kategori) AS maxCode FROM tb_kategori");
$idkt = mysqli_fetch_array($ktsql);
$idktg = $idkt['maxCode'];
$nOkt = (int) substr($idktg, 2, 3);
$nOkt++; 
$idkateg = "KT";
$id_kategori = $idkateg . sprintf("%03s", $nOkt);

?>