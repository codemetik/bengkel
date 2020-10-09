<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-grey">
        <li><a href="javascript:void(0);">Data Barang</a></li>
        <li class="active">Detail Barang</li>
    </ol>
</div>
<div class="card">
	<div class="header">
		Detail Barang
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<input type="text" name="search" class="form-control" placeholder="Search...">		
					</div>
					<span class="input-group-addon bg-blue"><i class="material-icons fa-2x">search</i></span>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead class="bg-blue">
							<tr>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Warna</th>
								<th>Jumlah barang</th>
								<th>Harga Beli</th>
								<th>Harga Jual</th>
								<th>keterangan</th>
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