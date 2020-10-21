<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Laporan</a></li>
        <li class="active">Stok Barang</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Stok Barang</h4>
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
				<a href="pages_o/print/data_barang_pdf.php" class="btn bg-blue"><i class="material-icons">file_download</i> <span>Data Barang</span></a>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-11">
						<thead class="bg-blue">
							<tr>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Kategori</th>
								<th>Supplier</th>
								<th>Stok</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$brg = mysqli_query($koneksi, "SELECT id_barang, nama_barang, nama_supplier, nama_kategori, jumlah_barang AS stok, IF(jumlah_barang <= 3,'WARNING','GOOD') AS statuss FROM table_barang WHERE id_barang = '".$search."' OR nama_barang LIKE '%".$search."%' OR nama_kategori LIKE '%".$search."%' OR nama_supplier LIKE '%".$search."%' GROUP BY id_barang DESC");
						}else{
							$brg = mysqli_query($koneksi, "SELECT id_barang, nama_barang, nama_supplier, nama_kategori, jumlah_barang AS stok, IF(jumlah_barang <= 3,'WARNING','GOOD') AS statuss FROM table_barang GROUP BY id_barang DESC");	
						}
						
						while ($dt = mysqli_fetch_array($brg)) { 
							if ($dt['statuss'] == 'WARNING') { ?>
							<tr class="bg-warning">
								<td><?= $dt['id_barang']; ?></td>
								<td><?= $dt['nama_barang']; ?></td>
								<td><?= $dt['nama_kategori']; ?></td>
								<td><?= $dt['nama_supplier']; ?></td>
								<td class="bg-yellow"><b class="col-black"><?= $dt['stok']; ?></b></td>
								<td class="bg-yellow"><b class="col-black"><?= $dt['statuss']; ?></b></td>
							</tr>
							<?php }else if($dt['statuss'] == 'GOOD'){ ?>
							<tr>
								<td><?= $dt['id_barang']; ?></td>
								<td><?= $dt['nama_barang']; ?></td>
								<td><?= $dt['nama_kategori']; ?></td>
								<td><?= $dt['nama_supplier']; ?></td>
								<td><?= $dt['stok']; ?></td>
								<td><?= $dt['statuss']; ?></td>
							</tr>
							<?php }
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>