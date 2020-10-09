<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-grey">
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
							<button type="submit" name="search" class="btn bg-blue"><i class="material-icons">search</i></button>
						</span>
				</div>
				</form>
			</div>
			<div class="col-lg-4">
				<a href="?page=tambah_barang" class="btn bg-blue"><i class="material-icons">add_box</i> <span>Tambah Barang</span></a>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-11">
						<thead class="bg-blue">
							<tr>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Warna</th>
								<th>Jumlah barang</th>
								<th>Harga Beli</th>
								<th>Harga Jual</th>
								<th>keterangan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$brg = mysqli_query($koneksi, "SELECT * FROM tb_barang");
						while ($dt = mysqli_fetch_array($brg)) { ?>
							<tr>
								<td><?= $dt['id_barang']; ?></td>
								<td><?= $dt['nama_barang']; ?></td>
								<td><?= $dt['warna'] ?></td>
								<td><?= $dt['jumlah_barang']; ?></td>
								<td><?= rupiah($dt['harga_beli']); ?></td>
								<td><?= rupiah($dt['harga_jual']); ?></td>
								<td><?= $dt['keterangan']; ?></td>
								<td>
									<a href="?page=update_barang&id=<?= $dt['id_barang']; ?>" class="btn bg-blue"><i class="material-icons">edit</i></a> || <a href="" class="btn btn-danger"><i class="material-icons">delete</i></a>
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