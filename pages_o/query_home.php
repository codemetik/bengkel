<?php 
$user = mysqli_query($koneksi, "SELECT COUNT(*) AS us FROM tb_user");
$duse = mysqli_fetch_array($user);

$trans = mysqli_query($koneksi, "SELECT COUNT(*) AS trx FROM tb_transaksi_penjualan");
$dtrans = mysqli_fetch_array($trans);

$trx = mysqli_query($koneksi, "SELECT COUNT(*) AS penjualan FROM tb_penjualan");
$dtr = mysqli_fetch_array($trx);

$return = mysqli_query($koneksi, "SELECT COUNT(*) AS retur FROM tb_return");
$dreturn = mysqli_fetch_array($return);
?>