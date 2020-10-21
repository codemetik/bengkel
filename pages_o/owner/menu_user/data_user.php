<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);">Menu User</a></li>
        <li class="active">Data User</li>
    </ol>
</div>
<div class="card">
	<div class="header bg-deep-orange">
		<h4>Data User</h4>
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
			<div class="col-lg-6">
				<div class="form-group">
					<a href="?page=tambah_user" class="btn bg-blue"><i class="material-icons">add_on</i> Tambah User</a>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr class="bg-blue">
								<th>ID User</th>
								<th>Nama User</th>
								<th>Username</th>
								<th>Password</th>
								<th>confirm Password</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Jabatan</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_user");
						while ($dt = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $dt['id_user']; ?></td>
								<td><?= $dt['nama_user'] ;?></td>
								<td><?= $dt['username'] ?></td>
								<td><?= $dt['password'] ?></td>
								<td><?= $dt['confirm_password'] ?></td>
								<td><?= $dt['alamat'] ?></td>
								<td><?= $dt['jenis_kelamin'] ?></td>
								<td><?= $dt['tempat_lahir'] ?></td>
								<td><?= $dt['tanggal_lahir'] ?></td>
								<?php 
								$cek = mysqli_query($koneksi, "SELECT * FROM tb_roles WHERE id_user = '".$dt['id_user']."'");
								$dcek = mysqli_num_rows($cek);
								$scekson = mysqli_fetch_array($cek);
								$cekjb = mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE id_jabatan = '".$scekson['id_jabatan']."'");
								$scek = mysqli_fetch_array($cekjb);
								
								if ($dcek == 1) {
									echo "<td>".$scek['nama_jabatan']."</td>";
								}else{
									echo "";
								}
								?>
								<td><?= $dt['status'] ?></td>
								<td>
									<a href="?page=detail_data_user&id=<?= $dt['id_user']; ?>" class="btn bg-blue"><i class="material-icons">ebook</i></a>
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