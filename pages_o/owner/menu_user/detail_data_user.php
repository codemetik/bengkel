<?php 
$id_user = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$id_user."'");
$data = mysqli_fetch_array($sql);

$rol = mysqli_query($koneksi, "SELECT * FROM tb_roles WHERE id_user = '".$id_user."'");
$get = mysqli_fetch_array($rol);
?>
<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Dashboard</a></li>
        <li class="active">Owner : <?= $_SESSION['nama_user']; ?></li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Edit User</h4>
	</div>
	<div class="body">
		<form action="pages_o/owner/proses/proses_edit_user.php" method="POST">
		<div class="row">
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<label>ID User</label>
						<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Username</label>
						<input type="text" name="username" value="<?= $data['username'] ?>" class="form-control">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Password</label>
						<input type="text" name="password" value="<?= $data['password'] ?>" class="form-control">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Confirmasi Password</label>
						<input type="text" name="confirm_password" value="<?= $data['confirm_password'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<label>Nama User</label>
						<input type="text" name="nama_user" value="<?= $data['nama_user'] ?>" class="form-control">
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Alamat</label>
						<input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control">
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
                                if ($data['jenis_kelamin'] == $jk['jenis_kelamin']) {
                                    $select = "selected";
                                }else{
                                    $select = "";
                                }
                            ?>
                                <option value="<?= $jk['jenis_kelamin']; ?>" <?= $select; ?> ><?= $jk['jenis_kelamin']; ?></option>        
                            <?php }
                            ?>
							</select>
						</div>
					</div>
				</div>
				<div class="input-group">
					<div class="form-line">
						<label>Tempat Lahir</label>
						<input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir']; ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
					<div class="form-line">
						<label>Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" class="form-control">
					</div>
				</div>
				<div class="form-group form-float">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>Jabatan</label>
                        <select class="form-control show-tick" name="id_jabatan">
                            <?php 
                            $sqli = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
                            while ($kat = mysqli_fetch_array($sqli)) { 
                                if ($get['id_jabatan'] == $kat['id_jabatan']) {
                                    $select = "selected";
                                }else{
                                    $select = "";
                                }
                            ?>
                                <option value="<?= $kat['id_jabatan']; ?>" <?= $select; ?> ><?= $kat['nama_jabatan']; ?></option>        
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                </div>
				<div class="form-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="material-icons">save</i> Simpan Perubahan</button>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>