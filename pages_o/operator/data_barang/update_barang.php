<?php 

$idsql=mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '".$_GET['id']."'");
$dtid = mysqli_fetch_array($idsql);

//roles_kategori
$idkat=mysqli_query($koneksi, "SELECT * FROM tb_roles_kategori WHERE id_barang = '".$dtid['id_barang']."'");
$dtkat = mysqli_fetch_array($idkat);

//roles_supplier
$idsup=mysqli_query($koneksi, "SELECT * FROM tb_roles_supplier WHERE id_barang = '".$dtid['id_barang']."'");
$dtsup = mysqli_fetch_array($idsup);
?>
<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Data Barang</a></li>
        <li><a href="javascript:void(0);">Detail Barang</a></li>
        <li class="active">Update Barang</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-blue">
		<h4>Update Barang</h4>
	</div>
	<div class="body">
		<form action="pages_o/operator/proses/proses_update_barang.php" method="POST">
			<div class="row clearfix">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="input-group">
					<div class="form-line">
						<label>ID Barang</label>
						<input type="text" name="id_barang" class="form-control" value="<?= $dtid['id_barang']; ?>" readonly>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" value="<?= $dtid['nama_barang']; ?>" autofocus>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Warna</label>
						<input type="text" name="warna" class="form-control" value="<?= $dtid['warna']; ?>">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Jumlah Barang</label>
						<input type="text" name="jumlah_barang" class="form-control" value="<?= $dtid['jumlah_barang']; ?>">
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="input-group">
					<div class="form-line">
						<label>Harga Beli</label>
						<input type="text" name="harga_beli" class="form-control" value="<?= $dtid['harga_beli']; ?>">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Harga Jual</label>
						<input type="text" name="harga_jual" class="form-control" value="<?= $dtid['harga_jual']; ?>">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Keterangan</label>
						<input type="text" name="keterangan" class="form-control" value="<?= $dtid['keterangan']; ?>">
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
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                            while ($kat = mysqli_fetch_array($sql)) { 
                                if ($dtkat['id_kategori'] == $kat['id_kategori']) {
                                    $select = "selected";
                                }else{
                                    $select = "";
                                }
                            ?>
                                <option value="<?= $kat['id_kategori']; ?>" <?= $select; ?> ><?= $kat['nama_kategori']; ?></option>        
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
                            while ($sup = mysqli_fetch_array($sqlsp)) { 
                            	if ($dtsup['id_supplier'] == $sup['id_supplier']) {
                            		$select = "selected";
                            	}else{
                            		$select = "";
                            	}
                            	?>
                                <option value="<?= $sup['id_supplier']; ?>" <?= $select;  ?> ><?= $sup['nama_supplier']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                </div>	
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<button type="submit" name="simpan_perubahan" class="btn bg-blue"><i class="material-icons">save</i>Simpan Perubahan</button>
				</div>	
			</div>
		</div>		
		</form>
	</div>
</div>