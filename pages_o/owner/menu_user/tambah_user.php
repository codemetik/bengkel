<?php 
$usersql = mysqli_query($koneksi, "SELECT max(id_user) AS maxCode FROM tb_user");
	$iduser = mysqli_fetch_array($usersql);
	$id = $iduser['maxCode'];
	$nO = (int) substr($id, 3, 4);
	$nO++; 
	$idus = "USE";
	$id_user = $idus . sprintf("%04s", $nO);
?>
<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Menu User</a></li>
        <li class="active">Tambah User</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Tambah User</h4>
	</div>
	<div class="body">
		<form action="pages_o/owner/proses/proses_input_user.php" method="POST">
		<div class="row">
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<label>ID User</label>
						<input type="text" name="id_user" class="form-control" value="<?= $id_user; ?>" readonly>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Password</label>
						<input type="text" name="password" class="form-control">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Confirmasi Password</label>
						<input type="text" name="confirm_password" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<label>Nama User</label>
						<input type="text" name="nama_user" class="form-control">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>
				</div>
				<div class="form-group form-float">
					<div class="row clearfix">
						<div class="col-md-12">
							<label>Jenis Kelamin</label>
							<select class="form-control show-tick" name="jenis_kelamin">
							<?php 
                            $jkl = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
                            while ($jk = mysqli_fetch_array($jkl)) { 
                            ?>
                                <option value="<?= $jk['jenis_kelamin']; ?>"><?= $jk['jenis_kelamin']; ?></option>        
                            <?php }
                            ?>
							</select>
						</div>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<label>Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" class="form-control">
					</div>
				</div>
				<div class="form-group form-float">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>Jabatan</label>
                        <select class="form-control show-tick" name="id_jabatan">
                            <?php 
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
                            while ($kat = mysqli_fetch_array($sql)) { 
                            ?>
                                <option value="<?= $kat['id_jabatan']; ?>"><?= $kat['nama_jabatan']; ?></option>        
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                </div>
				<div class="form-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="material-icons">save</i> Simpan</button>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>