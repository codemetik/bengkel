<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Data Terkait</a></li>
        <li class="active">Lihat Supplier dan Kategori</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Data Supplier dan Kategori</h4>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-lg-6">
				<a href="pages_o/print/supplier_pdf.php" class="btn bg-blue"><i class="material-icons">file_download</i> Data Supplier</a>
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-11">
						<thead class="bg-blue">
							<tr>
								<th>ID Supplier</th>
								<th>Nama Supplier</th>
								<th>Alamat Supplier</th>
								<th>No Telp Supplier</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$sqlsup = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
						while ($dtsup = mysqli_fetch_array($sqlsup)) { ?>
							<tr>
								<td><?= $dtsup['id_supplier']; ?></td>
								<td><?= $dtsup['nama_supplier']; ?></td>
								<td><?= $dtsup['alamat_supplier']; ?></td>
								<td><?= $dtsup['no_telp_supplier']; ?></td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-6">
				<a href="pages_o/print/kategori_pdf.php" class="btn bg-blue"><i class="material-icons">file_download</i> Data Kategori</a>
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-11">
						<thead class="bg-blue">
							<tr>
								<th>ID Kategori</th>
								<th>Nama Kategori</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$sqlkat = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
						while ($dtkat = mysqli_fetch_array($sqlkat)) { ?>
							<tr>
								<td><?= $dtkat['id_kategori']; ?></td>
								<td><?= $dtkat['nama_kategori']; ?></td>
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