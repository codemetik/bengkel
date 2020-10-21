<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Laporan</a></li>
        <li class="active">Penjualan Barang Harian</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Penjualan Barang Harian</h4>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-4">
				<form action="" method="POST">
					<div class="input-group">
						<div class="form-line">
							<input type="text" name="search" class="form-control" placeholder="Search Tgl 10 or ...">		
						</div>
						<span class="input-group-addon">
							<button type="submit" name="tampil" class="btn bg-blue"><i class="material-icons">search</i></button>
						</span>
				</div>
				</form>
			</div>
			<div class="col-lg-4">
				<a href="pages_o/print/data_barang_pdf.php" class="btn bg-blue"><i class="material-icons">file_download</i> <span>Data Penjualan</span></a>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-11">
						<thead class="bg-blue">
							<tr>
								<th>ID Penjualan</th>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Penjualan Brg</th>
								<th>Harga Jual</th>
								<th>Sub</th>
								<th>Tgl Barang</th>
								<th>Tgl Penjualan</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$brg = mysqli_query($koneksi, "SELECT id_penjualan,y.id_barang AS id , x.nama_barang AS nm, y.jumlah_barang AS pnj_brg, harga_jual,y.jumlah_barang * harga_jual AS sub, tgl_barang, tgl_penjualan FROM table_barang X INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang WHERE DAY(tgl_penjualan) LIKE '".$search."'");
						}else{
							$brg = mysqli_query($koneksi, "SELECT id_penjualan, y.id_barang AS id, x.nama_barang AS nm, y.jumlah_barang AS pnj_brg, harga_jual,y.jumlah_barang * harga_jual AS sub, tgl_barang, tgl_penjualan FROM table_barang X INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang WHERE DAY(tgl_penjualan) = '".date('d')."'");	
						}
						
						while ($dt = mysqli_fetch_array($brg)) { ?>
							<tr class="bg-warning">
								<td><?= $dt['id_penjualan']; ?></td>
								<td><?= $dt['id']; ?></td>
								<td><?= $dt['nm']; ?></td>
								<td><?= $dt['pnj_brg']; ?></td>
								<td><?= rupiah($dt['harga_jual']); ?></td>
								<td><?= rupiah($dt['sub']); ?></td>
								<td><?= $dt['tgl_barang']; ?></td>
								<td><?= $dt['tgl_penjualan']; ?></td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>