<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Laporan</a></li>
        <li class="active">Return Barang</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Returan Barang</h4>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-4">
				<form action="" method="POST">
					<div class="input-group">
						<div class="form-line">
							<input type="text" name="search" class="form-control" placeholder="Search...">		
						</div>
						<span class="input-group-addon">
							<button type="submit" name="tampil" class="btn bg-blue"><i class="material-icons">search</i></button>
						</span>
				</div>
				</form>
			</div>
			<div class="col-lg-4">
				<a href="pages_o/print/laporan_return_pdf.php" class="btn bg-blue"><i class="material-icons">file_download</i> <span>Lap Return</span></a>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-11">
						<thead class="bg-blue">
							<tr>
								<th>ID Return</th>
								<th>ID Transaksi</th>
								<th>ID Barang</th>
								<th>ID User</th>
								<th>Nama Barang</th>
								<th>Jumlah Return</th>
								<th>Harga</th>
								<th>Sub</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$brg = mysqli_query($koneksi, "SELECT id_return, id_transaksi, x.id_barang, x.id_user, nama_barang, jumlah_brg_return, harga_jual, jumlah_brg_return * harga_jual AS sub FROM tb_return X INNER JOIN tb_barang Y ON y.id_barang = x.id_barang WHERE x.id_barang = '".$search."' OR id_transaksi LIKE '%".$search."%' OR x.id_barang LIKE '%".$search."%' OR x.id_user LIKE '%".$search."%' OR nama_barang LIKE '%".$search."%'");
						}else{
							$brg = mysqli_query($koneksi, "SELECT id_return, id_transaksi, x.id_barang, x.id_user, nama_barang, jumlah_brg_return, harga_jual, jumlah_brg_return * harga_jual AS sub FROM tb_return X INNER JOIN tb_barang Y ON y.id_barang = x.id_barang");	
						}
						
						while ($dt = mysqli_fetch_array($brg)) { ?>
							<tr class="bg-warning">
								<td><?= $dt['id_return']; ?></td>
								<td><?= $dt['id_transaksi']; ?></td>
								<td><?= $dt['id_barang']; ?></td>
								<td><?= $dt['id_user']; ?></td>
								<td><?= $dt['nama_barang']; ?></td>
								<td><?= $dt['jumlah_brg_return'] ?></td>
								<td><?= rupiah($dt['harga_jual']); ?></td>
								<td><?= rupiah($dt['sub']); ?></td>
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