<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Data Barang</a></li>
        <li class="active">Tambah Barang</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Tambah Barang</h4>
	</div>
	<div class="body">
		<form action="pages_o/operator/proses/proses_input_barang.php" method="POST">
			<div class="row clearfix">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="input-group">
					<div class="form-line">
						<label>ID Barang</label>
						<input type="text" name="id_barang" class="form-control" value="<?= $id_barang; ?>" readonly>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" placeholder="nama barang" autofocus>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Warna</label>
						<input type="text" name="warna" class="form-control" placeholder="warna">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Jumlah Barang</label>
						<input type="text" name="jumlah_barang" class="form-control" placeholder="jumlah barang">
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="input-group">
					<div class="form-line">
						<label>Harga Beli</label>
						<input type="text" name="harga_beli" class="form-control" placeholder="harga beli">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Harga Jual</label>
						<input type="text" name="harga_jual" class="form-control" placeholder="harga jual">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Keterangan</label>
						<input type="text" name="keterangan" class="form-control" placeholder="keterangan barang">
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group form-float">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>Kategori</label>
                        <select class="form-control show-tick" name="id_kategori">
                            <?php 
                            $sqlkt = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                            while ($kateg = mysqli_fetch_array($sqlkt)) { ?>
                                <option value="<?= $kateg['id_kategori']; ?>"><?= $kateg['nama_kategori']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                </div>
                <div class="form-group form-float">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>Supplier</label>
                        <select class="form-control show-tick" name="id_supplier">
                            <?php 
                            $sqlsp = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
                            while ($sup = mysqli_fetch_array($sqlsp)) { ?>
                                <option value="<?= $sup['id_supplier']; ?>"><?= $sup['nama_supplier']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                </div>	
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="material-icons">save</i>Simpan</button>
				</div>	
			</div>
		</div>		
		</form>
	</div>
</div>