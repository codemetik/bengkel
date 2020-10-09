<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-grey">
        <li><a href="javascript:void(0);">Input Data</a></li>
        <li class="active">Tambah Supplier</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-blue">
		<h4>Tambah Supplier</h4>
	</div>
	<div class="body">
		<form action="pages_o/operator/proses/proses_input_supplier.php" method="POST">
			<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="input-group">
					<div class="form-line">
						<label>ID Supplier</label>
						<input type="text" name="id_supplier" class="form-control" value="<?= $id_supplier; ?>" readonly>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Nama Supplier</label>
						<input type="text" name="nama_supplier" class="form-control" placeholder="nama supplier" autofocus>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Alamat Supplier</label>
						<input type="text" name="alamat_supplier" class="form-control" placeholder="alamat supplier">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="input-group">
					<div class="form-line">
						<label>No Telp Supplier</label>
						<input type="text" name="no_telp_supplier" class="form-control" placeholder="no telp supplier">
					</div>
				</div>
				<div class="input-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="material-icons">save</i>Simpan</button>
				</div>	
			</div>
		</div>		
		</form>
	</div>
</div>