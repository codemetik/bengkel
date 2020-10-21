<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Data Barang</a></li>
        <li class="active">Detail Barang</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Data Barang</h4>
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
				<a href="?page=tambah_barang" class="btn bg-blue"><i class="material-icons">add_box</i> <span>Tambah Barang</span></a>
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
								<th>Warna</th>
								<th>Stok barang</th>
								<th>Harga Beli</th>
								<th>Harga Jual</th>
								<th>keterangan</th>
								<th>Kategori</th>
								<th>Supplier</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$brg = mysqli_query($koneksi, "SELECT * FROM table_barang WHERE id_barang = '".$search."' OR nama_barang LIKE '%".$search."%' OR nama_kategori LIKE '%".$search."%' OR nama_supplier LIKE '%".$search."%' GROUP BY id_barang DESC");
						}else{
							$brg = mysqli_query($koneksi, "SELECT * FROM table_barang GROUP BY id_barang DESC");	
						}
						
						while ($dt = mysqli_fetch_array($brg)) { ?>
							<tr>
								<td width="100"><?= $dt['id_barang']; ?></td>
								<td width="150"><?= $dt['nama_barang']; ?></td>
								<td width="70"><?= $dt['warna'] ?></td>
								<td width="30"><?= $dt['jumlah_barang']; ?></td>
								<td><?= rupiah($dt['harga_beli']); ?></td>
								<td><?= rupiah($dt['harga_jual']); ?></td>
								<td><?= $dt['keterangan']; ?></td>
								<td><?= $dt['nama_kategori']; ?></td>
								<td><?= $dt['nama_supplier']; ?></td>
								<td>
									<a href="?page=update_barang&id=<?= $dt['id_barang']; ?>" class="btn bg-blue"><i class="material-icons">edit</i></a> || <a href="pages_o/operator/proses/delete_barang.php?id=<?= $dt['id_barang']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus barang ini?')" class="btn btn-danger"><i class="material-icons">delete</i></a> || <a  href='#myModal' id='custId' data-toggle='modal' data-id="<?= $dt['id_barang'] ?>" class="btn bg-blue"><i class="material-icons">add_box</i> Stok</a>
								</td>
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