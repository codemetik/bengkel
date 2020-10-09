<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-grey">
        <li><a href="javascript:void(0);">Input Data</a></li>
        <li class="active">Tambah Kategori</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-blue">
		<h4>Tambah Supplier</h4>
	</div>
	<div class="body">
		<form action="pages_o/operator/proses/proses_input_kategori.php" method="POST">
			<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="input-group">
					<div class="form-line">
						<label>ID Kategori</label>
						<input type="text" name="id_kategori" class="form-control" value="<?= $id_kategori; ?>" readonly>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Nama Kategori</label>
						<input type="text" name="nama_kategori" class="form-control" placeholder="nama kategori" autofocus>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="input-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="material-icons">save</i>Simpan</button>
				</div>	
			</div>
		</div>		
		</form>
	</div>
</div>